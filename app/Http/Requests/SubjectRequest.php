<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Subject;

class SubjectRequest extends FormRequest
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
            'subjectName' => ['required', 'string', 'max:255'],
            // NOTE: 20 chars for subjectCode is quite generous TBH xD
            'subjectCode' => ['required', 'string', 'max:20', 'unique:' . Subject::class],
        ];
    }
}
