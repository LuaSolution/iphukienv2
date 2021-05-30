@extends('metronic_admin.layouts.app')

@section('edit_sliders_active', 'active')

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> Chỉnh sửa </span>
                </div>
            </div>
            <div class="portlet-body form">
                <form action="{{route('adMpostEditPromotion', ['id' => $data->id])}}" method="POST" id="create-new" enctype='multipart/form-data' class="form-create">
                    {{ csrf_field() }}
                    <div class="form-group form-md-line-input has-success">
                            <input type="text" class="form-control"  name="href" required="" value="{{ $data->href}}">
                            <label for="form-name">URL</label>
</div>
<div class="form-group form-md-line-input has-success">
                <label class="control-label">Ẩn/hiện</label>

                    <select class="bs-select form-control" name="hide" id="hide">
                        <option value="1" @if ($data->hide == "1") {{ 'selected' }} @endif>Hiện</option>
                        <option value="2" @if ($data->hide == "2") {{ 'selected' }} @endif>Ẩn</option>
                    </select>
            </div>
                    <div class="form-group form-md-line-input has-success">
                        <label class="col-sm-2 form-control-label">Hình đại diện</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="form-image" name="image">
                            <label class="custom-file-label" for="form-image">
                                @if($data->image != "")
                                    {{ substr($data->image,0,strpos($data->image,'?')) }}
                                @else
                                    Choose file
                                @endif
                            </label>
                        </div>
                        <img id="file-show" style="width:500px" @if($data->image != "")
                        src="{{ asset('/public/' .$data->image) }}" @else
                        class="hidden" @endif >
                    </div>
                    <div class="form-actions noborder">
                        <input type="reset" value="RESET" class="btn btn-secondary" />

                        <button type="submit" class="btn blue">CẬP NHẬT</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
@endsection
