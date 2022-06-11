@extends('layouts.main_app')

@section('content')
  <div class="container">        
    @include('includes.navbar')   

    <section class="section themes row mt-3">
      <div class="container">
        @include('includes.themesbar')
      </div>            
    </section>      
  </div>    
@endsection