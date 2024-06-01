{{\PageHelper::init()}}
{{\PageHelper::setData('error-404')}}
@extends('layout')
@section('meta')@endsection
@section('contents')
    <h1 class="text-center text-[30px] mt-[30px] leading-none">488</h1>
    <p class="text-center text-[30px] mt-[10px] leading-none">産院確認エラー</p>

    <div class="flex items-center justify-center mt-[30px]">
        <div class="px-[20px]">
            <p>産院情報を確認できませんでした。<br />
            使用しているブラウザがプライベートモード、<br />
            もしくはシークレットモードになっていませんか？<br />
            確認したうえで再度QRコードを読み込んでからこちらへアクセスしてください。</p>
            <p class="mt-[5px]">または、LINEで産院名をお送りください。</p>
        </div>
    </div>
@endsection

@section('javascript')@endsection


