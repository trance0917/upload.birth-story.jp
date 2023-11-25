@extends('layout')
@section('meta')@endsection
@section('contents')
<main id="main" class="w-[1200px] mx-auto md:w-full">
    <div class="w-[800px] mx-auto md:w-full">


        @if($tbl_patient->submitted_at)
            <div class="mt-[50px] md:mt-[30px] text-center"><span class="w-[80%] px-[20px] md:px-[17px] py-[17px] md:py-[12px] border-2 border-green bg-white text-green font-bold text-[20px] md:text-[16px] inline-block leading-none">提出が完了しました</span></div>
        @endif

        @if($tbl_patient->review > 3.5)

        <section class="border border-main rounded mx-[15px] bg-main/5 py-[20px] px-[15px] mt-[30px]">
            <h2 class="text-center leading-none text-[16px] font-bold text-brown">産院アンケート</h2>
            <div class="mt-[15px] flex justify-center"><ul class="star star-42 flex justify-center text-[32px] space-x-[10px]"><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li></ul></div>

{{--            <div class="flex justify-center"><ul class="star star-30 flex justify-center text-[32px] space-x-[10px]"><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li></ul></div>--}}
{{--            <div class="flex justify-center"><ul class="star star-31 flex justify-center text-[32px] space-x-[10px]"><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li></ul></div>--}}
{{--            <div class="flex justify-center"><ul class="star star-32 flex justify-center text-[32px] space-x-[10px]"><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li></ul></div>--}}
{{--            <div class="flex justify-center"><ul class="star star-33 flex justify-center text-[32px] space-x-[10px]"><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li></ul></div>--}}
{{--            <div class="flex justify-center"><ul class="star star-34 flex justify-center text-[32px] space-x-[10px]"><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li></ul></div>--}}
{{--            <div class="flex justify-center"><ul class="star star-35 flex justify-center text-[32px] space-x-[10px]"><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li></ul></div>--}}
{{--            <div class="flex justify-center"><ul class="star star-36 flex justify-center text-[32px] space-x-[10px]"><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li></ul></div>--}}
{{--            <div class="flex justify-center"><ul class="star star-37 flex justify-center text-[32px] space-x-[10px]"><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li></ul></div>--}}
{{--            <div class="flex justify-center"><ul class="star star-38 flex justify-center text-[32px] space-x-[10px]"><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li></ul></div>--}}
{{--            <div class="flex justify-center"><ul class="star star-39 flex justify-center text-[32px] space-x-[10px]"><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li></ul></div>--}}
{{--            <div class="flex justify-center"><ul class="star star-40 flex justify-center text-[32px] space-x-[10px]"><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li></ul></div>--}}
{{--            <div class="flex justify-center"><ul class="star star-41 flex justify-center text-[32px] space-x-[10px]"><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li></ul></div>--}}
{{--            <div class="flex justify-center"><ul class="star star-42 flex justify-center text-[32px] space-x-[10px]"><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li></ul></div>--}}
{{--            <div class="flex justify-center"><ul class="star star-43 flex justify-center text-[32px] space-x-[10px]"><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li></ul></div>--}}
{{--            <div class="flex justify-center"><ul class="star star-44 flex justify-center text-[32px] space-x-[10px]"><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li></ul></div>--}}
{{--            <div class="flex justify-center"><ul class="star star-45 flex justify-center text-[32px] space-x-[10px]"><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li></ul></div>--}}
{{--            <div class="flex justify-center"><ul class="star star-46 flex justify-center text-[32px] space-x-[10px]"><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li></ul></div>--}}
{{--            <div class="flex justify-center"><ul class="star star-47 flex justify-center text-[32px] space-x-[10px]"><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li></ul></div>--}}
{{--            <div class="flex justify-center"><ul class="star star-48 flex justify-center text-[32px] space-x-[10px]"><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li></ul></div>--}}
{{--            <div class="flex justify-center"><ul class="star star-49 flex justify-center text-[32px] space-x-[10px]"><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li></ul></div>--}}
{{--            <div class="flex justify-center"><ul class="star star-50 flex justify-center text-[32px] space-x-[10px]"><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li><li><i class="fa-solid fa-star"></i></li></ul></div>--}}

            <div class="text-slate-600 text-[20px] font-bold text-center mt-[10px]">4.2</div>

            <p class="text-[14px] mt-[15px] font-bold">高評価をありがとうございます！<br />
                この評価をそのままGoogle口コミに投稿して<br />
                いただけませんか？<br />
                星の評価のみであれば下記リンクから30秒で回答いただけます。</p>

            <p class="mt-[25px] md:mt-[15px] w-[240px] md:w-[140px] mx-auto text-center">
                <a class="relative w-full block bg-main text-white font-bold py-[10px] md:py-[7px] rounded-sm text-[20px] md:text-[14px]"
                >評価する<i class="fa-solid fa-angle-right absolute top-[16px] md:top-[11px] right-[10px]"></i></a>
            </p>
        </section>
        @endif

        @if($tbl_patient->submitted_at && !$tbl_patient->review)
        <section class="border border-main rounded mx-[15px] bg-main/5 py-[20px] px-[15px] mt-[30px]">
            <h2 class="text-center leading-none text-[15px] font-bold text-brown">バースストーリーから産院アンケートのお願い</h2>
            <div class="text-red text-[12px] font-bold text-center mt-[5px]">(Paypay<span class="text-red underline">300ポイント</span>進呈)</div>

            <p class="text-[14px] mt-[15px]">お客様の声は、産院さまにとって非常に重要であり、今後のサービス向上の参考にさせていただいております。</p>
            <p class="text-[14px] mt-[10px]">産院さまご利用時の<span class="underline">良かった点や改善点</span>など、お客様の貴重なご意見をお聞かせください。</p>

            <p class="mt-[25px] md:mt-[15px] w-[300px] md:w-[200px] mx-auto text-center">
                <a class="relative w-full block bg-main text-white font-bold py-[10px] md:py-[7px] rounded-sm text-[20px] md:text-[14px]"
                >アンケートフォームへ<i class="fa-solid fa-angle-right absolute top-[16px] md:top-[11px] right-[10px]"></i></a>
            </p>
        </section>
        @endif


        @if($tbl_patient->submitted_at)
        <p class="mt-[10px] text-center"><a class="underline text-[14px] text-slate-600" href="">提出データの確認</a></p>
        @endif

        <h1 class="mt-[50px] md:mt-[30px] text-center"><span class="px-[25px] md:px-[15px] pb-[15px] pt-[18px] bg-sub-light font-bold text-[24px] md:text-[16px] inline-block leading-none">ご出産記念DVD「バースストーリー」とは？</span></h1>


        <img class="w-[400px] md:w-[260px] mx-auto mt-[30px] md:mt-[20px]" src="/images/guide.png" alt="" />

        <p class="w-[550px] md:w-[350px] mx-auto mt-[30px] md:mt-[20px] text-[18px] md:text-[14px] font-bold">ご出産記念DVD「バースストーリー」は人生最高の思い出にしていただきたいという気持ちを込めた当院からのプレゼントです。<br />
            お写真とともにメッセージが流れてご出産の感動をいつまでも残していきます。</p>

        <div class="mt-[60px] md:mt-[30px]">
            <h2 class="text-center mb-[40px] md:mb-[20px]"><span class="inline-block font-bold text-white px-[20px] py-[5px] bg-main text-[22px] md:text-[16px]">作成の流れ</span></h2>
            <section class="bg-[#866827]/10 p-[20px] md:p-[10px]">
                <div class="space-y-[20px] md:space-y-[10px]

                [&>section]:bg-white
                [&>section]:flex
                [&>section]:items-center
                [&>section]:py-[30px] md:[&>section]:py-[15px]
                [&>section]:px-[30px] md:[&>section]:px-[15px]

                [&>section>.left]:mr-[30px] md:[&>section>.left]:mr-[15px]

                [&>section>.left>img]:w-[180px] md:[&>section>.left>img]:w-[120px]
                [&>section>.left>img]:min-w-[180px] md:[&>section>.left>img]:min-w-[120px]

                [&>section_h3]:flex
                [&>section_h3]:items-center
                [&>section_h3]:font-bold
                [&>section_h3]:text-[#555555]
                [&>section_h3]:mb-[10px] md:[&>section_h3]:mb-[5px]

                [&>section_h3]:text-[20px] md:[&>section_h3]:text-[16px]

                [&>section_h3>span]:inline-block
                [&>section_h3>span]:mr-[5px] md:[&>section_h3>span]:mr-[3px]
                [&>section_h3>span]:bg-main
                [&>section_h3>span]:text-white
                [&>section_h3>span]:leading-none
                [&>section_h3>span]:py-[7px] md:[&>section_h3>span]:py-[5px]
                [&>section_h3>span]:px-[13px] md:[&>section_h3>span]:px-[8px]
                [&>section_h3>span]:text-[16px] md:[&>section_h3>span]:text-[12px]

                [&>section_p]:text-[20px] md:[&>section_p]:text-[16px]

                ">
                    <section>
                        <div class="left"><img src="/images/guide-step-1.png" alt=""></div>
                        <div>
                            <h3><span>Step1</span>ご出産情報を入力</h3>
                            <p>お客様のご出産に関する情報を入力してください。</p>
                        </div>
                    </section>
                    <section>
                        <div class="left"><img src="/images/guide-step-2.png" alt=""></div>
                        <div>
                            <h3><span>Step2</span>お写真を登録</h3>
                            <p>スマホでお写真を17枚撮影し、作成フォームに登録してください。</p>
                        </div>
                    </section>
                    <section>
                        <div class="left"><img src="/images/guide-step-3.png" alt=""></div>
                        <div>
                            <h3><span>Step3</span>動画・産声の登録</h3>
                            <p>産声や動画を映像に差し込みたい方は登録してください。</p>
                        </div>
                    </section>
                </div>

                <div class="mt-[20px] md:mt-[10px] flex justify-center">
                    <div class="inline-block">
                        <div class="flex justify-center items-center bg-sub-light px-[40px] md:px-[20px] py-[30px] md:py-[15px]">
                            <img class="w-[52px] md:w-[26px] min-w-[52px] md:min-w-[26px] mr-[20px] md:mr-[10px]" src="/images/icon-finger.png" alt="">
                            <p class="text-red font-bold text-[16px] md:text-[12px]">途中での保存が可能です。<br />空き時間に少しづつ進めてください。</p>
                        </div>
                    </div>
                </div>

            </section>
        </div>

        <div class="mt-[50px] md:mt-[30px] bg-red font-bold text-[18px] md:text-[14px] text-white text-center py-[13px] md:py-[10px]">
            <span class="text-[16px] md:text-[14px] text-white">[お願い]</span><i class="fa-solid fa-circle-exclamation mx-[5px]"></i>出産から10日以内にお送りください
        </div>

        <p class="mt-[50px] md:mt-[30px] w-[340px] md:w-[240px] mx-auto text-center"><a class="relative block bg-main text-white font-bold py-[20px] md:py-[15px] rounded-sm text-[22px] md:text-[16px]" href="{{route('story-index',$tbl_patient)}}">作成を開始する<i class="fa-solid fa-angle-right absolute top-[26px] md:top-[18px] right-[15px]"></i></a></p>




    </div>
</main>
@endsection

@section('javascript')@endsection
