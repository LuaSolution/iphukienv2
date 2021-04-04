@extends('metronic_admin.layouts.app')

@section('list_roles_active', 'active')
@section('page_title', 'Danh sách vai trò')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Danh sách vai trò</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                    <a href="{{ route('adMgetAddRole') }}" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Tên vai trò </th>
                                <th> Tên hiển thị </th>
                                <th> Xóa </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $key=>$item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>
                                        <a
                                            href="{{ route('adMgetEditRole', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                    </td>
                                    <td>
                                        <a
                                            href="{{ route('adMgetEditRole', ['id' => $item->id]) }}">{{ $item->display_name }}</a>
                                    </td>
                                    <td>
                                        <a class="btn delete-btn"
                                            href="{{ route('adMgetDelRole', ['id' => $item->id]) }}"
                                            onclick="return confirm('Bạn có chắc chắn xóa vai trò này?');">
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