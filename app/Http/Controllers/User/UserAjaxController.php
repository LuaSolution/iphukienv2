<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Helpers;
use App\User;

class UserAjaxController extends Controller
{
    public function getLocation(Request $request, $type, $parentId = null) {
        $listData = Helpers::callNhanhApi([
            "type" => $type,
            "parentId" => $parentId
        ], "/shipping/location");
        $data = [
            "list_data" => $listData
        ];

        return view("ajax/location", $data);
    }

    public function loginWithGoogle(Request $request) {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        
        $userModal = new User();
        $userCheck = $userModal->getUserByEmail($email);

        if ($userCheck) {
            return json_encode(['code' => 0, 'message' => "Email đã tồn tại"]);
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'role_id' => 2,
        ]);

        return json_encode(['code' => 1]);
    }

}
