<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Subject;

class SubjectUpdateRequest extends FormRequest
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
        // INFO: tf? how is $this has a subject property?
        $subjectId = $this->subject->id;
        return [
            "subjectName" => [
                "required",
                "string",
                "max:255",
                // NOTE: this works but I don't completely understand it
                Rule::unique(Subject::class, 'subjectName')
                    ->where(function ($query) use ($subjectId) {
                        if ($subjectId) {
                            $query->where('id', '<>', $subjectId); // Ignore for existing record
                        }
                    }),
            ],
            "subjectCode" => [
                "required",
                "string",
                "max:20",
                // NOTE: this works but I don't completely understand it
                Rule::unique(Subject::class, 'subjectCode')
                    ->where(function ($query) use ($subjectId) {
                        if ($subjectId) {
                            $query->where('id', '<>', $subjectId); // Ignore for existing record
                        }
                    }),
            ],
        ];
    }
}
