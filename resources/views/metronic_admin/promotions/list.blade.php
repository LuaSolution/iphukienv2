@extends('metronic_admin.layouts.app')

@section('list_slider_active', 'active')
@section('page_title', 'Danh sách slider')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i></div>
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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key=>$item)
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td>
                                    <a href="{{ route('adMgetEditPromotion', ['id' => $item->id]) }}">
                                        <img src="{{ asset('/public/'. $item->image) }}" style="width:500px" class="img-fluid" alt="Responsive image">
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
