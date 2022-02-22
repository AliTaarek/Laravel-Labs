<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' =>['required','min:3',Rule::unique('posts')->ignore($this->user_id, 'user_id')], 
            //Rule::unique('posts')->ignore($this->user_id, 'user_id'),
            'description' => 'required|min:10',
            'user_id'=>'exists:users,id',
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
            'title.required' => 'A title is required',
            'title.unique' => 'A title must be unique',
            'title.min' => 'A title must be more than 3 characters',
            'description.required' => 'A description is required',
            'description.min' => 'A description must be more than 10 characters',
            'user_id.exists' => 'There is no user like this',
        ];
    }
}
