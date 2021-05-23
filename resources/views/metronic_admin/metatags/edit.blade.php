@extends('metronic_admin.layouts.app')

@section('edit_meta_active', 'active')

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> Chỉnh sửa Metatag tags</span>
                </div>
            </div>
            <div class="portlet-body form">
                <form action="{{route('adMpostEditMeta', ['id' => $Metatag->id])}}" method="POST" id="create-new"
                    class="form-create">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="form-group form-md-line-input has-success">
                            <input type="text" class="form-control"  name="title" required="" value="{{ $Metatag->title }}">
                            <label for="form-name">Title</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <input type="text" class="form-control"  name="url" required="" value="{{ $Metatag->url }}">
                            <label for="form-name">URL</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <input type="text" class="form-control"  name="canonical" required="" value="{{ $Metatag->canonical }}">
                            <label for="form-name">Canonical</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <input type="text" class="form-control"  name="description" required="" value="{{ $Metatag->description }}">
                            <label for="form-name">Description</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <input type="text" class="form-control"  name="keywords" required="" value="{{ $Metatag->keywords }}">
                            <label for="form-name">Keywords</label>
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue">CẬP NHẬT</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
@endsection
