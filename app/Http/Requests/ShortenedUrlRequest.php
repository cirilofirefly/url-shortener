<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShortenedUrlRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'original_url' => 'required|url|active_url'
        ];
    }

    /**
     * Get the messages.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function messages(): array
    {
        return [
            'original_url.required'     => 'Original Url is required.',
            'original_url.url'          => 'Please enter a valid url.',
            'original_url.active_url'   => 'Please enter an active url.',
        ];
    }
}
