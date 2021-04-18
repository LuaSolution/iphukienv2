@extends('metronic_admin.layouts.app')

@section('add_slider_active', 'active')
@section('page_title', 'Tạo Slider')

@section('content')

<div class="row">
  <div class="col-md-12">
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="caption font-red-sunglo">
          <i class="icon-settings font-red-sunglo"></i>
          <span class="caption-subject bold uppercase"> Tạo Slider</span>
        </div>
      </div>
      <div class="portlet-body form">
        <form action="{{ route('sliders.store') }}" enctype='multipart/form-data' method="POST" id="create-new" class="form-create">
          {{ csrf_field() }}
          <div class="form-body">
            <div class="form-group form-md-line-input has-success">
                <input type="file" class="custom-file-input" id="form-image" name="image" accept="image/*" required>
              <label for="form-name">Banner</label>
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