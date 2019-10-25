<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- CALL IN THE MAIN HEAD --}}
    @include("layouts.partials.head.mainHead")
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
    <hr>
    <div class="container mt-4 mb-5">
        <div class="mt-5 mb-5">
            {!! $article->Article_Body !!}
        </div>
    </div>
    <hr>
    <div id="articleTitleBar" class="mt-5 mb-3">
        <div class="container mt-4">
            <div class="row">
                <div class="col-6 text-right">
                    <p><i class="fas fa-users"></i> {{ ucfirst($user->name) }}</p>
                </div>
                <div class="col-6">
                    <p><i class="fas fa-calendar"></i> {{date('m-d-Y', strtotime($article->updated_at))}}</p>
                </div>
            </div>
        </div>
    </div>
    @if($user->role == 1)
    <div class="container text-center">
        <a href="{{$article->id}}/edit"><i class="fas fa-pencil-alt"></i> Edit This Article</a>
    </div>
    @endif



</body>

</html>