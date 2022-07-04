@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->  
  <x-content-header title="Фотографии" path="admin.picture.create"/> 

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">          
      <div class="row">
        <div class="col-sm-12">
          <table class="table sortable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Путь</th>
                <th scope="col">Размер(mb)</th>
                <th scope="col">Тема</th>
                <th scope="col">Клиент</th>               
                <th scope="col">Дата загрузки</th>
                <th scope="col">Действия</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pictures as $item)
                <tr>
                  <td>
                    <img style="width:100px;" src="{{ url($item->url) }}"/>                    
                  </td>
                  <td>{{ $item->url }}</td>
                  <td>{{ $item->size }}</td>
                  <td>{{ $item->theme !== null ? $item->theme->title : 'deleted' }}</td>
                  <td>{{ $item->customer !== null ? $item->customer->name : 'deleted' }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td class="d-flex">
                    <a href={{ route('admin.picture.show', $item->id) }} type="button" class="btn btn-info mr-1">Смотреть</a>
                    <a href={{ route('admin.picture.edit', $item->id) }} type="button" class="btn btn-secondary mr-1">Изменить</a>
                    <form action="{{ route('admin.picture.delete', $item->id) }}" method="POST">
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

 