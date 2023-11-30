@extends('master')
@section('content')
<div class="about">
    <div class="container">
        <div class="about-main">
            <div class="col-md-8 about-left">
                <div class="about-one">
                    <h3>{{$category->title}}</h3>
                </div>
                <div class="about-two">
                    <p>{{$category->short_desc}}</p>
                </div>
                <div class="about-tre">
                    @foreach ($posts as $post)
                    <div class="a-1">
                        <div class="row" style="margin: 2px 2px">
                            <a href="{{route('post.show', $post->id)}}">
                                <div class="col-md-6 abt-left">
                                    @if (filter_var($post->image, FILTER_VALIDATE_URL) !== false)
                                    <img src="{{ asset($post->image) }}" alt="{{Str::slug($post->title)}}">
                                    @else
                                    <img src="{{ asset('uploads/' . $post->image) }}" alt="{{Str::slug($post->title)}}">
                                    @endif
                                </div>
                                <div class="col-md-6 abt-left">
                                    <h6>{{$post->category->title}}</h6>
                                    <h3><a href="{{route('post.show', $post->id)}}">{{$post->title}}</a></h3>
                                    <p>{{ substr($post->short_desc,0,90) }} ...</p>
                                    <label>{{$post->created_at->format('m-Y')}}</label>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{$posts->links()}}
            </div>
            <div class="col-md-4 about-right heading">
                <div class="abt-2">
                    <h3>NEWEST</h3>
                    @foreach ($newest_posts as $newest_post)
                    <div class="might-grid">
                        <div class="grid-might">
                            @if (filter_var($post->image, FILTER_VALIDATE_URL) !== false)
                            <a href="#"><img class="img-responsive" src="{{ asset($post->image) }}" alt=" "></a>
                            @else
                            <a href="#"><img class="img-responsive" src="{{ asset('uploads/' . $post->image) }}" alt=" "></a>
                            @endif
                        </div>
                        <div class="might-top">
                            <h4><a href="{{route('post.show', $newest_post->id)}}" title="{{$newest_post->title}}">{{substr($newest_post->title, 0, 23)}}...</a></h4>
                            <p>{{substr($newest_post->short_desc, 0, 30)}} ...</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    @endforeach
                </div>
                <div class="abt-2">
                    <h3>OTHER CATEGORIES</h3>
                    <ul>
                        @foreach ($recommended_categories as $category)
                        <li><a href="{{route('category.show', $category)}}" title="{{$category->title}}">{{$category->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection