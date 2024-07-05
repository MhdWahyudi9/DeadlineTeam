@extends('layout.main')

@section('title', 'Mobil Rent')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
               
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3>Peminjaman Mobil</h3>
                <p class="card-description">
                
                </p>
                <div class="mt-5">
                    @if(session('message'))
                        <div class="alert {{ session('alert-class') }}">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                
                <form action="mobil-rent" method="post">
                @csrf
                    <div class="form-group">
                        <label for="user" class="form-label font-weight-bold">User</label>
                        <select  name="user_id" id="user" class="form-control inputbox">
                            <option value="">Select User</option>
                            @foreach ($users as $item)
                            <option value="{{$item->id}}">{{$item->username}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mobil" class="form-label font-weight-bold">Mobil</label>
                        <select  name="mobil_id" id="mobil" class="form-control inputbox">
                            <option value="">Select Mobil</option>
                            @foreach ($mobil as $item)
                            <option value="{{$item->id}}">{{$item->title}} | <p class="card-text  {{$item->status =='in stock' ?'text-success':'text-danger'}}">{{$item->status}}</p></i>
                            </div>
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.inputbox').select2();
    });
</script>
@endsection
