<div class="form-group mb-3">
  <label>Локация съемки</label>
  <input type="text" class="form-control" name="location" value="{{ $order->location }}">  
  @error('location')
    <small class="form-text text-danger">{{ $message }}</small>                  
  @enderror                     
</div>
<div class="form-group mb-3">
  <label>Дополнительные сведения</label>
  <textarea class="form-control" rows="4" 
    name="description"
  >{{ $order->description }}</textarea>
  @error('description')
    <small class="form-text text-danger">{{ $message }}</small>                  
  @enderror          
</div>    
<div class="form-group mb-3">
  <label>Дата</label>
  <input type="date" class="form-control" name="convenient_date" value="{{ $order->convenient_date }}">             
  @error('convenient_date')
    <small class="form-text text-danger">{{ $message }}</small>                  
  @enderror          
</div>  
<div class="form-group mb-3">
  <label>Время</label>
  <input type="time" class="form-control" name="convenient_time" value="{{ $order->convenient_time }}">        
  @error('convenient_time')
    <small class="form-text text-danger">{{ $message }}</small>                  
  @enderror               
</div>           

<div class="form-group">
  <label>Статус заявки</label>
  <select class="form-select form-control" name="status">                                
    <option value="new" {{ $order->status == 'new' ? ' selected' : '' }}>new</option>                  
    <option value="processing" {{ $order->status == 'processing' ? ' selected' : '' }}>processing</option>                  
    <option value="completed" {{ $order->status == 'completed' ? ' selected' : '' }}>completed</option>                            
  </select>
  @error('status')
    <small class="form-text text-danger">{{ $message }}</small>                  
  @enderror  
</div>       