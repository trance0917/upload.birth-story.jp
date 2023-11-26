@extends('layout')
@section('meta')@endsection
@section('contents')
<main id="main" class="w-[1200px] mx-auto md:w-full">
    <div v-if="is_loading" class="fixed h-full w-full top-[0] left-[0] bg-amber-50/70 z-50 flex flex-col items-center justify-center pb-[100px]">
        <div class="flower-loader !ml-[-16px] !mt-[-16px]"></div>
        <p class="mt-[35px] text-center font-bold">送信中です。<br />しばらくお待ちください。</p>
    </div>
    @if($tbl_patient->tbl_patient_reviews->count())
    <div class="mt-[50px] md:mt-[30px] text-center"><span class="w-[80%] px-[20px] md:px-[17px] py-[17px] md:py-[12px] border-2 border-green bg-white text-green font-bold text-[20px] md:text-[16px] inline-block leading-none">ご協力ありがとうございます</span></div>
    @endif

    <h2 class="mt-[30px] text-center leading-none text-[15px] font-bold text-brown">バースストーリーから産院アンケートのお願い</h2>

    <p class="text-[14px] mt-[15px] w-[80%] mx-auto">アンケートにご協力いただきまして、誠にありがとうございます。<br />
        ★の評価とご感想やご意見をいただけますでしょうか。</p>


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
                            <p class="text-gray-400 mt-[7px] ">
                                <template v-if="score_type[tbl_patient_review.score]">@{{score_type[tbl_patient_review.score]}}</template>
                                <template v-else="score_type[tbl_patient_review.score]">星をタップで選択</template>
                            </p>
                        </template>
                    </template>


                </section>

                <section class="bg-white  py-[25px] px-[25px]">
                    <div class="flex flex-col items-center">
                        <textarea class="w-[100%]" rows="5" placeholder="記入してください" v-model="tbl_patient.review"></textarea>
                    </div>
                    <p class="mt-[5px] text-[12px] font-bold text-slate-500 leading-none">できるだけ詳しく記載いただくと嬉しいです。</p>
                </section>

                <section class="bg-white flex flex-col items-center py-[25px] px-[30px]">
                    <p class="text-[14px]">進呈先のPaypayIDもしくは登録電話番号を登録ください。</p>
                    <input class="h-[34px] mt-[10px]" type="text" value="" placeholder="PaypayID / 電話番号" v-model="tbl_patient.paypayid" />
                </section>

            </div>
        </section>
    </div>

    @if(!$tbl_patient->tbl_patient_reviews->count())
    <p class="mt-[50px] md:mt-[30px] w-[340px] md:w-[240px] mx-auto text-center">
        <a class="relative block bg-main text-white font-bold py-[20px] md:py-[15px] rounded-sm text-[22px] md:text-[16px]"
            @click.prevent="submit">提出<i class="fa-solid fa-angle-right absolute top-[26px] md:top-[18px] right-[15px]"></i></a></p>
    @endif

</main>
<script>
    Vue.createApp({
        name: 'main',
        data(){
            return {
                is_answer:@if($tbl_patient->tbl_patient_reviews->count()) true @else false @endif,
                is_loading:false,
                errors:[],
                mst_maternity_questions:{!! json_encode($mst_maternity_questions,JSON_UNESCAPED_UNICODE )!!},
                score_type:{!! json_encode(App\Models\MstMaternityQuestion::$score_type,JSON_UNESCAPED_UNICODE )!!},
                tbl_patient:{
                    tbl_patient_reviews:{

                    },
                },
            }
        },
        beforeMount:async function(){

            this.tbl_patient = {!! json_encode($inputs,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT )!!};
            @if(old('inputs')) @endif
            this.errors = {!! json_encode($errors->toArray(),JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT )!!};

        },
        methods:{
            async submit(){
                let t = this;
                this.errors={};
                this.is_loading=true;
                await axios.post('/api/v1/g/{{$tbl_patient->code}}/review/',
                    {
                        tbl_patient:t.tbl_patient,
                    }
                    ).then((response) => {//リクエストの成功
                    }).catch((error) => {//リクエストの失敗
                        // // t.api_data.product_data.tbl_product_composition_registration;
                        // t.system_error = false;
                        // if(error.response.data.exception=='Exception'){
                        //     t.system_error = true;
                        //     return ;
                        // }
                        // t.api_data.errors = error.response.data.errors;
                        // t.api_data.conflicts=[];
                        // if(error.response.data.conflicts){
                        //     t.api_data.conflicts = error.response.data.conflicts;
                        // }
                        // t.api_data.errors = error_message_translate(t.api_data.errors);

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
