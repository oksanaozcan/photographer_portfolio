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
                <x-ui.show-btn path='admin.customer.show' :id="$item->id" >Смотреть</x-ui.show-btn>               
                <x-ui.edit-btn path='admin.customer.edit' :id="$item->id" >Изменить</x-ui.show-btn>                  
                <x-ui.delete-btn path='admin.customer.delete' :id="$item->id" :disabled="$item->orders->isNotEmpty()"/>              
              </td>
            </tr>                         
          @endforeach                
        </x-table>
        </div>
      </div>     
    </div> 
    
@endsection

 