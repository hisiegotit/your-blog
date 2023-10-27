@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>{{ __('Edit Post') }}</strong>
                    <a href="{{route('home')}}"> Back </a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form autocomplete="off" action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group mb-2">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title..." value="{{$post->title}}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="short_desc">Short Description</label>
                            <textarea class="form-control" id="short_desc" name="short_desc" placeholder="Enter short description...">{!!$post->short_desc!!}</textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="desc">Description</label>
                            <textarea class="form-control" id="desc" name="desc" placeholder="Enter description...">{!!$post->desc!!}</textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <input hidden type="file" class="form-control" id="old_image" name="old_image">
                            <p>
                                <img src="{{asset('uploads/' . $post->image)}}" width="200px" alt="">
                            </p>
                        </div>
                        <div class="form-group mb-2">
                            <label for="short_desc">Short Description</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value=""> ----- Select category ----- </option>
                                @foreach ($categories as $key => $category)
                                    <option value="{{ $category->id }}" @if ($category->id == $post->category_id)
                                        selected
                                    @endif>{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-primary" name="createTitle" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
