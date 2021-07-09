@extends('metronic_admin.layouts.app')

@section('add_news_active', 'active')
@section('page_title', 'Tạo bài viết mới')

@section('content')

<div class="row">
  <div class="col-md-12">
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="caption font-red-sunglo">
          <i class="icon-settings font-red-sunglo"></i>
          <span class="caption-subject bold uppercase"> Tạo bài viết mới</span>
        </div>
        <div class="actions">
          <div class="btn-group">
            <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown">
              Danh sách bài viết
            </a>
          </div>
        </div>
      </div>
      <div class="portlet-body form">
        <form action="{{ route('adMpostAddNews') }}" method="POST" id="create-new" class="form-create"
          enctype='multipart/form-data'>
          {{ csrf_field() }}
          <div class="form-body">
            <div class="form-group form-md-line-input has-success">
              <input type="text" class="form-control" id="form-title" name="title" required="">
              <label for="form-title">Tên bài viết</label>
            </div>
            <div class="form-group form-md-line-input has-success">
              <input type="text" class="form-control" id="form-slug" name="slug" required="">
              <label for="form-slug">Link thân thiện</label>
            </div>
            <div class="form-group form-md-line-input has-success">
              <textarea id="form-description-txt" class="text-content form-control" name="description"></textarea>
              <label for="form-title">Mô tả</label>
            </div>
            <div class="form-group form-md-line-input has-success">
              <input type="number" class="form-control" id="form-pos" name="pos">
              <label for="form-title">Thứ tự hiển thị</label>
            </div>
            <div class="form-group form-md-line-input">
              <textarea id="form-content-txt" class="text-content form-control" name="content"></textarea>
              <script>
                CKEDITOR.replace('form-content-txt', {
                  language: "en",
                  filebrowserUploadUrl: "{!! route('uploadImage', ['_token' => csrf_token() ]) !!}",
                  filebrowserUploadMethod: "form"
                });
              </script>
            </div>
            <div class="form-group form-md-line-input has-success">
              <label class="col-sm-2 form-control-label">Hình đại diện:</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="form-avatar" name="cover">
              </div>
              <img id="file-show" class="hidden" style="margin-top: 10px;max-width: 100%;max-height: 300px;">
            </div>
          </div>
          <div class="form-actions noborder">
            <input type="reset" value="RESET" class="btn btn-secondary" />

            <button type="submit" class="btn blue">Submit</button>
          </div>
        </form>
      </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->
  </div>
</div>
@endsection

@section('admin_js')
<script src="{{ asset('public/admin/js/post.js') }}" type="text/javascript"></script>
@endsection