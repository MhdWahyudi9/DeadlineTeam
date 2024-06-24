@extends('layout.main')

@section('title', 'Delete Mobil')

@section('content')
    <h2>Are you sure to delete Mobil{{$mobil->title}} ?</h2>
    <div class="mt-5">
        <a href="/mobil-destroy/{{$mobil->slug}}" class="btn btn-danger me-5"> sure</a>
        <a href="/mobil" class="btn btn-primary">cancel</a>
    </div>
@endsection