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
                class="col-6 col-md-4 mt-2 mb-2"
              >              
                <a href="{{ url($picture->url) }}" data-toggle="lightbox" data-caption="{{ $picture->description }}">
                  <img style="width: 100%;height:100%;object-fit:cover;" src="{{ url($picture->url) }}" alt="{{ $picture->description }}"/>    
                </a> 
              </div>           
            @endif

            @if ($loop->even)
              <div 
                data-aos="zoom-in-up" 
                data-aos-duration="1500" 
                data-aos-delay="300"    
                class="col-6 col-md-4 mt-2 mb-2"
              >
                <a href="{{ url($picture->url) }}" data-toggle="lightbox" data-caption="{{ $picture->description }}">
                  <img style="width: 100%;height:100%;object-fit:cover;" src="{{ url($picture->url) }}" alt="{{ $picture->description }}"/>    
                </a>        
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