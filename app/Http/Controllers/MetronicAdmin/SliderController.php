<?php

namespace App\Http\Controllers\MetronicAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;

class SliderController extends Controller
{
    public function __construct(Slider $slider) {
        $this->slider = $slider;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  $this->slider->all();

        return view ('metronic_admin.sliders.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('metronic_admin.sliders.add');
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
            $path = $request->image->storeAs('img/slider', $image);
        }

        $dataInsert = [
            'image' => $path,
        ];

        $slider = new Slider();
        
        $result = $slider->insertSlider($dataInsert);

        if ($result instanceof Slider) {
            toast()->success('Thêm thành công');
            return redirect()->route('sliders.create')->with('success', 'Thêm thành công!');
        } else {
            toast()->error('Thêm thất bại');
            return redirect()->route('sliders.create')->with('error', 'Thêm thất bại!');
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
        return redirect()->route('sliders.edit', ['id' => $id])->with('success', 'Bạn đã bị điều chuyển hướng!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = new Slider();
        $data = $slider->getSliderById($id);

        if ($data) {
            return view ('metronic_admin.sliders.edit', compact('data'));
        } else {
            return redirect()->route('sliders.index');
        }
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
        // imageFile
        $imageFile = $request->file('image');
        $path = "";

        if ($request->hasFile('image')) {
            $image = date_timestamp_get(date_create()) . '.' . $request->image->extension();
            $path = $request->image->storeAs('img/slider', $image);
        }

        $dataUpdate = [
            'image' => $path,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $sliders = new Slider();

        $result = $sliders->updateSlider($id, $dataUpdate);

        if ($result > 0) {
            toast()->success('Sửa thành công');
            return redirect()->route('sliders.edit', ['id' => $id])->with('success', 'Cập nhật thành công!');
        } else {
            toast()->error('Sửa thất bại');
            return redirect()->route('sliders.edit', ['id' => $id])->with('error', 'Cập nhật thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
