@extends('layout')

@section('content')
<div class="container">
    <form action="{{route('update.profile')}}" method="post" enctype="multipart/form-data">

        @csrf

        <img src="{{$user->display_picture_link}}" style="width: 200px;height: 200px;" alt="">


        <div class="form-group">
            <label for="">First name</label>
            <input type="text" name="first_name" value="{{$user['first_name']}}" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Middle name</label>
            <input type="text" name="middle_name" value="{{$user['middle_name']}}" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Last name</label>
            <input type="text" name="last_name" value="{{$user['last_name']}}" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" value="{{$user['email']}}" class="form-control">
        </div>

        <div class="d-flex">
            <label for="">Gender</label>

            @foreach($gender as $g)
            <div class="ml-4 form-group form-check">
                <input type="radio" name="gender" value="{{$g->id}}" class="form-check-input" id="">
                <label class="form-check-label" for="">{{$g->gender_desc}}</label>
            </div>
            @endforeach
        </div>


        <div class="form-group">
            <label for="">Role</label>
            <select name="role" id="" class="form-control">
                @foreach($role as $r)
                <option value="{{$r->id}}">{{$r->role_desc}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="">Display Picture</label>
            <input type="file" name="picture" accept="image/*" class="form-control">
        </div>


        @if($errors->any())
        @foreach ($errors->all() as $error)
        <div class="text-danger">{{ $error }}</div>
        @endforeach
        @endif

        <button class="btn btn-primary">Submit</button> <br>
        <a href="{{route('get.login')}}">Already have an account? click here to log in</a>

    </form>
</div>
@endsection