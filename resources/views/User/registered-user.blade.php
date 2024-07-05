@extends('layout.main')

@section('title', 'User')

@section('content')
    <div>
        <div class="mt-5 col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h2 class="text-dark font-weight-bold"> Register User List</h2>
                <p class="card-description">
                  Daftar Pengguna yang belum di Approve Admin
                </p>
                <a href="/users" class="mt-4 mb-4 btn btn-rounded btn-primary mt-5">Pengguna Approved list</a>
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
                        @foreach ($registeredUsers as $item)
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
                                <a href="/user-detail/{{$item->slug}}" class="mt-4 mb-4 btn btn-rounded btn-warning mt-5">detail</a>
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
