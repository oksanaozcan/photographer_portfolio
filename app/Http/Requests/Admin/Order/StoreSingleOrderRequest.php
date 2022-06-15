<?php

namespace App\Http\Requests\Admin\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreSingleOrderRequest extends FormRequest
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
        'customer_id' => 'required|integer',        
        'location' => 'required|string|max:255',
        'description' => 'required|string|max:2000',
        'convenient_date' => 'required|date',
        'convenient_time' => 'nullable',        
        'status' => 'required'
      ];
    }
}
