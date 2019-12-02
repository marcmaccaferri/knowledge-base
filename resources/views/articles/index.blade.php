<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- CALL IN THE MAIN HEAD --}}
    @include("layouts.partials.head.mainHead")
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>

    @include("layouts.partials.header.mainHeader")

    <div id="searchSection">
        <div class="container justify-content-center text-center">

            <div class="mb-5">
                <h1 class="font-weight-bold text-white">Knowledge Base</h1>
            </div>

            <div>
                @csrf
                <form action="/search" method="get" role="search">
                    <div class="input-group mb-3 mt-3">
                        <input type="text" name="search" class="form-control" placeholder="What do you need help with?">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="button"><i class="fas fa-search text-white"></i></button>
                        </div>
                    </div>
                </form>
            </div>

            @if(Auth::user()->role === 1)
            <div class="mb-0 mt-5">
                <a href="/articles/create" class="btn btn-light mr-3 mt-2"><i class="fas fa-plus pr-3"></i>Create A New
                    Article</a>
                <a href="/category" class="btn btn-light mr-3 mt-2"><i class="fas fa-folder-plus pr-3"></i></i>Manage
                    Categories</a>
                <a href="/users" class="btn btn-light mt-2"><i class="fas fa-users pr-3"></i></i>Manage
                    Users</a>
            </div>
            @endif
        </div>
    </div>

    <div class="container mt-4">
        <div class="mx-auto">
            @include("layouts.partials.main.success")
        </div>
        <div class="row mt-5">

            @foreach($categories as $category)
            @if($category->articles->count() != 0)
            <div class="col-md-4 mb-5">
                <h5 class="categoryTitle"><a href="#">{{$category->name}} <small
                            class="text-muted">({{ $category->articles->count() }})</small></a></h5>
                <hr>
                <ul>
                    @foreach($articles as $article)
                    @if($article->category_id == $category->id)
                    <li>
                        <h5 class="articleTitle"><a href="/articles/{{$article->id}}">{{$article->Article_Title}}</a>
                        </h5>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    @include("layouts.partials.scripts.bootstrap")
    <script src="{{ asset('js/index.js') }}" defer></script>

</body>

</html>