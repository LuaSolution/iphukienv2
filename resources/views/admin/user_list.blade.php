@extends('admin.layout')

@section('list_user_active', 'active')

@section('content')
<section class="mt-30px mb-30px">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <!-- Recent Updates Widget          -->
        <div id="delete-page" class="card">
          <div id="delete-header" class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h2 bold"><a href="javascript:void(0)">Danh sách người dùng</a></h2>
          </div>
          <div id="delete-box" class="show delete-box card-body">
            <div class="delete-form">
              <ul>
                @foreach($users as $item)
                <li class="d-flex justify-content-between align-items-center bt-line password_container">
                  <div class="left-col title text-primary">
                    {{$item->name}} - ({{$item->email}})<br>
                    <div class="form-group password-form">
                      <input type="password" placeholder="Update Password" class="mr-3 form-control password_input" min="6">
                    </div>
                    <div class="form-group password-form">
                      <input type="button" value="Update" class="mr-3 btn btn-primary password_button" link="{{route('adpostUpdatePassword')}}" userid="{{$item->id}}">
                    </div>
                  </div>
                  <div class="right-col text-right"><a class="btn delete-btn" href="{{route('adgetDelUser', ['id' => $item->id])}}" onclick="return confirm('Bạn có chắc chắn xóa người dùng này?');"><i class="icon icon-close"></i></a></div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <!-- Recent Updates Widget End-->
      </div>
    </div>
  </div>
</section>

@endsection

@section('js')
<script type="text/javascript">
  var checkUpdatePassword = 1;
  $(document).on('click', '.password_button', function(){
    if ( checkUpdatePassword == 1 ){
      checkUpdatePassword = 0;
      var link = $(this).attr('link');
      var id = $(this).attr('userid');
      var pw = $(this).parents(".password_container").find('.password_input').val();
      if ( pw.length < 6 ) {
        notify('Mật khẩu ít nhất 6 kí tự', 0);
        checkUpdatePassword = 1;
        return false;
      }
      var r = confirm("Bạn có chắc chắn muốn cập nhật mật khẩu?");
      if (r == true) {
        
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          url: link,
          type: 'POST',
          data: {id: id, pw: pw},
        })
        .done(function(result) {
          if ( result == 1 ){
            notify('Cập nhật thành công', 1);
          }else{
            notify('Cập nhật thất bại', 0);
          }
        })
        .fail(function(result) {
          console.log(result.responseText);
          notify('Cập nhật thất bại', 0);
        })
        .always(function() {
          checkUpdatePassword = 1;
        });
        
      }
    }
  });
</script>

@endsection