@extends('Admin.conponents.layout')

@section('title')
    Category
@endsection

@section('content')




    <div class="card ">
        <div class="card-header">Category Create</div>

        @if(session()->has('message'))
            <div class="alert alert-{{ session('type') }}" >{{ session('message') }}</div>
        @endif

        <form action="{{ route('admin.category.store') }}" method="post">
        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="name">Status</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio"  id="active" name="status" value="active" class="custom-control-input">
                        <label class="custom-control-label" for="active">Active</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio"  id="inactive" name="status" value="inactive" class="custom-control-input">
                        <label class="custom-control-label" for="inactive">Inactive</label>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-success" type="submit">Create</button>
            </div>

        </form>

    </div>


@endsection
