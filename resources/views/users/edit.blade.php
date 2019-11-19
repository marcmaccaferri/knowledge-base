<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- CALL IN THE MAIN HEAD --}}
    @include("layouts.partials.head.mainHead")
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>

    @include("layouts.partials.header.mainHeader")<div>
        <div class="container">
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
                        <a href="{{ url()->previous() }}"><button type="button"
                                class="btn btn-outline-danger float-left mt-5 mb-4">Cancel</button></a>
                        <button type="submit" class="btn btn-primary float-right mt-5 mb-4">Submit Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include("layouts.partials.scripts.bootstrap")
    <script src="{{ asset('js/index.js') }}" defer></script>

</body>

</html>
