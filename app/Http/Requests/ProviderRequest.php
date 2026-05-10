<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProviderRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'profile_image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'phone' => 'required|min:11',
            'experience' => 'required',
            'district' => 'required',
            'skills' => 'required',
            'address' => 'required',
            'bio' => 'required',
        ];
    }

    protected $stopOnFirstFailure = true;
}
