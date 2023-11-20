@extends('layout')
@section('meta')@endsection
@section('contents')
<main id="main" class="w-[1200px] mx-auto md:w-full">
    <h1 class="text-[36px] mt-15 text-center md:text-[20px] md:mt-7 mb-15 md:mb-7">お問い合わせ-確認</h1>

    <form class="w-[620px] mx-auto bg-[#F9F8F6] px-7.5 py-10
    md:w-full md:py-7 md:px-2.5
    " action="/contact/complete" method="post">
        {{csrf_field()}}
        <dl class="
        space-y-5
        [&>div>dt]:font-bold
        [&>div>dt>span]:text-red
        [&>div>dt>span]:text-[14px]
        [&>div>dt>span]:ml-0.75
        [&>div>dd]:mt-0.75
        [&>div>dd>span]:ml-0.75
        [&>div>dd_input]:h-11
        [&>div>dd_input]:text-[20px]
        [&>div>dd_.inp-err]:border-red/40
        [&>div>dd_.inp-err]:bg-red/5
        [&>div>dd_.err]:text-[14px]
        [&>div>dd_.err]:text-red
        [&>div>dd_.err]:font-bold
        [&>div>dd_.err]:mt-0.75
        [&>div>dd]:pl-2.5

">

            <div>
                <dt>{{\App\Http\Requests\General\ContactRequest::capture()->attributes()['name']}}<span>※必須</span></dt>
                <dd>
                    <div>{{request('name')}}<input type="hidden" name="name" value="{{request('name')}}" /></div>
                </dd>
            </div>

            <div>
                <dt>{{\App\Http\Requests\General\ContactRequest::capture()->attributes()['tel']}}</dt>
                <dd>
                    <div>{{request('tel')??'--'}}<input type="hidden" name="tel" value="{{request('tel')}}" /></div>
                </dd>
            </div>

            <div>
                <dt>{{\App\Http\Requests\General\ContactRequest::capture()->attributes()['mail']}}<span>※必須</span></dt>
                <dd>
                    <div>{{request('mail')}}<input type="hidden" name="mail" value="{{request('mail')}}" /></div>
                </dd>
            </div>

            <div>
                <dt>{{\App\Http\Requests\General\ContactRequest::capture()->attributes()['message']}}<span>※必須</span></dt>
                <dd>
                    <div>{{request('message')}}<input type="hidden" name="message" value="{{request('message')}}" /></div>
                </dd>
            </div>
            <div>
                <dd class="flex justify-center items-center">

                    <p class="text-center mr-5"><button class="w-[120px] py-1.5 bg-slate-400 text-white rounded-sm font-bold hover:bg-slate-400/80" type="submit" name="action" value="return">戻る</button></p>
                    <p class="text-center"><button class="w-[200px] py-2.5 bg-main text-white rounded-sm font-bold hover:bg-main/80" type="submit" name="action" value="send">送信する</button></p>
                </dd>
            </div>
        </dl>

    </form>
</main>
@endsection

@section('javascript')@endsection
