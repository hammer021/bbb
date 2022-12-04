@extends('user.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div>
                <h2>Edit User</h2>
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
  
    <form action="{{ route('user.update',$user->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Username:</strong>
                    <input type="text" name="username" value="{{ $user->username }}" class="form-control" placeholder="Username">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input class="form-control" name="email" placeholder="email" value="{{ $user->email }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                {{-- <div class="form-group">
                    <strong>Jenis Kelamin:</strong>
                    <input class="form-control" name="jenis_kelamin" placeholder="jenis_kelamin" value="{{ $user->jenis_kelamin }}">
                </div> --}}
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select class="form-control" name="jenis_kelamin" placeholder="Jenis Kelamin" id="jenis_kelamin">
                    <?php if ($user->jenis_kelamin == "Pria") {?>
                        <option selected value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    <?php } elseif ($user->jenis_kelamin == "Wanita") {?>
                        <option value="Pria">Pria</option>
                        <option selected value="Wanita">Wanita</option>
                    <?php }else {?>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    <?php }?>
                    
                </select>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat:</strong>
                    <input type="textarea" class="form-control" name="alamat" placeholder="alamat" value="{{ $user->alamat }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" class="form-control" name="password" placeholder="password" value="{{ $user->password }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
   
    </form>
@endsection