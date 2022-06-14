@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Форма для редактирования заявки</h1>
        </div>
        <div class="col-sm-6 d-flex flex-row-reverse">
          <a href={{ route('admin.order.index') }} type="button" class="btn btn-outline-secondary">Назад к списку</a>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-sm-6 mt-2">
          <form class="mb-3" action="{{ route('admin.order.update', $order->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group mb-3">
              <label>Имя клиента:</label>
              <input type="text" class="form-control" name="name" value="{{ $order->customer->name }}">  
              @error('name')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror                     
            </div>
            <div class="form-group mb-3">
              <label>Телефон клиента</label>
              <input type="text" class="form-control" name="phone" value="{{ $order->customer->phone }}">    
              @error('phone')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror                   
            </div>
            <div class="form-group mb-3">
              <label>Почта клиента</label>
              <input type="email" class="form-control" name="email" value="{{ $order->customer->email }}">         
              @error('email')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror              
            </div>
            <div class="form-group mb-3">
              <label>Локация съемки</label>
              <input type="text" class="form-control" name="location" value="{{ $order->location }}">  
              @error('location')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror                     
            </div>
            <div class="form-group mb-3">
              <label>Дополнительные сведения</label>
              <textarea class="form-control" rows="4" 
                name="description"
              >{{ $order->description }}</textarea>
              @error('description')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror          
            </div>    
            <div class="form-group mb-3">
              <label>Дата</label>
              <input type="date" class="form-control" name="convenient_date" value="{{ $order->convenient_date }}">             
              @error('convenient_date')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror          
            </div>  
            <div class="form-group mb-3">
              <label>Время</label>
              <input type="time" class="form-control" name="convenient_time" value="{{ $order->convenient_time }}">        
              @error('convenient_time')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror               
            </div>           
            
            <div class="form-group">
              <label>Статус заявки</label>
              <select class="form-select form-control" name="status">                                
                <option value="new" {{ $order->status == 'new' ? ' selected' : '' }}>new</option>                  
                <option value="processing" {{ $order->status == 'processing' ? ' selected' : '' }}>processing</option>                  
                <option value="completed" {{ $order->status == 'completed' ? ' selected' : '' }}>completed</option>                            
              </select>
              @error('status')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror  
            </div>    

            <div class="form-group">
              <input type="hidden" name="unique_customer_id" value="{{ $order->customer->id }}">
            </div>
            
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