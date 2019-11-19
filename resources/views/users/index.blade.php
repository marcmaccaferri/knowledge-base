<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- CALL IN THE MAIN HEAD --}}
    @include("layouts.partials.head.mainHead")
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>

    @include("layouts.partials.header.mainHeader")

    <div class="container mt-3">
        @include("layouts.partials.main.success")
        <div class="row mt-2 mb-5">
            <a href="/register" class="btn btn-dark mt-2"><i class="fas fa-plus pr-3"></i></i>Register New
                User</a>
        </div>
        <div class="row mt-3">
            <div class="table-responsive">
                <table class="table table-striped table-hover">

                    <thead class="bg-info">
                        <tr class="d-flex">
                            <th class="col-1"></th>
                            <th class="col-1 text-white">ID</th>
                            <th class="col-4 text-white">Name</th>
                            <th class="col-4 text-white">Email</th>
                            <th class="col-2 text-white">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="d-flex">
                            <td class="col-1"><a href="users/{{$user->id}}/edit"
                                    class="btn btn-sm btn-primary edit-category float-right">EDIT</a></td>
                            <td class="col-1">{{$user->id}}</td>
                            <td class="col-4">{{$user->name}}</td>
                            <td class="col-4">{{$user->email}}</td>
                            @if($user->role === 1)
                            <td class="col-2">Admin</td>
                            @else
                            <td class="col-2">User</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include("layouts.partials.scripts.bootstrap")
    <script src="{{ asset('js/index.js') }}" defer></script>

</body>

</html>
