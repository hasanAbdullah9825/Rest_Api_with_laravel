<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
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

        $method= $this->method();

        if($method=='PUT'){
            return [
                'name' => ['required'],
                'type' => ['required', Rule::in(['I', 'B', 'i', 'b'])],
                'email' => ['required', 'email'],
                'address' => ['required'],
                'city' => ['required'],
                'state' => ['required'],
                'postalCode'  => ['required'],
            ];
        }

        else{
            return [
                'name' => ['nullable'],
                'type' => ['sometimes', Rule::in(['I', 'B', 'i', 'b'])],
                'email' => ['sometimes', 'email'],
                'address' => ['nullable'],
                'city' => ['nullable'],
                'state' => ['nullable'],
                'postalCode'  => ['nullable'],
            ];

        }
       
    }

    protected function prepareForValidation(){
        $this->merge([
            'postal_code' => $this->postalCode,
        ]);
    }
}
