@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">    
      <x-content-header title="Удаленные Темы" path="admin.theme.index" routeTitle="Назад к списку" btnClasses="btn btn-outline-secondary" /> 
    </div>
  </div>  

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">          
      <div class="row">
        <div class="col-sm-12">
          <x-table :headers="['#','Наименование','Дата создания','Дата удаления','Действия']">
            @foreach ($trashedThemes as $item)
              <tr>
                <th>{{ $item->id }}</th>
                <td>{{ $item->title }}</td>
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