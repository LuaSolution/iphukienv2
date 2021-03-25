<div id="user-update" class="card user">
  <div id="feeds-header" class="card-header d-flex justify-content-between align-items-center">
    <h2 class="h2 display bold">Thêm người dùng</h2>
  </div>
  <div id="feeds-box" class="show">
    <div class="feed-box">
      <form method="post" action="{{route('adpostAddUser')}}" class="form-inline" data-article="du-lich-tam-dao">
        {{ csrf_field() }}
        <div class="form-group mt10">
          <input id="inlineFormInput" type="email" placeholder="Email" class="mr-3 form-control" name="email">
        </div>
        <div class="form-group mt10">
          <input id="inlineFormInput" type="password" placeholder="Password" class="mr-3 form-control" name="password">
        </div>
        <div class="form-group mt10">
          <input id="inlineFormInput" type="text" placeholder="Họ tên" class="mr-3 form-control" name="name">
        </div>
        <div class="form-group mt10">
          <input id="inlineFormInput" type="text" placeholder="Số điện thoại" class="mr-3 form-control" name="phone_number">
        </div>
        <div class="form-group mt10">
          <input type="submit" value="Update" class="mr-3 btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>