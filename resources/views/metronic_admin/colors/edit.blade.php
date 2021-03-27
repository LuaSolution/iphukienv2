@extends('metronic_admin.layouts.app')

@section('edit_categories_active', 'active')

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> Chỉnh sửa danh mục</span>
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown">
                            Danh sách danh mục
                        </a>
                    </div>
                </div>
            </div>
            <div class="portlet-body form">
                <form action="{{route('adMpostEditCategory', ['id' => $cate->id])}}" method="POST" id="create-new"
                    class="form-create">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="form-group form-md-line-input has-success">
                            <input type="text" class="form-control" id="form-title" name="title" required="" value="{{ $cate->title }}">
                            <label for="form-title">Tên danh mục</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <input type="text" class="form-control" id="form-slug" name="slug" required="" value="{{ $cate->slug }}">
                            <label for="form-slug">Link thân thiện</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <input type="number" class="form-control" id="form-pos" name="pos" value="{{ $cate->pos }}">
                            <label for="form-title">Thứ tự hiển thị</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <label class="control-label">Danh mục cha</label>

                            <select class="bs-select form-control" name="parentId" id="parentId">
                                <option value="" {{$cate->parent_id == NULL ? 'selected' : ''}}>(Không có danh mục cha)</option>
                                @foreach($parentCate as $key=>$item)
                                <option value="{{ $item->id }}" {{$cate->parent_id == $item->id ? 'selected' : ''}}>{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
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
<script src="{{ asset('public/metronic_assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/metronic_assets/pages/scripts/components-bootstrap-select.min.js') }}" type="text/javascript"></script>
@endsection