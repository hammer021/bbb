@extends('user.loginlayout')
@section('content')
@auth
<div class="box">
<p>Welcome <b>{{ Auth::user()->username }}</b></p>
<a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
</div>
@endauth
@guest
<div class="box">
<a class="btn btn-primary" href="{{ route('login') }}">Login</a>
<a class="btn btn-info" href="{{ route('register') }}">Register</a>
</div>
@endguest
@endsection