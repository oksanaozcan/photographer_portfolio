@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <x-content-header title="{{ $theme->title }}" path="admin.theme.index" routeTitle="Назад к списку" btnClasses="btn btn-outline-secondary" /> 
      <div class="row mb-2">
        <div class="col-sm-6 mt-2">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{ $theme->title }}</h5>
              <p class="card-text">id {{ $theme->id }}</p>
              <p class="card-text">{{ $theme->description }}</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">{{ $theme->created_at }}</li>
              <li class="list-group-item">{{ $theme->updated_at }}</li>              
            </ul>
            <div class="card-body d-flex">
              <x-ui.edit-btn path='admin.theme.edit' :id="$theme->id" >Изменить</x-ui.show-btn>           
              <x-ui.delete-btn path='admin.theme.delete' :id="$theme->id" />     
            </div>
          </div>          
        </div>
        <div class="col-sm-6 mt-2">
          
        </div>
      </div>
    </div>
  </div>  

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">     
      <div class="row">

      </div>     
    </div>   
@endsection