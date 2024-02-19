@extends('layout')

@section('content')
<div class="container">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Author</th>
                <th>Title</th>
            </tr>
        </thead>

        <tbody>
            @foreach($authors as $value)
            <tr>
                <td>{{$value['author']}}</td>
                <td>

                    <a href="{{route('book.detail', ['id' => $value->id])}}">{{$value['title']}}</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection