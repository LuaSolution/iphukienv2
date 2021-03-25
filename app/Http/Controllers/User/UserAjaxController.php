<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Helpers;

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

}
