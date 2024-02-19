@extends('layout')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Account</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $value)
            <tr>
                <td>
                    {{$value['first_name']}}
                    {{$value['middle_name']}}
                    {{$value['last_name']}} -
                    {{$value['Role']['role_desc']}}
                </td>
                <td>
                    <a href="{{route('get.update.role', ['id' => $value->id])}}">Update Role</a> <br>
                    <a href="{{route('book.detail', ['id' => $value->id])}}">Delete Role</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection