<div class="container">
	<div class="row">
		<div class="col-lg-12 col-xl-12 m-lr-auto m-b-20">

				<h4 class="mtext-109 cl2 p-b-30">
					Produk
				</h4>

				<div class="flex-w flex-t bor12 p-t-15 p-b-30">
					 <div class="row form-group">
						<div class="col col-md-4">
							<label for="text-input" class=" form-control-label">Product Name</label>
						</div>
						<div class="col-12 col-md-8">
							<input type="text" id="text-input" name="name" value="{{ old('name', $product->name) }}" placeholder="Product Name" class="form-control">
							@if($errors->has('name'))
								<small class="form-text text-danger">*{{ $errors->first('name') }}</small>
							@endif
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-4">
							<label for="text-input" class=" form-control-label">Price</label>
						</div>
						<div class="col-12 col-md-8">
							<input type="text" id="text-input" name="price" value="{{ old('price', $product->price) }}" placeholder="Price" class="form-control">
							@if($errors->has('price'))
								<small class="form-text text-danger">*{{ $errors->first('price') }}</small>
							@endif
						</div>
					</div>

					<div class="row form-group">
						<div class="col col-md-4">
							<label for="text-input" class=" form-control-label">Stock</label>
						</div>
						<div class="col-12 col-md-8">
							<input type="text" id="text-input" name="stock" value="{{ old('stock', $product->stock) }}" placeholder="Stock" class="form-control">
							@if($errors->has('stock'))
								<small class="form-text text-danger">*{{ $errors->first('stock') }}</small>
							@endif
						</div>
					</div>

					<div class="row form-group">
						<div class="col col-md-4">
							<label for="file-input" class=" form-control-label">Image</label>
						</div>
						<div class="col-12 col-md-8">
							<input type="file" id="imgInp" name="image" class="form-control-file">
							<img id="blah" src="{{ asset('images/produk/'.$product->image) }}" class="img-fluid"/>
							@if($errors->has('image'))
								<small class="form-text text-danger">*{{ $errors->first('image') }}</small>
							@endif
						</div>
					</div>

					<div class="row form-group">
						<div class="col col-md-4">
							<label for="textarea-input" class=" form-control-label">Description</label>
						</div>
						<div class="col-12 col-md-8">
							<textarea name="desc" id="textarea-input" rows="9" placeholder="Content..." class="form-control">{{ $product->desc }}</textarea>
							@if($errors->has('desc'))
								<small class="form-text text-danger">*{{ $errors->first('desc') }}</small>
							@endif
						</div>
					</div>

		</div>
	</div>
</div>

</div>
<div class="card-footer">
<button type="submit" class="btn btn-primary btn-sm">
	<i class="fa fa-dot-circle-o"></i> Submit
</button>
<button type="reset" class="btn btn-danger btn-sm">
	<i class="fa fa-ban"></i> Reset
</button>
</div>
