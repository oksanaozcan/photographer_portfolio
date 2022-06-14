@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Форма для добавления заявки и клиента</h1>
        </div>
        <div class="col-sm-6 d-flex flex-row-reverse">
          <a href={{ route('admin.order.index') }} type="button" class="btn btn-outline-secondary">Назад к списку</a>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-sm-6 mt-2">
          <form class="mb-3" action="{{ route('admin.order.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
              <label>Имя клиента:</label>
              <input type="text" class="form-control" placeholder="Введите фамилию и имя" name="name" value="{{ old('name') }}">  
              @error('name')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror                     
            </div>
            <div class="form-group mb-3">
              <label>Телефон клиента</label>
              <input type="text" class="form-control" placeholder="+7 900 00 00" name="phone" value="{{ old('phone') }}">    
              @error('phone')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror                   
            </div>
            <div class="form-group mb-3">
              <label>Почта клиента</label>
              <input type="email" class="form-control" placeholder="somemail@mail.com" name="email" value="{{ old('email') }}">         
              @error('email')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror              
            </div>
            <div class="form-group mb-3">
              <label>Локация съемки</label>
              <input type="text" class="form-control" placeholder="Москва, Краснопресненский район" name="location" value="{{ old('location') }}">  
              @error('location')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror                     
            </div>
            <div class="form-group mb-3">
              <label>Дополнительные сведения</label>
              <textarea class="form-control" rows="4" 
                placeholder="Описание деталей фотосъемки и др..." name="description"
              >{{ old('description') }}</textarea>
              @error('description')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror          
            </div>    
            <div class="form-group mb-3">
              <label>Дата</label>
              <input type="date" class="form-control" name="convenient_date" value="{{ old('convenient_date') }}">             
              @error('convenient_date')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror          
            </div>  
            <div class="form-group mb-3">
              <label>Время</label>
              <input type="time" class="form-control" name="convenient_time" value="{{ old('convenient_time') }}">        
              @error('convenient_time')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror               
            </div>           
            
            <div class="form-group">
              <label>Статус заявки</label>
              <select class="form-select form-control" name="status">                                
                <option value="new" {{ 'new' == old('status') ? ' selected' : '' }}>new</option>                  
                <option value="processing" {{ 'processing' == old('status') ? ' selected' : '' }}>processing</option>                  
                <option value="completed" {{ 'completed' == old('status') ? ' selected' : '' }}>completed</option>                            
              </select>
              @error('status')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror  
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