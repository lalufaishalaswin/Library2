@extends('layout')

@section('content')
<div class="container">
    <form action="{{route('login')}}" method="post">
        @csrf
        <h4>Login</h4>

        <div class="form-group">
            <label for="">Email Address</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button class="btn btn-primary">Submit</button> <br>

        <a href="{{route('get.register')}}">Don't have an account? click here to sign up</a>
    </form>
</div>
@endsection