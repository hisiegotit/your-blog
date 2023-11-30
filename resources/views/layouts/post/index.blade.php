@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ($message = Session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card">
                <div class="card-header"><strong>{{ __('List Category') }}</strong>
                    <a href="{{ route('home') }}"> Back </a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Short Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Created At</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key => $post)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $post->title }}</td>
                                <td>
                                    @if (filter_var($post->image, FILTER_VALIDATE_URL) !== false)
                                    <img src="{{ asset($post->image) }}" alt="{{Str::slug($post->title)}}" width="200px">
                                    @else
                                    <img src="{{ asset('uploads/' . $post->image) }}" alt="{{Str::slug($post->title)}}" width="200px">
                                    @endif
                                </td>
                                <td>{!! substr($post->short_desc,0,30) !!}</td>
                                <td>
                                    {{ $post->category->title}}
                                </td>
                                <td>{{ $post->created_at->format('M-Y') }}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="{{ route('post.edit', $post->id) }}">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Modal{{ $post->id }}">
                                        Delete
                                    </button>

                                    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <div class="modal fade" id="Modal{{ $post->id }}" tabindex="-1" aria-labelledby="ModalLabel{{ $post->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="ModalLabel{{ $post->id }}">DANGER!!!</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this post?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="d-flex justify-content-end">
                                        {{ $posts->links() }}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection