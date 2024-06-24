@extends('layout.main')

@section('title', 'Delete Category')

@section('content')
    <h2>Are you sure delete {{$category->name}} ?</h2>
    <div class="mt-5">
        <a href="/category-destroy/{{$category->slug}}" class="btn btn-danger me-5"> sure</a>
        <a href="/categories" class="btn btn-primary">cancel</a>
    </div>
@endsection