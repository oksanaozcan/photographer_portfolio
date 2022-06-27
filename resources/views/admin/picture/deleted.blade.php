@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Удаленные Фото</h1>
        </div>
        {{-- <div class="col-sm-6 d-flex flex-row-reverse">
          <a href={{ route('admin.fertilizers.create') }} type="button" class="btn btn-primary">Добавить вид</a>
        </div> --}}
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
                <th scope="col">Тема</th>
                <th scope="col">Клиент</th>
                <th scope="col">Дата загрузки</th>
                <th scope="col">Дата удаления</th>
                <th scope="col">Действия</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($trashedPictures as $item)
                <tr>
                  <td>
                    <img style="width:100px;" src="{{ url($item->url) }}"/>                    
                  </td>
                  <td>{{ $item->theme !== null ? $item->theme->title : 'deleted' }}</td>
                  <td>{{ $item->customer->name }}</td>
                  <td>{{ $item->created_at }}</td>                
                  <td>{{ $item->deleted_at }}</td>
                  <td class="d-flex">
                    {{-- <a href={{ route('admin.fertilizers.show', $item->id) }} type="button" class="btn btn-info mr-1">Смотреть</a>
                    <a href={{ route('admin.fertilizers.edit', $item->id) }} type="button" class="btn btn-secondary mr-1">Изменить</a>
                    <form action="{{ route('admin.fertilizers.delete', $item->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>                     --}}
                  </td>
                </tr>                         
              @endforeach                   
            </tbody>
          </table>
        </div>
      </div>     
    </div>   
@endsection