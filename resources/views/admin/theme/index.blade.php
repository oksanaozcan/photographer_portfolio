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
          <x-table :headers="['#','Наименование','Описание','Дата создания','Кол-во фото','Действия']">
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
          </x-table>          
        </div>
      </div>     
    </div> 
    
@endsection

 