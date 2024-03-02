<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Grade;

class GradeRequest extends FormRequest
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
            'student_id' => ['required', 'integer'],
            'subject_id' => ['required', 'integer'],
            'grade' => ['required', 'numeric', 'min:1', 'max:5', function ($attribute, $value, $validator) {
                $studentId = $this->input('student_id');
                $subjectId = $this->input('subject_id');

                // INFO: Check for existing grades with the same student and subject
                $existingGrade = Grade::where('student_id', $studentId)
                    ->where('subject_id', $subjectId)
                    ->exists();

                if ($existingGrade) {
                    $validator($attribute, 'A grade for this student on this subject already exists.');
                }
            }],
        ];
    }
}
