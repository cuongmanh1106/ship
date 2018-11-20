<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Models\UsersModel;
use App\Http\Models\ProductsModel;


class ProductsController {
		
	public function index() {
		$products = ProductsModel::get_products();
		return response()->json([
			'products' => $products,
			'status' => 200 
		]);
	}

	public function single() {
		$id = $_GET["id"]; 
		$product = ProductsModel::get_product_by_id($id);
		return response()->json([
			'product' => $product,
			'status' => 200
		]);
	}

	public function store(Request $request) {
		$data = [
			'name' => $request->name,
			'alias' => $request->alias,
			'cate_id' => $request->cate_id,
			'sup_id' => $request->sup_id,
			'price' => $request->price,
			'quantity' => $request->quantity,
			'reduce' => $request->reduce,
			'size' => $request->size,
			'image' => $request->image,
			'sub_image' => $request->sub_image,
			'intro' => $request->intro,
			'description' => $request->description
			
		];

		if(ProductsModel::insert_product($data)) {
			return response()->json([
				'status' => 200
			]);
		} else {
			return response()->json([
				'status' => 500
			]);
		}
	}


	public function update(Request $request) {
		$id = $request->id;
		$product = ProductsModel::get_product_by_id($id);
		$name = $product->name;
		$alias = $product->alias;
		$cate_id = $product->cate_id;
		$price = $product->price;
		$intro = $product->intro;
		$description = $product->description;
		$image = $product->image;
		$sub_image = $product->sub_image;
		$status = $product->status;
		$view = $product->view;
		$sup_id = $product->sup_id;
		$quantity = $product->quantity;
		$reduce = $product->reduce;
		$size = $product->size;


		if($request->name != null) {
			$name = $request->name;
			$alias = $request->alias;
		}

		if($request->cate_id != null) {
			$cate_id = $request->cate_id;
		}
		if($request->price != null) {
			$price = $request->price;
		}
		if($request->intro != null) {
			$intro = $request->intro;
		}
		if($request->description != null) {
			$description = $request->description;
		}
		if($request->image != null) {
			$image = $request->image;
		}
		if($request->sub_image != null) {
			$sub_image = $request->sub_image;
		}
		if($request->status != null) {
			$status = $request->status;
		}
		if($request->view != null) {
			$view = $request->view;
		}
		if($request->sup_id != null) {
			$sup_id = $request->sup_id;
		}
		if($request->quantity != null) {
			$quantity = $request->quantity;
		}
		if($request->reduce != null) {
			$reduce = $request->reduce;
		}
		if($request->size != null) {
			$size = $request->size;
		}

		$data = [
			'name' => $name,
			'alias' => $alias,
			'cate_id' => $cate_id,
			'sup_id' => $sup_id,
			'price' => $price,
			'quantity' => $quantity,
			'reduce' => $reduce,
			'size' => $size,
			'image' => $image,
			'sub_image' => $sub_image,
			'intro' => $intro,
			'description' => $description,
			'status' => $status,
			'view' => $view
		];

		if(ProductsModel::update_product($id,$data)) {
			return response()->json([
				'status' => 200
			]);
		} else {
			return response()->json([
				'status' => 500
			]);
		}


	}

	public function destroy() {
		$id = $_GET["id"];
		if(ProductsModel::delete_product($id)) {
			return response()->json([
				'status' => 200
			]);
		} else {
			return response()->json([
				'status' => 500
			]);
		}
	}

}