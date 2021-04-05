@extends('metronic_admin.layouts.app')

@section('edit_products_active', 'active')

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> Chỉnh sửa sản phẩm</span>
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
                <form action="{{route('adMpostEditProduct', ['id' => $product->id])}}" method="POST" id="create-new"
                    class="form-create">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="form-group form-md-line-input has-success">
                            <input type="text" class="form-control" id="form-name" name="name" required="" value="{{ $product->name }}">
                            <label for="form-name">Tên sản phẩm</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <input type="text" class="form-control" id="form-slug" name="slug" required=""
                                value="{{ $product->slug }}">
                            <label for="form-slug">Link thân thiện</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <input type="text" class="form-control" id="form-video" name="video" required=""
                                value="{{ $product->video }}">
                            <label for="form-video">Video</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <textarea id="form-short-description-txt" class="text-content form-control"
                                name="short-description">{{ $product->short_description }}</textarea>
                            <label for="form-title">Mô tả ngắn</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <textarea id="form-description-txt" class="text-content form-control"
                                name="description">{{ $product->full_description }}</textarea>
                            <label for="form-title">Mô tả</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <input type="number" class="form-control" id="form-price" name="price" required="" value="{{ $product->price }}">
                            <label for="form-price">Giá gốc</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <input type="number" class="form-control" id="form-sale-price" name="sale-price" value="{{ $product->sale_price }}"
                                required="">
                            <label for="form-price">Giá giảm</label>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <label class="control-label">Danh mục</label>
                            <select class="bs-select form-control" name="category" id="category">
                                @foreach($categories as $key=>$item)
                                <option value="{{ $item->id }}" {{ $item->id == $product->category_id ? 'selected' : '' }}>{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <label class="control-label">Trạng thái</label>
                            <select class="bs-select form-control" name="status" id="status">
                                @foreach($statuses as $key=>$item)
                                <option value="{{ $item->id }}" {{ $item->id == $product->status_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <label class="control-label">Tags</label>
                            <select class="bs-select form-control" name="tag" id="tag">
                                @foreach($tags as $key=>$item)
                                <option value="{{ $item->id }}" {{ $item->id == $product->tag_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <label class="control-label">Kích thước</label>
                            <select class="bs-select form-control" multiple data-actions-box="true" name="size"
                                id="size">
                                @foreach($sizes as $key=>$item)
                                <option value="{{ $item->id }}" {{ in_array($item->id, $productSize) ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <label class="control-label">Màu sắc</label>
                            <select class="bs-select form-control" multiple name="color" id="color">
                                @foreach($colors as $key=>$item)
                                <option value="{{ $item->id }}" id="color-{{$item->id}}" data-code="{{ $item->code }}"
                                    {{ in_array($item->id, $productColorId) ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="color-image">
                            @foreach($productColorObj as $key=>$item)
                            <div class='color-image-block' id='color-image-{{$item->color}}' data-id='{{$item->color}}'>
                                <div class='img-block'>
                                    <input type='file' class='img-input' id='img-{{$item->color}}' />
                                </div>
                                <div class='color-block'>
                                    <input type='hidden' class='color-input' value='{{$item->color}}' />
                                    <div class='color-demo' style='background-color: {{$item->code}}'></div>
                                </div>
                            </div>
                            @endforeach
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
<script>
$('#color').on('change', function(){
  var selected = $(this).val();
  if(selected.length == 0) return;
  let str = "";
  let count = $(".color-image-block").length;

  for (let i = 0; i < selected.length; i++) {
    if($("#color-image-" + selected[i]).length == 0) {
      str = "<div class='color-image-block' id='color-image-" + selected[i] + "' data-id='" + selected[i] + "'>"
        + "<div class='img-block'>"
        + "<input type='file' class='img-input' id='img-" + selected[i] + "'/>"
        + "</div>"
        + "<div class='color-block'>"
        + "<input type='hidden' class='color-input' value='" + selected[i] + "' />"
        + "<div class='color-demo' style='background-color: " + $('#color-' + selected[i]).data('code') + "'></div>"
        + "</div>"
        + "</div>";
      $("#color-image").append(str);
    }
  }
  for (let i = 0; i < count; i++) {
    if(!selected.includes($(".color-image-block")[i].dataset.id)) {
      $("#color-image-" +  $(".color-image-block")[i].dataset.id).remove()
      break;
    }

  }
});
$(document).on("submit","#create-new",function(e) {
  e.preventDefault();
  let count = $(".color-image-block").length;

  let fd = new FormData();
  fd.append('name', $("#form-name").val());
  fd.append('slug', $("#form-slug").val());
  fd.append('category_id', $("#category").val());
  fd.append('short_description', $("#form-short-description-txt").val());
  fd.append('full_description', $("#form-description-txt").val());
  fd.append('price', $("#form-price").val());
  fd.append('sale_price', $("#form-sale-price").val());
  fd.append('status_id', $("#status").val());
  fd.append('tag_id', $("#tag").val());
  fd.append('sizes', $("#size").val());
  fd.append('video', $("#form-video").val());
  fd.append('colors', $("#color").val());
  fd.append('_token', '{{ csrf_token() }}');

  $.ajax({
    url: "{{ route('adMpostEditProduct', ['id' => $product->id]) }}",
    type: 'post',
    data: fd,
    contentType: false,
    processData: false,
    success: function(response){
      let res = JSON.parse(response);
      console.log(res)
        if(res.code == 0) {
          alert(response.message);
          return;
        }
        let fd2, res2;
        for (let i = 0; i < count; i++) {
          fd2 = new FormData();
          fd2.append('_token', '{{ csrf_token() }}');
          fd2.append('img', $(".color-image-block")[i].querySelector('.img-input').files[0]);
          fd2.append('product_id', {{$product->id}});
          fd2.append('color_id', $(".color-image-block")[i].querySelector('.color-input').value);

          $.ajax({
            url: "{{ route('adMpostUpdateProductImage') }}",
            type: 'post',
            data: fd2,
            contentType: false,
            processData: false,
            success: function(response){
                res2 = JSON.parse(response);
                if(res2.code == 1) {
                    alert("Update success");
                }
            },
            error: function(response){
              console.log(response.responseText)
            }
          });
        }
    },
    error: function(response){
      console.log(response.responseText)
    }
  });

});

</script>
<script src="{{ asset('public/admin/js/post.js') }}" type="text/javascript"></script>
@endsection
