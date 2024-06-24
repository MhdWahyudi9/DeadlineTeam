@extends('layout.main')

@section('title', 'Profile')

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Histori Peminjaman Mobil</h4>
            <p class="card-description">
              tampilan histori peminjaman pengguna
            </p>
            <div class="table-responsive">
              <x--rent-log-table :rentlog='$rent_logs' />
            </div>
          </div>
        </div>
      </div>
@endsection