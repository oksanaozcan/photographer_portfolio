@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <x-content-header title="Клиенты" path="admin.customer.create"/> 

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">          
      <div class="row">
        <div class="col-sm-12">
          <table class="table sortable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Телефон</th>
                <th scope="col">Почта</th>
                <th scope="col">Кол-во заявок</th>               
                <th scope="col">Кол-во фото</th>
                <th scope="col">Нет активных заявок</th>
                <th scope="col">Действия</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($customers as $item)
                <tr>
                  <th>{{ $item->id }}</th>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->phone }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->orders->count() }}</td>
                  <td>{{ $item->pictures->count() }}</td>
                  <td>{{ $item->orderable ? 'да' : 'нет' }}</td>
                  <td class="d-flex">
                    <a href={{ route('admin.customer.show', $item->id) }} type="button" class="btn btn-info mr-1">Смотреть</a>
                    <a href={{ route('admin.customer.edit', $item->id) }} type="button" class="btn btn-secondary mr-1">Изменить</a>
                    <form action="{{ route('admin.customer.delete', $item->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" 
                        class="btn btn-danger"
                        @disabled($item->orders->isNotEmpty())
                      >
                        Удалить</button>
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

 