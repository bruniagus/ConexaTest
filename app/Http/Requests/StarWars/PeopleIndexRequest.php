<?php

namespace App\Http\Requests\StarWars;

use Illuminate\Foundation\Http\FormRequest;

class PeopleIndexRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            "limit"=> "required|numeric",
            "offset" => "required|numeric",
            "page" => "nullable|numeric"
        ];
    }
}
