<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    {{-- CALL IN THE MAIN HEAD --}}
    @include("layouts.partials.head.mainHead")
    <link href="{{ asset('css/category.css') }}" rel="stylesheet">
</head>

<body>

    @include("layouts.partials.header.mainHeader")

    <div class="container py-3">
        {{--
        <div class="modal" tabindex="-1" role="dialog" id="editCategoryModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Category</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('category.update', $category->id)  }}">
        @csrf
        @method('PUT')

        <div class=" modal-body">
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="" placeholder="Category Name" required>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
    </div>
    </div>
    </div>
    --}}
    <div class="row">
        <div class="col-md-4 mt-4">
            <div class="card">
                <div class="card-header">
                    <h3>Create Category</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        @if($categories->isNotEmpty())
                        <div>
                            Category
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="parent_id" name="parent_id">
                                <option value="">Create New Parent Cateogry</option>
                                <optgroup label="Parent Cateogies">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        @endif
                        <div id="cateogryNameTitle">
                            Parent Category Title
                        </div>
                        <div class="form-group">
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"
                                placeholder="Name" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>Category with this name already exists</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">
                    <h3>Categories</h3>
                </div>
                @if($categories->isNotEmpty())
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($categories as $category)
                        <li class="list-group-item">
                            <div
                                class="d-flex justify-content-between hasChildren {{$category->parent_id == '' ? '' : 'text-info font-weight-bold'}}">
                                {{ $category->name }}
                                <div class="button-group d-flex">
                                    {{--
                                        <button type="button" class="btn btn-sm btn-primary mr-1 edit-category"
                                            data-toggle="modal" data-target="#editCategoryModal"
                                            data-id="{{ $category->id }}"
                                    data-name="{{ $category->name }}">Edit</button>
                                    --}}
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </div>
                            </div>

                            @if($category->children->isNotEmpty())
                            <div class="hasChildren">
                                <a data-toggle="collapse" href="#collapse{{$category->id}}" role="button"
                                    aria-expanded="false" aria-controls="collapse{{$category->id}}" class="">
                                    Sub Categories
                                </a>
                            </div>
                            @else
                            @endif

                            @if ($category->children->isNotEmpty())
                            <div class="collapse" id="collapse{{$category->id}}">
                                <ul class="list-group mt-2 list-unstyled">
                                    <div class="list-group-item">
                                        @foreach ($category->children as $child)
                                        <li class="{{$category->children->count() > 1 ? 'mb-2' : ''}}">
                                            <div class="d-flex justify-content-between">
                                                {{ $child->name }}

                                                <div class="button-group d-flex">
                                                    {{--
                                                    <button type="button"
                                                        class="btn btn-sm btn-primary mr-1 edit-category"
                                                        data-toggle="modal" data-target="#editCategoryModal"
                                                        data-id="{{ $child->id }}"
                                                    data-name="{{ $child->name }}">Edit</button>
                                                    --}}
                                                    <form action="{{ route('category.destroy', $child->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                            class="btn btn-sm btn-outline-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                        @if($category->children->count() > 1)
                                        @if($loop->last)
                                        @else
                                        <hr>
                                        @endif
                                        @endif
                                        @endforeach
                                    </div>
                                </ul>
                            </div>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
                @else
                <div class="card-body">
                    <h5>There are currently no cateogies created. You can only assign articles to sub-categories. To
                        create a sub cateogry you must first create a parent category. </h5>
                </div>
                @endif
            </div>
        </div>
    </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/category.js') }}"></script>
</body>


</html>