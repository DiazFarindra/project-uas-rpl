<?php

namespace App\Http\Requests\Admin;

use App\Enums\UserType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->type === UserType::ADMIN;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'nim' => ['nullable', 'string', 'max:255', 'unique:users,nim'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$this->user?->id],
            'password' => [
                Rule::when($this->isMethod('put'), 'nullable', ['required']),
                'string',
                'min:8',
                'confirmed',
            ],
            'type' => ['required', 'string', Rule::in([UserType::ADMIN->value, UserType::STUDENT->value, UserType::TEACHER->value])],
        ];
    }
}
