@extends('layouts.main_app')

@section('content')
  <div class="container">        
    @include('includes.navbar')   

    <section class="section presentation row mt-3">      
      <div data-aos="fade-right" class="presentation__description">        
        <h3 class="mt-3">Профессиональный фотограф</h3>
        <h1 class="main_name">Сергей Алексеев</h1>      
        <q class="main_quot">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</q>        
        <button type="button" class="btn btn-appoint d-block">
          Записаться на фотосессию
          <span></span>
        </button>            
      </div>  
      <div data-aos="zoom-in-up" class="presentation__photo">
        <img class="main__photo" src="{{ asset('images/main_photo.jpg') }}" alt="photo alekseev">
      </div>
    </section>
    
       
  </div>    
@endsection