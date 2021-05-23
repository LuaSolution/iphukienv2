@extends('metronic_admin.layouts.app')

@section('list_meta_active', 'active')
@section('page_title', 'Danh sách Metatag')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Danh sách Metatag</div>
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
                                <th> Page </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key=>$item)
                            <tr>
                                <td>
                                <a href="{{ route('adMgetEditMeta', ['id' => $item->id]) }}">{{$item->page}}</a>
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
