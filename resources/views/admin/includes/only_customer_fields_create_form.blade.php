<div class="form-group mb-3">
  <label>Имя клиента:</label>
  <input type="text" class="form-control" placeholder="Введите фамилию и имя" name="name" value="{{ old('name') }}">  
  @error('name')
    <small class="form-text text-danger">{{ $message }}</small>                  
  @enderror                     
</div>
<div class="form-group mb-3">
  <label>Телефон клиента</label>
  <input type="text" class="form-control" placeholder="+7 900 00 00" name="phone" value="{{ old('phone') }}">    
  @error('phone')
    <small class="form-text text-danger">{{ $message }}</small>                  
  @enderror                   
</div>
<div class="form-group mb-3">
  <label>Почта клиента</label>
  <input type="email" class="form-control" placeholder="somemail@mail.com" name="email" value="{{ old('email') }}">         
  @error('email')
    <small class="form-text text-danger">{{ $message }}</small>                  
  @enderror              
</div>


  <input type="hidden" name="orderable" value="{{ true }}">
  


