<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'=>'required|string|max:50',
            'price'=>'required|numeric|min:0.10|regex:/^\d+(\.\d{1,2})?$/',
            'amount'=>'required|integer|min:1|max:1000',
            'category'=>'required|exists:categories,id',
            'description'=>'required|string|max:255',
            'image'=>'required|image|max:2048',
            'status'=>'required|exists:statuses,id',
        ];
    }
}
