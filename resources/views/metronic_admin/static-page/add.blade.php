@extends('metronic_admin.layouts.app')

@section('add_page_active', 'active')
@section('page_title', 'Tạo page mới')

@section('content')

<div class="row">
  <div class="col-md-12">
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="caption font-red-sunglo">
          <i class="icon-settings font-red-sunglo"></i>
          <span class="caption-subject bold uppercase"> Tạo page mới</span>
        </div>
        <div class="actions">
          <div class="btn-group">
            <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown">
              Danh sách page
            </a>
          </div>
        </div>
      </div>
      <div class="portlet-body form">
        <form action="{{ route('adMpostAddStaticPages') }}" method="POST" id="create-new" class="form-create"
          enctype='multipart/form-data'>
          {{ csrf_field() }}
          <div class="form-body">
            <div class="form-group form-md-line-input has-success">
              <input type="text" class="form-control" id="form-title" name="name" required="">
              <label for="form-title">Tên page</label>
            </div>
            <div class="form-group form-md-line-input has-success">
              <input type="text" class="form-control" id="form-slug" name="slug" required="">
              <label for="form-slug">Link</label>
            </div>
            <div class="form-group form-md-line-input has-success">
              <input type="text" class="form-control" id="form-title" name="icon" required="">
              <label for="form-title">Icon</label>
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