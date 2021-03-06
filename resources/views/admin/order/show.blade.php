@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">      
      <x-content-header title="Подробные сведения" path="admin.order.index" routeTitle="Назад к списку" btnClasses="btn btn-outline-secondary" /> 
      <div class="row mb-2">
        <div class="col-sm-6 mt-2">
          <div class="card" style="width: 38rem;">
            <div class="card-body">
              <h5 class="card-title">{{ $order->customer->name }}</h5>
              <p class="card-text">телефон: {{ $order->customer->phone }}</p>
              <p class="card-text">почта: {{ $order->customer->email }}</p>              
              <p class="card-text">Дата регистрации в базе: {{ $order->customer->created_at }}</p>              
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Локация: {{ $order->location }}</li>
              <li class="list-group-item">Описание: {{ $order->description }}</li>
              <li class="list-group-item">Желаемая дата: {{ $order->convenient_date }}</li>
              <li class="list-group-item">Желаемое время: {{ $order->convenient_time }}</li>              
              <li class="list-group-item">Дата заявки: {{ $order->created_at }}</li>              
              <li class="list-group-item">Статус заявки: {{ $order->status }}</li>              
            </ul>
            <div class="card-body d-flex">
              <x-ui.edit-btn path='admin.order.edit' :id="$order->id" >Изменить</x-ui.show-btn>         
              <x-ui.delete-btn path='admin.order.delete' :id="$order->id" />               
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