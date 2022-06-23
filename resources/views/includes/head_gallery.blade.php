<div class="row">   
  @foreach ($randomPictures as $randomPicture)

  @if ($loop->odd)
    <div 
      data-aos="zoom-in-up" 
      data-aos-duration="1500"     
      class="col-6 col-md-4 mt-2 mb-2 img__card"
    >
      <div>
        <img style="width: 100%;height:100%" class="" src="{{ url($randomPicture->url) }}" alt="{{ $randomPicture->description }}"/>        
      </div>
      <div class="img-content__box">
        <a href="#"><h6>Смотреть {{ $randomPicture->theme->title }}</h6></a>
        <p>{{ $randomPicture->description }}</p>
        <a type="button" class="btn btn-primary" href="#">Другие фото</a>
      </div>      
    </div>           
  @endif

  @if ($loop->even)
    <div 
      data-aos="zoom-in-up" 
      data-aos-duration="1500" 
      data-aos-delay="300"    
      class="col-6 col-md-4 mt-2 mb-2 img__card"
    >
      <div>
        <img style="width: 100%;height:100%" class="" src="{{ url($randomPicture->url) }}" alt="{{ $randomPicture->description }}"/>        
      </div>
      <div class="img-content__box">
        <a href="#"><h6>{{ $randomPicture->theme->title }}</h6></a>
        <p>{{ $randomPicture->description }}</p>
        <a type="button" class="btn btn-primary" href="#">Другие фото</a>
      </div>      
    </div>           
  @endif

  
@endforeach  
</div>


