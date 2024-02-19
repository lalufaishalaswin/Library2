@extends('layout')

@section('content')
<div class="container">
    <h4>
        {{$user->first_name}}
        {{$user->middle_name}}
        {{$user->last_name}}
    </h4>

    <form action="{{route('update.role', ['id' => $id])}}" method="post">
        @csrf
        <select name="role" id="">
            @foreach($role as $r)
            <option value="{{$r->id}}">{{$r->role_desc}}</option>
            @endforeach
        </select>
        <button class="btn">Save</button>
    </form>
</div>
@endsection