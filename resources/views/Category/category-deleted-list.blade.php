@extends('layout.main')

@section('title', 'Deleted Category')

@section('content')
    <div>
        <div class="mt-5 col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h2 class="text-dark text-border font-weight-bold">Delete Category list</h2>
                <p class="card-description">
                  List Categorie
                </p>
                <a href="categories" class="mt-4 mb-4 btn btn-rounded btn-primary mt-5 font-weight-bold">Back</a>
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
                        <th class="font-weight-bold">
                          No.
                        </th>
                        <th class="font-weight-bold">
                          Name
                        </th>
                        <th class="font-weight-bold">
                          gambar
                        </th>
                        <th class="font-weight-bold">
                          Action
                        </th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($deletedCategories as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}} </td>
                            <td><img src="{{$item->gambar != null ? asset('storage/gambar/'.$item->gambar) : asset('image/image-not-found.png')}}" class="card-img-top" draggable="false"></td>
                            <td>
                                <a href="category-restore/{{$item->slug}} " class="btn btn-warning btn-rounded btn-fw font-weight-bold">Restore</a>
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