<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'image' => 'nullable|image',
            'password' => 'nullable|password',
            'description' => 'required|string',
            'whatsapp_url' => 'nullable|string|url',
            'telegram_url' => 'nullable|string|url',
            'instagram_url' => 'nullable|string|url',
            'youtube_url' => 'nullable|string|url',
            'tiktok_url' => 'nullable|string|url',
            'website_url' => 'nullable|string|url',
        ];
    }
}
