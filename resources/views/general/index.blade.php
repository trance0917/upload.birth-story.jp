@extends('layout')
@section('meta')@endsection
@section('contents')
    <style>
        #main-visual {
            overflow:hidden;
            position: relative;
        }
        #main-visual ul {
            position: relative;
        }
        #main-visual ul li:not(:last-child){
            position: absolute;
            top: 0;
        }
        #main-visual ul li:last-child {

        }
        #main-visual ul li:first-child{
            z-index:10;
            animation-name: scaleAnime;/*1で解説*/
            /*animation-fill-mode:backwards;!*2で解説*!*/
            animation-duration:8s;/*3で解説*/
            /*animation-iteration-count:infinite;!*4で解説*!*/
            animation-timing-function:linear;/*5で解説*/
            /*animation-delay: 0.5s;!*6で解説*!*/
            /*animation-direction:normal;!*7で解説*!*/
        }

        @keyframes scaleAnime{
            0%{
                transform: scale(1);
            }
            50%{
                /*opacity:1;*/
            }
            75%{
                /*opacity:0;*/
            }
            100% {
                /*opacity:0;*/
                transform: scale(1.1);
            }
        }
    </style>
    <script>
        $(function(){
            setInterval(function(){
                var $elm = $('#main-visual ul li:first').clone();
                $('#main-visual ul li:first').fadeOut(800,function(){
                    $('#main-visual ul li:first').remove();
                    $('#main-visual ul li:nth-child(2)').after($elm);
                });
            },7000);
        });
    </script>
    <div id="main-visual">
        <ul class="min-w-[1200px] md:min-w-full">
            <li><img src="/images/index-1.png" alt=""></li>
            <li><img src="/images/index-2.png" alt=""></li>
            <li><img src="/images/index-3.png" alt=""></li>
        </ul>
        <div class="absolute z-10 bottom-[30px] bg-white/70 w-full border-double border-l-0 border-r-0 border-[4px] border-white/80 md:bottom-[10px]">
            <p class="w-[1200px] mx-auto text-[36px] font-bold leading-snug py-6 tracking-wider md:w-full
            md:text-[16px] md:py-1.5 md:pl-2.5">産院さまの未来を明るく支える<br />親子の思い出を素敵に支える</p>
        </div>
    </div>
<main id="main" class="w-[1200px] mx-auto md:w-full">
    <div class="my-15 md:my-7"><img class="mx-auto md:w-[100px]" src="/images/arrow.png" /></div>
    <div class="flex justify-between items-center md:flex-col">
        <div class="w-[600px] font-bold md:order-2 md:w-full">
            <p class="text-[18px] leading-relaxed md:w-[90%] md:mx-auto md:text-[16px] md:mt-2.5">出産は女性にとって人生の最大イベント。<br />
                その感動をいつまでも忘れずに、家族の絆を大切にして欲しい。<br />
                そういう願いを産院様と共有しながら作り出していく世界で一つだけの誕生物語「バースストーリー」。<br />
                <br />
                出産前後の写真や映像、赤ちゃんの産声、ご家族からのメッセージなどを詰めて産院ならではの貴重なシーンを感動的ストーリーにして残していただけます。<br />
                ご家族の絆や、優しく見守って来られた先生やスタッフの皆さまとの温かい信頼関係がいつまでも続きますよう、病院のお名前やお写真も一緒に未来に残していきます。</p>
            <p class="text-[20px] text-right md:mr-5"><a class="hover:bg-main/10 leading-none py-1.25 pl-1.75 pr-5 inline-block border-b border-[#ccc] hover:border-main
            relative
            after:content-['.']
                    after:w-0
                    after:h-0
                    after:overflow-hidden
                    after:block
                    after:absolute
                    after:border
                    after:border-t-[5px]
                    after:border-r-[0]
                    after:border-b-[5px]
                    after:border-l-[5px]
                    after:border-t-transparent
                    after:border-r-transparent
                    after:border-b-transparent
                    after:border-l-main
                    after:top-[calc(50%-5px)]
                    after:right-2
                    md:text-[16px]
                    md:py-0.75
            " href="/greeting">ごあいさつへ</a></p>
        </div>
        <p class="w-[570px] md:order-1 md:w-[90%]"><img src="/images/index-greet.png" alt=""></p>
    </div>
    <div class="my-15 md:my-7"><img class="mx-auto md:w-[100px]" src="/images/arrow.png" /></div>
    <div class="flex justify-between items-center md:flex-col">
        <div class="w-[500px] md:w-[340px]">
            <iframe class="w-full h-[350px] md:h-[220px]" src="https://www.youtube.com/embed/B5dVwy9G874" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="w-[670px] font-bold md:order-2 md:w-full">
            <p class="text-[18px] leading-relaxed md:w-[90%] md:mx-auto md:text-[16px] md:mt-2.5">「バースストーリー」は産婦様や産院スタッフ様の声をお聞きしながら作り上げたシステムです。<br />
                <br />
                ママやご家族が撮影されたお写真、動画を一人ひとりのかけがえのないフォトストーリーにして1ヶ月健診時に産院様からご出産記念のプレゼントとしてお渡しいただいております。<br />
                <br />
                素材に拘りを持ち時間をかけてレタッチ編集して作り上げていく<br />
                産院思い出プロジェクト「バースストーリー」<br />
