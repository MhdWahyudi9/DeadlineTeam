@extends('layout.main')

@section('title', 'Edit Category')

@section('content')

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 class="font-weight-bold">Edit Categori</h3>
                    <p class="card-description">
                    </p>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach

                        </ul>
                        </div>
                    @endif
                    <form action="/category-edit/{{$category->slug}}" method="post" class="forms-sample">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Username</label>
                            <input type="text" name="name" class="form-control " id="name" placeholder="Nama Categories" value="{{$category->name}}">
                        </div>
                        
                        <button type="submit" class="btn btn-primary mr-2 font-weight-bold">Update</button>
                        <button class="btn btn-light font-weight-bold">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection