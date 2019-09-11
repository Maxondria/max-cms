@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{route('posts.create')}}" class="btn btn-success mb-2">Add Post</a>
    </div>

    <div class="card card-default">
        <div class="card-header">Posts</div>
        <div class="card-body">

        </div>
    </div>
@endsection
