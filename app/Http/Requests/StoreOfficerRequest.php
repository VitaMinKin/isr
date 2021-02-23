<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfficerRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'military_rank' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'patronymic' => 'required',
            'military_position' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,bmp,gif,svg'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [//Technical debt: must use laravel localization
            'required' => 'Поле :attribute обязательно для заполнения!'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'military_position' => 'Должность',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество'
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            //if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                flash($error)->error()->important();
            }
            //}
        });
    }
}
