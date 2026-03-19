@extends('layout')
@section('meta')@endsection
@section('contents')
<main id="main" class="w-[1200px] mx-auto md:w-full">
    <div class="w-[800px] mx-auto md:w-full">

        <img class="mt-[30px] w-[90%] mx-auto" src="/images/howto-1.png" alt="">

        <p class="h-[15px] my-[20px] relative
                    after:content-['.']
                    after:w-0
                    after:h-0
                    after:overflow-hidden
                    after:block
                    after:border
                    after:absolute
                    after:border-t-[15px]
                    after:border-r-[15px]
                    after:border-b-[0]
                    after:border-l-[15px]
                    after:border-t-main
                    after:border-r-transparent
                    after:border-b-transparent
                    after:border-l-transparent
                    after:top-[0]
                    after:right-[calc(50%-7px)]
                    md:text-[16px]"></p>

        <img class="w-[90%] mx-auto" src="/images/howto-2.png" alt="">

        <p class="mt-[50px] md:mt-[30px] w-[340px] md:w-[240px] mx-auto text-center"><a class="relative block bg-main text-white font-bold py-[20px] md:py-[15px] rounded-sm text-[22px] md:text-[16px]" href="/production">評価する<i class="fa-solid fa-angle-right absolute top-[26px] md:top-[18px] right-[15px]"></i></a></p>

        <div class="mt-[50px] md:mt-[30px] text-center"><span class="w-[80%] px-[20px] md:px-[17px] py-[17px] md:py-[12px] border-2 border-green bg-white text-green font-bold text-[20px] md:text-[16px] inline-block leading-none">ご協力ありがとうございました</span></div>







    </div>
</main>
@endsection

@section('javascript')@endsection
