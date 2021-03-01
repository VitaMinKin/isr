<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInformatizationObjectRequest extends FormRequest
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
            'name' => 'required',
            'category' => 'required',
            'type' => 'required',
            'department_id' => 'required',
            'comment' => 'nullable'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
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
            'name' => 'Наименование объекта информатизации',
            'category' => 'Категория',
            'type' => 'Тип',
            'comment' => 'Комментарий'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            foreach ($validator->errors()->all() as $error) {
                flash($error)->error()->important();
            }
        });
    }
}
