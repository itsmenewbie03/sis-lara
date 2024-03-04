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
                $valid_grade = [1.0, 1.25, 1.50, 1.75, 2.0, 2.25, 2.50, 2.75, 3.0, 5.0];
                $studentId = $this->input('student_id');
                $subjectId = $this->input('subject_id');

                // INFO: Check for existing grades with the same student and subject
                $existingGrade = Grade::where('student_id', $studentId)
                    ->where('subject_id', $subjectId)
                    ->exists();

                if (!in_array($value, $valid_grade)) {
                    $validator($attribute, 'Invalid grade.');
                }

                if ($existingGrade) {
                    $validator($attribute, 'A grade for this student on this subject already exists.');
                }
            }],
        ];
    }
}
