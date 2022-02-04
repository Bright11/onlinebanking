@extends('include.master')
@section('content')
    <div class="container">
      <div class="user_depositinfor text-center">
        <h6>Here is the imformation of the deposit in New International bank</h6>
      </div>
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
          @forelse ($w as $r )
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

    </div>
@endsection                                                              