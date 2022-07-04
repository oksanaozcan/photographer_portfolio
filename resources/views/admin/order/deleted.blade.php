@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">      
      <x-content-header title="Удаленные Заявки" path="admin.order.index" routeTitle="Назад к списку" btnClasses="btn btn-outline-secondary" /> 
    </div>
  </div>  

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">          
      <div class="row">
        <div class="col-sm-12">
          <x-table :headers="['#', 'Описание', 'Дата создания', 'Дата удаления', 'Действия']">
            @foreach ($trashedOrders as $item)
              <tr>
                <th>{{ $item->id }}</th>
                <td>{{ $item->description }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->deleted_at }}</td>
                <td class="d-flex"></td>
              </tr>                         
            @endforeach    
          </x-table>         
        </div>
      </div>     
    </div>   
@endsection