<?php

namespace App\Http\Controllers\MetronicAdmin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Add user
     */
    public function postAddUser(Request $request)
    {
        $name = $request->input('name');
        if (!$name) {
            $name = "Người dùng " . time();
        }
        $email = $request->input('email');
        if (!$email) {
            return redirect()->route('adMgetListUser')->with('error', 'Chưa nhập Email');
        }
        $password = $request->input('password');
        if (!$password) {
            return redirect()->route('adMgetListUser')->with('error', 'Chưa nhập Password');
        }
        if (strlen($password) < 6) {
            return redirect()->route('adMgetListUser')->with('error', 'Password ít nhất 6 kí tự');
        }
        $phone_number = $request->input('phone');
        if (!$phone_number) {
            $phone_number = "";
        }
        $role = $request->input('role');

        $userModal = new User();
        $userCheck = $userModal->getUserByEmail($email);

        if ($userCheck) {
            return redirect()->route('adMgetListUser')->with('error', 'Email đã tồn tại');
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'phone' => $phone_number,
            'role_id' => $role,
        ]);

        return redirect()->route('adMgetListUser')->with('success', 'Thêm người dùng thành công');
    }

    /**
     * Get list user
     */
    public function getListUser()
    {

        $userModel = new User();
        $users = $userModel->getListUser();
        $this->data['users'] = $users;

        return view('metronic_admin.users.list', $this->data);
    }

    /**
     * Get add user page
     */
    public function getAddUser()
    {
        $this->data['roles'] = (new Role())->getListRole();

        return view('metronic_admin.users.add', $this->data);
    }

    /**
     * Delete user
     */
    public function getDelUser($id)
    {

        $userModel = new User();
        $result = $userModel->deleteUser($id);

        if ($result > 0) {
            return redirect()->route('adMgetListUser')->with('success', 'Xóa thành công!');
        } else {
            return redirect()->route('adMgetListUser')->with('error', 'Xóa thất bại!');
        }
    }

    /**
     * update password
     */
    public function postUpdatePassword(Request $request)
    {
        $id = $request->input('id');
        $pw = $request->input('pw');
        if (strlen($pw) < 6) {
            return 0;
        }

        $userModel = new User();
        $result = $userModel->updateUser($id, ['password' => bcrypt($pw)]);

        return $result;
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('images'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/public/images/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
