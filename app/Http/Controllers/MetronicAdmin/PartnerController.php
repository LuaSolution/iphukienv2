<?php

namespace App\Http\Controllers\MetronicAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Partner;

class PartnerController extends Controller
{
    public function __construct(Partner $partner) {
        $this->partner = $partner;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->partner->all();

        return view ('metronic_admin.partners.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('metronic_admin.partners.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          // imageFile
        $imageFile = $request->file('image');
        $path = "";

        if ($request->hasFile('image')) {
            $image = date_timestamp_get(date_create()) . '.' . $request->image->extension();
            $path = $request->image->storeAs('img/partner', $image);
        }

        $dataInsert = [
            'image' => $path,
        ];

        $partner = new Partner();
        
        $result = $partner->insertPartner($dataInsert);

        if ($result instanceof Partner) {
            toast()->success('Thêm thành công');
            return redirect()->route('partners.create')->with('success', 'Thêm thành công!');
        } else {
            toast()->error('Thêm thất bại');
            return redirect()->route('partners.create')->with('error', 'Thêm thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partner = new Partner();
        $result = $partner->deletePartner($id);

        if ($result > 0) {
            toast()->success('Xóa thông tin bài viết thành công');
            return redirect()->route('partners.index')->with('success', 'Xóa thành công!');
        } else {
            toast()->error('Xóa thông tin bài viết thất bại');
            return redirect()->route('partners.index')->with('error', 'Xóa thất bại!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
}
