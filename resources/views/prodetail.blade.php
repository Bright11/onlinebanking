@extends('include.master')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-3">
<!--sidebar-->
<ul class="nav flex-column sidebar">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#">My banking information</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('depositdetails')}}">Money transfer</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('withdrawerdetails')}}">Withdrawers</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Deposit</a>
    </li>
  </ul>
<!--the end-->
</div>
<div class="col-md-9">
    <h1>Banking information</h1>
<p>Here is banking information, transfering details, withdrawer, deposit and many more</p>
</div>
</div>
</div>
@endsection