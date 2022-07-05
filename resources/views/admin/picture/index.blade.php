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
          <x-table :headers="['#','Путь','Размер(mb)','Тема','Клиент','Дата загрузки','Действия']">
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
                  <x-ui.show-btn path='admin.picture.show' :id="$item->id" >Смотреть</x-ui.show-btn>               
                  <x-ui.edit-btn path='admin.picture.edit' :id="$item->id" >Изменить</x-ui.show-btn>                     
                  <x-ui.delete-btn path='admin.picture.delete' :id="$item->id" />                                            
                </td>
              </tr>                         
            @endforeach        
          </x-table>          
        </div>
      </div>     
    </div> 
    
@endsection

 