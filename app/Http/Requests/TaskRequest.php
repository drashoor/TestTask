<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize()
    {
        // Should write a task policy
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'due' => 'required|date',
            'list' => 'required',
            'status' => 'required',
            'user_id' => 'required',
        ];
    }
}
