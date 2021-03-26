@extends('metronic_admin.layouts.app')

@section('list_page_active', 'active')
@section('page_title', 'Danh sách page')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Danh sách page</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                    <a href="{{ route('adMgetAddStaticPage') }}" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Tiêu đề page </th>
                                <th> Url </th>
                                <th> Icon </th>
                                <th> Xóa </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key=>$item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>
                                        <a
                                            href="{{ route('adMgetEditStaticPages', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                    </td>
                                    <td> {{ $item->url }} </td>
                                    <td> <i class="{{$item->icon}}"></i> </td>
                                    <td>
                                        <a class="btn delete-btn"
                                            href="{{ route('adMgetDelStaticPages', ['id' => $item->id]) }}"
                                            onclick="return confirm('Bạn có chắc chắn xóa page này?');">
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