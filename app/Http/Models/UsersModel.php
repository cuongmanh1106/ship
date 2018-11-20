<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsersModel extends Model {
	
	public static function get_users() {
		return DB::table('users')->get();
	}

	public static function get_user_by_id($id) {
		$result = DB::table('users')->where('id',$id)->get();
		if(empty($result[0])) {
			return false;
		}
		return $result[0];
	}


	public static function login($email,$password) {
		$result = DB::table('users')->where('email','=',$email)->where('permission_id','=',6)->get();
		if(!empty($result[0]) && password_verify($password,$result[0]->password) ) {
			return $result[0];
		}
		return false;
		
	}
}

