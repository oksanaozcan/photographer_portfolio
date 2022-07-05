@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">     
      <x-content-header title="{{ $customer->name }}" path="admin.customer.index" routeTitle="Назад к списку" btnClasses="btn btn-outline-secondary" /> 
      <div class="row mb-2">
        <div class="col-sm-6 mt-2">
          <div class="card" style="width: 36rem;">
            <div class="card-body">
              <h5 class="card-title">{{ $customer->name }}</h5>
              <p class="card-text">id {{ $customer->id }}</p>
              <p class="card-text">{{ $customer->phone }}</p>
              <p class="card-text">{{ $customer->email }}</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">{{ $customer->created_at }}</li>
              <li class="list-group-item">{{ $customer->updated_at }}</li>                                 
            </ul>         
            <div class="card-body d-flex">
              <x-ui.edit-btn path='admin.customer.edit' :id="$customer->id" >Изменить</x-ui.show-btn>      
              <form action="{{ route('admin.customer.delete', $customer->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                  class="text-danger card-link border-0 bg-transparent"
                  @disabled($customer->orders->isNotEmpty())                  
                >Удалить</button>
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
        this is place for table with data of his orders, statistic
        this is place for pictures with data of his orders, statistic

      </div>     
    </div>   
@endsection