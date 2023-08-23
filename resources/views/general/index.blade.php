@extends('layout')
@section('meta')@endsection
@section('contents')
<main id="main">
    アクセスありがとうございます。
    こちらは　産院様限定サイトになります。
    サービス内容・お申込みにつきましては
    下記よりお問い合わせ下さい。

    問い合わせメール
    <div class="ta-c"><a class="d-ib br-8 ptb-4e prl-10e bd-gray-c bgc-gray-l c-black bd" href="mailto:{{env('MAIL_CONTACT')}}?subject=「バースストーリー」お問い合わせ&body=お問い合わせ内容を記入してください。">問い合わせメール</a></div>
</main>
@endsection

@section('javascript')@endsection
