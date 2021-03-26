@extends('metronic_admin.layouts.app')

@section('page_title', 'Dashboard')
@section('home_active', 'active')

@section('content')

<div class="row">
  <div class="col-md-12">
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="caption font-red-sunglo">
          <i class="icon-settings font-red-sunglo"></i>
          <span class="caption-subject bold uppercase"> Cấu hình title web</span>
        </div>
        <!-- <div class="actions">
          <div class="btn-group">
            <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown"> Actions
              <i class="fa fa-angle-down"></i>
            </a>
          </div>
        </div> -->
      </div>
      <div class="portlet-body form">
        <form action="#seo">
          <div class="form-body">
            <div class="form-group form-md-line-input has-success">
              <input type="text" class="form-control" id="form_control_1" placeholder="Success state" name="title"
                form="seo" value="{{ config('config.title') }}">
              <label for="form_control_1">Title</label>
            </div>
            <div class="form-group form-md-line-input">
              <textarea class="form-control" rows="3" name="description" form="seo"
                placeholder="Enter more text">{{ config('config.description') }}</textarea>
              <label for="form_control_1">Description</label>
            </div>
          </div>
          <div class="form-actions noborder">
            <button type="button" class="btn blue" name="submit" id="update-config"
              link="{{ route('adMupdateConfig') }}">Submit</button>
          </div>
        </form>
      </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->
  </div>
</div>

@endsection
@section('admin_js')
<script type="text/javascript">
  var checkUpdateConfig = 1;
  notify('Cập nhật thành công', 1);
  $(document).on('click', '#update-config', function () {
    console.log('submit change')
    if (checkUpdateConfig == 1) {
      checkUpdateConfig = 0;

      var title = $("input[name='title']").val();
      var description = $("textarea[name='description']").val();
      var link = $(this).attr('link');
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
          url: 'metronic-admin/config',
          type: 'post',
          data: {
            'title': title,
            'description': description
          }
        })
        .done(function (data) {
          if (data == 1) {
            notify('Cập nhật thành công', 1);
          } else {
            notify('Cập nhật thất bại', 0);
          }
          checkUpdateConfig = 1;
          console.log(data);
        })
        .fail(function () {
          notify('Cập nhật thất bại', 0);
        });
    }

  });
</script>
@endsection
