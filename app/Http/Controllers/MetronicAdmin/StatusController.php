<?php

namespace App\Http\Controllers\MetronicAdmin;

use App\Http\Controllers\Controller;
use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{

    /**
     * Get add Status page
     */
    public function getAddStatus()
    {
        return view('metronic_admin.statuses.add', $this->data);
    }

    /**
     * Post add Status page
     */
    public function postAddStatus(Request $request)
    {
        // name
        $name = $request->input('name');
        if (!$name) {
            return redirect()->route('adMgetListStatus')->with('error', 'Thêm thất bại!');
        }
        
        $dataInsert = [
            'name' => $name,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = (new Status())->insertStatus($dataInsert);

        if ($result instanceof Status) {
            return redirect()->route('adMgetListStatus')->with('success', 'Thêm thành công!');
        } else {
            return redirect()->route('adMgetListStatus')->with('error', 'Thêm thất bại!');
        }

    }

    /**
     * Get edit Status page
     */
    public function getEditStatus($id)
    {

        $status = (new Status())->getStatusById($id);

        if ($status) {
            $this->data['status'] = $status;

            return view('metronic_admin.statuses.edit', $this->data);
        } else {
            return redirect()->route('adMgetListStatus');
        }

    }

    /**
     * Status edit page
     */
    public function postEditStatus($id, Request $request)
    {

        // name
        $name = $request->input('name');
        if (!$name) {
            return redirect()->route('adMgetListStatus')->with('error', 'Thêm thất bại!');
        }

        $dataUpdate = [
            'name' => $name,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = (new Status())->updateStatus($id, $dataUpdate);
        if ($result > 0) {
            return redirect()->route('adMgetEditStatus', ['id' => $id])->with('success', 'Cập nhật thành công!');
        } else {
            return redirect()->route('adMgetEditStatus', ['id' => $id])->with('error', 'Cập nhật thất bại!');
        }

    }

    /**
     * Get list Status page
     */
    public function getListStatus()
    {
        $this->data['statuses'] = (new Status())->getListStatus();

        return view('metronic_admin.statuses.list', $this->data);
    }

    /**
     * Delete Status
     */
    public function getDelStatus($id)
    {
        $result = (new Status())->deleteStatus($id);

        if ($result > 0) {
            return redirect()->route('adMgetListStatus')->with('success', 'Xóa thành công!');
        } else {
            return redirect()->route('adMgetListStatus')->with('error', 'Xóa thất bại!');
        }
    }
}
