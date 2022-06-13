@extends('layouts.main_app')

@section('content')
  <div class="container">        
    @include('includes.navbar')   

    <section class="section contact row mt-3">
      <div class="row mt-3 mb-3">
        <div data-aos="zoom-in-left" class="col-12 col-sm-3 align-self-start mb-3">
          <h3>Для заказа фотосъемки: </h3>   
          <h6 class="mb-5">свяжитесь со мной по телефону: </h6>
          <a class="phone-btn" href="tel:+79000000">+7 900 00 00</a>
        </div>
        <div data-aos="zoom-in-up" class="col-12 col-sm-6 align-self-center">
          @if (session('status'))
            <div>
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>            
            </div>
          @endif
          <h3>Или оставьте заявку: </h3>   
          @include('includes.add_order_form')
        </div>
        <div class="col-12 col-sm-3 align-self-end mb-3 d-flex justify-content-between">
          <a class="smm-icon" href="#">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a class="smm-icon" href="#">
            <i class="fab fa-twitter"></i>
          </a>         
          <a class="smm-icon" href="#">
            <i class="fab fa-instagram"></i>
          </a>
          <a class="smm-icon" href="#">
            <i class="fab fa-behance"></i>
          </a>
        </div>
      </div>
    </section>      
  </div>    
@endsection