@extends('layouts.app')

@section('dashTitle')
    <h1><i class="fa fa-pencil-square-o"></i>
        {{ isset($post) ? 'Edit Post' : 'Create New Post' }}
    </h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
    <li class="breadcrumb-item"><a href="#">Create Post</a></li>
@endsection

@section('content')
    <div class="col-lg-10 offset-lg-1">

        <div class="tile">
            <div class="tile-body">
                    <form class="form-horizontal" action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($post))
                            @method('PUT')
                        @endif

                        <div class="form-group">
                            <label>Post Title</label>
                            <input type="text" name="title" class="form-control" value="{{ isset($post) ? $post->title : ''}}">
                            {{--                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="3">{{ isset($post) ? $post->description : ''}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : '' }}">
                            <trix-editor input="content"></trix-editor>
                        </div>
                    <div class="row my-4">
                        <div class="form-group col-md-4">
                            <label for="published_at">Published at</label>
{{--                            <input type="text" id="published_at" name="published_at" value="{{ isset($post) ? $post->published_at : '' }}" class="form-control col-md-2">--}}
                            <input class="form-control" id="published_at" type="text" placeholder="Select Date" name="published_at" value="{{ isset($post) ? $post->published_at : '' }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="category">Select Category</label>
                            <select class="form-control" name="category" id="category">
                                @foreach( $categories as $category)
                                    <option value="{{ $category->id }}"
                                            @if(isset($post) && $category->id == $post->category_id)
                                            selected
                                            @endif
                                    >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    @if( $tags->count() > 0)
                            <div class="form-group col-md-4">
                                <label for="exampleFormControlSelect2">Tags</label>
                                <select multiple="" class="form-control tags-selector" name="tags[]">
                                    <optgroup label="Select Tags">
                                        @foreach( $tags as $tag)

                                            <option value="{{ $tag->id }}"

                                                    @if( isset($post))
                                                    @if($post->hasTag($tag->id))
                                                    selected
                                                    @endif
                                                    @endif

                                            >{{ $tag->name }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        @endif
                    </div>

                        <div class="form-group">Image:</div>
                        @if(isset($post))
                            <img src="{{ asset('storage/'.$post->image) }}" alt="" width="500">
                        @endif
                        <div class="custom-file">

                            <input type="file" name="image" class="custom-file-input" id="customFile">
                            <label class="custom-file-label mt-2" for="customFile">{{ isset($post) ? 'Change Photo' : 'Choose Photo' }}</label>
                        </div>


                        <div class="tile-footer">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-3">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{ isset($post) ? 'Update Post' : 'Create Post' }}</button>&nbsp;&nbsp;&nbsp;

                                    <a class="btn btn-secondary" href="{{ route('home') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                                </div>
                            </div>
                        </div>

                    </form>


                </div>
        </div>
    </div>



@endsection

@section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endsection

@section('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js"></script>
        <script src="{{ asset('js/select2.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <script>
            flatpickr('#published_at',{
                enableTime: true
            })

            $(document).ready(function() {
                $('.tags-selector').select2();
            })
        </script>


@endsection
