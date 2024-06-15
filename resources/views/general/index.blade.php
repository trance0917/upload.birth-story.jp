@extends('layout')
@section('meta')
    <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/versions/2.22.3/sdk.js"></script>

@endsection
@section('contents')
    <div class=" ">
        <div class="max-w-[800px] bg-sub-light/50 mx-auto pt-15 pb-20 px-10 md:px-7 -mb-30">
            <div class="bg-white border border-slate-300 flex flex-col items-center px-4 md:px-3 py-7 md:py-5">
                <h2 class="text-red text-[18px] text-red font-bold mb-2.5">アクセスありがとうございます。</h2>
                <div class="">
                    <p class="color-red text-[16px]">こちらは　産院様限定サイトになります。<br />
                        サービス内容・お申込みにつきましては<br />
                        下記よりお問い合わせ下さい。</p>
                </div>
                <div class="text-center mt-5"><a class="underline" href="mailto:{{env('MAIL_CONTACT')}}?subject=「バースストーリー」お問い合わせ&body=お問い合わせ内容を記入してください。">問い合わせメール</a></div>
            </div>
        </div>

    </div>
    <script>
        liff.init({
            liffId: '2005625466-mbaA19yo', // Use own liffId
            withLoginOnExternalBrowser: true, // Enable automatic login process
        }).then(() => {
            // Start to use liff's api
            console.log(liff.getLanguage());
            console.log(liff.getVersion());
            console.log(liff.isInClient());
            console.log(liff.isLoggedIn());
            console.log(liff.getOS());
            console.log(liff.getLineVersion());
        }).catch((err) => {
            alert(err);
        });

    </script>
@endsection

@section('javascript')


@endsection
