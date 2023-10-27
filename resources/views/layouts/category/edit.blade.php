@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>{{ __('Edit Category') }}</strong>
                    <a href="{{route('home')}}"> Back </a>
                </div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form autocomplete="off" action="{{route('category.update', $categories->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group mb-2">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$categories->title}}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="short_desc">Short Description</label>
                            <textarea type="text" class="form-control" id="short_desc" name="short_desc" placeholder="Enter title...">{{$categories->short_desc}}</textarea>
                        </div>
                        <button class="btn btn-primary" name="updateTitle" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
