@foreach ($pictures as $picture)

  @if ($loop->odd)
    <div 
      data-aos="zoom-in-up" 
      data-aos-duration="1500"     
      class="col-6 col-md-4 mt-2 mb-3"
    >          
      <a href="{{ url($picture->url) }}" data-toggle="lightbox" data-caption="{{ $picture->description }}">
        <img style="width: 100%;height:100%" src="{{ url($picture->url) }}" alt="{{ $picture->description }}"/>    
      </a>
      <a href="{{ route('order.index', $picture->order->id) }}">Смотреть все фото этого заказа</a>
    </div>           
  @endif

  @if ($loop->even)
    <div 
      data-aos="zoom-in-up" 
      data-aos-duration="1500" 
      data-aos-delay="300"    
      class="col-6 col-md-4 mt-2 mb-3"
    >
      <a href="{{ url($picture->url) }}" data-toggle="lightbox" data-caption="{{ $picture->description }}">
        <img style="width: 100%;height:100%" class="" src="{{ url($picture->url) }}" alt="{{ $picture->description }}"/>    
      </a>
      <a href="{{ route('order.index', $picture->order->id) }}">Смотреть все фото этого заказа</a>
    </div>           
  @endif
    
@endforeach