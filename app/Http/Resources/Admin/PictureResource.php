<?php

namespace App\Http\Resources\Admin;

use App\Models\Order;
use Illuminate\Http\Resources\Json\JsonResource;

class PictureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
      return [
        'id' => $this->id,
        'path' => $this->path,        
        'url' => $this->url,        
        'description' => $this->description,
        'theme' => [
          'id' => $this->theme_id,
          'title' => $this->theme->title,
        ],
        'order' => new OrderResource(Order::find($this->order_id))
      ];
    }
}
