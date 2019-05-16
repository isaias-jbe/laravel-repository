<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductFormRequest extends FormRequest
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
        $id =  $this->segment(3);

        return [
            'name'          => "required|min:3|max:150|unique:products,name,{$id},id",
            'cost_price'    => "required",
            'sale_price'    => "required",
            'description'   => "max:3000",
            "category_id"   => "required|exists:categories,id"
        ];
    }
}
