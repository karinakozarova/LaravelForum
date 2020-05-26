<ul class="list-group">
    @foreach ($categories as $category)
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{ $category->name }}</h5>
                <small>
                    <div class="button-group d-flex">
                        <button type="button" class="btn btn-sm mr-1 edit-category"
                                data-toggle="modal" data-target="#editCategoryModal"
                                data-id="{{ $category->id }}" data-name="{{ $category->name }}"
                                data-description="{{ $category->description }}"><i
                                    class="fas fa-edit"></i>
                        </button>
                        @include('categories.partials.destroyCategory')
                    </div>
                </small>
            </div>
            <p class="mb-1"> {{$category->description}}</p>
        </a>

        @if (count($category->children) > 0)
        <li class="list-group-item">
                <ul class="list-group mt-2">
                    @foreach ($category->children as $child)
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $child->name }}</h5>
                                <small>
                                    <div class="button-group d-flex">
                                        <button type="button"
                                                class="btn btn-sm mr-1 edit-category"
                                                data-toggle="modal" data-target="#editCategoryModal"
                                                data-id="{{ $child->id }}"
                                                data-name="{{ $child->name }}"
                                                data-description="{{ $child->description }}"
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
                                </small>
                            </div>
                            <p class="mb-1"> {{$child->description}}</p>
                        </a>
                    @endforeach
                </ul>
        </li>
        @endif
    @endforeach
</ul>