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
{{$mst_maternity->id}}
<script>

    liff.init({
        liffId: '{{$mst_maternity->liff_id}}', // Use own liffId
        withLoginOnExternalBrowser: true, // Enable automatic login process
    }).then(() => {

        // Start to use liff's api
        console.log(liff.getLanguage());
        console.log(liff.getVersion());
        console.log(liff.isInClient());
        console.log(liff.isLoggedIn());
        console.log(liff.getOS());
        console.log(liff.getLineVersion());
        console.log(liff.getContext());

        console.log(liff.permission.requestAll());

        // setTimeout(() => {
        //     location.href = 'https://lin.ee/FWdoFmb';
        // }, 1000);


        {{--await axios.post('/api/v1/g/{{$tbl_patient->code}}/story/input',--}}
        {{--    {--}}
        {{--        tbl_patient:data,--}}
        {{--        key:'tbl_patient.'+key,--}}
        {{--    }--}}
        {{--).then((response) => {//リクエストの成功--}}
        {{--    delete t.errors['tbl_patient.'+key];--}}
        {{--}).catch((error) => {//リクエストの失敗--}}
        {{--    let errors = error_message_translate(error.response.data.errors);--}}
        {{--    t.errors['tbl_patient.'+key] = errors['tbl_patient.'+key];--}}
        {{--}).finally(() => {--}}
        {{--    this.loading_input_key='';--}}
        {{--});--}}

    }).catch((err) => {
        alert(err);
    });

</script>

@endsection

@section('javascript')@endsection
