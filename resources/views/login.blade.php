@extends('include.master')

@section('content')
<div class="container"> 
  <form action="/insertlogin"method="post">
    @csrf 
    <div class="row">
      <div class="col">
        <label>Email</label>
        <input type="text" name="email" class="form-control" placeholder="Email@domain.com" aria-label="First name">
      </div>
      <div class="col">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="password*****" aria-label="Last name">
      </div>
    </div>
    <input type="submit" class="form-control btn-success mt-3" value="Register"/>
  </form>
</div>
@endsection