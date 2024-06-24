@extends('layout.main')

@section('title', 'Rent_log')

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h3 >List Histori Peminjaman</h3>
            <p class="card-description">
              <code>Admin dapat melihat histori peminjaman mobil</code>|Tabel|
              <code class="text-secondary">Putih</code>|belum dikembalikan
              <code class="text-success">Hijau</code>|Tepat waktu|sebelum lewat 3 hari
              <code class="text-danger">Merah</code>|Terlambat| lewat dari 3 hari
            </p>
            <div class="table-responsive">
              <x--rent-log-table :rentlog='$rent_logs' />
            </div>
          </div>
        </div>
    </div>
@endsection