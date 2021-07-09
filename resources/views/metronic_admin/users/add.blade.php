@extends('metronic_admin.layouts.app')

@section('add_users_active', 'active')
@section('page_title', 'Tạo bài người dùng')

@section('content')

<div class="row">
  <div class="col-md-12">
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="caption font-red-sunglo">
          <i class="icon-settings font-red-sunglo"></i>
          <span class="caption-subject bold uppercase"> Tạo người dùng</span>
        </div>
        <div class="actions">
          <div class="btn-group">
            <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown">
              Danh sách người dùng
            </a>
          </div>
        </div>
      </div>
      <div class="portlet-body form">
        <form action="{{ route('adMpostAddUser') }}" method="POST" id="create-new" class="form-create">
          {{ csrf_field() }}
          <div class="form-body">
            <div class="form-group form-md-line-input has-success">
              <input type="text" class="form-control" id="form-name" name="name" required="">
              <label for="form-name">Tên người dùng</label>
            </div>
            <div class="form-group form-md-line-input has-success">
              <input type="text" class="form-control" id="form-email" name="email" required="">
              <label for="form-email">Email</label>
            </div>
            <div class="form-group form-md-line-input has-success">
              <input type="text" class="form-control" id="form-phone" name="phone">
              <label for="form-email">Phone</label>
            </div>
            <div class="form-group form-md-line-input has-success">
                <label class="control-label">Role</label>
                
                    <select class="bs-select form-control" name="role" id="role">
                        @foreach($roles as $key=>$item)
                        <option value="{{ $item->id }}">{{ $item->display_name }}</option>
                        @endforeach
                    </select>
            </div>
            <div class="form-group form-md-line-input has-success">
              <input type="text" class="form-control" id="form-password" name="password" required="">
              <label for="form-password">Mật khẩu</label>
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
<script src="{{ asset('public/metronic_assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/metronic_assets/pages/scripts/components-bootstrap-select.min.js') }}" type="text/javascript"></script>
@endsection