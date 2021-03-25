@extends('admin.layout')

@section('list_post_active', 'active')

@section('content')
<section class="mt-30px mb-30px">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <!-- Recent Updates Widget          -->
        <div id="delete-page" class="card">
          <div id="delete-header" class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h2 bold"><a href="javascript:void(0)">Danh sách bài viết</a></h2>
          </div>
          <div id="delete-box" class="show delete-box card-body">
            <div class="delete-form">
              <ul>
                @foreach($posts as $item)
                <li class="d-flex justify-content-between align-items-center bt-line">
                  <div class="left-col title text-primary"><a href="{{route('adgetEditPost', ['id' => $item->id])}}">{{$item->title}}</a></div>
                  <div class="right-col text-right"><a class="btn delete-btn" href="{{route('adgetDelPost', ['id' => $item->id])}}" onclick="return confirm('Bạn có chắc chắn xóa bài viết này?');"><i class="icon icon-close"></i></a></div>
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

@endsection