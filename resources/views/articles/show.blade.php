<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- CALL IN THE MAIN HEAD --}}
    @include("layouts.partials.head.mainHead")
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>

    @include("layouts.partials.header.mainHeader")
    <div class="container pt-5 pb-5 mt-5" style="background-color:white;">
        <div class="mt-5">
            <h2 class="font-weight-bold ml-3 mb-3"> {{ ucfirst($article->Article_Title) }}</h2>
        </div>
        <div class="ml-3">
            <small>
                {{date('m/d/Y', strtotime($article->updated_at))}} <span class="pl-2 pr-2">|</span>
                {{ ucfirst($user->name) }} @if(Auth::user()->role === 1) <span class="pl-2 pr-2">|</span> <a
                    href="{{$article->id}}/edit">Edit</a>@endif
            </small>
        </div>
        <hr>
        <div class="mt-4 mb-4 ml-3">
            {!! $article->Article_Body !!}
        </div>
    </div>


    @include("layouts.partials.scripts.bootstrap")
    <script src="{{ asset('js/index.js') }}" defer></script>

</body>

</html>