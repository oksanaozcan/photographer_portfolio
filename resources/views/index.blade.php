@extends('layouts.main_app')

@section('content')
  <div class="container">        
    @include('includes.navbar') 
    @include('includes.header') 
    @include('includes.advantages') 
    
    <div 
      data-aos="zoom-in-right" 
      data-aos-duration="2000"
      style="margin-top: 3rem;"
    >
      <h4>Мои работы</h4>
      @include('includes.head_gallery') 
    </div>
    
    
       
  </div>    
@endsection