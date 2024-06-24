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
    let maternity_id = {{$mst_maternity->mst_maternity_id}};
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
        console.log(liff.getContext().userId);


        // setTimeout(() => {
        //
        // }, 1000);


        axios.post('/api/v1/g/maternity/set',
            {
                maternity_id:maternity_id,
                line_user_id:liff.getContext().userId,
            }
        ).then((response) => {//リクエストの成功
            location.href = 'https://lin.ee/FWdoFmb';
        }).catch((error) => {//リクエストの失敗
            alert('エラーが発生しました。');

        }).finally(() => {

        });

    }).catch((err) => {
        alert(err);
    });

</script>

@endsection

@section('javascript')@endsection
