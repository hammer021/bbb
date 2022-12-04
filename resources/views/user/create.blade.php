@extends('user.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div>
            <h2>Add New User</h2>
        </div>
        <div>
            <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('user.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username:</strong>
                <input type="text" name="username" class="form-control" placeholder="username">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            {{-- <div class="form-group">
                <strong>Jenis Kelamin:</strong>
                <input class="form-control" name="jenis_kelamin" placeholder="jenis_kelamin"></input>
            </div> --}}
            <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select class="form-control" name="jenis_kelamin" placeholder="Jenis Kelamin" id="jenis_kelamin">
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
        
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" class="form-control" name="email" placeholder="email"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="password" class="form-control" name="password" placeholder="Password"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                <input type="textarea" class="form-control" name="alamat" placeholder="alamat"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
   
</form>
@endsection