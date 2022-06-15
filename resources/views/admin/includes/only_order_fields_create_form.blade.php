<div class="form-group mb-3">
  <label>Локация съемки</label>
  <input type="text" class="form-control" placeholder="Москва, Краснопресненский район" name="location" value="{{ old('location') }}">  
  @error('location')
    <small class="form-text text-danger">{{ $message }}</small>                  
  @enderror                     
</div>
<div class="form-group mb-3">
  <label>Дополнительные сведения</label>
  <textarea class="form-control" rows="4" 
    placeholder="Описание деталей фотосъемки и др..." name="description"
  >{{ old('description') }}</textarea>
  @error('description')
    <small class="form-text text-danger">{{ $message }}</small>                  
  @enderror          
</div>    
<div class="form-group mb-3">
  <label>Дата</label>
  <input type="date" class="form-control" name="convenient_date" value="{{ old('convenient_date') }}">             
  @error('convenient_date')
    <small class="form-text text-danger">{{ $message }}</small>                  
  @enderror          
</div>  
<div class="form-group mb-3">
  <label>Время</label>
  <input type="time" class="form-control" name="convenient_time" value="{{ old('convenient_time') }}">        
  @error('convenient_time')
    <small class="form-text text-danger">{{ $message }}</small>                  
  @enderror               
</div>           

<div class="form-group">
  <label>Статус заявки</label>
  <select class="form-select form-control" name="status">                                
    <option value="new" {{ 'new' == old('status') ? ' selected' : '' }}>new</option>                  
    <option value="processing" {{ 'processing' == old('status') ? ' selected' : '' }}>processing</option>                  
    <option value="completed" {{ 'completed' == old('status') ? ' selected' : '' }}>completed</option>                            
  </select>
  @error('status')
    <small class="form-text text-danger">{{ $message }}</small>                  
  @enderror  
</div>    