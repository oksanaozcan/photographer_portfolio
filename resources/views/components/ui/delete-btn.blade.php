<form action="{{ route($path, $id) }}" method="POST">
  @csrf
  @method('DELETE')
  <button type="submit" class="btn btn-danger">Удалить</button>
</form>  