@extends('include.master')
@section('content')
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
       <th scope="col">Name</th>
      <th scope="col">Account Number</th>
         <th scope="col">Transfer</th>
         <th scope="col">Withdraw</th>
         <th scope="col">Deposit</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($cust as $r )
    <tr>
        <th scope="row">{{ $r->id }}</th>
        <td>{{ $r->fullname }}</td>
        <td>{{ $r->account_number }}</td>
       
        <td><a href="/transfer/{{ $r->user_id }}" class="btn btn-warning">Tranfer Found</a></a></td>
        <td><a href="/withdraw/{{ $r->user_id }}" class="btn btn-warning">Withdraw Found</a></a></td>
        <td><a href="/deposit/{{ $r->user_id }}" class="btn btn-warning">Deposit Found</a></a></td>

         </tr>
    @empty
        <td>No customer on this branch</td>
    @endforelse

  </tbody>
</table>
@endsection                                                              