<br />
                出産育児経験のある女性エンジニア達が1枚1枚丁寧にレタッチを行い写真クオリティを上げながらオンリーワンの感動ムービーに仕上げていきます。</p>
            <p class="text-[20px] text-right md:mr-5"><a class="hover:bg-main/10 leading-none py-1.25 pl-1.75 pr-5 inline-block border-b border-[#ccc] hover:border-main
            relative
            after:content-['.']
                    after:w-0
                    after:h-0
                    after:overflow-hidden
                    after:block
                    after:absolute
                    after:border
                    after:border-t-[5px]
                    after:border-r-[0]
                    after:border-b-[5px]
                    after:border-l-[5px]
                    after:border-t-transparent
                    after:border-r-transparent
                    after:border-b-transparent
                    after:border-l-main
                    after:top-[calc(50%-5px)]
                    after:right-2
                    md:text-[16px]
                    md:py-0.75
            " href="/service">サービス紹介</a></p>
        </div>

    </div>

    <section class="px-25 mt-30 md:px-0 md:mt-15">
        <h3 class="mb-10 md:mb-5"><img class="mx-auto md:w-[180px]" src="/images/index-bs-logo.png" alt="" /></h3>
        <ul class="flex flex-wrap justify-center bg-[#f5f5f5]
        p-[30px]
        md:p-[10px]
        -m-[5px]
        [&>li]:w-[293px]
        [&>li]:m-[5px]
        md:[&>li]:w-[110px]
        md:[&>li>img]:w-full
        ">
            <li><img src="/images/index-insta-1.png" /></li>
            <li><img src="/images/index-insta-2.png" /></li>
            <li><img src="/images/index-insta-3.png" /></li>
            <li><img src="/images/index-insta-4.png" /></li>
            <li><img src="/images/index-insta-5.png" /></li>
            <li><img src="/images/index-insta-6.png" /></li>
            <li><img src="/images/index-insta-7.png" /></li>
            <li><img src="/images/index-insta-8.png" /></li>
            <li><img src="/images/index-insta-9.png" /></li>
        </ul>
    </section>

    <ul class="flex justify-center space-x-10 mt-20 md:space-x-5">

        <li><a class="text-[24px] font-bold hover:bg-main/10 leading-none py-1.75 pl-1.5 pr-5 inline-block border-b border-[#ccc] hover:border-main
            relative
            after:content-['.']
                    after:w-0
                    after:h-0
                    after:overflow-hidden
                    after:block
                    after:absolute
                    after:border
                    after:border-t-[5px]
                    after:border-r-[0]
                    after:border-b-[5px]
                    after:border-l-[5px]
                    after:border-t-transparent
                    after:border-r-transparent
                    after:border-b-transparent
                    after:border-l-main
                    after:top-[calc(50%-5px)]
                    after:right-2
                    md:text-[18px]
            " href="/company">会社案内</a></li>
        <li><a class="text-[24px] font-bold hover:bg-main/10 leading-none py-1.75 pl-1.5 pr-5 inline-block border-b border-[#ccc] hover:border-main
            relative
            after:content-['.']
                    after:w-0
                    after:h-0
                    after:overflow-hidden
                    after:block
                    after:absolute
                    after:border
                    after:border-t-[5px]
                    after:border-r-[0]
                    after:border-b-[5px]
                    after:border-l-[5px]
                    after:border-t-transparent
                    after:border-r-transparent
                    after:border-b-transparent
                    after:border-l-main
                    after:top-[calc(50%-5px)]
                    after:right-2
                    md:text-[18px]
            " href="/contact">お問い合わせ</a></li>
    </ul>



    <p class="mt-10"><a class="mx-auto block bg-main w-10 h-10 p-2.25 rounded-3xl hover:bg-main/80" href="https://www.instagram.com/birthstory.jp/" target="_blank"><img src="/images/instagram-logo.svg" alt="インスタグラム"></a></p>
</main>
@endsection

@section('javascript')@endsection
