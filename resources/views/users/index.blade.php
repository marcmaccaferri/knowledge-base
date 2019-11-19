<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- CALL IN THE MAIN HEAD --}}
    @include("layouts.partials.head.mainHead")
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>

    @include("layouts.partials.header.mainHeader")
    {{--
    <div class="modal" tabindex="-1" role="dialog" id="deleteUserModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete User?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <p class="text-center">Are you sure that you want to delete {{$user->name}}? This action can not be
    undone.</p>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">CANCEL</button>
        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">DELETE</button>
        </form>
    </div>
    </div>
    </div>
    </div>
    --}}

    <div class="container mt-4">
        @include("layouts.partials.main.success")
        <div class="row mt-5">
            <a href="/register" class="btn btn-dark mt-2"><i class="fas fa-plus pr-3"></i></i>Register New User</a>
        </div>
        <div class="row mt-3">
            <table class="table table-striped table-hover">

                <thead>
                    <th>ID</th>
                    <th>Name</th>
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
                        <td><a href="users/{{$user->id}}/edit"
                                class="btn btn-sm btn-primary edit-category float-right">EDIT</a>
                        </td>
                        <td>
                            @if($user->id != Auth::user()->id )
                            <button type="button" class="btn btn-sm btn-outline-danger float-left" data-toggle="modal"
                                data-target="#deleteUserModal" data-id="{{ $user->id }}"
                                data-name="{{ $user->name }}">DELETE</button>
                            @else
                            <small>Current User</small>
                            @endif
                        </td>
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
