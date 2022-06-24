@extends('layouts.main_app')

@section('content')
  <div class="container">        
    @include('includes.navbar')   

    <section class="section themes row mt-3">
      <div class="container">
        @include('includes.themesbar')

        <div class="row mt-3 mb-3">
          @include('includes.gallery')
        </div>
        <div class="row">
          <div class="col">{{ $pictures->links() }}</div>
        </div>
      </div>            
    </section>      
  </div>    
@endsection