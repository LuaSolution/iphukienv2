@extends('metronic_admin.layouts.app')

@section('add_products_active', 'active')
@section('page_title', 'Tạo sản phẩm')

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> Tạo sản phẩm</span>
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown">
                            Danh sách sản phẩm
                        </a>
                    </div>
                </div>
            </div>
            <div class="portlet-body form">
                <form method="POST" id="create-new" class="form-create" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="form-group form-md-line-input has-success">
                            <input type="text" class="form-control" id="form-name" name="name" required="">
                            <label for="form-name">Tên sản phẩm</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <input type="text" class="form-control" id="form-slug" name="slug" >
                            <label for="form-slug">Link thân thiện</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <input type="text" class="form-control" id="form-video" name="video" >
                            <label for="form-video">Video</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <textarea id="form-short-description-txt" class="text-content form-control"
                                name="short-description"></textarea>
                            <label for="form-title">Mô tả ngắn</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <textarea id="form-description-txt" class="text-content form-control"
                                name="description"></textarea>
                            <label for="form-title">Mô tả</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <input type="number" class="form-control" id="form-price" name="price" required="">
                            <label for="form-price">Giá gốc</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <input type="number" class="form-control" id="form-sale-price" name="sale-price"
                               >
                            <label for="form-price">Giá giảm</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <label class="control-label">Danh mục</label>
                            <select class="bs-select form-control" name="category" id="category">
                                @foreach($categories as $key=>$item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <label class="control-label">Thương hiệu</label>
                            <select class="bs-select form-control" name="trademark" id="trademark">
                                @foreach($trademarks as $key=>$item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <label class="control-label">Trạng thái</label>
                            <select class="bs-select form-control" name="status" id="status">
                                <option value="no-status">(No status)</option>
                                @foreach($statuses as $key=>$item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <label class="control-label">Tags</label>
                            <select class="bs-select form-control" name="tag" id="tag">
                                <option value="no-tag">(No tag)</option>
                                @foreach($tags as $key=>$item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <label class="control-label">Sản phẩm cha</label>
                            <select id="parent" class="form-control select2">
                                <option value="no-parent" selected>(No parent)</option>
                                @foreach($listParentProduct as $key=>$item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-md-line-input has-success hide" id="size-block">
                            <label class="control-label">Kích thước</label>
                            <select class="bs-select form-control" data-actions-box="true" name="size" id="size">
                                <option value="no-size" selected>(No size)</option>
                                @foreach($sizes as $key=>$item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-md-line-input has-success hide" id="color-block">
                            <label class="control-label">Màu sắc</label>
                            <select class="bs-select form-control" name="color" id="color">
                                <option value="no-color" selected>(No color)</option>
                                @foreach($colors as $key=>$item)
                                <option value="{{ $item->id }}" id="color-{{$item->id}}" data-code="{{ $item->code }}">
                                    {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="upload-img-block" class="hide">
                          <div class="add-more-img">+ Thêm hình</div>
                          <div id="upload-img-area"></div>
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
<script src="{{ asset('public/metronic_assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js') }}"
    type="text/javascript"></script>
<script src="{{ asset('public/metronic_assets/pages/scripts/components-bootstrap-select.min.js') }}"
    type="text/javascript"></script>
<script src="{{ asset('public/metronic_assets/global/plugins/select2/js/select2.full.min.js') }}"
    type="text/javascript"></script>
<script src="{{ asset('public/metronic_assets/pages/scripts/components-select2.min.js') }}" type="text/javascript">
</script>
<script>
$('#parent').on('change', function() {
    let parentId = $(this).val();
    $("#size-block").addClass('hide')
    $("#color-block").addClass('hide')
    $("#upload-img-block").addClass('hide')
    if (parentId != 'no-parent') {
        $("#size-block").removeClass('hide')
        $("#color-block").removeClass('hide')
        $("#upload-img-block").removeClass('hide')
    }
})
$(document).on("click",".add-more-img",function() {
  $("#upload-img-area").append(
    "<div class='upload-img-wrapper'>"
    + "<div class='upload-img-item'>"
    + "<input class='upload-img-input hide' type='file' accept='image/*' />"
    + "</div>"
    + "<span class='remove-img'>Xóa</span>"
    + "</div>"
  );
});
$(document).on("click",".remove-img",function() {
    $(this).parent('.upload-img-wrapper').remove();
});
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      input.parentElement.style.backgroundImage = `url(${e.target.result})`;
    }
    reader.readAsDataURL(input.files[0]);
  } else {
    alert('select a file to see preview');
  }
}
$(document).on("click",".upload-img-item",function() {
  $(this).find('input')[0].click();
});
$(document).on("change",".upload-img-input",function() {
  readURL(this);
});
$(document).on("submit", "#create-new", function(e) {
    e.preventDefault();
    if($("#parent").val() != 'no-parent') {
        if($("#size").val() == 'no-size') {
            alert("Chưa chọn size");
        }
        if($("#color").val() == 'no-color') {
            alert("Chưa chọn màu sắc");
        }
        if(document.getElementsByClassName('upload-img-input').length == 0) {
            alert("Chưa chọn hình ảnh");
        }
    }
    let fd = new FormData();
    fd.append('name', $("#form-name").val());
    fd.append('slug', $("#form-slug").val());
    fd.append('category_id', $("#category").val());
    fd.append('short_description', $("#form-short-description-txt").val());
    fd.append('full_description', $("#form-description-txt").val());
    fd.append('price', $("#form-price").val());
    fd.append('sale_price', $("#form-sale-price").val());
    fd.append('status_id', $("#status").val());
    fd.append('video', $("#form-video").val());
    fd.append('tag_id', $("#tag").val());
    fd.append('parent_id', $("#parent").val());
    fd.append('size_id', $("#size").val());
    fd.append('color_id', $("#color").val());
    fd.append('trademark_id', $("#trademark").val());
    fd.append('total_image', document.getElementsByClassName('upload-img-input').length);
    if($("#parent").val() != 'no-parent') {
      let listImage = document.getElementsByClassName('upload-img-input');
      for(let i = 0; i < listImage.length; i++) {
          if(listImage[i].files.length > 0) {
            fd.append('list_image_'+i, listImage[i].files[0]);
          }
      }
    }
    fd.append('_token', '{{ csrf_token() }}');

    $.ajax({
        url: "{{ route('adMpostAddProduct') }}",
        type: 'post',
        data: fd,
        contentType: false,
        processData: false,
        success: function(response) {
            console.log(response)
            let res = JSON.parse(response);
            if (res.code == 1) {
                window.location.href =
                    `{{ URL::to('/') }}/metronic-admin/products-edit/${res.product_id}`;
            } else {
                alert(response.message);
            }

        },
        error: function(response) {
            console.log(response.responseText)
        }
    });

});
</script>
<script src="{{ asset('public/admin/js/post.js') }}" type="text/javascript"></script>
@endsection
