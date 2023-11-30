@extends('master')
@section('content')
<div class="single">
    <div class="container">
        <div class="col-md-8">
            <div class="single-top single-post">
                @if (filter_var($post->image, FILTER_VALIDATE_URL) !== false)
                <a href="#"><img class="img-responsive" src="{{ asset($post->image) }}" alt=" "></a>
                @else
                <a href="#"><img class="img-responsive" src="{{ asset('uploads/' . $post->image) }}" alt=" "></a>
                @endif
                <div class="single-grid">
                    <h4>{{ $post->title }}</h4>
                    <ul class="blog-ic">
                        <li><a href="#"><span> <i class="glyphicon glyphicon-user"> </i>Hisie</span> </a> </li>
                        <li><span><i class="glyphicon glyphicon-time"> </i>{{ $post->created_at->format('M d,Y') }}</span>
                        </li>
                    </ul>
                    <div> 
                        {!! $post->desc !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 about-right heading">
            <div class="abt-2">
                <h3>RELATED</h3>
                @foreach ($related_posts as $related_post)
                <div class="might-grid">
                    <div class="grid-might">
                        @if (filter_var($post->image, FILTER_VALIDATE_URL) !== false)
                        <a href="#"><img class="img-responsive" src="{{ asset($post->image) }}" alt=" "></a>
                        @else
                        <a href="#"><img class="img-responsive" src="{{ asset('uploads/' . $post->image) }}" alt=" "></a>
                        @endif
                    </div>
                    <div class="might-top">
                        <h4><a href="{{route('post.show', $related_post->id)}}" title="{{$related_post->title}}">{{substr($related_post->title, 0, 23)}}...</a></h4>
                        <p>{{substr($related_post->short_desc, 0, 30)}} ...</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection