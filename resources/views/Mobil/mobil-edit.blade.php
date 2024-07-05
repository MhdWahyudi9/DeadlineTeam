@extends('layout.main')

@section('title', 'Mobil-edit')

@section('content')

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3>Edit Mobil</h3>
                    <p class="card-description">
                    Admin dapat mengedit data yang telah di pilih
                    </p>
                    <div class="mt-5">
                        @if(session('status'))
                          <div class="alert alert-success">
                              {{session('status')}}
                          </div>
                        @endif
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach

                        </ul>
                        </div>
                    @endif
                    <form action="/mobil-edit/{{$mobil->slug}}" method="post" enctype="multipart/form-data" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" name="mobil_code" class="form-control " id="code" placeholder="Code Mobil" value="{{$mobil->mobil_code}}">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control " id="title" placeholder="Title Mobil" value="{{$mobil->title}}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">Gambar</label>
                            <input type="file" name="image" class="form-control" >
                        </div>
                        <div class="form-group mb-3">
                            <label for="currentImage" class="form-label">Current Image</label>
                            <br>
                            @if ($mobil->gambar!='')
                                <img src="{{asset('storage/gambar/'.$mobil->gambar)}}" alt="">
                            @else
                                <img src="{{asset('image/image-not-found.png')}}" alt="">
                            @endif
                        </div>
                        <div class="form-group mt-2">
                            <label for="category" class="form-label">Category</label>
                            <select name="categories[]" id="category" class="form-control ">
                                @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-5">
                            <label for="currentCategory">Current Category</label>
                            <ul>
                                @foreach ($mobil->categories as $category)
                                    <li>{{$category->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <br>
                        
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="/mobil/" class="btn btn-rounded btn-danger mr-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection