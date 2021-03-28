<?php

namespace App\Http\Controllers\MetronicAdmin;

use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    /**
     * Get add Role page
     */
    public function getAddRole()
    {
        return view('metronic_admin.roles.add', $this->data);
    }

    /**
     * Post add Role page
     */
    public function postAddRole(Request $request)
    {
        // name
        $name = $request->input('name');
        if (!$name) {
            return redirect()->route('adMgetListRole')->with('error', 'Thêm thất bại!');
        }
        // display name
        $displayName = $request->input('display-name');
        if (!$displayName) {
            return redirect()->route('adMgetListRole')->with('error', 'Thêm thất bại!');
        }
        
        $dataInsert = [
            'name' => $name,
            'display_name' => $displayName,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = (new Role())->insertRole($dataInsert);

        if ($result instanceof Role) {
            return redirect()->route('adMgetListRole')->with('success', 'Thêm thành công!');
        } else {
            return redirect()->route('adMgetListRole')->with('error', 'Thêm thất bại!');
        }

    }

    /**
     * Get edit Role page
     */
    public function getEditRole($id)
    {

        $role = (new Role())->getRoleById($id);

        if ($role) {
            $this->data['role'] = $role;

            return view('metronic_admin.roles.edit', $this->data);
        } else {
            return redirect()->route('adMgetListRole');
        }

    }

    /**
     * Role edit page
     */
    public function postEditRole($id, Request $request)
    {

        // name
        $name = $request->input('name');
        if (!$name) {
            return redirect()->route('adMgetListRole')->with('error', 'Thêm thất bại!');
        }
        // display name
        $displayName = $request->input('display-name');
        if (!$displayName) {
            return redirect()->route('adMgetListRole')->with('error', 'Thêm thất bại!');
        }

        $dataUpdate = [
            'name' => $name,
            'display_name' => $displayName,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = (new Role())->updateRole($id, $dataUpdate);
        if ($result > 0) {
            return redirect()->route('adMgetEditRole', ['id' => $id])->with('success', 'Cập nhật thành công!');
        } else {
            return redirect()->route('adMgetEditRole', ['id' => $id])->with('error', 'Cập nhật thất bại!');
        }

    }

    /**
     * Get list Role page
     */
    public function getListRole()
    {
        $this->data['roles'] = (new Role())->getListRole();

        return view('metronic_admin.roles.list', $this->data);
    }

    /**
     * Delete Role
     */
    public function getDelRole($id)
    {
        $result = (new Role())->deleteRole($id);

        if ($result > 0) {
            return redirect()->route('adMgetListRole')->with('success', 'Xóa thành công!');
        } else {
            return redirect()->route('adMgetListRole')->with('error', 'Xóa thất bại!');
        }
    }
}
