<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- CALL IN THE MAIN HEAD --}}
    @include("layouts.partials.head.mainHead")
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>

    <div class="modal" tabindex="-1" role="dialog" id="deleteUserModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete User?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <p class="text-center mt-3 ">Are you sure that you want to delete {{$user->name}}? This action can not
                    be
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

    @include("layouts.partials.header.mainHeader")<div>
        <div class="container">
            <a href="/users"><button type="button" class="btn btn-sm btn-outline-secondary mt-3 mb-3"><i
                        class="fa fa-arrow-left" aria-hidden="true"></i> Go
                    Back</button></a>
            <div class="card">
                <div class="card-header">
                    Edit User
                </div>
                <form method="post" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-label-group mt-3">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ $user->name }}" required autocomplete="name" autofocus
                                placeholder="Name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-label-group mt-3">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $user->email }}" required autocomplete="email"
                                placeholder="Email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-label-group mt-3">
                            <label>Role</label>
                            <select id="role" name="role" class="form-control">
                                @if($user->role == "0")
                                <option value="0" selected disabled>User</option>
                                <option value="1">Admin</option>
                                @elseif($user->role == '1')
                                <option value="0">User</option>
                                <option value="1" selected disabled>Admin</option>
                                @else
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                                @endif
                            </select>
                        </div>
                        <div class="row mt-4">
                            <button type="button" class="mx-auto btn btn-outline-danger" data-toggle="modal"
                                data-target="#deleteUserModal" data-id="{{ $user->id }}"
                                data-name="{{ $user->name }}">DELETE</button>
                            <button type="submit" class=" mx-auto btn btn-primary ">Submit
                                Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include("layouts.partials.scripts.bootstrap")
    <script src="{{ asset('js/index.js') }}" defer></script>

</body>

</html>
