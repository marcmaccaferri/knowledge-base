<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- CALL IN THE MAIN HEAD --}}
    @include("layouts.partials.head.mainHead")
    @include("layouts.partials.head.summernote")
    <link href="{{ asset('css/post.css') }}" rel="stylesheet">

</head>

<body>
    <form method="post" action="{{ route('articles.store') }}">
        @csrf
        <div class="form-group">
            @csrf
            <div class="sidebar-container">
                <ul class="sidebar-navigation">
                    <div class="sidebar-logo text-center"><i class="fas fa-user"></i> {{Auth::user()->name}}</div>
                    <div class="container mt-5">
                        <label for="category_id" class="post_category">Category</label>
                        <select class="form-control post_category" name="category_id" required>
                            <option value="">Select a Category</option>

                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == old('category_id') ? 'selected' : '' }}>
                                {{ $category->name }}</option>

                            @if ($category->children)
                            @foreach ($category->children as $child)
                            <option value="{{ $child->id }}" {{ $child->id == old('category_id') ? 'selected' : '' }}>
                                &nbsp;&nbsp;{{ $child->name }}</option>
                            @endforeach
                            @endif
                            @endforeach
                        </select>
                    </div>
                </ul>
            </div>
        </div>

        <div class="container justify-content-center text-center">
            <div>
                <h2>Create A New Article</h2>
            </div>
        </div>

        @if ($errors->any())
        <div class="container mt-5">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div><br />
        @endif

        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-9">
                    <div class="form-group">
                        <h4 class="mb-3">Title</h4>
                        <input type="text" class="form-control" name="Article_Title" id="Article_Title"
                            placeholder="Enter Article Title" value="{{Request::old('Article_Title')}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4 class="mb-3">Category</h4>
                    <select class="form-control" name="category_id" required>
                        <option value="">Select a Category</option>

                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                            {{ $category->name }}</option>

                        @if ($category->children)
                        @foreach ($category->children as $child)
                        <option value="{{ $child->id }}" {{ $child->id == old('category_id') ? 'selected' : '' }}>
                            &nbsp;&nbsp;{{ $child->name }}</option>
                        @endforeach
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <hr>
            <div class="mt-5">
                <h4>Body</h4>
                <textarea name="Article_Body" id="summernote">{{Request::old('Article_Body')}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary float-right mt-3 ">Submit</button>
        </div>
        <input type="hidden" value="{{Auth::user()->id}}" name="User_Id">
    </form>

    <script src="{{ asset('js/article.js') }}"></script>
    @include("layouts.partials.scripts.bootstrap")

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

</body>

</html>