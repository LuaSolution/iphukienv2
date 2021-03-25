@extends('admin.layout')

@section('list_order_active', 'active')

@section('content')

<!-- Create Article Section -->
<section class="mt-30px mb-30px forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- Recent Updates Widget          -->
                <div id="create-news" class="card updates">
                    <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="h2 bold"><a href="javascript:void(0)">Thông tin liên hệ</a></h2>
                    </div>
                    <div id="create-box" class="show create-box card-body">
                        <form method="POST" id="create-new" class="form-create" enctype='multipart/form-data'>
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Tên người liên hệ:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="form-title" name="title" required=""
                                        value="{{ $order->name }}">
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Địa chỉ nhận hàng:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="form-slug" name="slug" required=""
                                        value="{{ $order->address }}">
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Phone:</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="form-pos" name="pos"
                                        value="{{ $order->phone }}">
                                </div>
                            </div>
                            <div class="line"></div>

                            <div class="content-post">

                                <div class="form-group row">
                                    <label class="col-sm-2 form-control-label">Nội dung:</label>
                                    <div class="col-sm-10">
                                        <textarea id="form-content-txt" class="text-content form-control"
                                            name="content">{!! $order->note !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- 
                            <div class="form-group bold">
                                <input type="reset" value="RESET" class="btn btn-secondary"> <input type="submit"
                                    value="CẬP NHẬT" class="btn btn-primary">
                            </div> -->
                        </form>
                    </div>
                </div>
                <!-- Recent Updates Widget End-->
            </div>
        </div>
    </div>
</section>

@endsection