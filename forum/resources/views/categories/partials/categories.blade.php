<ul class="list-group">
    @foreach ($categories as $category)
        <li class="list-group-item">
            <div class="d-flex justify-content-between">
                {{ $category->name }}
                {{ $category->description }}

                <div class="button-group d-flex">
                    <button type="button" class="btn btn-sm mr-1 edit-category"
                            data-toggle="modal" data-target="#editCategoryModal"
                            data-id="{{ $category->id }}" data-name="{{ $category->name }}"
                            data-description="{{ $category->description }}"><i
                                class="fas fa-edit"></i>
                    </button>

                    @include('categories.partials.destroyCategory')
                </div>
            </div>

            @if ($category->children)
                <ul class="list-group mt-2">
                    @foreach ($category->children as $child)
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                {{ $child->name }}

                                <div class="button-group d-flex">
                                    <button type="button"
                                            class="btn btn-sm mr-1 edit-category"
                                            data-toggle="modal" data-target="#editCategoryModal"
                                            data-id="{{ $category->id }}"
                                            data-name="{{ $category->name }}"
                                    >
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('category.destroy', $child->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm "><i
                                                    class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>