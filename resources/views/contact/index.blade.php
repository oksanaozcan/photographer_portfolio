@extends('layouts.main_app')

@section('content')
  <div class="container">        
    @include('includes.navbar')   

    <section class="section contact row mt-3">
      <div class="row mt-3 mb-3">
        <div class="col-12 col-sm-3 align-self-start mb-3">
          <h3>Для заказа фотосъемки: </h3>   
          <h6>свяжитесь со мной по телефону: </h6>
          <a class="btn btn-primary mb-3" href="tel:+79000000">+7 900 00 00</a>
        </div>
        <div class="col-12 col-sm-6 align-self-center">
          <h3>Или оставьте заявку: </h3>   
          <form class="mb-3" action="#" method="POST">
            @csrf
            <div class="form-group mb-3">
              <label>Ваше имя:</label>
              <input type="text" class="form-control" placeholder="Введите фамилию и имя" name="name">             
            </div>
            <div class="form-group mb-3">
              <label>Укажите телефон для связи</label>
              <input type="text" class="form-control" placeholder="+7 900 00 00" name="phone">             
            </div>
            <div class="form-group mb-3">
              <label>Почта</label>
              <input type="email" class="form-control" placeholder="yourmail@mail.com" name="email">             
            </div>
            <div class="form-group mb-3">
              <label>Локация</label>
              <input type="text" class="form-control" placeholder="Москва, Краснопресненский район" name="location">             
            </div>
            <div class="form-group mb-3">
              <label>Дополнительные сведения</label>
              <textarea class="form-control" rows="4" 
                placeholder="Задайте вопрос, оставьте дополнительные контакты, опишите детали фотосъемки и др..." name="description"
              ></textarea>
            </div>    
            <div class="form-group mb-3">
              <label>Назначьте дату</label>
              <input type="date" class="form-control" name="convenient_date">             
            </div>  
            <div class="form-group mb-3">
              <label>Выберите время</label>
              <input type="time" class="form-control" name="convenient_time">             
            </div>  
            <button type="submit" class="btn btn-primary mt-3">Отправить</button>
          </form>
        </div>
        <div class="col-12 col-sm-3 align-self-end mb-3">
          One of three columns
        </div>
      </div>
    </section>      
  </div>    
@endsection