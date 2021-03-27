@extends('metronic_admin.layouts.app')

@section('edit_data_active', 'active')
@section('page_title', 'Sửa page tĩnh')
@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> Chỉnh sửa trang tĩnh</span>
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown">
                            Danh sách trang tĩnh
                        </a>
                    </div>
                </div>
            </div>
            <div class="portlet-body form">
                <form action="{{route('adMpostEditStaticPages', ['id' => $data->id])}}" method="POST" id="create-new"
                            class="form-create" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="form-group form-md-line-input has-success">
                            <input type="text" class="form-control" id="form-name" name="name" required=""
                                value="{{ $data->name }}">
                            <label for="form-name">Tên trang tĩnh</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <input type="text" class="form-control" id="form-slug" name="slug" required=""
                                value="{{ $data->url }}">
                            <label for="form-slug">Link</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <input type="text" class="form-control" id="form-icon" name="icon" required=""
                                value="{{ $data->icon }}">
                            <label for="form-icon">Icon</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <textarea id="form-content-txt" class="text-content form-control"
                                name="content">{!! $data->content !!}</textarea>
                            <script>
                                CKEDITOR.replace('form-content-txt', {
                                    language: "en",
                                    filebrowserUploadUrl: "{!! route('uploadImage', ['_token' => csrf_token() ]) !!}",
                                    filebrowserUploadMethod: "form"
                                });
                            </script>
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
