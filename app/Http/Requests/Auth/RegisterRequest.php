<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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

        public function attributes()
    {
        return [
            'over_name' => '姓',
            'under_name' => '名',
            'over_name_kana' => 'セイ',
            'under_name_kana' => 'メイ',
            'mail_address' => 'メールアドレス',
            'sex' => '性別',
            'old_year' => '生年月日（年）',
            'old_month' => '生年月日（月）',
            'old_day' => '生年月日（日）',
            'role' => '役職',
            'password' => 'パスワード',
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'over_name' => ['required','string','max:10'],
            'under_name' => ['required','string','max:10'],
            'over_name_kana' => ['required','string','regex:/^[ァ-ヶー]+$/u','max:30'],
            'under_name_kana' => ['required','string','regex:/^[ァ-ヶー]+$/u','max:30'],//名前

            'mail_address' => [
                'required',
                'email',
                'max:100',
                'unique:users,mail_address',
            ],//メールアドレス

            'sex' => [
                'required',
                'in:1,2,3',
            ],//性別

            'old_year' => [
                'required',
                'integer',

            ],

            'old_month' => [
                'required',
                'integer',

            ],

            'old_day' => [
                'required',
                'integer',

            ],//生年月日

            'role' => [
                'required',
                'in:1,2,3,4',
            ],//役職

            'password' => [
                'required',
                'string',
                'min:8',
                'max:30',
                'confirmed',
            ],
            //パスワード
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function($validator){
            $year = (int)$this->old_year;
            $month = (int)$this->old_month;
            $day = (int)$this->old_day;

            if(!checkdate($month,$day,$year)){
                $validator->errors()->add(
                    'old_day',
                    '正しい日付を入力して下さい。'
                );

                return;
            }
        });
    }
}
