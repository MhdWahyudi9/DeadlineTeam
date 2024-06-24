@extends('layout.main')

@section('title', 'Deleted Mobil')

@section('content')
    <div>
        <div class="mt-5 col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h2 class="text-dark text-border">Delete Mobil List</h2>
                <p class="card-description">
                  Admin Dapat mengembalikan data mobil yang telah di hapus
                </p>
                <a href="mobil" class="mt-4 mb-4 btn btn-rounded btn-primary mt-5">Back</a>
                <div class="mt-5">
                  @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                  @endif
                </div>
                <div class="table-responsive mt-5 ">
                  <table class="table">
                    <thead >
                      <tr>
                        <th>
                          No.
                        </th>
                        <th>
                          Code
                        </th>
                        <th>
                          Title
                        </th>
                        <th>
                          Action
                        </th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($deletedMobil as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->mobil_code}} </td>
                            <td>{{$item->title}}</td>
                            <td>
                                <a href="mobil-restore/{{$item->slug}} " class="btn btn-warning btn-rounded btn-fw">Restore</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection