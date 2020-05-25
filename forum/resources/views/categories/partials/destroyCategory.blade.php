<form action="{{ route('category.destroy', $category->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm"><i class="fas fa-trash"></i></button>
</form>