<?php

namespace App\Http\Requests;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
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
            'name' => 'required|min:6',
            'price' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ':attribute ko được bỏ trống !!!',
            'name.min' => ':attribute không được nhỏ hơn :min kí tự',
            'price.required' => ':attribute ko được bỏ trống !!!',
        ];
    }

    //...Đổi tên trường
    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'price' => 'Giá sản phẩm'
        ];
    }

    //...Sau khi validate
    protected function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // dd($validator->errors()->count());
            if ($validator->errors()->count() > 0) {
                $validator->errors()->add('msg', 'Đã có lỗi xảy ra');
            } else {
                //...Chuyển hướng trang (lỗi ko back dc)
                return back();
            }

            //..Có thể bắt đúng hoặc sai
        });
    }

    //..Trước khi validate
    protected function prepareForValidation()
    {
        $this->merge([
            'create_at' => date('Y-m-d H:i:s'),
        ]);
    }

    //...Thay doi text khi authorize là false
    protected function failedAuthorization()
    {
        throw new AuthorizationException('Ban ko có quyền tru cập');

        //...Hoặc chuyển hướng sang trang khác
        throw new HttpResponseException(redirect(route('home.index'))->with('msg', 'Bạn ko có quyền tru cập'));
    }
}
