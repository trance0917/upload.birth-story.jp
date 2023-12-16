@extends('layout')
@section('meta')@endsection
@section('contents')
    <main id="main" class="w-[1200px] mx-auto md:w-full">
        <div class="w-[800px] mx-auto md:w-full">
            @if($tbl_patient->submitted_at)
                <div class="mt-[50px] md:mt-[30px] text-center"><span class="w-[80%] px-[20px] md:px-[17px] py-[17px] md:py-[12px] border-2 border-green bg-white text-green font-bold text-[20px] md:text-[16px] inline-block leading-none">提出が完了しました</span></div>
                <section class="border border-main rounded mx-[15px] bg-main/5 py-[20px] px-[15px] mt-[30px]">
                    <h2 class="text-center leading-none text-[16px] font-bold text-brown">インスタグラムへの投稿</h2>

                    <p class="text-[14px] mt-[15px] font-bold">
                        インスタグラムへの投稿をありがとうございます！<br />
                        差し支えがなければ下記のハッシュタグもあわせて投稿いただきたいです。
                    </p>
                    <ul class="mt-[10px] font-bold [&>li]:text-slate-500 text-[14px] leading-tight">
                        <li>#{{$tbl_patient->mst_maternity->name}}</li>
                        <li>#バースストーリー</li>
                        <li>#birth-story</li>
                        <li>#出産 </li>
                        <li>#出産記念品</li>
                        <li>#産婦人科</li>
                    </ul>
                    <p @click.prevent="review_copy"
                        class="relative text-[14px] border-dotted border-slate-400 text-slate-350 bg-slate-100 border p-[5px] rounded overflow-hidden text-ellipsis h-[5em] leading-[1.3em] mt-[10px]"
                        :class="{'!bg-green-50 !border-green-400':is_copy}"
                    >
                        #{{$tbl_patient->mst_maternity->name}} #バースストーリー #birth-story #出産 #出産記念品 #産婦人科
                        <span v-if="!is_copy" class="absolute block w-full top-[calc(50%-8px)] font-bold text-center text-[16px]">タップしてコピー</span>
                        <span v-else class="absolute block w-full top-[calc(50%-9px)] font-bold text-center text-[18px] text-green">コピーしました</span>
                    </p>
                    <p v-if="is_fail_copy" class="mt-[3px] font-bold text-red text-[12px] text-center">端末の制限によりコピーできませんでした。</p>


                    <p class="mt-[25px] md:mt-[15px] w-[240px] md:w-[180px] mx-auto text-center">
                        <a class="relative w-full block bg-main text-white font-bold py-[10px] md:py-[10px] rounded-sm text-[20px] md:text-[14px]"
                           target="_blank" href="https://www.instagram.com/"
                        >インスタグラムへ<i class="fa-solid fa-angle-right absolute top-[16px] md:top-[14px] right-[10px]"></i></a>
                    </p>
                    <ul class="hidden star star-30 star-31 star-32 star-33 star-34 star-35 star-36 star-37 star-38 star-39 star-40 star-41 star-42 star-43 star-44 star-45 star-46 star-47 star-48 star-49 star-50"></ul>
                </section>
            @endif

        </div>
    </main>
    <script>
        Vue.createApp({
            name: 'main',
            data(){
                return{
                    is_copy:false,
                    is_fail_copy:false
                }
            },
            methods:{
                review_copy:function(){
                    let review = '#{{$tbl_patient->mst_maternity->name}} #バースストーリー #birth-story #出産 #出産記念品 #産婦人科';

                    navigator.clipboard.writeText(review).then(
                        () => {
                            this.is_copy=true;
                        },
                        () => {
                            this.is_fail_copy=true;
                            // コピーに失敗したときの処理
                        }
                    );
                },
            },
            watch:{

            },
        }).mount('#main');
    </script>
@endsection

@section('javascript')@endsection
