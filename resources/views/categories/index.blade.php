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
                                    <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $category->id }})">	Delete</button>
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








{{--    <!-- Modal -->--}}
{{--    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Category</h5>--}}
{{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                            <span aria-hidden="true">&times;</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <strong class="text-center">Are you sure you want to Delete this Category ?</strong>--}}
{{--                </div>--}}
{{--                    <div class="modal-footer">--}}

{{--                        <form action="" method="POST" id="deleteCategoryForm">--}}

{{--                            @method('DELETE')--}}
{{--                            @csrf--}}

{{--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button>--}}
{{--                            <button type="submit" class="btn btn-danger">Yes, Delete</button>--}}

{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    @endsection







    @section('script')

        <script>
            function handleDelete(id) {
                var form = document.getElementById('deleteCategoryForm')
                form.action = '/categories/' + id
                $('#deleteModal').modal('show')
            }
        </script>

    @endsection
