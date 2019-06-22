@extends('layouts.app')

@section('content')

    <div class="col-lg-8 offset-lg-2">
        <div class="card">
            <h5 class="card-header">Edit your profile</h5>
            <div class="card-body">
                <form method="post" action="{{ route('users.update-profile',Auth::user()->id) }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input name="name" value="{{ $user->name }}" type="text" class="form-control"  id="name" placeholder="Enter your full name">
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label for="email">Email</label>--}}
{{--                        <input name="email" value="{{ $user->email }}" type="email" class="form-control"  id="email" placeholder="Enter your email address">--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label for="password">Password</label>--}}
{{--                        <input name="password"  type="password" class="form-control"  id="password" placeholder="Enter New Password">--}}
{{--                    </div>--}}


{{--                    <div class="custom-file">--}}
{{--                        <input name="avatar" type="file" class="custom-file-input" id="customFile">--}}
{{--                        <label class="custom-file-label" for="customFile">Upload new profile image</label>--}}
{{--                    </div>--}}

                    <div class="form-group mt-2">
                        <label for="content">About</label>
                        <textarea name="about"  class="form-control" id="content" rows="3">{{ $user-> about }}</textarea>
                    </div>


                    <button type="submit" class="btn btn-primary mt-2 float-right">Update</button>
                </form>
            </div>
        </div>
    </div>


@endsection
