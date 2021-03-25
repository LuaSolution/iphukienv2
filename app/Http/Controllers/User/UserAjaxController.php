<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAjaxController extends Controller
{
    public function getLocation(Request $request, $type, $parentId = null) {
        $listData = callNhanhApi([
            "type" => $type,
            "parentId" => $parentId
        ], "/shipping/location");
        $data = [
            "list_data" => $listData
        ];

        return view("ajax/location", $data);
    }

}
