@extends('metronic_admin.layouts.app')

@section('list_trademarks_active', 'active')
@section('page_title', 'Danh sách thương hiệu')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Danh sách thương hiệu</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                    <a href="{{ route('adMgetAddTrademark') }}" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Tên thương hiệu </th>
                                <th> Xóa </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trademarks as $key=>$item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>
                                        <a
                                            href="{{ route('adMgetEditTrademark', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                    </td>
                                    <td>
                                        <a class="btn delete-btn"
                                            href="{{ route('adMgetDelTrademark', ['id' => $item->id]) }}"
                                            onclick="return confirm('Bạn có chắc chắn xóa thương hiệu này?');">
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