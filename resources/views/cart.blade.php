@extends('layout')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
            </tr>
        </thead>

        <tbody>
            @foreach($order as $value)
            <tr>
                <td>
                    <a href="{{route('book.detail', ['id' => $value['Book']['id'] ])}}">{{$value['Book']['title']}}</a>

                    <a href="{{route('order.delete' ,['id' => $value->id ])}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{route('order.submit')}}" class="btn" style="background-color: yellow;">Submit</a>
</div>
@endsection