@extends('metronic_admin.layouts.app')

@section('add_sale_products_active', 'active')
@section('page_title', 'Tạo flash sale')

@section('content')

<div class="row">
  <div class="col-md-12">
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="caption font-red-sunglo">
          <i class="icon-settings font-red-sunglo"></i>
          <span class="caption-subject bold uppercase"> Tạo flash sale</span>
        </div>
        <div class="actions">
          <div class="btn-group">
            <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown">
              Danh sách flash sale
            </a>
          </div>
        </div>
      </div>
      <div class="portlet-body form">
        <form action="{{ route('adMpostAddSaleProduct') }}" method="POST" id="create-new" class="form-create">
          {{ csrf_field() }}
          <div class="form-group form-md-line-input has-success">
                <label class="control-label">Sản phẩm</label>
                <select class="bs-select form-control" name="product" id="product" data-live-search="true">
                    @foreach($products as $key=>$item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
          </div>
          <div class="form-group form-md-line-input has-success">
              <input class="form-control date-picker" id="form-from-date" name="from_date" size="16" type="text" value="" />
              <label for="form-price">Từ ngày</label>
          </div>
          <div class="form-group form-md-line-input has-success">
              <input class="form-control date-picker" id="form-to-date" name="to_date" size="16" type="text" value="" />
              <label for="form-price">Đến ngày</label>
          </div>
          <div class="form-group form-md-line-input has-success">
              <input type="number" class="form-control" id="form-sale-price" name="sale_price" required="">
              <label for="form-price">Giá sale</label>
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
<script src="{{ asset('public/metronic_assets/global/plugins/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/metronic_assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/metronic_assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/metronic_assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/metronic_assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/metronic_assets/global/plugins/clockface/js/clockface.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/metronic_assets/pages/scripts/components-date-time-pickers.min.js') }}" type="text/javascript"></script>
@endsection