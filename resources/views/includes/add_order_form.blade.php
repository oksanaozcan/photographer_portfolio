<form class="mb-3" action="{{ route('contact.store') }}" method="POST">
  @csrf
  <div class="form-group mb-3">
    <label>Ваше имя:</label>
    <input type="text" class="form-control" placeholder="Введите фамилию и имя" name="name" value="{{ old('name') }}">  
    @error('name')
      <small class="form-text text-danger">{{ $message }}</small>                  
    @enderror                     
  </div>
  <div class="form-group mb-3">
    <label>Укажите телефон для связи</label>
    <input type="text" class="form-control" placeholder="+7 900 00 00" name="phone" value="{{ old('phone') }}">    
    @error('phone')
      <small class="form-text text-danger">{{ $message }}</small>                  
    @enderror                   
  </div>
  <div class="form-group mb-3">
    <label>Почта</label>
    <input type="email" class="form-control" placeholder="yourmail@mail.com" name="email" value="{{ old('email') }}">         
    @error('email')
      <small class="form-text text-danger">{{ $message }}</small>                  
    @enderror              
  </div>
  <div class="form-group mb-3">
    <label>Локация</label>
    <input type="text" class="form-control" placeholder="Москва, Краснопресненский район" name="location" value="{{ old('location') }}">  
    @error('location')
      <small class="form-text text-danger">{{ $message }}</small>                  
    @enderror                     
  </div>
  <div class="form-group mb-3">
    <label>Дополнительные сведения</label>
    <textarea class="form-control" rows="4" 
      placeholder="Задайте вопрос, оставьте дополнительные контакты, опишите детали фотосъемки и др..." name="description"
    >{{ old('description') }}</textarea>
    @error('description')
      <small class="form-text text-danger">{{ $message }}</small>                  
    @enderror          
  </div>    
  <div class="form-group mb-3">
    <label>Назначьте дату</label>
    <input type="date" class="form-control" name="convenient_date" value="{{ old('convenient_date') }}">             
    @error('convenient_date')
      <small class="form-text text-danger">{{ $message }}</small>                  
    @enderror          
  </div>  
  <div class="form-group mb-3">
    <label>Выберите время</label>
    <input type="time" class="form-control" name="convenient_time" value="{{ old('convenient_time') }}">        
    @error('convenient_time')
      <small class="form-text text-danger">{{ $message }}</small>                  
    @enderror               
  </div>              
  <button type="submit" class="phone-btn">Отправить</button>
</form>