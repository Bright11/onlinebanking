@extends('include.master')
@section('content')
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Account Ownner</th>
         <th scope="col">Account Number</th>
         <th scope="col">Deposited Amount</th>
         <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($p as $r )
    <tr>
        <td scope="row">{{ $r->User->fullname}}</td>
        <td>{{$r->Customer->account_number}}</td>
        <td>${{$r->amount}}</td>
        <td>{{$r->created_at}}</td>
         </tr>
        
    @empty
        <td>No customer on this branch</td>
    @endforelse
   
    <tr>
        <td colspan="2">Current balance<th>
        @if (Session::has('user'))
        <td colspan="4">${{$total->amount}}<th>
        @endif
           </tr>
  </tbody>
</table>
@endsection                                                              