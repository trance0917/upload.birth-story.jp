@extends('layout')
@section('meta')@endsection
@section('contents')
<form id="main" class="w-[1200px] mx-auto md:w-full" method="post" action="{{route('story-complete',$tbl_patient)}}">
    @csrf
    <div class="mt-[40px] md:mt-[20px] flex justify-center">
        <div class="inline-block">
            <div class="flex justify-center items-center bg-sub-light px-[40px] md:px-[20px] py-[30px] md:py-[15px]">
                <p class="font-bold text-[16px] md:text-[12px]">登録内容をご確認のうえ、<span class="underline font-bold">下部のボタン</span>から<br />手続きを完了させてください。</p>
            </div>
        </div>
    </div>

    <section class="mx-auto w-[800px] md:w-auto mt-[50px] md:mt-[25px]">
        <h3 class="bg-main text-white font-bold py-[15px] text-[18px] pl-[20px] flex items-center"><i class="fa-solid fa-pencil mr-[8px] md:mr-[5px]"></i>ご出産情報を入力</h3>
        <div class="
    space-y-[20px]
    mx-[20px] py-[15px]
    [&_h4]:text-brown
    [&_h4]:text-[18px]
    [&_h4]:font-bold
    [&_h4>i]:mr-[8px] md:[&_h4>i]:mr-[5px]

    [&_.box]:mt-[10px]
    [&_.box]:space-y-[10px]
    [&_.box>.item]:flex
    [&_.box>.item>dt]:w-[120px]
    [&_.box>.item]:text-[14px]

    [&_.box>.item>dd_.complement]:text-[12px]
    [&_.box>.item>dd_.complement]:text-[#666]
    [&_.box>.item>dd_.complement]:font-bold
    [&_.box>.item>dd_.complement]:leading-none
    [&_.box>.item>dd_.unit]:ml-[3px]
    [&_.box>.item>dd]:flex-grow
">
            <div class="outer">
                <h4><i class="fa-solid fa-pencil"></i>ママの情報</h4>
                <dl class="box">
                    <div class="item">
                        <dt class="!h-[1.4em] !leading-[1.4em]">産院名</dt>
                        <dd class="!h-[1.4em] !leading-[1.4em] font-bold">{{$tbl_patient->mst_maternity->name??'--'}}</dd>
                    </div>
                    <div class="item">
                        <dt>ママのお名前</dt>
                        <dd>山田 花子</dd>
                    </div>
                    <div class="item">
                        <dt>ローマ字表記</dt>
                        <dd>YAMADA HANAKO</dd>
                    </div>
{{--                    <div class="item">--}}
{{--                        <dt>電話番号</dt>--}}
{{--                        <dd>08012345678</dd>--}}
{{--                    </div><div class="item">--}}
{{--                        <dt>メールアドレス</dt>--}}
{{--                        <dd>info@birth-story.jp</dd>--}}
{{--                    </div>--}}
                </dl>
            </div>

            <div class="outer">
                <h4><i class="fa-solid fa-pencil"></i>ベビーの情報</h4>
                <dl class="box">
                    <div class="item">
                        <dt>お名前</dt>
                        <dd>花子</dd>
                    </div>
                    <div class="item">
                        <dt>ローマ字表記</dt>
                        <dd>HANAKO</dd>
                    </div>
                    <div class="item">
                        <dt>生まれた日</dt>
                        <dd>2023-10-23</dd>
                    </div>
                    <div class="item">
                        <dt>生まれた時刻</dt>
                        <dd>12:20</dd>
                    </div>
                    <div class="item">
                        <dt>体重</dt>
                        <dd>3000<span class="unit">g</span></dd>
                    </div>
                    <div class="item">
                        <dt>身長</dt>
                        <dd>56<span class="unit">cm</span></dd>
                    </div>
                    <div class="item">
                        <dt>性別</dt>
                        <dd>男の子 / 第3子</dd>
                    </div>
                </dl>
            </div>

            <div class="outer">
                <h4><i class="fa-solid fa-pencil"></i>確認事項</h4>
                <dl class="box">
                    <div class="item">
                        <dt>1ヶ月健診日</dt>
                        <dd>2023-12-25</dd>
                    </div>
                    <div class="item">
                        <dt>備考</dt>
                        <dd>--</dd>
                    </div>
                    <div class="item pt-[10px]">
                        <dd>
                            <div class="text-center text-[12px] font-bold">ベビー写真を色補正してインスタグラムに<br />
                                掲載することがあります。</div>
                            <div class="text-center mt-[5px]"><i class="text-red fa-solid fa-xmark mr-[3px]"></i>許可しない</div>
                            <div class="text-center mt-[5px]"><i class="text-green fa-regular fa-circle mr-[3px]"></i>許可する</div>

                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <section class="mx-auto w-[800px] md:w-auto mt-[50px] md:mt-[25px]">
        <h3 class="bg-main text-white font-bold py-[15px] text-[18px] pl-[20px] flex items-center"><i class="fa-solid fa-pencil mr-[8px] md:mr-[5px]"></i>お写真を登録</h3>
        <div class="mx-[20px] py-[15px]
    [&_h4]:text-brown
    [&_h4]:text-[18px]
    [&_h4]:font-bold
    [&_h4>i]:mr-[8px] md:[&_h4>i]:mr-[5px]
    ">
            <div class="space-y-[25px]">
                <div class="box">
                    <h4 class="mb-[10px]"><i class="fa-solid fa-pencil"></i>エコー写真</h4>
                    <div class="flex justify-between flex-wrap">
                        <template v-for="(medium,medium_key) in tbl_.mediums">
                            <div v-if="medium.type=='echo'" class="w-[48.5%]">
                                        <img :src="medium.src" alt="" />
                            </div>
                        </template>
                    </div>
                </div>

                <div class="box">
                    <h4 class="mb-[10px]"><i class="fa-solid fa-pencil"></i>ネームカード</h4>
                    <div class="flex justify-between flex-wrap">
                        <template v-for="(medium,medium_key) in tbl_.mediums">
                            <div v-if="medium.type=='namecard'" class="w-[48.5%]">
                                <img :src="medium.src" alt="" />
                            </div>
                        </template>
                    </div>
                </div>

                <div class="box">
                    <h4><i class="fa-solid fa-pencil"></i>出産前・出産中・出産直後</h4>
                    <p class="text-red font-bold text-[14px] leading-none mb-[10px]">※ 表示順に作成されます</p>
                    <div class="flex justify-between flex-wrap [&>div:nth-last-child(2)]:mb-[0px]">
                        <template v-for="(medium,medium_key) in tbl_.mediums">
                            <div v-if="medium.type=='pregnancy'" class="w-[48.5%] mb-[10px] last:mb-[0px]">
                                <img :src="medium.src" alt="" />
                            </div>
                        </template>
                    </div>
                </div>

                <div class="box">
                    <h4 class="mb-[10px]"><i class="fa-solid fa-pencil"></i>ご自由にお好きなシーン</h4>
                    <div class="flex justify-between flex-wrap [&>div:nth-last-child(2)]:mb-[0px]">
                        <template v-for="(medium,medium_key) in tbl_.mediums">
                            <div v-if="medium.type=='free'" class="w-[48.5%] mb-[10px] last:mb-[0px]">
                                <img :src="medium.src" alt="" />
                            </div>
                        </template>
                    </div>
                </div>

                <div class="box">
                    <h4><i class="fa-solid fa-pencil"></i>フォトアートにしたい写真を</h4>
                    <p class="text-red font-bold text-[14px] leading-none mb-[10px]">※ この中から1枚選んで「ふぉとあーと」にいたします</p>
                    <div class="flex justify-between flex-wrap [&>div:nth-last-child(2)]:mb-[0px]">
                        <template v-for="(medium,medium_key) in tbl_.mediums">
                            <div v-if="medium.type=='photoart'" class="w-[48.5%] mb-[10px] last:mb-[0px]">
                                <img :src="medium.src" alt="" />
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto w-[800px] md:w-auto mt-[50px] md:mt-[25px]">
        <h3 class="bg-main text-white font-bold py-[15px] text-[18px] pl-[20px] flex items-center"><i class="fa-solid fa-pencil mr-[8px] md:mr-[5px]"></i>産声・動画の登録</h3>

        <div class="mx-[20px] py-[15px]">


            <div class="box">
                <div class="flex justify-between flex-wrap">
                    <template v-for="(medium,medium_key) in tbl_.mediums">
                        <div v-if="medium.type=='first_cry' || medium.type=='movie'" class="w-[48.5%]">
                            <div v-if="medium.type=='first_cry'" class="text-[14px] font-bold text-center mb-[3px]">入れたい産声</div>
                            <div v-if="medium.type=='movie'" class="text-[14px] font-bold text-center mb-[3px]">動画(横アングル)</div>
                            <div class="">

                                <div v-if="medium.status==''" class="text-center mt-[3px] py-[15px] bg-slate-150 font-bold text-slate-500 text-[14px]">未登録</div>
                                <div v-if="medium.status=='saved'" class="text-center mt-[3px] py-[15px] bg-green-100 font-bold text-green text-[14px]">登録済</div>
                                <input :id="'medium_'+medium_key" type="file" :name="'medium_'+medium_key" accept="image/*" />
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>

    <div class="flex items-center flex-col mt-[40px] md:mt-[20px] bg-red text-[18px] md:text-[14px] py-[18px] md:py-[15px]">
        <div class="flex items-center">
            <i class="text-white fa-solid fa-circle-exclamation mr-[10px] text-[20px]"></i>
            <p class="text-white font-bold">提出完了後の変更はお受けできませんので<br />
                ご了承ください。</p></div>
{{--        <input class="em-input-check-show" type="checkbox" name="" value="1" id="asdf" /><label class="text-red mt-[7px]" for="asdf">了解しました</label>--}}
    </div>

    <p class="mt-[50px] md:mt-[30px] w-[340px] md:w-[240px] mx-auto text-center">
        <button type="submit" name="action" value="send"
                class="relative w-full block bg-green text-white font-bold py-[20px] md:py-[15px] rounded-sm text-[22px] md:text-[16px]"
        >提出を完了する<i class="fa-solid fa-angle-right absolute top-[26px] md:top-[18px] right-[15px]"></i></button>
    </p>
    <p class="mt-[20px] md:mt-[15px] w-[140px] md:w-[120px] mx-auto text-center">
        <button type="submit" name="action" value="return"
                class="w-full block bg-slate-400 text-white font-bold py-[8px] md:py-[8px] rounded-sm text-[16px] md:text-[14px]">戻る</button></p>

</form>

<script>
    Vue.createApp({
        name: 'main',
        data(){
            return {
                errors:[],

                tbl_:{
                    mediums:[
                        {
                            type:'echo',
                            status:'saved',
                            src:'/storage/test/echo_1.jpg',
                        },
                        {
                            type:'echo',
                            status:'saved',
                            src:'/storage/test/echo_2.jpg',
                        },
                        {
                            type:'namecard',
                            status:'saved',
                            src:'/storage/test/namecard.jpg',
                        },
                        {
                            type:'pregnancy',
                            status:'saved',
                            src:'/storage/test/pregnancy_1.jpg',
                        },
                        {
                            type:'pregnancy',
                            status:'saved',
                            src:'/storage/test/pregnancy_2.jpg',
                        },
                        {
                            type:'pregnancy',
                            status:'saved',
                            src:'/storage/test/pregnancy_3.jpg',
                        },
                        {
                            type:'pregnancy',
                            status:'saved',
                            src:'/storage/test/pregnancy_4.jpg',
                        },
                        {
                            type:'pregnancy',
                            status:'saved',
                            src:'/storage/test/pregnancy_5.jpg',
                        },
                        {
                            type:'pregnancy',
                            status:'saved',
                            src:'/storage/test/pregnancy_6.jpg',
                        },
                        {type:'free',status:'saved',src:'/storage/test/free_1.jpg',},
                        {type:'free',status:'saved',src:'/storage/test/free_2.jpg',},
                        {type:'free',status:'saved',src:'/storage/test/free_3.jpg',},
                        {type:'free',status:'saved',src:'/storage/test/free_4.jpg',},
                        {type:'free',status:'saved',src:'/storage/test/free_5.jpg',},
                        {type:'free',status:'saved',src:'/storage/test/free_6.jpg',},
                        {type:'free',status:'saved',src:'/storage/test/free_7.jpg',},
                        {type:'free',status:'saved',src:'/storage/test/free_8.jpg',},

                        {
                            type:'photoart',
                            status:'saved',
                            src:'/storage/test/photoart_1.jpg',
                        },
                        {
                            type:'photoart',
                            status:'saved',
                            src:'/storage/test/photoart_2.jpg',
                        },
                        {
                            type:'photoart',
                            status:'saved',
                            src:'/storage/test/photoart_3.jpg',
                        },

                        {
                            type:'first_cry',
                            status:'',
                            src:    '/storage/test/photoarrt_3.jpg',
                        },
                        {
                            type:'movie',
                            status:'saved',
                            src:'/storage/test/photoarrt_3.jpg',
                        },
                    ]
                },
            }
        },
        created:async function(){

        },
        methods:{

        },
        watch:{

        },
    }).mount('#main');
</script>
@endsection

@section('javascript')@endsection
