@extends('layouts.app')

@section('content')

    <div class="container py-3">
        <h5> Category info: </h5>
        <div class="row">
            <div class="col-md">
                    <div class="card-body">
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $category->name }}</h5>
                                @if ($category->author_id == Auth::id())
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
                                @endif
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
                                                @if ($child->author_id == Auth::id())
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
                                                @endif
                                            </div>
                                            <p class="mb-1"> {{$child->description}}</p>
                                        </a>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <h5> Threads: </h5>

        <div class="row">
        @foreach($threads as $thread)
                <div class="col-md-4">
                    <div class="card" style="margin-bottom: 1rem">
                        <div class="card-header">
                            <h5>{{ $thread->title }}  <span class="text-muted h5">({{ $thread->category ? $thread->category->name : 'Uncategorized' }})</span></h5>
                            <p> Created by {{ $thread->author->name }}</p>
                            @if ($thread->thumbnail !== null)
                                <img src="/images/thumbnails/{{ $thread->thumbnail }}" style="height: 150px;"/>
                            @endif
                        </div>
                        <div class="card-body">
                            <p>{!! parsedown(Str::limit($thread->description, 100, '...')) !!}</p>
                            <a href="{{ route('threads.show', $thread->id) }}" class="btn btn-primary btn-block">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

<a href="{{@route("category.index")}}" class="btn btn-block"> Go back to all categories </a>
@endsection
