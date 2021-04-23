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
                    <i class="fa fa-cogs"></i>Danh sách đơn hàng</div>
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
                                <th> Nhanh.vn ID </th>
                                <th> Địa chỉ </th>
                                <th> Xóa </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $key=>$item)
                                <tr>
                                    <td> <a href="{{ route('adMgetEditOrders', ['id' => $item->id]) }}">{{ $key + 1 }}</a> </td>
                                    <td> {{ $item->nhanh_order_id }} </td>
                                    <td> {{ $item->address }} </td>
                                    <td>
                                        <a class="btn delete-btn"
                                            href="{{ route('adMgetDelOrder', ['id' => $item->id]) }}"
                                            onclick="return confirm('Bạn có chắc chắn xóa đơn hàng này?');">
                                            <i class="icon icon-close"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-7 col-sm-7">
                        <div class="dataTables_paginate paging_bootstrap_full_number" id="sample_1_2_paginate">
                            <ul class="pagination" style="visibility: visible;">
                            {{ $orders->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>
@endsection
