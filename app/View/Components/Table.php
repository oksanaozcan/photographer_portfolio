<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
  public array $headers;

  public function __construct(array $headers)
  {
    $this->headers = $headers;    
  }
 
  public function render()
  {
    return view('components.table');
  }
}
