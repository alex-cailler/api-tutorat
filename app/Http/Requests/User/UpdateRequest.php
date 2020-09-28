<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('update', $this->route('user'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'last_name' => ['sometimes', 'required', 'string'],
            'first_name' => ['sometimes', 'required', 'string'],
            'birth_date' => ['sometimes', 'required', 'date'],
            'email' => ['sometimes', 'required', 'string', 'unique:users'],
            'password' => ['sometimes', 'required', 'string', 'min:6'],
        ];
    }
}
