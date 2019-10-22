@extends('layouts.dashboard.template')
@section('content')
	<div class="col-lg-10">
		<div class="card">
			<div class="card-header">
				<strong>Edit</strong> Data
			</div>
			<div class="card-body card-block">
			   <form class="form-horizontal" action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
				@CSRF
				@METHOD('PATCH')
			  @include('product.form');
			</form>
		</div>
	</div>

@endsection
