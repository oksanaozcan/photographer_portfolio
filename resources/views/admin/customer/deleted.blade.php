@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">      
      <x-content-header title="Удаленные Клиенты" path="admin.customer.index" routeTitle="Назад к списку" btnClasses="btn btn-outline-secondary" /> 
    </div>
  </div>  

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">          
      <div class="row">
        <div class="col-sm-12">
          <x-table :headers="['#', 'Имя', 'Дата регистрации', 'Дата удаления', 'Действия']">
            @foreach ($trashedCustomers as $item)
              <tr>
                <th>{{ $item->id }}</th>
                <td>{{ $item->name }}</td>
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