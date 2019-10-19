<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- CALL IN THE MAIN HEAD --}}
    @include("layouts.partials.head.mainHead")
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <link href="{{ asset('css/post.css') }}" rel="stylesheet">

</head>

<body>

    <form method="POST">
        <div class="form-group">
            <div class="sidebar-container">
                <ul class="sidebar-navigation">
                    <div class="sidebar-logo text-center">ARTICLE SETTINGS</div>
                    <div class="container mt-5">
                        <select class="form-control form-control-sm post_category" id="Post_Category"
                            name="Post_Category">
                            <option selected disabled>Select Main Category...</option>
                            <option value="Service">Service</option>
                            <option value="Retail">Retail</option>
                        </select>
                    </div>
                    <div class="container mt-5">
                        <select class="form-control form-control-sm post_category" id="Post_Sub_Category"
                            name="Post_Sub_Category">
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

        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="form-group">
                        <h4 for="Article_Title mb-3">Article Title</h4>
                        <input type="text" class="form-control" id="Article_Title" placeholder="Enter Article Title">
                    </div>
                </div>
            </div>
            <hr>
            <div class="mt-5">
                <h4>Article Text</h4>
                <textarea id="summernote"></textarea>
            </div>
            <button type="submit" class="btn btn-primary float-right mt-3 ">Submit</button>
        </div>
    </form>
    <script src="{{ asset('js/article.js') }}"></script>
</body>

@include("layouts.partials.scripts.bootstrap")

</html>