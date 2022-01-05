@extends('Frontend.Component.layout')

@section('title')
    Blog Post
@endsection
@section('content')

    <div class="card mb-4">
        <h3 class="card-header">User Registration Form</h3>



    <div class="card-body">

        @if(session('message'))
            <div class="alert alert-{{ session('type') }}">{{ session('message') }}</div>
        @endif
        <form action="{{ route('user.registration') }}" method="post" enctype="multipart/form-data">

            @csrf


            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}"  placeholder="Enter your Name">
                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <br>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror " name="email" id="email" value="{{ old('email') }}" placeholder="Enter your Email">
                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <br>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror " name="password" id="password" value="{{ 'password' }}" placeholder="Enter your Password">
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror

            </div>
            <br>
            <div class="form-group">
                <label for="confirmpassword">Confirm Password</label>
                <input type="password" class="form-control  " name="confirmpassword" id="confirmpassword" value="{{ 'confirmpassword' }}" placeholder="Enter Confirm Password">


            </div>
            <br>
            <div class="form-group">
                <label for="photo">Your Photo</label>
                <input type="file" class="form-control  " name="photo" id="photo" >
                @error('photo')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <br>
            <div class="form-group text-sm-end">
                <button type="submit" class="btn btn-success">Registration</button>
            </div>

        </form>
    </div>

    </div>



@endsection
