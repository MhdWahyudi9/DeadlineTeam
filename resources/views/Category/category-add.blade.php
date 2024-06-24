@extends('layout.main')

@section('title', 'Category-add')

@section('content')
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3>Tambah Categori</h3>
                    <p class="card-description">
                    Basic form layout
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
                    <form action="category-add" method="post" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" name="name" class="form-control " id="name" placeholder="Nama Categories">
                        </div>
                        
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection