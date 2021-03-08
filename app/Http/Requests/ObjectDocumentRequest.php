<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObjectDocumentRequest extends FormRequest
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
            'document_name_id' => 'required',
            'preliminary_accounting' => 'nullable',
            'number_type' => 'nullable',
            'number' => 'nullable',
            'number_mil_unit' => 'nullable',
            'date' => 'nullable',
            'comment' => 'nullable',
            'documentFile' => 'nullable|file|max:5120'
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
            'document_name_id' => 'Наименование документа'
        ];
    }

    public function withValidator($validator)
    {
        dump($validator->errors());
        $validator->after(function ($validator) {
            foreach ($validator->errors()->all() as $error) {
                flash($error)->error()->important();
            }
        });
    }
}
