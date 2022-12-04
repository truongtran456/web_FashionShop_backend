<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=> 'required'//bắt buộc không trống
        ];
    }

    public function messages(): array //hiển trị lỗi ra
    {
        return [
            'name.required' => 'Vui lòng nhập tên danh mục',
        ];
    }
}
