@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Форма для добавления фотографий</h1>
        </div>
        <div class="col-sm-6 d-flex flex-row-reverse">
          <a href={{ route('admin.picture.index') }} type="button" class="btn btn-outline-secondary">Назад к списку</a>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-sm-6 mt-2">
          <form action={{ route('admin.picture.store') }} method="POST" enctype="multipart/form-data">
            @csrf

            


            
           
            <button type="submit" class="btn btn-primary">Добавить</button>
          </form>
        </div>
      </div>
    </div>
  </div>  

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">     
      <div class="row">
        
       
      </div>     
    </div>   
@endsection