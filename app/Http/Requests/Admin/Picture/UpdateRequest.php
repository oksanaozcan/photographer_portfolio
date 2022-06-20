<?php

namespace App\Http\Requests\Admin\Picture;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        'description' => 'nullable|string',
        'theme_id' => 'required',
        'order_id' => 'required',        
      ];
    }
}
