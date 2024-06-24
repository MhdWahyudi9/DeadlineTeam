@extends('layout.main')

@section('title', 'Banned Users')

@section('content')
    <div>
        <div class="mt-5 col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h2 class="text-dark text-border">List pengguna yang di Blokir</h2>
                <p class="card-description">
                  pengguna yang telah di blokir dan tidak dapat lagi mengakses 
                </p>
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
                      <tr >
                        <th class="font-weight-bold">
                          No.
                        </th>
                        <th class="font-weight-bold">
                          Username
                        </th>
                        <th class="font-weight-bold">
                          Phonek
                        </th >
                        <th class="font-weight-bold">Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($bannedUsers as $item)
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
                                <a href="/user-restore/{{$item->slug}}">restore</a>
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
