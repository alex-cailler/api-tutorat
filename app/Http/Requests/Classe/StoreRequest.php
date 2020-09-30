<?php


namespace App\Http\Requests\Classe;


use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'date'                  => 'required',
            'room_nbr'              => 'required',
            'address'               => 'required',
            'place_available_nbr'   => 'required',
            'matter_id'             => 'required',
            'teacher_id'            => 'required',
        ];
    }
}
