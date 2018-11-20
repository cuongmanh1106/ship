<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductsModel extends Model {
	
	public static function get_products() {
		return DB::table('products')->where('status',0)->get();
	}

	public static function get_product_by_id($id) {
		$result =  DB::table('products')->where('id',$id)->get();
		if(empty($result[0])) {
			return false;
		} 
		return $result[0];
	}

	public static function insert_product($data){
		return DB::table('products')->insertGetId($data);
	}

	public static function update_product($id,$data) {
		return DB::table('products')->where('id',$id)->update($data);
	}

	public static function delete_product($id) {
		return DB::table('products')->where('id',$id)->update(['status'=>1]);
	}

	public static function delete_group_product($arrId) {
		return DB::table('products')->whereIn('id',$arrId)->update(['status'=>1]);
	}
	
}