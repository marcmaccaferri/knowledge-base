<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- CALL IN THE MAIN HEAD --}}
    @include("layouts.partials.head.mainHead")
    @include("layouts.partials.head.summernote")
    <link href="{{ asset('css/post.css') }}" rel="stylesheet">

</head>

<body>
    <form method="post" action="{{ route('articles.update', $article->id) }}">
        <div class="form-group">
            @csrf
            @method('PATCH')
            <div class="sidebar-container">
                <ul class="sidebar-navigation">
                    <div class="sidebar-logo text-center">ARTICLE SETTINGS</div>
                    <div class="container mt-5">
                        <select class="form-control form-control-sm post_category" id="Post_Category"
                            name="Article_Category">
                            @if(isset($article->Article_Category))
                            <option selected>{{$article->Article_Category}}</option>
                            @else
                            <option selected disabled>Select Main Category...</option>
                            @endif
                            @if($article->Article_Category != 'Service')
                            <option value="Service">Service</option>
                            @endif
                            @if($article->Article_Category != 'Retail')
                            <option value="Retail">Retail</option>
                            @endif
                        </select>
                    </div>
                    <div class="container mt-5">
                        <select class="form-control form-control-sm post_category" id="Article_Sub_Category"
                            name="Article_Sub_Category">
                            @if(isset($article->Article_Sub_Category))
                            <option selected>{{$article->Article_Sub_Category}}</option>
                            @else
                            <option selected disabled>Select Main Category...</option>
                            @endif
                            @if($article->Article_Sub_Category != 'Invenotry Management')
                            <option value="Invenotry Management">Invenotry Management</option>
                            @endif
                            @if($article->Article_Sub_Category != 'Repair Guide')
                            <option value="Repair Guide">Repair Guide</option>
                            @endif
                            @if($article->Article_Sub_Category != 'Point Of Sale')
                            <option value="Point Of Sale">Point Of Sale</option>
                            @endif
                        </select>
                    </div>
                </ul>
            </div>
        </div>

        <div class="container justify-content-center text-center">
            <div>
                <h2>Edit Article</h2>
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
                <div class="col-lg-12">
                    <div class="form-group">
                        <h4 class="mb-3">Article Title</h4>
                        <input type="text" class="form-control" name="Article_Title" id="Article_Title"
                            placeholder="Enter Article Title" value="{{ $article->Article_Title }}">
                    </div>
                </div>
            </div>
            <hr>
            <div class="mt-5">
                <h4>Article Text</h4>
                <textarea name="Article_Body" id="summernote">{{ $article->Article_Body }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary float-right mt-3 ">Submit</button>
        </div>
        <input type="hidden" value="{{Auth::user()->id}}" name="User_Id">
    </form>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
        Delete
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Deleting this article is permanent, once deleted you will no longer be able to access.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('articles.destroy', $article->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/article.js') }}"></script>
</body>

@include("layouts.partials.scripts.bootstrap")

</html>