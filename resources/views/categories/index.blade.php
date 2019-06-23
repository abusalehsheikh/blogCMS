@extends('layouts.app')

@section('dashTitle')
    <h1><i class="fa fa-file-text"></i> Category</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Category</a></li>
@endsection
@section('content')

    <div class="col-lg-8 offset-lg-2" >
        <div class="tile">
            <h3 class="tile-title">Category</h3>
            @if($categories->count() > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Category Name</th>
                            <th scope="col" class="text-center">Post Count</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td class="text-center">{{$category->posts->count()}}</td>
                                <td class="text-center">
                                    <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-info btn-sm">Edit</a>

                                    <form action="{{route('categories.destroy',$category->id)}}" method="POST" class="d-inline-block">
                                        @method('DELETE')
                                        @csrf
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            @else
                <h3 class="text-center">No Category Yet !</h3>
            @endif

        </div>
    </div>

    @endsection
