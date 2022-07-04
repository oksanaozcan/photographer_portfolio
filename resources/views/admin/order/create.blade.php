@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <x-content-header title="Форма для добавления заявки и клиента" path="admin.order.index" routeTitle="Назад к списку" btnClasses="btn btn-outline-secondary" /> 
      <div class="row mb-2">
        <div class="col-sm-6 mt-2">
          <form class="mb-3" action="{{ route('admin.order.store') }}" method="POST">
            @csrf
            
            @include('admin.includes.only_customer_fields_create_form')          
            @include('admin.includes.only_order_fields_create_form')          
            
            <button type="submit" class="btn btn-primary">Отправить</button>
          </form>
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