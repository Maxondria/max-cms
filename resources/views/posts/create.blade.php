@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($post) ? 'Edit Post': 'Add Post' }}
        </div>

        <div class="card-body">

            @include('partials.errors')

            <form
                action="{{ isset($post) ? route('posts.update', $post->id): route('posts.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" class="form-control" name="title"
                           value="{{ isset($post) ? $post->title: '' }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="5" rows="5" class="form-control">{{ isset($post) ? $post->description: '' }}
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content: '' }}">
                    <trix-editor input="content"></trix-editor>
                </div>

                <div class="form-group">
                    <label for="published_at">Publish On</label>
                    <input type="text" id="published_at" class="form-control" name="published_at"
                           value="{{ isset($post) ? $post->published_at: '' }}">
                </div>

                @if(isset($post))
                    <img src="{{ asset("storage/{$post->image}") }}" alt="" style="width: 100%">
                @endif

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image" class="form-control" name="image">
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control">

                        @foreach($categories as $category)
                            <option value="{{$category->id}}"

                                    @if(isset($post))
                                    @if($category->id === $post->category_id)
                                    selected
                                @endif
                                @endif
                            >
                                {{$category->name}}
                            </option>
                        @endforeach

                    </select>
                </div>

                @if($tags->count() > 0)

                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <select name="tags[]" id="tags" class="form-control tags-selector" multiple>

                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}"

                                        @if(isset($post))

                                        @if($post->hasTag($tag->id))
                                        selected
                                    @endif

                                    @endif

                                >{{$tag->name}}
                                </option>
                            @endforeach

                        </select>
                    </div>

                @endif

                <div class="form-group">
                    <button type="submit"
                            class="btn btn-success">{{ isset($post) ? 'Update Post': 'Add Post' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

    <script>
        flatpickr("#published_at", {
            enableTime: true,
            enableSeconds: true
        });

        $(document).ready(function () {
            $('.tags-selector').select2();
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css"/>
@endsection()
