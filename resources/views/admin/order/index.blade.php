@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->  
  <x-content-header title="Заявки" path="admin.order.create" routeTitle="Добавить заявку и клиента" /> 
  <div class="row mr-2 mb-2">
    <div class="col-sm-6"></div>
    <div class="col-sm-6 d-flex flex-row-reverse">
      <a href={{ route('admin.order.create-single-order') }} type="button" class="btn btn-primary">Добавить только заявку</a>
    </div>    
  </div>
  

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">          
      <div class="row">
        <div class="col-sm-12">
          <x-table :headers="['#', 'Клиент', 'Локация', 'Желаемая дата', 'Статус', 'Действия']">
            @foreach ($orders as $item)
              <tr>
                <th>{{ $item->id }}</th>
                <td>{{ $item->customer !== null ? $item->customer->name : 'удален' }}</td>                                  
                <td>{{ $item->location }}</td>                                  
                <td>{{ $item->convenient_date }}</td>
                <td>{{ $item->status }}</td>                         
                <td class="d-flex">
                  <x-ui.show-btn path='admin.order.show' :id="$item->id" >Смотреть</x-ui.show-btn>   
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle mr-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Изменить
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href={{ route('admin.order.edit', $item->id) }}>Вместе с клиентом</a>
                      <a class="dropdown-item" href={{ route('admin.order.edit-single-order', $item->id) }}>Данные заявки</a>
                    </div>
                  </div>

                  <form action="{{ route('admin.order.delete', $item->id) }}" method="POST">
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

 