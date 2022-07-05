@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <x-content-header title="Подробные сведения" path="admin.picture.index" routeTitle="Назад к списку" btnClasses="btn btn-outline-secondary" /> 
      <div class="row mb-2">
        <div class="col-sm-6 mt-2">
          <div class="card" style="width: 36rem;">
            <div class="card-body">
              <img class="card-img-top" src="{{ url($picture->url) }}" alt="Card image cap">
              <h5 class="card-title">Тема {{ $picture->theme !== null ? $picture->theme->title : 'удалена'}}</h5>
              <p class="card-text"> Клиент {{ $picture->customer->name }}</p>
              <p class="card-text">
                <a href={{ route('admin.order.show', $picture->order->id) }} class="card-link mr-2">Смотреть подробности заявки</a>
              </p>
              <p class="card-text">Описание к фото {{ $picture->description }}</p>
            
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">{{ $picture->created_at }}</li>
              <li class="list-group-item">{{ $picture->updated_at }}</li>                                 
            </ul>         
            <div class="card-body d-flex">
              <x-ui.edit-btn path='admin.picture.edit' :id="$picture->id" >Изменить</x-ui.show-btn>                   
              <x-ui.delete-btn path='admin.picture.delete' :id="$picture->id" />     
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