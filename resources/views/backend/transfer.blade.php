@extends('include.master')

@section('content')
<div class="container-fluid mt-5">
<h6 class="text-center">Transfer Found</h6>
<form action="/addtransfer/{{$cust->user_id}}" method="post"  enctype="multipart/form-data">
@csrf
<div class="row">
  <div class="col  mb-3">
    <label></label>
    <label>Country</label>
    <input type="text" class="form-control" name="country" placeholder="Country" aria-label="First name">
    <input type="hidden" class="form-control" name="user_id" value="{{ $cust->user_id }}" aria-label="First name">
  </div>
  <div class="col mb-3">
    <label>Bank Name</label>
    <input type="text" class="form-control" name="bank" placeholder="Bank name" aria-label="Last name">
  </div>
</div>

  <div class="col">
    <label>Amount</label>
    <input type="number" class="form-control" name="amount" placeholder="Amount" aria-label="Last name">
    <input type="hidden" class="form-control" name="tall" value="{{$t->amount}}" aria-label="Last name">
    </div>
</div>
<button class="form-control btn btn-success">Register</button>
</form>
</div>
@endsection