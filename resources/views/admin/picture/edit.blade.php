@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Форма для редактирования {{ $customer->name }}</h1>
        </div>
        <div class="col-sm-6 d-flex flex-row-reverse">
          <a href={{ route('admin.customer.index') }} type="button" class="btn btn-outline-secondary">Назад к списку</a>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-sm-6 mt-2">
          <form action={{ route('admin.customer.update', $customer->id) }} method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group mb-3">
              <label>Имя клиента:</label>
              <input type="text" class="form-control" name="name" value="{{ $customer->name }}">  
              @error('name')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror                     
            </div>
            <div class="form-group mb-3">
              <label>Телефон клиента</label>
              <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}">    
              @error('phone')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror                   
            </div>
            <div class="form-group mb-3">
              <label>Почта клиента</label>
              <input type="email" class="form-control" name="email" value="{{ $customer->email }}">         
              @error('email')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror              
            </div>

            <div class="form-group">
              <input type="hidden" name="unique_customer_id" value="{{ $customer->id }}">
            </div>
           
            <button type="submit" class="btn btn-primary">Обновить</button>
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