<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- CALL IN THE MAIN HEAD --}}
    @include("layouts.partials.head.mainHead")
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>

    @include("layouts.partials.header.mainHeader")

    <div class="container mt-4">
        @include("layouts.partials.main.success")
        <div class="row mt-5">
            <table class="table table-striped table-hover">

                <thead>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        @if($user->role === 1)
                            <td>Admin</td>
                        @else
                            <td>User</td>
                        @endif
                        <td><button class="btn btn-sm btn-outline-primary float-right">EDIT</button></td>
                        <td><button class="btn btn-sm btn-outline-danger">DELETE</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include("layouts.partials.scripts.bootstrap")
    <script src="{{ asset('js/index.js') }}" defer></script>

</body>

</html>