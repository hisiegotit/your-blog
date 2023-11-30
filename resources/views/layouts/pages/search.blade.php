@extends('master')
@section('content')
{{-- @include('layouts.banner') --}}
<div class="about">
    <div class="container">
        <div class="about-main">
            <div class="col-md-8 about-left">
                <div class="about-tre">
                    @foreach ($posts as $post)
                    <div class="a-1">
                        <div class="row" style="margin: 5px">
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
                                    <h3><a href="{{route('post.show', $post->id)}}" title="{{$post->title}}">{{$post->title}}</a></h3>
                                    <p>{{ substr($post->short_desc,0,90) }} ...</p>
                                    <label>{{$post->created_at->format('m-Y')}}</label>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
<div class="clearfix"></div>
</div>
</div>
</div>

@endsection