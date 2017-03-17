<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductsTypeRequest extends Request
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
            'txtName'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'txtName.required' => ' Hãy nhập tên kiểu sản phẩm',
        ];
    }
}
