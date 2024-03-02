<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Student;
use Illuminate\Validation\Rule;

class StudentUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Assuming authorization is handled elsewhere
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // INFO: tf? how is $this has a student property?
        $studentId = $this->student->id;
        return [
            "name" => [
                "required",
                "string",
                "max:255",
                // NOTE: this works but I don't completely understand it
                // this allows the student to keep their original name
                // but they can't change it to some else's name
                Rule::unique(Student::class, 'name')
                    ->where(function ($query) use ($studentId) {
                        if ($studentId) {
                            $query->where('id', '<>', $studentId); // Ignore for existing record
                        }
                    }),
            ],
            "address" => ["required", "string", "max:255"],
            "age" => ["required", "integer", "min:1", "max:120"],
        ];
    }
}
