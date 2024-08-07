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

    <section class="mt-[50px] md:mt-[25px]">
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
                        <dd class="!h-[1.4em] !leading-[1.4em] font-bold">@{{tbl_patient.mst_maternity.name}}</dd>
                    </div>
                    <div class="item">
                        <dt>ママのお名前</dt>
                        <dd>@{{tbl_patient.name}}</dd>
                    </div>
                    <div class="item">
                        <dt>ローマ字表記</dt>
                        <dd>@{{tbl_patient.roman_alphabet}}</dd>
                    </div>
                </dl>
            </div>

            <div class="outer">
                <h4><i class="fa-solid fa-pencil"></i>ベビーの情報</h4>
                <dl class="box">
                    <div class="item">
                        <dt>お名前</dt>
                        <dd>
                            <template v-if="tbl_patient.baby_name">@{{ tbl_patient.baby_name }}</template>
                            <template v-else>--</template>
                        </dd>
                    </div>
                    <div class="item">
                        <dt>ローマ字表記</dt>
                        <dd>
                            <template v-if="tbl_patient.baby_roman_alphabet">@{{ tbl_patient.baby_roman_alphabet }}</template>
                            <template v-else>--</template>
                        </dd>
                    </div>
                    <div class="item">
                        <dt>生まれた日</dt>
                        <dd>@{{tbl_patient.birth_day}}</dd>
                    </div>
                    <div class="item">
                        <dt>生まれた時刻</dt>
                        <dd>@{{tbl_patient.birth_time}}</dd>
                    </div>
                    <div class="item">
                        <dt>体重</dt>
                        <dd>@{{tbl_patient.weight}}<span class="unit">g</span></dd>
                    </div>
                    <div class="item">
                        <dt>身長</dt>
                        <dd>@{{tbl_patient.height}}<span class="unit">cm</span></dd>
                    </div>
                    <div class="item">
                        <dt>性別</dt>


                        <dd>@{{ sex_types[tbl_patient.sex] }} / 第@{{ tbl_patient.what_number }}子</dd>
                    </div>
                </dl>
            </div>

            <div class="outer">
                <h4><i class="fa-solid fa-pencil"></i>確認事項</h4>
                <dl class="box">
                    <div class="item">
                        <dt>1ヶ月健診日</dt>
                        <dd>@{{ tbl_patient.health_check_date }}</dd>
                    </div>
                    <div class="item">
                        <dt>備考</dt>
                        <dd>
                            <template v-if="tbl_patient.message">@{{ tbl_patient.message }}</template>
                            <template v-else>--</template>
                        </dd>
                    </div>
                    <div class="item pt-[10px]">
                        <dd>
                            <div class="text-center text-[12px] font-bold">ベビーの写真を色補正してインスタグラムに<br />
                                掲載することがあります。</div>
                            <div class="text-center mt-[5px]" v-if="tbl_patient.is_use_instagram==1"><i class="text-green fa-regular fa-circle mr-[3px]"></i>許可する</div>
                            <div class="text-center mt-[5px]" v-if="tbl_patient.is_use_instagram==2"><i class="text-red fa-solid fa-xmark mr-[3px]"></i>許可しない</div>

                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <section class="mt-[50px] md:mt-[25px]">
        <h3 class="bg-main text-white font-bold py-[15px] text-[18px] pl-[20px] flex items-center"><i class="fa-solid fa-pencil mr-[8px] md:mr-[5px]"></i>お写真を登録</h3>
        <div class="mx-[20px] py-[15px]
    [&_h4]:text-brown
    [&_h4]:text-[18px]
    [&_h4]:font-bold
    [&_h4>i]:mr-[8px] md:[&_h4>i]:mr-[5px]
    [&_.box_img]:mx-auto
    ">
            <div class="space-y-[25px]">
                <div class="box">
                    <h4 class="mb-[10px]"><i class="fa-solid fa-pencil"></i>エコー写真</h4>
                    <div class="flex justify-between flex-wrap">
                        <template v-for="(medium,medium_key) in tbl_patient.tbl_patient_mediums">
                            <div v-if="medium.type=='echo'" class="w-[48.5%]">
                                        <img :src="medium.src" alt="" />
                            </div>
                        </template>
                    </div>
                </div>

                <div class="box">
                    <h4 class="mb-[10px]"><i class="fa-solid fa-pencil"></i>ネームカード</h4>
                    <div class="flex justify-between flex-wrap">
                        <template v-for="(medium,medium_key) in tbl_patient.tbl_patient_mediums">
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
                        <template v-for="(medium,medium_key) in tbl_patient.tbl_patient_mediums">
                            <div v-if="medium.type=='pregnancy'" class="w-[48.5%] mb-[10px] last:mb-[0px]">
                                <img :src="medium.src" alt="" />
                            </div>
                        </template>
                    </div>
                </div>

                <div class="box">
                    <h4 class="mb-[10px]"><i class="fa-solid fa-pencil"></i>ご自由にお好きなシーン</h4>
                    <div class="flex justify-between flex-wrap [&>div:nth-last-child(2)]:mb-[0px]">
                        <template v-for="(medium,medium_key) in tbl_patient.tbl_patient_mediums">
                            <div v-if="medium.type=='free'" class="w-[48.5%] mb-[10px] last:mb-[0px]">
                                <img :src="medium.src" alt="" />
                            </div>
                        </template>
                    </div>
                </div>

                <div class="box">
                    <h4><i class="fa-solid fa-pencil"></i>フォトアートにしたい写真</h4>
                    <p class="text-red font-bold text-[14px] leading-none mb-[10px]">※ この中から1枚選んで「ふぉとあーと」にいたします</p>
                    <div class="flex justify-between flex-wrap [&>div:nth-last-child(2)]:mb-[0px]">
                        <template v-for="(medium,medium_key) in tbl_patient.tbl_patient_mediums">
                            <div v-if="medium.type=='photoart'" class="w-[48.5%] mb-[10px] last:mb-[0px]">
                                <img :src="medium.src" alt="" />
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-[50px] md:mt-[25px]">
        <h3 class="bg-main text-white font-bold py-[15px] text-[18px] pl-[20px] flex items-center"><i class="fa-solid fa-pencil mr-[8px] md:mr-[5px]"></i>産声・動画の登録</h3>

        <div class="mx-[20px] py-[15px]">
            <div class="box">
                <div class="flex justify-between flex-wrap
                [&_.nothing]:block
                [&_.item+.nothing]:hidden
                ">
                    <template v-for="(medium,medium_key) in tbl_patient.tbl_patient_mediums">
                        <div v-if="medium.type=='first_cry'" class="item w-[48.5%]">
                            <div class="text-[14px] font-bold text-center mb-[3px]">入れたい産声</div>
                            <video class="aspect-video" controls>
                                <source :src="medium.src">
                                <p>動画を再生するには、videoタグをサポートしたブラウザが必要です。</p>
                            </video>
                        </div>
                    </template>
                    <div class="nothing w-[48.5%]">
                        <div class="text-[14px] font-bold text-center mb-[3px]">入れたい産声</div>
                        <div class="text-center mt-[3px] py-[2px] border font-bold border-dashed border-slate !text-slate text-[12px] py-[40px] bg-slate-50">未保存</div>
                    </div>

                    <template v-for="(medium,medium_key) in tbl_patient.tbl_patient_mediums">
                        <div v-if="medium.type=='movie'" class="item w-[48.5%]">
                            <div class="text-[14px] font-bold text-center mb-[3px]">動画(横アングル)</div>
                            <video class="aspect-video" controls>
                                <source :src="medium.src">
                                <p>動画を再生するには、videoタグをサポートしたブラウザが必要です。</p>
                            </video>
                        </div>
                    </template>
                    <div class="nothing w-[48.5%]">
                        <div class="text-[14px] font-bold text-center mb-[3px]">動画(横アングル)</div>
                        <div class="text-center mt-[3px] py-[2px] border font-bold border-dashed border-slate !text-slate text-[12px] py-[40px] bg-slate-50">未保存</div>
                    </div>
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
                sex_types:{!! json_encode(App\Models\TblPatient::$sex_types,JSON_UNESCAPED_UNICODE )!!},
                type_counts:{!! json_encode(App\Models\TblPatientMedium::$type_counts,JSON_UNESCAPED_UNICODE )!!},
                tbl_patient:{
                    tbl_patient_mediums:[]
                },
            }
        },
        beforeMount:async function(){
            this.tbl_patient = mergeDeeply(this.tbl_patient,{!! json_encode($tbl_patient,JSON_UNESCAPED_UNICODE )!!},{concatArray: true});
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
