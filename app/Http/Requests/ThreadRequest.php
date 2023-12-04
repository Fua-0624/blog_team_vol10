<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThreadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /*public function authorize()
    {
        return false;
    }
    */
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'thread.title' => 'required|string|max:100',
            'thread.body' => 'required|string|max:4000',
            'thread.translated_title' => 'required|string|max:100',
            'thread.translated_body' => 'required|string|max:4000',
        ];
    }
}
