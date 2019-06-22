@extends('layouts.app')

@section('dashTitle')
    <h1><i class="fa fa-users"></i> Users</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
@endsection


@section('content')

    <div class="col-lg-10 offset-lg-1">
        <div class="tile">
            <h3 class="tile-title">Users</h3>
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        <img src="{{ Gravatar::src($user->email, 50) }}" class="rounded-circle">
                                    </td>
                                    <td>{{$user->name}}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">


                                        @if( !$user->isAdmin())
                                            <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                                                @csrf
                                                <button  class="btn  btn-info text-white" title="Edit"><i class="far fa-edit"></i> Make Admin</button>
                                            </form>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>

@endsection

