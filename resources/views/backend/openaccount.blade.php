@extends('include.master')

@section('content')
<div class="container-fluid mt-5">
<h6 class="text-center">Account Registeration</h6>
<form action="/addopenaccount/{{$users->id}}" method="post"  enctype="multipart/form-data">
@csrf
<div class="row">
  <div class="col  mb-3">
    <label>Full Name</label>
    <input type="text" class="form-control" name="fullname" value="{{ $users->fullname }}" aria-label="First name">
  </div>
  <div class="col mb-3">
    <label>Email</label>
    <input type="email" class="form-control" name="email" value="{{ $users->email }}" aria-label="Last name">
  </div>
</div>
<div class="row"> 
  <div class="col mb-3">
    <label>Country</label>
    <input type="text" class="form-control" name="country" value="" aria-label="First name">
  </div>
  <div class="col">
    <label>Mobile Number</label>
    <input type="number" class="form-control" name="pnumber" placeholder="Mobile Number" aria-label="Last name">
  </div>
</div>
<div class="row">
<div class="col mb-3">
  <label>Amount</label>
    <input type="number" class="form-control" name="amount" placeholder="amount" aria-label="Last name">
  </div>
  <div class="col mb-3">
    <label>Passport Picture</label>
    <input type="file" class="form-control" name="picture"  aria-label="Last name">
  </div>

  <div class="col mb-3">
    <label>User id</label>
    <input type="number" class="form-control" name="user_id"  value="{{ $users->id }}"  aria-label="Last name">
  </div>
</div>
</div>
<button class="form-control btn btn-success">Register</button>
</form>
</div>
@endsection