@extends('layouts.'.$parentLayout)

@section('content')
	<h2>{{ $product->id ? 'Edit a product' : 'Add a product' }}</h2>
	<div style="clear:both;height:20px;"></div>
	<form method="POST" action="{{ $product->id ? route('product.update', ['id' => $product->id]) : route('product.store') }}">
		@if($product->id)
			<input type="hidden" name="_method" value="PUT" />
		@endif
		{{ csrf_field() }}
		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
			<label for="name" class="control-label">Product name *</label>
			<input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" />
		</div>
		<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
			<label for="price" class="control-label">Product price *</label>
			<input type="text" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}" />
		</div>
		<div class="form-group">
			<label for="description" class="control-label">Description</label>
			<textarea name="description" id="description" class="form-control">{{ old('description', $product->description) }}</textarea>
		</div>
		<div class="form-group">
			<input type="submit" name="submit" value="Save" class="btn btn-primary" />
		</div>
	</form>
@endsection