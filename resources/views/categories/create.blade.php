@extends('layouts.app')

@section('dashTitle')
    <h1><i class="fa fa-pencil-square-o"></i>
        {{ isset($category) ? 'Edit Category' : 'Create Category' }}
    </h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Category</a></li>
    <li class="breadcrumb-item"><a href="#">Create Category</a></li>
@endsection

@section('content')

    <div class="col-lg-6 offset-lg-3">
        <div class="tile">
            <div class="tile-body">

                <form class="row" action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store')}}" method="POST">

                        @csrf
                        @if(isset($category))
                            @method('PUT')
                        @endif

                    <div class="form-group col-md-6">
                        <label class="control-label">Category Name</label>
                        <input type="text" name="name" class="form-control" id="categoryName" placeholder="Category Name" value="{{ isset($category) ? $category->name : '' }}">
                    </div>
                    <div class="form-group col-md-6 align-self-end">
                        <button class="btn btn-primary float-right" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{ isset($category) ? 'Update Category' : 'Add Category' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
