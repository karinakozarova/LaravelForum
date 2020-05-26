@extends('layouts.app')

@section('content')
    @include('categories.partials.alerts')
    <h3 class="center">Categories</h3>

    <div class="container py-3">
        @include('categories.partials.editModal')
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @include('categories.partials.categories')
                    </div>
                    @include('categories.partials.pagination')
                </div>
            </div>
            <div class="col-md-4">
                @include('categories.partials.addCategory')
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('.edit-category').on('click', function () {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var description = $(this).data('description');
            var url = "{{ url('category') }}/" + id;

            $('#editCategoryModal form').attr('action', url);
            $('#editCategoryModal form input[name="name"]').val(name);
            $('#editCategoryModal form input[name="description"]').val(description);
        });
    </script>
@endsection
