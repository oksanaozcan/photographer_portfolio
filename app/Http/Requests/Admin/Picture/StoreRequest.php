<?php

namespace App\Http\Requests\Admin\Picture;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        'title' =>'required|string',
        'url' => 'required|string',
        'size' => 'required|integer',
        'description' => 'required|string',
        'theme_id' => 'required|integer',
        'order_id' => 'required|integer',
      ];
    }
}
