@extends('layouts.app')

@section('dashTitle')
    <h1><i class="fa fa-file-text"></i> Tags</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('tags.index') }}">Tags</a></li>
@endsection
@section('content')

    <div class="col-lg-8 offset-lg-2" >
        <div class="tile">
            @if($tags->count() > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Tag Name</th>
                            <th scope="col" class="text-center">Post Count</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{$tag->name}}</td>
                                <td class="text-center">{{$tag->posts->count()}}</td>
                                <td class="text-center">
                                    <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-info btn-sm d-inline-block">Edit</a>
                                    <form action="{{ route('tags.destroy',$tag->id) }}" method="POST" id="deleteTagForm"  class="d-inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm d-inline-block">Delete</button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            @else
                <h3 class="text-center">No Tag Yet !</h3>
            @endif

        </div>
    </div>

@endsection
