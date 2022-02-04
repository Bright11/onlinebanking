@extends('include.master')
@section('content')
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
       <th scope="col">Name</th>
      <th scope="col">Email</th>
         <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($user as $r )
    <tr>
        <th scope="row">{{ $r->id }}</th>
        <td>{{ $r->fullname }}</td>
        <td>{{ $r->email }}</td>
        @if ($r->openaccount=="banking")
        <td><a href="#" class="btn btn-success">Already banking with us</a></a></td>
        @else
        <td><a href="/openaccount/{{ $r->id }}" class="btn btn-warning">Open Account</a></a></td>
        @endif
         </tr>
    @empty
        <td>No customer on this branch</td>
    @endforelse

  </tbody>
</table>
@endsection