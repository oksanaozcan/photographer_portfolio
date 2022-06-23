@extends('layouts.main_app')

@section('content')
  <div class="container">        
    @include('includes.navbar')   

    <section class="section themes row mt-3">
      <div class="container">
        @include('includes.themesbar')

        <div class="row mt-3 mb-3">
          @foreach ($pictures as $picture)

            @if ($loop->odd)
              <div 
                data-aos="zoom-in-up" 
                data-aos-duration="1500"     
                class="col-6 col-md-4 mt-2 mb-2 img__card"
              >
                <div>
                  <img style="width: 100%;height:100%" class="" src="{{ url($picture->url) }}" alt="{{ $picture->description }}"/>        
                </div>
                <div class="img-content__box">
                  <a href="#"><h6>{{ $picture->theme->title }}</h6></a>
                  <p>{{ $picture->description }}</p>
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
                  <img style="width: 100%;height:100%" class="" src="{{ url($picture->url) }}" alt="{{ $picture->description }}"/>        
                </div>
                <div class="img-content__box">
                  <a href="#"><h6>{{ $picture->theme->title }}</h6></a>
                  <p>{{ $picture->description }}</p>
                  <a type="button" class="btn btn-primary" href="#">Другие фото</a>
                </div>      
              </div>           
            @endif
              
          @endforeach
        </div>
        <div class="row">
          <div class="col">{{ $pictures->links() }}</div>
        </div>
      </div>            
    </section>      
  </div>    
@endsection