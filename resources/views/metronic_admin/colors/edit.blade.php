@extends('metronic_admin.layouts.app')

@section('edit_colors_active', 'active')

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> Chỉnh sửa màu sắc</span>
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown">
                            Danh sách màu sắc
                        </a>
                    </div>
                </div>
            </div>
            <div class="portlet-body form">
                <form action="{{route('adMpostEditColor', ['id' => $color->id])}}" method="POST" id="create-new"
                    class="form-create">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="form-group form-md-line-input has-success">
                            <input type="text" class="form-control" id="form-name" name="name" required="" value="{{ $color->name }}">
                            <label for="form-name">Tên màu sắc</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <label for="form-code">Mã màu</label>
                            <input type="text" id="code" name="code" class="form-control demo" data-control="hue" value="{{ $color->code }}">
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <label class="control-label">Danh mục</label>
                        <select class="bs-select form-control" name="category" id="category">
                            @foreach($categories as $key=>$item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $color->category_id ? 'selected' : '' }}>{{ $item->title }}
                                </option>
                            @endforeach
                        </select>
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

@section('admin_js')
<script src="{{ asset('public/metronic_assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/metronic_assets/pages/scripts/components-color-pickers.min.js') }}" type="text/javascript"></script>
@endsection