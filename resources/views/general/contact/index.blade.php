@extends('layout')
@section('meta')@endsection
@section('contents')
    <main id="main" class="w-[1200px] mx-auto md:w-full">
        <h1 class="text-[36px] mt-15 text-center md:text-[20px] md:mt-7">お問い合わせ</h1>
        <div class="mb-15 md:mb-7"><img class="mx-auto md:w-[100px]" src="/images/arrow.png"/></div>
        <form class="w-[620px] mx-auto bg-[#F9F8F6] px-7.5 py-10
    md:w-full md:py-7 md:px-2.5
    " action="/contact/confirm" method="post">
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


">

                <div>
                    <dt>{{\App\Http\Requests\General\ContactRequest::capture()->attributes()['company']}}<span>※必須</span></dt>
                    <dd>
                        <div><input class="w-[400px] md:!w-full @error('company') inp-err @enderror" type="text" name="company" value="{{old('company')}}"></div>
                        @error('company')<div class="err">※ {{ $message }}</div>@enderror
                    </dd>
                </div>

                <div>
                    <dt>{{\App\Http\Requests\General\ContactRequest::capture()->attributes()['name']}}<span>※必須</span></dt>
                    <dd>
                        <div><input class="w-[300px] md:w-[220px] @error('name') inp-err @enderror" type="text" name="name" value="{{old('name')}}"></div>
                        @error('name')<div class="err">※ {{ $message }}</div>@enderror
                    </dd>
                </div>

                <div>
                    <dt>{{\App\Http\Requests\General\ContactRequest::capture()->attributes()['position']}}</dt>
                    <dd>
                        <div><input class="w-[200px] md:w-[150px] @error('position') inp-err @enderror" type="text" name="position" value="{{old('position')}}"></div>
                        @error('position')<div class="err">※ {{ $message }}</div>@enderror
                    </dd>
                </div>

                <div>
                    <dt>{{\App\Http\Requests\General\ContactRequest::capture()->attributes()['tel']}}<span>※必須</span></dt>
                    <dd>
                        <div><input class="w-[220px] md:w-[200px] @error('tel') inp-err @enderror" type="tel" name="tel" value="{{old('tel')}}" placeholder="例:08012345678"/></div>
                        @error('tel')<div class="err">※ {{ $message }}</div>@enderror
                    </dd>
                </div>

                <div>
                    <dt>{{\App\Http\Requests\General\ContactRequest::capture()->attributes()['mail']}}<span>※必須</span></dt>
                    <dd>
                        <div><input class="w-[350px] md:w-[280px] @error('mail') inp-err @enderror" type="email" name="mail" value="{{old('mail')}}"></div>
                        @error('mail')<div class="err">※ {{ $message }}</div>@enderror
                    </dd>
                </div>

                <div>
                    <dt>{{\App\Http\Requests\General\ContactRequest::capture()->attributes()['requirement_type']}}<span>※必須</span></dt>
                    <dd>
                        <div><select class="text-[20px] w-[350px] md:w-[280px] h-11 @error('requirement_type') inp-err @enderror" name="requirement_type">
                                <option value="">--</option>
                                @foreach(\App\Models\TblContact::REQUIREMENT_TYPE AS $key=>$val)
                                    <option value="{{$key}}"
                                            @if($key==old('requirement_type')) selected="selected"@endif>{{$val}}</option>
                                @endforeach
                            </select></div>
                        @error('requirement_type')<div class="err">※ {{ $message }}</div>@enderror
                    </dd>
                </div>

                <div>
                    <dt>{{\App\Http\Requests\General\ContactRequest::capture()->attributes()['message']}}<span>※必須</span></dt>
                    <dd>
                        <div><textarea class="w-full h-[100px] @error('message') inp-err @enderror" name="message">{{old('message')}}</textarea></div>
                        @error('message')<div class="err">※ {{ $message }}</div>@enderror
                    </dd>
                </div>
                <div>
                    <dd>
                        <p class="text-[14px] text-center md:text-left"><a class="underline text-main" href="/policy" target="_blank">個人情報保護方針</a>に同意のうえお問い合わせをお願い申し上げます。</p>
                        <p class="mt-5 text-center"><button class="w-[200px] py-2.5 bg-main text-white rounded-sm font-bold hover:bg-main/80" type="submit" name="action" value="send">確認する</button></p>
                    </dd>
                </div>
            </dl>

        </form>
    </main>
@endsection

@section('javascript')@endsection
