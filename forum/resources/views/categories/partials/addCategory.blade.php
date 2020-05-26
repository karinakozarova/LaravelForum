<div class="card">
    <div class="card-header">
        <b> Add new category </b>
    </div>

    <div class="card-body">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <select class="form-control" name="parent_id">
                    <option value="">Select upper category or leave empty</option>

                    @foreach ($allCategories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                       placeholder="Category Name" required>
            </div>
            <div class="form-group">
                <input type="text" name="description" class="form-control"
                       value="{{ old('description') }}"
                       placeholder="Category Description" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Create</button>
            </div>
        </form>
    </div>
</div>