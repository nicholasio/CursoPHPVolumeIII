@extends('app')

@section('content')
    <form class="form-signin" method="POST" action="/auth/login">
        {!! csrf_field() !!}

        <h2 class="form-signin-heading">Login</h2>

        <label for="email" class="sr-only">Email address</label>

        <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>

        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="remember"> Remember me
          </label>
        </div>

        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Logar">
      </form>
@stop
