<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class PageHelper{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        //routeの名前をもとに参照するweb.xmlの要素を決める
        $route_name = Route::current()->getName();

        \App\Facades\PageHelper::init();
		\PageHelper::setData($route_name);

		$a = $next($request);
//		v(\PageHelper::getConf());
		return $a;
    }
}
