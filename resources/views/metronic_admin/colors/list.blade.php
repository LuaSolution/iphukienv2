@extends('metronic_admin.layouts.app')

@section('list_categories_active', 'active')
@section('page_title', 'Danh sách danh mục')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Danh sách danh mục</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                    <a href="{{ route('adMgetAddCategory') }}" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Tiêu đề danh mục </th>
                                <th> Danh mục cha </th>
                                <th> Xóa </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cates as $key=>$item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>
                                        <a
                                            href="{{ route('adMgetEditCategory', ['id' => $item->id]) }}">{{ $item->title }}</a>
                                    </td>
                                    <td>
                                        {{ $item->parent_id }}
                                    </td>
                                    <td>
                                        <a class="btn delete-btn"
                                            href="{{ route('adMgetDelCategory', ['id' => $item->id]) }}"
                                            onclick="return confirm('Bạn có chắc chắn xóa danh mục này?');">
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