@extends('metronic_admin.layouts.app')

@section('list_partner_active', 'active')
@section('page_title', 'Danh sách đối tác')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Danh sách đối tác</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                    <a href="{{ route('partners.create') }}" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                @if($errors->any())
                <h4>{{$errors->first()}}</h4>
                @endif
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th>Hình đối tác</th>
                                <th> Xóa </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key=>$item)
                            <tr>
                                <td style="width: 100px;"> {{ $key + 1 }} </td>
                                <td>
                                    <img src="{{ asset('/public/'. $item->image) }}" width="200px" class="rounded float-left" alt="Responsive image">
                                </td>
                                <td>
                                    <a class="btn delete-btn"
                                        href="{{ route('partners.destroy', ['id' => $item->id]) }}"
                                        onclick="return confirm('Bạn có chắc chắn xóa đối tác này?');">
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