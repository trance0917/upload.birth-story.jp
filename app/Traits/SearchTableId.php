<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait SearchTableId
{
    /*
     * 検索項目を元に検索しIDの配列を返す。すべてand検索になる
     * @param Builder $table
     * @param string $id_name 検索するID名
     * @param array $enable_params [search_paramsのkey => 検索対象のパス]
     * @param array $search_params 対象テーブルの検索パラメータ。全部信用するので事前バリデーション必須。
     * search_params[table_name][column_name][in] = [1,2,3,]
     * search_params[table_name][column_name][from] = 1
     * search_params[table_name][column_name][to] = 3
     * search_params[table_name][column_name][like] = 'test'
     * search_params[table_name][column_name][isnull] = 1
     */
    private function searchTableIds(Builder $table, string $id_name, array $enable_params, array $search_params)
    {
        $need_search = false;
        foreach ($enable_params as $serach_params_enable_key => $table_name_path) {
            if (!empty($search_params[$serach_params_enable_key])) {
                foreach ($search_params[$serach_params_enable_key] as $column_name => $search_array) {
                    foreach ($search_array as $method => $serach_values) {
                        if (
                            !is_null($serach_values)
                            && $serach_values !== ''
                        ) {
                            if (is_array($serach_values)) {
                                foreach ($serach_values as $serach_value) {
                                    if (
                                        !is_null($serach_value)
                                        && $serach_value !== ''
                                    ) {
                                        $need_search = true;
                                    }
                                }
                            } else {
                                $need_search = true;
                            }
                        }
                    }
                }
            }
        }
        if (!$need_search) {
            return false;
        }
        foreach ($enable_params as $serach_params_enable_key => $table_name_path) {
            if (!empty($search_params[$serach_params_enable_key])) {
                $table = $this->addConditionsToEloquentBuilder($table, $table_name_path, $search_params[$serach_params_enable_key]);
            }
        }
        return $table->pluck($id_name)->toArray();
    }

    /*
     * 検索項目を元に検索条件をbuilderデータに足す。すべてand検索になる
     * @param Builder $table
     * @param string $table_name withで書くときのテーブルのパス。'*'はwhereInではなくwhereで親テーブルを検索する
     * @param array $search_params 対象テーブルの検索パラメータ。全部信用するので事前バリデーション必須。
     * search_params[column_name][in] = [1,2,3,]
     * search_params[column_name][from] = 1
     * search_params[column_name][to] = 3
     * search_params[column_name][like] = 'test'
     */
    private function addConditionsToEloquentBuilder(Builder $table, string $table_name, array $search_params)
    {
        if ($table_name == '*') {
            foreach ($search_params as $search_column => $methods) {
                foreach ($methods as $method => $values) {
                    if (is_null($values)) {
                        continue;
                    }
                    if (is_array($values)) {
                        $values_tmp = [];
                        foreach ($values as $key => $value) {
                            if (!is_null($value)) {
                                $values_tmp[] = $value;
                            }
                        }
                        if (empty($values_tmp)) {
                            continue;
                        }
                        $values = $values_tmp;
                    }
                    if ($method == 'in') {
                        $table->whereIn($search_column, $values);
                    } else if ($method == 'from') {
                        $table->where($search_column, '>=', $values);
                    } else if ($method == 'to') {
                        $table->where($search_column, '<', $values);
                    } else if ($method == 'like' && $values !== '') {
                        $values_array = explode(' ', str_replace('　', ' ', $values));
                        foreach ($values_array as $value) {
                            if ($values !== '') {
                                $table->where($search_column, 'LIKE', '%' . $value . '%');
                            }
                        }
                    } else if ($method == 'isnull') {
                        if ($values) {
                            $table->whereNull($search_column);
                        } else {
                            $table->whereNotNull($search_column);
                        }
                    }
                }
            }
        } else {
            $table = $table->whereHas($table_name, function ($query) use ($search_params) {
                $this->addConditionsToEloquentBuilder($query, '*', $search_params);
            });
        }
        return $table;
    }
}
