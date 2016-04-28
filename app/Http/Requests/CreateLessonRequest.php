<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateLessonRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'type_id' => 'required|min:3|max:255',
            'part_id' => 'required|min:3|max:255',
            'lesson' => 'required|max:255',
            'content' => 'required|min:255',
            'lessonCode' => 'required|min:4',
        ];
    }
}
