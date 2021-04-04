@extends('metronic_admin.layouts.app')

@section('list_sale_products_active', 'active')
@section('page_title', 'Danh sách flash sale')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Danh sách flash sale</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                    <a href="{{ route('adMgetAddSaleProduct') }}" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Tên sản phẩm </th>
                                <th> Từ ngày </th>
                                <th> Đến ngày </th>
                                <th> Giá đã giảm </th>
                                <th> Xóa </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($saleProducts as $key=>$item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>
                                        {{ $item->product_name }}
                                    </td>
                                    <td>
                                        {{ $item->from_date }}
                                    </td>
                                    <td>
                                        {{ $item->to_date }}
                                    </td>
                                    <td>
                                        {{ $item->sale_price }}
                                    </td>
                                    <td>
                                        <a class="btn delete-btn"
                                            href="{{ route('adMgetDelSaleProduct', ['id' => $item->id]) }}"
                                            onclick="return confirm('Bạn có chắc chắn xóa flash sale này?');">
                                            <i class="icon icon-close"></i>
                                        </a>
                                    </td>
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