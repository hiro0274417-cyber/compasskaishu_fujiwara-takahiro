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
                'between:2000,' . date('Y'),
            ],

            'old_month' => [
                'required',
                'integer',
                'between:1,12',
            ],

            'old_day' => [
                'required',
                'integer',
                'between:1,31',
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

            $birth_day= sprintf('%04d-%02d-%02d', $year, $month, $day);

            if ($birth_day < '2000-01-01'||$birth_day > date('Y-m-d')) {
                $validator->errors()->add(
                    'old_day',
                    '生年月日は2000年1月1日から今日までの日付を入力してください。'
                );
            }
        });
    }
}
