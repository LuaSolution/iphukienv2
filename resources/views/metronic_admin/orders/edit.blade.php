@extends('metronic_admin.layouts.app')

@section('list_orders_active', 'active')
@section('page_title', 'Danh sách Đơn hàng')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Chi tiết đơn hàng</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Sản phẩm </th>
                                <th> Tổng tiền </th>
                                <th> Số lượng </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $key=>$item)
                                <tr>
                                    <td> {{ $key + 1 }}</td>
                                    <td> {{ $item->product_name}}</td>
                                    <td> {{ $item->total_price}}</td>
                                    <td> {{ $item->total_count}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>
@endsection
