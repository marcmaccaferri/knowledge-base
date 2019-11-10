<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- CALL IN THE MAIN HEAD --}}
    @include("layouts.partials.head.mainHead")
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>

    @include("layouts.partials.header.mainHeader")

    <div class="mt-5">
        <div class="row">
            <div class="col-1 text-right">
                <a href="/articles">
                    <h2><i class="fas fa-arrow-left"></i></h2>
                </a>
            </div>
            <div class="col-11">
                <h2 class="font-weight-bold">{{ ucfirst($article->Article_Title) }}</h2>
            </div>
        </div>
    </div>
    <div class="ml-5">
        <small>
            <div class="ml-4">Article by <span style="font-weight:900">{{ ucfirst($user->name) }}</span>.</div>
            <div class="ml-4">
                Created on <span>{{date('m/d/Y', strtotime($article->created_at))}}</span>.
                Updated on <span>{{date('m/d/Y', strtotime($article->updated_at))}}</span>.
            </div>
        </small>
    </div>
    <hr>
    <div class="container mt-4 mb-5">
        <div class="mt-5 mb-5">
            {!! $article->Article_Body !!}
        </div>
    </div>
    <hr>
    @if($user->role == 1)
    <div class="container text-center">
        <a href="{{$article->id}}/edit"><i class="fas fa-pencil-alt"></i> Edit This Article</a>
    </div>
    @endif



</body>

</html>