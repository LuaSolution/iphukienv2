@extends('admin.layout')

@section('home_active', 'active')

@section('content')
<!-- Counts Section -->
<section class="dashboard-seo section-padding">
  <div class="container-fluid">
    <div class="row">
      <!-- Count item widget-->
      <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="wrapper d-flex">
          <form action="#seo">
            <div class="seo-title">
              <label>Title</label>
              <input name="title" form="seo" value="{{config('config.title')}}"/>
            </div>
            <div class="seo-des">
              <label>Description</label>
              <textarea name="description" form="seo">{{config('config.description')}}</textarea>
            </div>
            <button type="button" class="btn btn-primary"name="submit" id="update-config" link="{{route('adupdateConfig')}}">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Updates Section -->
<!-- <section class="mt-30px mb-30px">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-12">
        <div class="row">
          <div class="col-lg-12 col-md-6">
            @include('admin.user_add')
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->
@endsection

@section('js')
<script src="{{asset('public/admin/js/home.js')}}" type="text/javascript"></script>
@endsection