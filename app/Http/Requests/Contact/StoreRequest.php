<?php

namespace App\Http\Requests\Contact;

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
        'name' => 'required|string|max:255',        
        'phone' => 'required|unique:customers|string|max:255',
        'email' => 'required|email|max:255',
        'location' => 'required|string|max:255',
        'description' => 'required|string|max:2000',
        'convenient_date' => 'required|date',
        'convenient_time' => 'nullable',
        'captcha' => 'required|captcha',
      ];
    }
}
