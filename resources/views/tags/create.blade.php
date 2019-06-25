@extends('layouts.app')

@section('dashTitle')
    <h1><i class="fa fa-pencil-square-o"></i>
        {{ isset($tag) ? 'Edit Tag' : 'Create Tag' }}
    </h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Tag</a></li>
    <li class="breadcrumb-item"><a href="#">Create Tag</a></li>
@endsection

@section('content')

    <div class="col-lg-6 offset-lg-3">
        <div class="tile">
            <div class="tile-body">

                <form class="row" action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store')}}" method="POST">

                    @csrf
                    @if(isset($tag))
                        @method('PUT')
                    @endif

                    <div class="form-group col-md-6">
                        <label class="control-label">Tag Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Tag Name" value="{{ isset($tag) ? $tag->name : '' }}">
                    </div>
                    <div class="form-group col-md-6 align-self-end">
                        <button class="btn btn-primary float-right" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{ isset($tag) ? 'Update Tag' : 'Add Tag' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
