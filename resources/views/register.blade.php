@extends('layouts.main')

@section('container')
<h1>USER REGISTRASION</h1>
<form action="/register" method="post">
  @csrf
  <p>
    <input type="text" name="name" id="name" placeholder="FULLNAME" value="{{ old('name')}}">
    @error('name') {{ $message }} @enderror
  </p>
  <p>
    <input type="email" name="email" id="email" placeholder="EMAIL" value="{{ old('email')}}">
  @error('email') {{ $message }} @enderror
  
  </p>
  <p>
    <input type="text" name="username" id="username" placeholder="USERNAME" value="{{ old('username')}}">
    @error('username') {{ $message }} @enderror
</p>
  <p>
    <input type="password" name="password" id="password" placeholder="PASSWORD" >
    @error('password') {{ $message }} @enderror
</p>
  <button type="submit">REGISTER</button>
</form>
@endsection