@extends('metronic_admin.layouts.app')

@section('list_products_active', 'active')
@section('page_title', 'Danh sách sản phẩm')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Danh sách sản phẩm</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                    <a href="{{ route('adMgetAddProduct') }}" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Tên sản phẩm </th>
                                <th> Danh mục </th>
                                <th> Giá gốc </th>
                                <th> Giá giảm </th>
                                <th> Đã bán </th>
                                <th> Xóa </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $key=>$item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>
                                        <a
                                            href="{{ route('adMgetEditProduct', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                    </td>
                                    <td>
                                        {{ $item->category_name }}
                                    </td>
                                    <td>
                                        {{ number_format($item->price, 0, ',', '.') }}VNĐ
                                    </td>
                                    <td>
                                        {{ number_format($item->sale_price, 0, ',', '.') }}VNĐ
                                    </td>
                                    <td>
                                        {{ $item->sold }}
                                    </td>
                                    <td>
                                        <a class="btn delete-btn"
                                            href="{{ route('adMgetDelProduct', ['id' => $item->id]) }}"
                                            onclick="return confirm('Bạn có chắc chắn xóa sản phẩm này?');">
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