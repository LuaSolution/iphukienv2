<?php

namespace App\Http\Controllers\MetronicAdmin;

use App\Cate;
use App\Config;
use App\Http\Controllers\Controller;
use App\Mail;
use App\Order;
use App\Product;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    /**
     * Get login page
     */
    public function getLogin()
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return redirect()->route('adMgetHome');
            } else {
                return redirect()->route('getHome');
            }
        } else {
            return view('metronic_admin.login', $this->data);
        }
    }

    /**
     * Product login page
     */
    public function postLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            // Authentication passed...
            if (Auth::user()->role_id == 1) {
                toast()->success('Đăng nhập thành công');
                return redirect()->route('adMgetHome');
            } else {
                return redirect()->route('getHome');
            }
        } else {
            toast()->error('Mật khẩu hoặc tài khoản không đúng');
            return redirect()->route('adMgetLogin');
        }
    }

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
            return redirect()->route('adMgetHome')->with('error', 'Chưa nhập Email');
        }
        $password = $request->input('password');
        if (!$password) {
            return redirect()->route('adMgetHome')->with('error', 'Chưa nhập Password');
        }
        if (strlen($password) < 6) {
            return redirect()->route('adMgetHome')->with('error', 'Password ít nhất 6 kí tự');
        }
        $phone_number = $request->input('phone_number');
        if (!$phone_number) {
            $phone_number = "";
        }

        $userModal = new User();
        $userCheck = $userModal->getUserByEmail($email);

        if ($userCheck) {
            return redirect()->route('adMgetHome')->with('error', 'Email đã tồn tại');
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'phone_number' => $phone_number,
            'level' => 1,
            'admin' => 1,
        ]);

        return redirect()->route('adMMgetListUser')->with('success', 'Thêm người dùng thành công');
    }

    /**
     * Get list user
     */
    public function getListUser()
    {

        $userModel = new User();
        $users = $userModel->getListUser();
        $this->data['users'] = $users;

        return view('metronic_admin.user_list', $this->data);
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

    /**
     * Get home page
     */
    public function getHome()
    {
        return view('metronic_admin.home', $this->data);
    }

    /**
     * Update config by ajax
     */
    public function updateConfig(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');

        if ($title && $description) {
            $configModel = new Config();

            $result = $configModel->updateConfig(['title' => $title, 'description' => $description]);
            return $result;
        }
        return 0;
    }

    /**
     * Get add product page
     */
    public function getAddProduct()
    {

        return view('metronic_admin.product_add', $this->data);
    }

    /**
     * Post add product page
     */
    public function postAddProduct(Request $request)
    {

        // title
        $title = $request->input('title');
        if (!$title) {
            $title = "Product " . time();
        }
        // slug
        $slug = $request->input('slug');
        if (!$slug) {
            $slug = str_slug($title, '-');
        } else {
            $slug = str_slug($slug, '-');
        }
        // type
        $type = $request->input('type');
        if (!$type) {
            $type = 0;
        }
        // coverFile
        $coverFile = $request->file('cover');
        $cover = "";
        if ($request->hasFile('cover')) {
            $cover = $slug . '.' . $request->cover->extension();
            $request->cover->storeAs('img/post/', $cover);
            $cover .= '?n=' . time();
        }
        // list_img
        $listImgFile = $request->file('list_img');

        $listImg = [];
        if ($request->hasFile('list_img')) {
            foreach ($listImgFile as $key => $value) {
                $imgTemp = $slug . '_' . $key . '.' . $value->extension();
                $value->storeAs('img/post/', $imgTemp);
                $imgTemp .= '?n=' . time();
                $listImg[] = $imgTemp;
            }
        }
        $listImg = json_encode($listImg);

        // pos
        $pos = $request->input('pos');
        if (!$pos) {
            $pos = 999;
        }
        // price
        $price = $request->input('price');
        if (!$price) {
            $price = 1000;
        }
        // unit
        $unit = $request->input('unit');
        if (!$unit) {
            $unit = '';
        }
        // weight
        $weight = $request->input('weight');
        if (!$weight) {
            $weight = '';
        }
        // origin
        $origin = $request->input('origin');
        if (!$origin) {
            $origin = '';
        }
        $status = $request->input('status');
        // description
        $description = $request->input('description');
        if (!$description) {
            $description = "";
        }
        // content
        $content = $request->input('content');
        if (!$content) {
            $content = "";
        }

        $dataInsert = [
            'title' => $title,
            'slug' => $slug,
            'type' => $type,
            'cover' => $cover,
            'list_img' => $listImg,
            'pos' => $pos,
            'price' => $price,
            'unit' => $unit,
            'weight' => $weight,
            'origin' => $origin,
            'status' => $status,
            'description' => $description,
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $productModel = new Product();
        $result = $productModel->insertProduct($dataInsert);
        if ($result > 0) {
            return redirect()->route('adMgetListProduct')->with('success', 'Thêm thành công!');
        } else {
            return redirect()->route('adMgetListProduct')->with('error', 'Thêm thất bại!');
        }

    }

    /**
     * Get edit product page
     */
    public function getEditProduct($id)
    {

        $productModel = new Product();
        $product = $productModel->getProductById($id);

        if ($product) {
            $this->data['product'] = $product;
            return view('metronic_admin.product_edit', $this->data);
        } else {
            return redirect()->route('adMgetListProduct');
        }

    }

    /**
     * Product edit product page
     */
    public function postEditProduct($id, Request $request)
    {

        // title
        $title = $request->input('title');
        if (!$title) {
            $title = "Product " . time();
        }
        // slug
        $slug = $request->input('slug');
        if (!$slug) {
            $slug = str_slug($title, '-');
        } else {
            $slug = str_slug($slug, '-');
        }
        // type
        $type = $request->input('type');
        if (!$type) {
            $type = 0;
        }
        // coverFile
        $coverFile = $request->file('cover');
        $cover = "";
        if ($request->hasFile('cover')) {
            $cover = $slug . '.' . $request->cover->extension();
            $request->cover->storeAs('img/post/', $cover);
            $cover .= '?n=' . time();
        }
        // list_img
        $listImgFile = $request->file('list_img');

        $listImg = [];
        if ($request->hasFile('list_img')) {
            foreach ($listImgFile as $key => $value) {
                $imgTemp = $slug . '_' . $key . '.' . $value->extension();
                $value->storeAs('img/post/', $imgTemp);
                $imgTemp .= '?n=' . time();
                $listImg[] = $imgTemp;
            }
        }

        // pos
        $pos = $request->input('pos');
        if (!$pos) {
            $pos = 999;
        }
        // price
        $price = $request->input('price');
        if (!$price) {
            $price = 1000;
        }
        // unit
        $unit = $request->input('unit');
        if (!$unit) {
            $unit = '';
        }
        // weight
        $weight = $request->input('weight');
        if (!$weight) {
            $weight = '';
        }
        // origin
        $origin = $request->input('origin');
        if (!$origin) {
            $origin = '';
        }
        $status = $request->input('status');
        // description
        $description = $request->input('description');
        if (!$description) {
            $description = "";
        }
        // content
        $content = $request->input('content');
        if (!$content) {
            $content = "";
        }

        $dataUpdate = [
            'title' => $title,
            'slug' => $slug,
            'type' => $type,
            'pos' => $pos,
            'price' => $price,
            'unit' => $unit,
            'weight' => $weight,
            'origin' => $origin,
            'status' => $status,
            'description' => $description,
            'content' => $content,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if ($cover != "") {
            $dataUpdate['cover'] = $cover;
        }
        if (count($listImg) > 0) {
            $dataUpdate['list_img'] = json_encode($listImg);
        }

        $productModel = new Product();
        $result = $productModel->updateProduct($id, $dataUpdate);
        if ($result > 0) {
            return redirect()->route('adMgetEditProduct', ['id' => $id])->with('success', 'Cập nhật thành công!');
        } else {
            return redirect()->route('adMgetEditProduct', ['id' => $id])->with('error', 'Cập nhật thất bại!');
        }

    }

    /**
     * Get list product page
     */
    public function getListProduct(Request $request)
    {
        $query = $request->query('query');

        $productModel = new Product();
        if ($query == null || $query == '') {
            $products = $productModel->getListProduct();
        } else {
            $products = $productModel->getListProductByQuery($query);
        }

        $this->data['products'] = $products;

        return view('metronic_admin.product_list', $this->data);
    }

    /**
     * Delete product
     */
    public function getDelProduct($id)
    {

        $productModel = new Product();
        $result = $productModel->deleteProduct($id);

        if ($result > 0) {
            return redirect()->route('adMgetListProduct')->with('success', 'Xóa thành công!');
        } else {
            return redirect()->route('adMgetListProduct')->with('error', 'Xóa thất bại!');
        }
    }

    public function getListContact()
    {

        $newsModel = new Mail();
        $newss = $newsModel->getListContact();
        $this->data['contacts'] = $newss;

        return view('metronic_admin.contact_list', $this->data);
    }

    public function getContact($id)
    {

        $m = new Mail();
        $store = $m->getById($id);

        if ($store) {
            $this->data['contact'] = $store;
            return view('metronic_admin.contact_edit', $this->data);
        } else {
            return redirect()->route('adMgetListContact');
        }
    }

    /**
     * Get add cate page
     */
    public function getAddCate()
    {

        return view('metronic_admin.cate_add', $this->data);
    }

    /**
     * Post add cate page
     */
    public function postAddCate(Request $request)
    {

        // title
        $title = $request->input('title');
        if (!$title) {
            $title = "Cate " . time();
        }
        // slug
        $slug = $request->input('slug');
        if (!$slug) {
            $slug = str_slug($title, '-');
        } else {
            $slug = str_slug($slug, '-');
        }
        // pos
        $pos = $request->input('pos');
        if (!$pos) {
            $pos = 999;
        }
        // description
        $description = $request->input('description');
        if (!$description) {
            $description = "";
        }

        $dataInsert = [
            'title' => $title,
            'slug' => $slug,
            'pos' => $pos,
            'description' => $description,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $cateModel = new Cate();
        $result = $cateModel->insertCate($dataInsert);
        if ($result > 0) {
            return redirect()->route('adMgetListCate')->with('success', 'Thêm thành công!');
        } else {
            return redirect()->route('adMgetListCate')->with('error', 'Thêm thất bại!');
        }

    }

    /**
     * Get edit cate page
     */
    public function getEditCate($id)
    {

        $cateModel = new Cate();
        $cate = $cateModel->getCateById($id);

        if ($cate) {
            $this->data['cate'] = $cate;
            return view('metronic_admin.cate_edit', $this->data);
        } else {
            return redirect()->route('adMgetListCate');
        }

    }

    /**
     * Cate edit cate page
     */
    public function postEditCate($id, Request $request)
    {

        // title
        $title = $request->input('title');
        if (!$title) {
            $title = "Cate " . time();
        }
        // slug
        $slug = $request->input('slug');
        if (!$slug) {
            $slug = str_slug($title, '-');
        } else {
            $slug = str_slug($slug, '-');
        }
        // pos
        $pos = $request->input('pos');
        if (!$pos) {
            $pos = 999;
        }
        // description
        $description = $request->input('description');
        if (!$description) {
            $description = "";
        }

        $dataUpdate = [
            'title' => $title,
            'slug' => $slug,
            'pos' => $pos,
            'description' => $description,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $cateModel = new Cate();
        $result = $cateModel->updateCate($id, $dataUpdate);
        if ($result > 0) {
            return redirect()->route('adMgetEditCate', ['id' => $id])->with('success', 'Cập nhật thành công!');
        } else {
            return redirect()->route('adMgetEditCate', ['id' => $id])->with('error', 'Cập nhật thất bại!');
        }

    }

    /**
     * Get list cate page
     */
    public function getListCate()
    {

        $cateModel = new Cate();
        $cates = $cateModel->getListCate();
        $this->data['cates'] = $cates;

        return view('metronic_admin.cate_list', $this->data);
    }

    /**
     * Delete cate
     */
    public function getDelCate($id)
    {

        $storeModel = new Cate();
        $result = $storeModel->deleteCate($id);

        if ($result > 0) {
            return redirect()->route('adMgetListCate')->with('success', 'Xóa thành công!');
        } else {
            return redirect()->route('adMgetListCate')->with('error', 'Xóa thất bại!');
        }
    }

    public function getListOrder()
    {

        $newsModel = new Order();
        $newss = $newsModel->getListContact();
        $this->data['orders'] = $newss;

        return view('metronic_admin.order_list', $this->data);
    }

    public function getOrder($id)
    {

        $m = new Order();
        $store = $m->getById($id);

        if ($store) {
            $this->data['order'] = $store;
            return view('metronic_admin.order_edit', $this->data);
        } else {
            return redirect()->route('adMgetListOrder');
        }
    }

    public function getConfimOrder($id)
    {
        DB::table('orders')
            ->where('id', $id)
            ->update(['status' => 1]);
        return redirect()->back();
    }
}
