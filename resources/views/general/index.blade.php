@extends('layout')
@section('meta')@endsection
@section('contents')
    <div class=" ">
        <div class="max-w-[800px] bg-sub-light/50 mx-auto pt-15 pb-20 px-10 md:px-7 -mb-30">
            <div class="bg-white border border-slate-300 flex flex-col items-center px-4 md:px-3 py-7 md:py-5">
                <h2 class="text-red text-[18px] text-red font-bold mb-2.5">アクセスありがとうございます。</h2>
                <div class="">
                    <p class="color-red text-[16px]">こちらは　産院様限定サイトになります。<br />
                        サービス内容・お申込みにつきましては<br />
                        下記よりお問い合わせ下さい。</p>
                    いいねーあｓふぇあえｓふぇaaaaadaedfaefe
                </div>
                <div class="text-center mt-5"><a class="underline" href="mailto:{{env('MAIL_CONTACT')}}?subject=「バースストーリー」お問い合わせ&body=お問い合わせ内容を記入してください。">問い合わせメール</a></div>
            </div>
        </div>

    </div>
@endsection

@section('javascript')@endsection
