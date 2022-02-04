@extends('include.master')

@section('content')
<div class="container-fluid mt-5">
<h6 class="text-center">Withdraw Found</h6>
<form action="/addwithdarw/{{$cust->user_id}}" method="post"  enctype="multipart/form-data">
@csrf
<div class="row">
  <div class="col  mb-3">
    <label></label>
    <label>From</label>
    <input type="text" readonly class="form-control" value="{{$cust->account_number}}" aria-label="First name">
    <input type="hidden" class="form-control" name="user_id" value="{{ $cust->user_id }}" aria-label="First name">
  </div>
  <div class="col mb-3">
    <label>Amount</label>
    <input type="number" class="form-control" name="amount" placeholder="Amount" aria-label="Last name">
    <input type="hidden" class="form-control" name="adamount" value="{{$cust->Total->amount}}" aria-label="Last name">

  </div>
</div>
<button class="form-control btn btn-success">Withdraw</button>
</form>
</div>
@endsection