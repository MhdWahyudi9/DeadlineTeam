
@extends('layout.main')

@section('title', 'Mobil-list')

@section('content')
<form action="" method="get" class="mb-3">
    <div class="row w-100">
        <div class="col-12 col-sm-4">
            <select name="category" id="category" class="form-control">
                <option value="">Pilih Categori</option>
                @foreach ($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-sm-8">
            <div class="input-group mb-3">
                <input type="text" name="title" class="form-control" placeholder="Search Here.." aria-label="Recipient's username" aria-describedby="basic-addon2">
                <button class="btn btn-primary" type="submit">
                    Search
                </button>
            </div>
        </div>
    </div>
</form>
    <div class="container-scroller d-flex">
        <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
            <div class="content-wrapper d-flex align-items-center auth lock-full-bg">
                <div class="my-5">
                    <div class="row">
                        @foreach ($mobil as $item)
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <div class="card " >
                                    {{-- Menggunakan Turnarry operator, kalau gk salah sih wkwk --}}
                                    <img src="{{$item->gambar != null ? asset('storage/gambar/'.$item->gambar) : asset('image/image-not-found.png')}}" class="card-img-top" draggable="false">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$item->mobil_code}}</h5>
                                        <p class="card-text">{{$item->title}}</p>
                                        <div class="text-right fw-bold">
                                            <i class=" {{$item->status =='in stock' ?'mdi mdi-check':'mdi mdi-format-superscript'}} "><p class="card-text  {{$item->status =='in stock' ?'text-success':'text-danger'}}">{{$item->status}}</p></i>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div> 
                        @endforeach
                        
                    </div>
                </div>
            </div>
        <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
