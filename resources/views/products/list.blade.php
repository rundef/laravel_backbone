@extends('layouts.'.$parentLayout)

@section('content')
	<h2>Products</h2>
	<a href="{{ route('product.create') }}" class="btn btn-primary pull-right">Add a product</a>
	<div style="clear:both;height:20px;"></div>
	@if(Session::has('success_message'))
		<div class="alert alert-success" role="alert">{{ Session::get('success_message') }} </div>
	@endif
	<table cellspacing="0" class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Price</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($products as $product)
				<tr>
					<td>{{ $product->name }}</td>
					<td>{{ $product->price }}</td>
					<td>
						<a title="Edit the product" class="action-edit" href="{{ route('product.edit', ['id' => $product->id]) }}"><span class="glyphicon glyphicon-pencil" ></span></a>

						<form method="POST" class="action-delete" action="{{ route('product.destroy', ['id' => $product->id]) }}" style="display:inline;">
							<input type="hidden" name="_method" value="DELETE" />
							{{ csrf_field() }}
							<button type="submit" title="Delete the product" class="glyphicon glyphicon-trash" style="color:red;border:0;background-color:transparent"></button>
						</form>
					</td>
				</tr>
			@endforeach
			@if(count($products) == 0)
				<tr>
					<td colspan="3">Empty dataset.</td>
				</tr>
			@endif
		</tbody>
	</table>
@endsection