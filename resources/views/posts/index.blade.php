@extends('layouts.app')

@section('dashTitle')
    <h1><i class="fa fa-file-text"></i> Posts</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
@endsection


@section('content')

    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Published Posts</h3>
            <div class="tile-body">
                @if($posts->count() > 0)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Post Image</th>
                                <th scope="col">Post Title</th>
                                <th scope="col">Category</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        <img src="{{asset('storage/'.$post->image)}}" alt="" width="100">
                                    </td>
                                    <td>{{$post->title}}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $post->category->id) }}">
                                            {{$post->category->name}}
                                        </a>
                                    </td>
                                    <td class="text-center">

                                        @if(!$post->trashed())
                                            <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        @else
                                            <form action="{{route('restore-post',$post->id)}}" method="POST" class="d-inline-block">
                                                @method('PUT')
                                                @csrf
                                                <button class="btn btn-success btn-sm" type="submit">Restore</button>
                                            </form>
                                        @endif

                                        <form action="{{route('posts.destroy',$post->id)}}" method="POST" class="d-inline-block">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-sm" type="submit">{{ $post->trashed() ? 'Delete' : 'Trash' }}</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                @else
                    <h3 class="text-center">No Posts Yet !</h3>
                @endif
            </div>
        </div>
    </div>

@endsection
