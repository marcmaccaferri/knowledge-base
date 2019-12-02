<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- CALL IN THE MAIN HEAD --}}
    @include("layouts.partials.head.mainHead")
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>

    @include("layouts.partials.header.mainHeader")
    <div class="container">
        <div class="mt-2 mb-5">
            <h3 class="mb-5"><a href="javascript:history.back()"><i class="fas fa-arrow-left pr-3"></i></a> Search
                results for article
                titles containing "{{$search}}"</h3>
            @foreach($articles as $article)
            <div class="pt-3 pb-1">
                <a href="articles/{{$article->id}}">
                    <h5>{{$i++}}. {{$article->Article_Title}}</h5>
                </a>
            </div>
            <hr>
            @endforeach
        </div>
        {{ $articles->links() }}
    </div>
    @include("layouts.partials.scripts.bootstrap")

</body>

</html>