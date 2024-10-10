
@extends('layout')
@section('meta')@endsection
@section('contents')
<main id="main" class="w-[800px] mx-auto md:w-full
[&_.error]:font-bold
[&_.error]:text-[12px]
[&_.error]:text-red
[&_.error]:leading-none
[&_.error]:mt-[5px]
">
    <div v-if="is_loading" class="fixed h-full w-full top-[0] left-[0] bg-amber-50/70 z-50 flex flex-col items-center justify-center pb-[100px]">
        <div class="flower-loader !ml-[-8px] !mt-[-8px]"></div>
        <p class="mt-[35px] text-center font-bold">送信中です。<br />しばらくお待ちください。</p>
    </div>

    @if($tbl_patient->reviewed_at)
        <div class="mt-[50px] md:mt-[30px] text-center"><span class="w-[80%] px-[20px] md:px-[17px] py-[17px] md:py-[12px] border-2 border-green bg-white text-green font-bold text-[20px] md:text-[16px] inline-block leading-none">ご協力ありがとうございます</span></div>
        <p class="mt-[20px] text-center"><a class="underline text-[14px] text-slate-600" href="{{route('guide',$tbl_patient)}}">トップページへ</a></p>
    @endif

    @if(session('flash_message'))
        <div class="mt-[50px] md:mt-[30px] text-center"><span class="w-[80%] px-[20px] md:px-[17px] py-[17px] md:py-[12px] border-2 border-green bg-white text-green font-bold text-[20px] md:text-[16px] inline-block leading-none">{{ session('flash_message') }}</span></div>
    @endif


    @if($tbl_patient->submitted_at)
        @if(!$tbl_patient->reviewed_at)
            <section class="border border-main rounded mx-[15px] bg-main/5 py-[20px] px-[15px] mt-[30px]">
                <h2 class="text-center leading-none text-[15px] font-bold text-brown">バースストーリーから産院アンケートのお願い</h2>

                @if($tbl_patient->review_point)
                    <div class="text-red text-[12px] font-bold text-center mt-[5px]">(Amazonギフトカード<span class="text-red underline">{{$tbl_patient->review_point}}ポイント</span>進呈)</div>
                @endif


                <p class="text-[14px] mt-[15px]">お客様の声は、産院さまにとって非常に重要であり、今後のサービス向上の参考にさせていただいております。</p>
                <p class="text-[14px] mt-[10px]">産院さまご利用時の<span class="underline">良かった点や改善点</span>など、お客様の貴重なご意見をお聞かせください。</p>
            </section>
        @endif
    @endif

    <div v-if="Object.keys(errors).length" class="mt-[30px] flex justify-center">
        <p class="text-[14px] md:text-[12px] inline-block font-bold bg-red shadow text-white px-[15px] py-[10px] md:px-[10px] md:py-[5px]">※ エラーがあります。ご確認のうえ再送信してください</p>
    </div>

