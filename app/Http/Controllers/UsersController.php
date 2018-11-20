<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Models\UsersModel;

class UsersController {
	public function index() {
	 	$users = UsersModel::get_users();
	  	return response()->json([
	    'users' => $users,
	    'status' => '200'
		]);
	}

	public function get_single(Request $request) {
		$id = $_GET["id"];
		$user = UsersModel::get_user_by_id($id);
		return response()->json([
			'user' => $user
		]);
	}

	public function login(Request $request) {
		$email = $request->email;
		$password = $request->password;
		$user = UsersModel::login($email,$password);

		if(!$user) {
			return response()->json([
				'status' => 404
			]);
		} else {
			return response()->json([
				'user' => $user,
				'status' => 200
			]);
		}

	}
}