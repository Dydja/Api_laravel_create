<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
namespace App\Http\Requests;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class SignRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'voyage'=> 'required|string',
            'cabine'=> 'required|string',
            'passagers'=> 'required|',
            'departDe'=> 'required|string',
            'arriveeA'=> 'required|string',
            'dateVoyage'=> 'required|date',
            'user_id' => ['required',Rule::exists('users','id')],
            'destination_id' => ['required',Rule::exists('destinations','id')],
       ];

    }
    //function d'echec lors de la validation
     public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }
}
