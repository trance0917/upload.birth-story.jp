@extends('layout')
@section('meta')@endsection
@section('contents')
<main id="main" class="w-[1200px] mx-auto md:w-full">
    <div class="w-[800px] mx-auto md:w-full">
        <h2 class="mt-[30px] text-center leading-none text-[15px] font-bold text-brown">バースストーリーから産院アンケートのお願い</h2>

        <p class="text-[14px] mt-[15px] w-[80%] mx-auto">アンケートにご協力いただきまして、誠にありがとうございます。<br />
            ★の評価とご感想やご意見を150文字以上いただけますでしょうか。</p>


        <div class="mt-[60px] md:mt-[30px]">
            <section class="bg-[#866827]/10 p-[20px] md:p-[10px]">
                <dl class="space-y-[20px] md:space-y-[5px]

                [&>div]:bg-white
                [&>div]:flex
                [&>div]:items-center
                [&>div]:py-[15px] md:[&>div]:py-[7px]
                [&>div]:px-[15px] md:[&>div]:px-[7px]

                [&>div_dt]:mr-[13px] md:[&>div_dt]:mr-[7px]
                [&>div_dt]:bg-main
                [&>div_dt]:text-white
                [&>div_dt]:leading-none
                [&>div_dt]:font-bold
                [&>div_dt]:py-[7px] md:[&>div_dt]:py-[5px]
                [&>div_dt]:px-[13px] md:[&>div_dt]:px-[8px]
                [&>div_dt]:text-[16px] md:[&>div_dt]:text-[14px]

                [&>div_dd]:text-[16px] md:[&>div_dd]:text-[14px]

                [&>div_dd]:font-bold
                [&>div_dd]:text-slate-700
                [&>div_dd]:leading-none

                ">
                    <div>
                        <dt>1</dt>
                        <dd>アンケート</dd>
                    </div>
                    <div>
                        <dt>2</dt>
                        <dd>進呈先のPaypay IDを入力</dd>
                    </div>
                </dl>
            </section>
        </div>


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



        <div>
            <section class="bg-[#866827]/10 p-[20px] md:p-[10px]">
                <div class="space-y-[20px] md:space-y-[10px]">
                    @foreach(['受付の対応はいかがでしたか？','健診時の看護師・助産師の対応はいかがでしたか？','医師の対応はいかがでしたか？','ご出産時の看護師・助産師の対応はいかがでしたか？','入院時の看護師・助産師の対応はいかがでしたか？','お食事の内容はいかがでしたか？'] AS $key=>$val)
                    <section class="bg-white flex flex-col items-center py-[25px]  px-[30px]">
                        <h3 class="flex justify-center items-start">
                            <span class="mr-[13px] md:mr-[7px] bg-main text-white leading-none font-bold py-[7px] md:py-[5px] px-[13px] md:px-[8px] text-[16px] md:text-[14px] -mt-[1px]">{{$key+1}}</span>
                            <span class="font-bold">{{$val}}</span>
                        </h3>
                        <ul class="mt-[12px] flex justify-center text-[32px] space-x-[7px]">
                            <li class="leading-none" @click.prevent=""><i class="fa-solid fa-star text-[#FBBC04]"></i></li>
                            <li class="leading-none"><i class="fa-solid fa-star text-[#FBBC04]"></i></li>
                            <li class="leading-none"><i class="fa-solid fa-star text-[#FBBC04]"></i></li>
                            <li class="leading-none"><i class="fa-solid fa-star text-slate-200"></i></li>
                            <li class="leading-none"><i class="fa-solid fa-star text-slate-200"></i></li>
                        </ul>
                        <p class="text-gray-400 mt-[7px] ">星をタップで選択</p>
                    </section>
                    @endforeach
                        <section class="bg-white flex flex-col items-center py-[25px] px-[25px]">
                            <textarea class="w-[100%]" name="" id="" rows="5" placeholder="記入してください"></textarea>
                            <div class="text-center text-slate-500 mt-[5px]">文字数：0 / 150</div>
                        </section>



                    <section class="bg-white flex flex-col items-center py-[25px]  px-[30px]">
                        <p class="text-[14px]">進呈先のPaypayIDもしくは登録電話番号を登録ください。</p>
                        <input class="h-[34px] mt-[10px]" type="text" value="" placeholder="PaypayID / 電話番号" />
                    </section>

                </div>
            </section>
        </div>

        <p class="mt-[50px] md:mt-[30px] w-[340px] md:w-[240px] mx-auto text-center"><a class="relative block bg-main text-white font-bold py-[20px] md:py-[15px] rounded-sm text-[22px] md:text-[16px]" href="/production">提出<i class="fa-solid fa-angle-right absolute top-[26px] md:top-[18px] right-[15px]"></i></a></p>

    </div>
</main>
@endsection

@section('javascript')@endsection
