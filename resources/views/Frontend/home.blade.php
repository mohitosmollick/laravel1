@extends('Frontend.Component.layout')

@section('title')
    Blog Post
@endsection
@section('content')

    <div class="card mb-4">
        <h3 class="card-header">Home Page</h3>
    </div>

    <x-single-post title="This is our first post">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum
    </x-single-post>
    <x-single-post title="This is our second post"></x-single-post>


@endsection
