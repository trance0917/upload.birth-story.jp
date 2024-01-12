<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
@include('includes.meta')
@yield('meta')
</head>
<body page-name="{{\PageHelper::getConf()['name']}}">
@include('includes.gtm')
@include('includes.header')
<div id="container">
    @yield('contents')
</div>
@include('includes.footer')

@yield('javascript')
@env(['local','staging'])
{{--    <span id="test-flg-88">テスト</span>--}}
@endenv


