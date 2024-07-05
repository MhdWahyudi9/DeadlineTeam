@extends('layout.main')

@section('title', 'Delete Mobil')

@section('content')
    <h2 class="font-weight-bold mt-4 text-center">Yakin ingin Mengahapus Mobil {{$mobil->title}}  dari toko?</h2>
    <div class="mt-5 text-center">
        <a href="/mobil-destroy/{{$mobil->slug}}" class="btn btn-danger me-5 font-weight-bold"> Hapus</a>
        <a href="/mobil" class="btn btn-primary font-weight-bold">Batal</a>
    </div>
@endsection