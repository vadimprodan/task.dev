@extends('admin.layouts.base')

@section('title', 'Login')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <div class="card text-center">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul class="mb-0 pl-4">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-login" method="POST" action="{{ route('admin.login') }}">
                            {{ csrf_field() }}
                            <label for="inputUsername" class="sr-only">Username</label>
                            <input type="text" id="inputUsername" name="username" class="form-control glue-down" placeholder="Username" required autofocus>
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" id="inputPassword" name="password" class="form-control glue-up" placeholder="Password" required>
                            <div class="checkbox mb-3">
                                <label>
                                    <input type="checkbox" value="remember"> Remember me
                                </label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fa fa-btn fa-sign-in"></i> Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
