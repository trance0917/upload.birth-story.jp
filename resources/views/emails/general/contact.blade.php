{{$contact->name}} さま

お問い合わせを受け付けました。

返信は2~3営業日以内にさせていただきます。
もしも返事のない場合は再度お送りいただくか、
「 info@birth-story.jp 」
に直接ご連絡くださいませ。

■ お問い合わせ内容
[産院]
{{env('MATERNITY_NAME')}}

[{{\App\Http\Requests\General\ContactRequest::capture()->attributes()['name']}}]
{{$contact->name}}

[{{\App\Http\Requests\General\ContactRequest::capture()->attributes()['tel']}}]
{{$contact->tel??'--'}}

[{{\App\Http\Requests\General\ContactRequest::capture()->attributes()['mail']}}]
{{$contact->mail}}

[{{\App\Http\Requests\General\ContactRequest::capture()->attributes()['message']}}]
{{$contact->message}}

--------------------
- {{env('APP_NAME')}} -
{{url('/')}}
