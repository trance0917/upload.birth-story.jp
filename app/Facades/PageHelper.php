<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class PageHelper extends Facade
{
    protected static function getFacadeAccessor() {
        return 'page_helper';
    }
}
