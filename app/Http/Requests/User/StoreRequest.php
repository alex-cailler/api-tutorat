<?php

namespace App\Http\Requests\User;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('create', User::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'last_name' => ['required', 'string'],
            'first_name' => ['required', 'string'],
            'birth_date' => ['required', 'date'],
            'email' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ];
    }
}
