<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'title'=>'required|string|max:100',
        'description'=>'required|string',
        'image'=>['required','image','mimes:png,jpg,jpeg,gif,svg'],
        'price'=>'required|numeric',
        'discount_price'=>['required','nullable','lt:price'],
        'category_id'=>'required|exists:categories,id',

    ];
    }
}
