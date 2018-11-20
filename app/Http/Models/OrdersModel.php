<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrdersModel extends Model {

	public static function get_orders() {
		return DB::table('orders')->get();
	}

	public static function get_orders_by_id($id) {
		$result =  DB::table('orders')->where('id',$id)->get();
		if(empty($result[0])) {
			return false;
		}
		return $result[0];
	}

	public static function get_ship() {
		return DB::table('ship')->get();
	}


	public static function get_ship_by_user_id($user_id) {
		return DB::table('ship')->where('user_id',$user_id)->get();
	}
	
	public static function get_detail_by_order($order_id) {
		return DB::table('order_details')->where('order_id',$order_id)->get();
	}

	public static function insert_order($data) {
		return DB::table('orders')->insertGetId($data);
	}

	public static function insert_detail_order($data) {
		return DB::table('order_details')->insert($data);
	}

	public static function udpate_order($id,$data) {
		return DB::table("orders")->where('id',$id)->update($data);
	}

	public static function update_detail_order($id,$data) {
		return DB::table('order_details')->where('id',$id)->updte($data);
	}

	public static function update_ship($id,$data) {
		return DB::table('ship')->where('id',$id)->update($data);
	}


}

