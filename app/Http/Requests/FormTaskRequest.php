<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormTaskRequest extends FormRequest
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
            'title' => 'required|min:5|max:50',
            'description' => 'required|min:5|max:255',
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date|after:today',
        ];
    }
}
