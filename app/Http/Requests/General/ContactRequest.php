<?php
namespace App\Http\Requests\General;

use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

	protected function prepareForValidation()
	{

	}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:20',
            'tel' => ['nullable','regex:/^0\d{9,10}$/','max:13'],
            'mail' => 'required|max:128',
            'message' => 'required|max:500',
		];
    }

	public function messages(){
		return [
            'name.required' => ':attributeを入力してください。',
            'name.max' => ':attributeは:max文字以下にしてください。',
            'tel.regex' => ':attributeのフォーマットが不正です。',
            'tel.max' => ':attributeは:max文字以下にしてください',
            'mail.required' => ':attributeを入力してください。',
            'mail.max' => ':attributeは:max文字以下にしてください',
            'message.required' => ':attributeを入力してください。',
            'message.max' => ':attributeは:max文字以下にしてください',
		];
	}

    public function attributes(){
        return [
            'name' => 'お名前',
            'tel' => '電話番号',
            'mail' => 'メールアドレス',
            'message' => 'お問い合わせ内容',
        ];
    }

}
