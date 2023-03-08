<?php

namespace App\Http\Requests\StarWars;

use Illuminate\Foundation\Http\FormRequest;

class VehiclesGetRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge(['id' => $this->route('id')]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            "id"=> "required|numeric",
        ];
    }
}
