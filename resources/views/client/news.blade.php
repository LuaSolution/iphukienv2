@extends('client.layout')

@section('content')
<section class="content-with-photo-15 py-5">
    <div class="content-photo py-lg-4">
        <div class="container">
        @foreach($newss as $item)
        @if($loop->index % 2)
            <div class="row">
                <div class="col-lg-6 content-left-sec">
                    <a href="{{route('getNews', ['news' => $item->slug])}}">
                        <img src="{{asset('public/img/post/'.$item->cover)}}" alt="{{$item->title}}" class="img img-responsive" alt=""></a>
                </div>
                <div class="col-lg-6 content-left-sec">
                    <a href="{{route('getNews', ['news' => $item->slug])}}">
                        <h4 class="mt-4 mb-0">{{$item->title}}</h4>
                    </a>
                    <h6 class="mt-sm-2 mt-1">{{$item->created_at}}</h6>
                    <p class="mt-2 mb-0">{{$item->description}}</p>
                </div>
            </div>
            @else
            <div class="row mt-5">
                <div class="col-lg-6 content-left-sec info-order">
                    <a href="{{route('getNews', ['news' => $item->slug])}}">
                        <h4 class="mt-4 mb-0">{{$item->title}}</h4>
                    </a>
                    <h6 class="mt-sm-2 mt-1">{{$item->created_at}}</h6>
                    <p class="mt-2 mb-0">{{$item->description}}</p>
                </div>
                <div class="col-lg-6 content-left-sec img-order">
                    <a href="{{route('getNews', ['news' => $item->slug])}}"><img src="{{asset('public/img/post/'.$item->cover)}}" alt="{{$item->title}}" class="img img-responsive" alt=""></a>
                </div>
            </div>
            @endif
            <br/>
            @endforeach
            
        </div>
    </div>
</section>
@endsection
