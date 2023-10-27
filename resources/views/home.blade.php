@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h4 class="text-center"><strong>Post</strong></h4>
                        <a href="{{ route('post.create') }}" class="btn btn-primary w-100">New post</a>
                        <a href="{{ route('post.index') }}" class="btn btn-primary w-100 mt-2">List post</a>
                        <h4 class="mt-4 text-center"><strong>Category</strong></h4>
                        <a href="{{ route('category.create') }}" class="btn btn-primary w-100">New category</a>
                        <a href="{{ route('category.index') }}" class="btn btn-success w-100 mt-2">List category</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
