<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'title'=> 'required|max:255|string',
            'slug' => ['required', 'max:255', Rule::unique('posts')->ignore($this->post)],
            'content'=> 'nullable|max:300|string',
            'resource_id' => 'nullable|exists:resources,id',
        ];
    }
}
