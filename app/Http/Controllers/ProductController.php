<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
	public function index(Request $request) {
		$products = Product::all();
		return $this->view('products.list', $request, compact('products'));
	}

	public function create(Request $request) {
		$product = new Product;
		return $this->view('products.edit', $request, compact('product'));
	}

	public function store(EditProductRequest $request) {
		$product = new Product;
		$product->fill($request->only($product->getFillable()));
		$product->save();
		return redirect()->route('product.index')->with('success_message', 'The product has been successfully saved.');
	}

	public function edit(Request $request, $id) {
		$product = Product::findOrFail($id);
		return $this->view('products.edit', $request, compact('product'));
	}

	public function update(EditProductRequest $request, $id) {
		$product = Product::findOrFail($id);
		$product->fill($request->only($product->getFillable()));
		$product->save();
		return redirect()->route('product.index')->with('success_message', 'The product has been successfully saved.');
	}

	public function destroy(Request $request, $id) {
		Product::findOrFail($id)->delete();
		return redirect()->route('product.index')->with('success_message', 'The product has been successfully deleted.');
	}
}