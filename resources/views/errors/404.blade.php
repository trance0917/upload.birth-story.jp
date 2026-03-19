{{\PageHelper::init()}}
{{\PageHelper::setData('error-404')}}
@extends('layout')
@section('meta')@endsection
@section('contents')
    <h1 class="text-center text-[30px] mt-[30px] leading-none">404</h1>
    <p class="text-center text-[30px] mt-[10px] leading-none">ページが存在しません</p>
    <div class="flex flex-cold items-center justify-center mt-[30px]">
        <p>ページ削除された可能性があります。</p>
    </div>
@endsection

@section('javascript')@endsection


