@extends('Admin.conponents.layout')

@section('title')
    Category
@endsection

@section('content')
    <h4>Manage Category</h4>


    <table class="table table-bordered table-striped">
        <tr>
            <th>SL No.</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Status</th>
        </tr>

        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>{{ ucfirst($category->status) }}</td>
        </tr>

    </table>

@endsection
