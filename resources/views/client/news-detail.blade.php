@extends('client.layout')
@section('content')
<section class="text-11 py-5">
    <div class="text11 py-lg-5 py-md-3">
        <div class="container">
            <div class="text11-content">
                <div class="text-center">
                    <h4 class="">{{$news->title}}</h4>
                    <h6>{{$news->description}}</h6>
                </div>
                <img src="{{asset('public/img/post/'.$news->cover)}}" alt="{{$news->title}}" class="img-fluid my-4" >
                {!!$news->content!!}
                <div class="social-share-blog">
                    <ul class="social m-0 p-0">
                        <li>
                            <p class="m-0 mr-4">Chia sẻ bài viết :</p>
                        </li>
                        <li>
                        <script>
var loc = "https://www.facebook.com/sharer/sharer.php?u=" + window.location.href;
document.write('<a href="' + loc + '" target="_blank"><span class="fa fa-facebook"></span></a>');
</script></li>
                    </ul>
                </div>
                <div class="comments">
                    <!-- <h3 class="aside-title ">Recent comments</h3> -->
                    <div class="comments-grids">
                    <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="5"></div>
                    </div>
                </div>
                <!-- <div class="leave-comment-form" id="comment">
                    <h3 class="aside-title">Leave a reply</h3>
                    <form action="#" method="post">
                        <div class="form-group">
                            <textarea name="Comment" class="form-control" placeholder="Your Comment" required=""></textarea>
                        </div>
                        <div class="input-grids">
                            <div class="form-group">
                                <input type="text" name="Name" class="form-control" placeholder="Your Name" required="">
                            </div>
                            <div class="form-group">
                                <input type="email" name="Email" class="form-control" placeholder="Email" required="">
                            </div>
                            <div class="form-group">
                                <input type="text" name="Email" class="form-control" placeholder="URL" required="">
                            </div>
                        </div>
                        <div class="submit text-right">
                            <button class="btn btn-primary">Post Comment
                        </button></div>
                    </form>
                </div> -->
            </div>
        </div>
    </div>
</section>
@endsection
