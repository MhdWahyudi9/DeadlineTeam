@extends('layout.main')

@section('title', 'Mobil')

@section('content')
    <div>
        <div class="mt-5 col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h2 class="text-dark text-border">Mobil List</h2>
                <p class="card-description">
                  Admin dapat melihat list mobil yang tersedia
                </p>
                <a href="mobil-deleted" class="mt-4 mb-4 btn btn-rounded btn-secondary mt-5 ">View Delete Data</a>
                <a href="mobil-add" class="mt-4 mb-4 btn btn-rounded btn-primary mt-5">Tambah</a>
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
                        <th>Category</th>
                        <th>
                          Status
                        </th>
                        <th>
                          Action
                        </th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($mobil as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->mobil_code}} </td>
                            <td>{{$item->title}} </td>
                            <td>
                              @foreach ($item->categories as $category)
                                  {{$category->name}} <br>
                              @endforeach
                            </td>
                            <td>{{$item->status}} </td>
                            <td>
                                <a href="/mobil-edit/{{$item->slug}}" class="btn btn-warning btn-rounded  mr-2">Edit</a>
                                <a href="/mobil-delete/{{$item->slug}}" class="btn btn-danger btn-rounded  mr-2">Delete</a>
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