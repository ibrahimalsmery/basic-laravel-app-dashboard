@extends('layouts.common')

@section('content')
    <form action="{{ route('dashboard.user.profile.update') }}" method="post" enctype="multipart/form-data">
        <div class="card card-default">
            <div class="card-header bg-dark">
                <h3 class="card-title">Update Image</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus text-white"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <img src="{{ auth()->user()->profileImageUrl() }}" class="d-block my-2 img-circle elevation-2 mx-auto"
                    style="width: 250px;height: 250px;object-fit: cover" alt="User Image">

                <input type="file" name="profile_image" class="d-none" id="profile_image_input">
                <label class="btn btn-primary d-block col-md-3 mx-auto" for="profile_image_input">
                    <i class="fas fa-edit"></i> Change
                </label>

            </div>
            <div class="card-footer">
                @csrf
                <button class="btn btn-primary" name="type" value="updatedprofileimage">Save</button>
            </div>
        </div>
    </form>
    <form action="{{ route('dashboard.user.profile.update') }}" method="post">
        <div class="card card-default">
            <div class="card-header bg-dark">
                <h3 class="card-title">Update Info</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus text-white"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">User name</label>
                    <input type="text" class="form-control  s @error('name') is-invalid @enderror" id=""
                        placeholder="Enter username" name='name' value="{{ $auth->name }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id=""
                        placeholder="Enter email" name="email" value="{{ $auth->email }}">
                </div>
            </div>
            <div class="card-footer">
                @csrf
                <button class="btn btn-primary" name="type" value="updatedinfo">Save</button>
            </div>
        </div>
    </form>


    <form action="{{ route('dashboard.user.profile.update') }}" method="post">
        <div class="card card-default">
            <div class="card-header bg-dark">
                <h3 class="card-title">Update Password</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus text-white"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('dashboard.user.profile.update') }}" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id=""
                            placeholder="Enter password" name='password'>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Confirme Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id=""
                            placeholder="Confirm password" name='password_confirmation'>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                @csrf
                <button class="btn btn-primary" name="type" value="updatepassword">Save</button>
            </div>
        </div>
    </form>
@endsection
