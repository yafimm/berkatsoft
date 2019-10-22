@extends('layouts.dashboard.template')
@section('content')
	<div class="col-lg-10">
		<div class="card">
			<div class="card-header">
				<strong>Add</strong> Product
			</div>
			<div class="card-body card-block">
			  <form class="form-horizontal" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
				@CSRF
				@METHOD('POST')
			  @include('product.form');
			</form>
		</div>
	</div>

@endsection
