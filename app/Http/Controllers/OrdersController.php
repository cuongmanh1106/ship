<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Models\UsersModel;
use App\Http\Models\OrdersModel;

class OrdersController {

	public function get_ship() {
		$ship = OrdersModel::get_ship();
		return response()->json([
			'ship' => $ship,
			'status' => 200
		]);
	}

	public function get_user_ship(Request $request) {
		$user_id = $_GET["user_id"];
		$ship = OrdersModel::get_ship_by_user_id($user_id);
		return response()->json([
			'ship' => $ship,
			'status' => 200
		]);
	}


	public function get_orders() {
		$orders = OrdersModel::get_orders();
		return response()->json([
			'orders' => $orders,
			'status' => 200
		]);
	}

	public function order_single() {
		$id = $_GET["id"];
		$order = OrdersModel::get_orders_by_id($id);
		return response()->json([
			'order' => $order,
			'status' => 200
		]);
	}

	public function detail_order() {
		$order_id = $_GET["order_id"];
		$detail = OrdersModel::get_detail_by_order($order_id);
		return response()->json([
			'detail' => $detail,
			'status' => 200
		]);
	}

	public function store_order(Request $request) {
		$data = [
			'customer_id' => $request->customer_id,
			'area' => $request->area,
			'delivery_place' => $request->delivery_place,
			'delivery_cost' => $request->delivery_cost,
			'status' => $request->status
		];
		$id = OrdersModel::insert_order($data);

		if($id != null) {
			return response()->json([
				'status' => 200,
				'id' => $id
			]);
			
		} else {
			return response()->json([
				'status' => 500
			]);
		}
	}


	public function store_detail(Request $request) {
		$data = [
			'order_id' => $request->order_id,
			'pro_id' => $request->pro_id,
			'price' => $request->price,
			'size' => $request->size,
			'quantity' => $request->quantity
		];

		if(OrdersModel::insert_detail_order($data)) {
			return response()->json([
				'status' => 200
			]);
		} else {
			return response()->json([
				'status' => 500
			]);
		}
	}

	public function update_order(Request $request) {
		$id = $request->id;
		$order = OrdersModel::get_orders_by_id($id);
		$area = $order->area;
		$delivery_place = $order->delivery_place;
		$delivery_cost = $order->delivery_cost;
		$status = $order->status;

		if($request->area != null) {
			$area = $request->area;
		}
		if($request->delivery_place != null) {
			$delivery_place = $request->delivery_place;
		}
		if($request->delivery_cost != null) {
			$delivery_cost = $request->delivery_cost;
		}
		if($request->status != null) {
			$status  = $request->status;
		}

		$data = [
			'area' => $area,
			'delivery_place' => $delivery_place,
			'delivery_cost' => $delivery_cost,
			'status' => $status
		];

		if(OrdersModel::udpate_order($id,$data)) {
			return response()->json([
				'status' => 200
			]);
		} else {
			return response()->json([
				'status' => 500
			]);
		}
	}

	public function update_ship(Request $request) {
		$id = $request->id;
		$status = $request->status;
		$data = [
			'status' => $status
		];

		if(OrdersModel::update_ship($id,$data)) {
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