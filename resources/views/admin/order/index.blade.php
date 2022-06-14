@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Заявки</h1>
        </div>
        <div class="col-sm-6 d-flex flex-row-reverse">
          <a href={{ route('admin.order.create') }} type="button" class="btn btn-primary">Добавить</a>
        </div>
      </div>
    </div>
  </div>  

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">          
      <div class="row">
        <div class="col-sm-12">
          <table class="table sortable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Клиент</th>                              
                <th scope="col">Локация</th>                              
                <th scope="col">Желаемая дата</th>
                <th scope="col">Статус</th>                
                <th scope="col">Действия</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $item)
                <tr>
                  <th>{{ $item->id }}</th>
                  <td>{{ $item->customer->name }}</td>                                  
                  <td>{{ $item->location }}</td>                                  
                  <td>{{ $item->convenient_date }}</td>
                  <td>{{ $item->status }}</td>                         
                  <td class="d-flex">
                    <a href={{ route('admin.order.show', $item->id) }} type="button" class="btn btn-info mr-1">Смотреть</a>
                    <a href={{ route('admin.order.edit', $item->id) }} type="button" class="btn btn-secondary mr-1">Изменить</a>
                    <form action="{{ route('admin.order.delete', $item->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>                    
                  </td>
                </tr>                         
              @endforeach                   
            </tbody>
          </table>
        </div>
      </div>     
    </div> 
    
@endsection

 