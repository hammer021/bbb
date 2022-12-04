@extends('user.layout')
 
@section('content')
    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>CRUD Users Application</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-success" href="{{ route('user.create') }}"> Create New User</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($user as $u)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $u->username }}</td>
            <td>{{ $u->email }}</td>
            <td>{{ $u->jenis_kelamin }}</td>
            <td>{{ $u->alamat }}</td>
            <td>
                <form action="{{ route('user.destroy',$u->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('user.show',$u->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('user.edit',$u->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="row text-center">
        {!! $user->links() !!}
    </div>
      
@endsection