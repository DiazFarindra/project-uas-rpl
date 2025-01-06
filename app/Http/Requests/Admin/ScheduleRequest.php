<?php

namespace App\Http\Requests\Admin;

use App\Enums\ScheduleStatus;
use App\Enums\UserType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ScheduleRequest extends FormRequest
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
            'teacher_id' => ['required', 'exists:users,id', 'different:student_id'],
            'student_id' => ['required', 'exists:users,id', 'different:teacher_id'],
            'date_time' => ['required', 'date', 'after:now', 'date_format:Y-m-d H:i'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'status' => ['required', Rule::in([ScheduleStatus::PENDING, ScheduleStatus::OVERDUE, ScheduleStatus::COMPLETED])],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'teacher_id' => (int) $this->teacher_id,
            'student_id' => (int) $this->student_id,
            'date_time' => Carbon::parse($this->date_time)->format('Y-m-d H:i'),
        ]);
    }
}