{{--    <div class="mt-[60px] md:mt-[30px]">--}}
{{--        <section class="bg-[#866827]/10 p-[20px] md:p-[10px]">--}}
{{--            <dl class="space-y-[20px] md:space-y-[5px]--}}

{{--            [&>div]:bg-white--}}
{{--            [&>div]:flex--}}
{{--            [&>div]:items-center--}}
{{--            [&>div]:py-[15px] md:[&>div]:py-[7px]--}}
{{--            [&>div]:px-[15px] md:[&>div]:px-[7px]--}}

{{--            [&>div_dt]:mr-[13px] md:[&>div_dt]:mr-[7px]--}}
{{--            [&>div_dt]:bg-main--}}
{{--            [&>div_dt]:text-white--}}
{{--            [&>div_dt]:leading-none--}}
{{--            [&>div_dt]:font-bold--}}
{{--            [&>div_dt]:py-[7px] md:[&>div_dt]:py-[5px]--}}
{{--            [&>div_dt]:px-[13px] md:[&>div_dt]:px-[8px]--}}
{{--            [&>div_dt]:text-[16px] md:[&>div_dt]:text-[14px]--}}

{{--            [&>div_dd]:text-[16px] md:[&>div_dd]:text-[14px]--}}

{{--            [&>div_dd]:font-bold--}}
{{--            [&>div_dd]:text-slate-700--}}
{{--            [&>div_dd]:leading-none--}}

{{--            ">--}}
{{--                <div>--}}
{{--                    <dt>1</dt>--}}
{{--                    <dd>星の評価付け</dd>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <dt>2</dt>--}}
{{--                    <dd>テキストでのレビュー</dd>--}}
{{--                </div>--}}
{{--                @if($tbl_patient->review_point)--}}
{{--                <div>--}}
{{--                    <dt>3</dt>--}}
{{--                    <dd>進呈先の情報を入力</dd>--}}
{{--                </div>--}}
{{--                @endif--}}
{{--            </dl>--}}
{{--        </section>--}}
{{--    </div>--}}


{{--    <p class="h-[15px] my-[20px] relative--}}
{{--                after:content-['.']--}}
{{--                after:w-0--}}
{{--                after:h-0--}}
{{--                after:overflow-hidden--}}
{{--                after:block--}}
{{--                after:border--}}
{{--                after:absolute--}}
{{--                after:border-t-[15px]--}}
{{--                after:border-r-[15px]--}}
{{--                after:border-b-[0]--}}
{{--                after:border-l-[15px]--}}
{{--                after:border-t-main--}}
{{--                after:border-r-transparent--}}
{{--                after:border-b-transparent--}}
{{--                after:border-l-transparent--}}
{{--                after:top-[0]--}}
{{--                after:right-[calc(50%-7px)]--}}
{{--                md:text-[16px]"></p>--}}



    <div class="mt-[30px]">
        <section class="bg-[#866827]/10 p-[20px] md:p-[10px]">
            <div class="space-y-[20px] md:space-y-[10px]">


                <section v-for="(mst_maternity_question,mst_maternity_question_key) in mst_maternity_questions"
                    class="bg-white flex flex-col items-center py-[25px]  px-[30px]">
                    <h3 class="flex justify-center items-start">
                        <span class="mr-[13px] md:mr-[7px] bg-main text-white leading-none font-bold py-[7px] md:py-[5px] px-[13px] md:px-[8px] text-[16px] md:text-[14px] -mt-[1px]">@{{mst_maternity_question_key+1}}</span>
                        <span class="font-bold">@{{mst_maternity_question.question}}</span>
                    </h3>

                    <template v-for="(tbl_patient_review,tbl_patient_review_key) in tbl_patient.tbl_patient_reviews">
                        <template v-if="tbl_patient_review.mst_maternity_question_id==mst_maternity_question.mst_maternity_question_id">
                            <ul v-if="!is_answer" class="mt-[12px] flex justify-center text-[32px] space-x-[7px] [&_i]:text-slate-200">
                                <li v-for="n in 5" :key="n" class="leading-none" @click.prevent="tbl_patient_review.score=n"><i class="fa-solid fa-star" :class="{'!text-[#FBBC04]':tbl_patient_review.score>=n}"></i></li>
                            </ul>
                            <ul v-else class="mt-[12px] flex justify-center text-[32px] space-x-[7px] [&_i]:text-slate-200">
                                <li v-for="n in 5" :key="n" class="leading-none"><i class="fa-solid fa-star" :class="{'!text-[#FBBC04]':tbl_patient_review.score>=n}"></i></li>
                            </ul>
                            <p class="text-gray-400 mt-[7px] text-[18px] ">
                                <template v-if="score_types[tbl_patient_review.score]">@{{score_types[tbl_patient_review.score]}}</template>
                                <template v-else="score_types[tbl_patient_review.score]">星をタップで選択</template>
                            </p>
                            <p class="error" v-if="errors['tbl_patient.tbl_patient_reviews.'+tbl_patient_review_key+'.score']">@{{ errors['tbl_patient.tbl_patient_reviews.'+tbl_patient_review_key+'.score'][0] }}</p>

                        </template>
                    </template>


                </section>

                <section class="bg-white  py-[25px] px-[25px]">
                    <div class="flex flex-col items-center">
                        <textarea class="w-[100%]" rows="5" placeholder="記入してください" v-model="tbl_patient.review"></textarea>
                    </div>
                    <p class="mt-[5px] text-[12px] font-bold text-slate-500 leading-none">できるだけ詳しく記載いただくと嬉しいです。</p>
                    <p class="error" v-if="errors['tbl_patient.review']">@{{ errors['tbl_patient.review'][0] }}</p>
                </section>

                @if($tbl_patient->review_point)
                <section class="bg-white flex flex-col items-center py-[25px] px-[30px]">
                    <p class="text-[14px]">Amazonギフトを届けるメールアドレスもしくは携帯番号を入力してください</p>
                    <input class="h-[34px] mt-[10px] w-[240px] text-center" type="text" value="" placeholder="メールアドレス / 携帯番号" v-model="tbl_patient.amazon_id" />
                    <p class="error" v-if="errors['tbl_patient.amazon_id']">@{{ errors['tbl_patient.amazon_id'][0] }}</p>
                </section>
                @endif
            </div>
        </section>
    </div>

    @if(!$tbl_patient->reviewed_at)
    <div class="mt-[50px] md:mt-[30px] w-[340px] md:w-[240px] mx-auto text-center">
        <p class="relative block bg-main text-white font-bold py-[20px] md:py-[15px] rounded-sm text-[22px] md:text-[16px]"
            @click.prevent="submit">提出<i class="fa-solid fa-angle-right absolute top-[26px] md:top-[18px] right-[15px]"></i></p></div>
    @else
        <p class="mt-[20px] text-center"><a class="underline text-[14px] text-slate-600" href="{{route('guide',$tbl_patient)}}">トップページへ</a></p>
    @endif

</main>
<script>
    Vue.createApp({
        name: 'main',
        data(){
            return {
                is_answer:@if($tbl_patient->reviewed_at) true @else false @endif,
                is_loading:false,
                errors:[],
                mst_maternity_questions:{!! json_encode($mst_maternity_questions,JSON_UNESCAPED_UNICODE )!!},
                score_types:{!! json_encode(App\Models\MstMaternityQuestion::$score_types,JSON_UNESCAPED_UNICODE )!!},
                tbl_patient:{
                    tbl_patient_reviews:{

                    },
                },
            }
        },
        beforeMount:async function(){
            this.tbl_patient = {!! json_encode($inputs,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT )!!};
            this.errors = {!! json_encode($errors->toArray(),JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT )!!};
        },
        methods:{
            async submit(){
                let t = this;
                this.errors={};
                this.is_loading=true;
                await axios.post('/api/v1/g/{{$tbl_patient->code}}/review',
                    {
                        tbl_patient:t.tbl_patient,
                    }
                ).then((response) => {//リクエストの成功
                    location.href='/{{$tbl_patient->code}}';
                }).catch((error) => {//リクエストの失敗
                    window.scroll({
                        top: 0,
                        behavior: "smooth",
                    });
                    t.errors = error.response.data.errors;
                    t.errors = error_message_translate(t.errors);

                }).finally(() => {
                    this.is_loading=false;
                });
            }
        },
        watch:{
        },
    }).mount('#main');
</script>



@endsection

@section('javascript')@endsection
