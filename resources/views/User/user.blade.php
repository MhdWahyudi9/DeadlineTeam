@extends('layout.main')

@section('title', 'User')

@section('content')
    <div>
        <div class="mt-5 col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h2 class="text-dark text-border">User List</h2>
                <p class="card-description">
                  List Pengguna yang telah di approve Admin
                </p>
                <a href="/user-banned" class="mt-4 mb-4 btn btn-rounded btn-secondary mt-5 ">View Banned User</a>
                <a href="/registered-users" class="mt-4 mb-4 btn btn-rounded btn-primary mt-5">Pengguna Baru</a>
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
                          Username
                        </th>
                        <th>
                          Phonek
                        </th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->username}} </td>
                            <td>
                                @if ($item->phone)
                                    {{$item->phone}}
                                @else
                                    miskin dk punyo hp
                                @endif
                            </td>
                            <td>
                                <a href="/user-detail/{{$item->slug}}" class="btn btn-rounded btn-warning ">detail</a>
                                <a href="/user-blok/{{$item->slug}}"class="btn btn-rounded btn-danger ">Blokir</a>
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
