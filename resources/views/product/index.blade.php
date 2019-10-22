@extends('layouts.dashboard.template')

@section('content')
<a href="{{ route('product.create') }}" class="btn btn-success mb-2"><i class="fas fa-plus"></i> Add Produk</a>
@include('_partial.flash_message')
<div class="table-responsive m-b-20">

  <table class="table table-borderless table-data3">
    <thead>
      <tr>
        <th>No</th>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Image</th>
        <th>Stock</th>
        <th>Admin</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($all_product as $key => $product)
      <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>Rp. {{ yaff_money_format($product->price) }}</td>
        <td><img class="img-fluid" src="{{ asset('img/product/'.$product->image) }}"></td>
        <td>{{ $product->stock }}</td>
        <td>{{ $product->admin }}</td>
        <td><a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
          <form action="{{ route('product.destroy', $product->id) }}" method="POST">
          @method('delete')
          @csrf
          <input type="hidden" name="slug" value="{{ $product->id }}">
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
        {{ $all_product->links() }}
      </div>
  </div>
</div>

@endsection
