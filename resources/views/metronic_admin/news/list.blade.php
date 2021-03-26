@extends('metronic_admin.layouts.app')

@section('list_news_active', 'active')
@section('page_title', 'Danh sách bài viết')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Danh sách bài viết</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                    <a href="{{ route('adMgetAddNews') }}" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Tiêu đề bài viết </th>
                                <th> Xóa </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($newss as $key=>$item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>
                                        <a
                                            href="{{ route('adMgetEditNews', ['id' => $item->id]) }}">{{ $item->title }}</a>
                                    </td>
                                    <td>
                                        <a class="btn delete-btn"
                                            href="{{ route('adMgetDelNews', ['id' => $item->id]) }}"
                                            onclick="return confirm('Bạn có chắc chắn xóa bài viết này?');">
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