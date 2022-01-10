@extends('Admin.conponents.layout')

@section('title')
    Category
@endsection

@section('content')
    <h4>Manage Category</h4>

    @if(session()->has('message'))
        <div class="alert alert-{{ session('type') }}" >{{ session('message') }}</div>
    @endif


    <table class="table table-bordered table-striped">
        <tr>
            <th>SL No.</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach($category as $categories)
        <tr>
            <td>{{ $categories->id }}</td>
            <td>{{ $categories->name }}</td>
            <td>{{ $categories->slug }}</td>
            <td>{{ ucfirst($categories->status) }}</td>
            <td>
                <a href="{{ route('admin.category.show', $categories->id )}}" class="btn btn-success btn-sm">Show</a>
                <a href="{{ route('admin.category.edit', $categories->id )}}" class="btn btn-success btn-sm">Edit</a>
                <form action="{{ route('admin.category.destroy', $categories->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ $category->links() }}
@endsection
