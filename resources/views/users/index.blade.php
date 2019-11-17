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
        @foreach($users as $user)
        <div class="modal" tabindex="-1" role="dialog" id="editUserModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('users.update', $user->id)  }}">
                        @csrf
                        @method('PUT')
                        <div class=" modal-body">
                            <div class="form-group">
                                <select id="role" name="role" class="form-control">
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

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
                        <td><button type="button" class="btn btn-sm btn-outline-primary edit-category float-right"
                                data-toggle="modal" data-target="#editUserModal" data-id="{{ $user->id }}"
                                data-name="{{ $user->name }}">EDIT</button></td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-outline-danger">DELETE</button>
                            </form>
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
