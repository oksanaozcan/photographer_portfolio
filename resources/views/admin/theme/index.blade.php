@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->  
  <x-content-header title="Темы" path="admin.theme.create"/> 

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">          
      <div class="row">
        <div class="col-sm-12">
          <table class="table sortable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Описание</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Кол-во фото</th>
                <th scope="col">Действия</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($themes as $item)
                <tr>
                  <th>{{ $item->id }}</th>
                  <td>{{ $item->title }}</td>
                  <td>{{ $item->description }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td>{{ $item->pictures->count() }}</td>
                  <td class="d-flex">
                    <a href={{ route('admin.theme.show', $item->id) }} type="button" class="btn btn-info mr-1">Смотреть</a>
                    <a href={{ route('admin.theme.edit', $item->id) }} type="button" class="btn btn-secondary mr-1">Изменить</a>
                    <form action="{{ route('admin.theme.delete', $item->id) }}" method="POST">
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

 