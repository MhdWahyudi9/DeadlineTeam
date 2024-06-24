@extends('layout.main')

@section('title', 'Delete User')

@section('content')
    <h2>Apakah kamu yakin ingin menghapus pengguna dengan nama {{$user->username}} ?</h2>
    <div class="mt-5">
        <a href="/user-destroy/{{$user->slug}}" class="btn btn-danger me-5"> sure</a>
        <a href="/users" class="btn btn-primary">cancel</a>
    </div>
@endsection