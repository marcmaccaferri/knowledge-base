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
        <div class="form-group">
            @csrf
            <div class="sidebar-container">
                <ul class="sidebar-navigation">
                    <div class="sidebar-logo text-center">ARTICLE SETTINGS</div>
                    <div class="container mt-5">
                        <select class="form-control form-control-sm post_category" id="Post_Category"
                            name="Article_Category">
                            <option selected disabled>Select Main Category...</option>
                            <option value="Service">Service</option>
                            <option value="Retail">Retail</option>
                        </select>
                    </div>
                    <div class="container mt-5">
                        <select class="form-control form-control-sm post_category" id="Article_Sub_Category"
                            name="Article_Sub_Category">
                            <option selected disabled>Select Sub Category...</option>
                            <option value="Invenotry Management">Invenotry Management</option>
                            <option value="Repair Guide">Repair Guide</option>
                            <option value="Point Of Sale">Point Of Sale</option>
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
                <div class="col-lg-12">
                    <div class="form-group">
                        <h4 class="mb-3">Article Title</h4>
                        <input type="text" class="form-control" name="Article_Title" id="Article_Title"
                            placeholder="Enter Article Title" value="{{Request::old('Article_Title')}}">
                    </div>
                </div>
            </div>
            <hr>
            <div class="mt-5">
                <h4>Article Text</h4>
                <textarea name="Article_Body" id="summernote">{{Request::old('Article_Body')}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary float-right mt-3 ">Submit</button>
        </div>
        <input type="hidden" value="{{Auth::user()->id}}" name="User_Id">
    </form>

    <script src="{{ asset('js/article.js') }}"></script>
</body>

@include("layouts.partials.scripts.bootstrap")

</html>