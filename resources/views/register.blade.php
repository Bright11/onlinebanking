@extends('include.master')

@section('content')
<div class="container"> 
 
  <form action="/insertregister"method="post">
    @csrf 
    <div class="row">
      <div class="col">
        <label>Full Name</label>
        <input type="text" name="fullname" class="form-control" placeholder="Full name" aria-label="First name">
      </div>
      <div class="col">
        <label>Email</label>
        <input type="text" name="email" class="form-control" placeholder="Email" aria-label="Last name">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label>Password</label>
        <input type="password"  name="password" class="form-control" placeholder="*********" aria-label="First name">
      </div>
      <div class="col">
        <label>Confirm Password></label>
        <input type="password" name="confirmpassword" class="form-control" placeholder="*******" aria-label="Last name">
      </div>
    </div>
    <input type="submit" class="form-control btn-success mt-3" value="Register"/>
  </form>
</div>
@endsection