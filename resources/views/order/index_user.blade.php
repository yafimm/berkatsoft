@extends('layouts.dashboard.template')

@section('content')
@include('_partial.flash_message')
<div class="table-responsive m-b-20">

  <table class="table table-borderless table-data3">
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Date</th>
        <th>Total</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($all_order as $key => $order)
      <tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->created_at->format('d/m/Y') }}</td>
        <td>{{ $order->total }}</td>
        <td>{{ $order->status }}</td>
        <td><a href="{{ route('order.index_user', ['id' => $order->id ]) }}" class="btn btn-primary"><i class="fas fa-info-circle"></i></a>

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
