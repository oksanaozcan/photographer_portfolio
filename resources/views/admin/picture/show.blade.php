@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Фото</h1>
        </div>
        <div class="col-sm-6 d-flex flex-row-reverse">
          <a href={{ route('admin.picture.index') }} type="button" class="btn btn-outline-secondary">Назад к списку</a>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-sm-6 mt-2">
          <div class="card" style="width: 36rem;">
            <div class="card-body">
              <img class="card-img-top" src="{{ url($picture->url) }}" alt="Card image cap">
              <h5 class="card-title">Тема {{ $picture->theme->title }}</h5>
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
              <a href={{ route('admin.picture.edit', $picture->id) }} class="card-link mr-2">Изменить</a>
              <form action="{{ route('admin.picture.delete', $picture->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-danger card-link border-0 bg-transparent">Удалить</button>
              </form>        
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