@extends('layout.main')

@section('title', 'Category')

@section('content')
    <div>
        <div class="mt-5 col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h2 class="text-dark text-border">Categori Mobil</h2>
                <p class="card-description">
                  Admin dapat melihat, mengedit, mendelete serta menambahkan data categori mobil
                </p>
                <a href="category-deleted" class="mt-4 mb-4 btn btn-rounded btn-secondary mt-5 ">View Delete Data</a>
                <a href="category-add" class="mt-4 mb-4 btn btn-rounded btn-primary mt-5">Tambah</a>
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
                          Name
                        </th>
                        <th>
                          gambar
                        </th>
                        <th>
                          Action
                        </th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}} </td>
                            <td><img src="{{$item->gambar != null ? asset('storage/gambar/'.$item->gambar) : asset('image/image-not-found.png')}}" class="card-img-top" draggable="false"></td>
                            <td>
                                <a href="category-edit/{{$item->slug}} " class="btn btn-warning btn-rounded btn-fw">Edit</a>
                                <a href="category-delete/{{$item->slug}}" class="btn btn-danger btn-rounded btn-fw" id="delete">Delete</a>
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