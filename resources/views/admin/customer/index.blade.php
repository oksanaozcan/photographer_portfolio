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
         <x-table 
          :headers="['#', 'Имя', 'Телефон', 'Почта', 'Кол-во заявок', 'Кол-во фото', 'Нет активных заявок', 'Действия']"
        >
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
        </x-table>
        </div>
      </div>     
    </div> 
    
@endsection

 