@extends('layout')
@section('meta')@endsection
@section('contents')
<main id="main" class="w-[1200px] mx-auto md:w-full">
    <div class="w-[800px] mx-auto md:w-full">
        <div class="flex justify-center">
            <p class="mt-[50px] md:mt-[30px] ">ページが遷移するまでお待ちください。<br />移動しない場合は<a href="https://lin.ee/FWdoFmb" class="font-bold text-main underline" target="_blank">こちら</a>から</p>
        </div>

    </div>
</main>

<script>
    Vue.createApp({
        name: 'main',
        data(){
            return {

            }
        },
        beforeMount:async function(){
        },
        created:async function(){
            setTimeout(() => {
                location.href = 'https://lin.ee/FWdoFmb';
            }, 1000);
        },
        mounted:function(){

        },
        methods:{

        },
        watch:{

        },
    }).mount('#main');
</script>
@endsection

@section('javascript')@endsection
