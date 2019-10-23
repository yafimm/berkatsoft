@extends('layouts.dashboard.template')

@section('content')
@include('_partial.flash_message')
<div class="table-responsive m-b-20">

  <table class="table table-borderless table-data3">
    <thead>
      <tr>
        <th>No</th>
        <th>Username</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($all_user as $key => $user)
      <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role->role_name }}</td>
        <td>
          <a href="{{ route('product.edit', $user->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


<div class="container mb-5">
  <div class="row justify-content-center">
      <div class="col-3 text-center">
        {{ $all_user->links() }}
      </div>
  </div>
</div>

@endsection
