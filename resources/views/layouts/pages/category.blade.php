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
                    <ul>
                        <li>
                            <p>Share : </p>
                        </li>
                        <li><a href="#"><span class="fb"> </span></a></li>
                        <li><a href="#"><span class="twit"> </span></a></li>
                        <li><a href="#"><span class="pin"> </span></a></li>
                        <li><a href="#"><span class="rss"> </span></a></li>
                        <li><a href="#"><span class="drbl"> </span></a></li>
                    </ul>
                </div>
                <div class="about-tre">
                    @foreach ($posts as $post)
                    <div class="a-1">
                        <div class="row" style="margin: 2px 2px">
                            <a href="{{route('post.show', $post->id)}}">
                                <div class="col-md-6 abt-left">
                                    <img src="{{asset('uploads/' . $post->image)}}" alt="{{Str::slug($post->title)}}"/>
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
                            <a href="single.html"><img src="{{asset('uploads/' . $newest_post->image)}}" class="img-responsive" alt=""> </a>
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
