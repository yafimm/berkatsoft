@extends('layouts.dashboard.template')

@section('content')
@include('_partial.flash_message')
<div class="table-responsive m-b-20">

  <table class="table table-borderless table-data3">
    <thead>
      <tr>
        <th>No</th>
        <th>Id</th>
        <th>User</th>
        <th>Admin</th>
        <th>Address</th>
        <th>Total</th>
        <th>Time</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($all_order as $key => $order)
      <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $order->id }}</td>
        <td>{{ $order->user->username }}</td>
        <td>{{ $order->admin->username }}</td>
        <td>{{ $order->stock }}</td>
        <td>{{ $order->admin }}</td>
        <td><a href="{{ route('order.edit', $order->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
          <form action="{{ route('order.destroy', $order->id) }}" method="POST">
          @method('delete')
          @csrf
          <input type="hidden" name="slug" value="{{ $order->id }}">
          <button type="submit" class="btn btn-danger">
            <i class="fas fa-trash-alt"></i>
          </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


<div class="container mb-5">
  <div class="row justify-content-center">
      <div class="col-3 text-center">
        {{ $all_order->links() }}
      </div>
  </div>
</div>

@endsection
