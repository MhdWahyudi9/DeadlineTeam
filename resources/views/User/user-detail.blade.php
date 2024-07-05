@extends('layout.main')

@section('title', 'User')

@section('content')              
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h3>Detail User</h3>
        <p class="card-description">
          Admin dapat Melihat detail pengguna
        </p>
        @if ($user->status=='inactive')
            <a href="/user-approve/{{$user->slug}}" class="mt-4 mb-4 btn btn-rounded btn-info mt-5">Approved User</a>
        @endif
        <div class="mt-5">
          @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            
          @endif
          <a href="/users/" class="mt-4 mb-4 btn btn-rounded btn-danger mt-0">Back</a>
        </div>
        <form class="forms-sample">
          <div class="form-group">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control"  readonly value="{{$user->username}}">
          </div>
          <div class="form-group">
            <label for="" class="form-label">Phone</label>
            <input type="text" class="form-control" id="" readonly value="{{$user->phone}}">
          </div>
          <div class="form-group">
            <label for=""class="form-lable" >Address</label>
            <textarea  class="form-control" id="" rows="4" class="form-control"  readonly style="resize: none ">{{$user->address}}</textarea>
          </div>
          <div class="form-group">
            <label for="" class="form-label">status</label>
            <input type="text" class="form-control" id="" readonly value="{{$user->status}}">
          </div>
          <a href=""></a>
        </form>
      </div>
    </div>
  </div>

  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Striped Table</h4>
        <p class="card-description">
          Add class <code>.table-striped</code>
        </p>
        <div class="table-responsive">
          <x--rent-log-table :rentlog='$rent_logs' />
        </div>
      </div>
    </div>
  </div>
@endsection
