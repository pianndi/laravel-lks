@extends('layouts.main')

@section('container')
@if(session()->has('success'))
<h2>{{session('success')}}</h2>
@endif
@if(session()->has('error'))
<h2>{{session('error')}}</h2>
@endif
<form action="/login" method="post">
  @csrf
  <p>
    <input type="text" name="username" placeholder="USERNAME" autofocus value="{{ old('username')}}">
    @error('username') {{$message}} @enderror
  </p>
  <p>
    <input type="password" name="password" placeholder="PASSWORD">
    @error('password') {{$message}} @enderror

  </p>
    <button type="submit">LOGIN</button>
</form>
Didn't have any account? <a href="/register">Register</a>
@endsection