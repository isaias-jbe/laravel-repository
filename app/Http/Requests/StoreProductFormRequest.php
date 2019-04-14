<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductFormRequest extends FormRequest
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
            'name'          => "required|min:3|max:150|unique:products",
            'url'           => "required|min:3|max:100|unique:products",
            'price'         => "required|numeric",
            'description'   => "max:3000",
            "category_id"   => "required|exists:categories,id"
        ];
    }
}
