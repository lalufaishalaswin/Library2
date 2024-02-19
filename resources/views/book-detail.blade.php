@extends('layout')

@section('content')
<div class="container">
    <h4>E-Book detail</h4>

    <div class="row">
        <div class="col-4">Title</div>
        <div class="col-8">{{$book->title}}</div>
    </div>

    <div class="row">
        <div class="col-4">Author</div>
        <div class="col-8">{{$book->author}}</div>
    </div>

    <div class="row">
        <div class="col-4">Description</div>
        <div class="col-8">{{$book->description}}</div>
    </div>

    <a href="{{route('rent', ['id' => $book->id])}}" style="background-color: yellow;" class="btn mt-3">Rent</a>
</div>
@endsection