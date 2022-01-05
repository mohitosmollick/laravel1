@extends('Frontend.Component.layout')

@section('title')
    Single Post
@endsection
@section('content')
    <div class="card mb-4">
        <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
        <div class="card-body">
            <div class="small text-muted">January 1, 2021</div>
            <h2 class="card-title">This is the Title</h2>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet eum nesciunt
                nostrum officiis quia ut? Adipisci aspernatur cupiditate debitis dolorum, obcaecati omnis quam
                quisquam recusandae tenetur. Dolor et facilis veritatis.</p>
            <a class="btn btn-primary" href="#!">Read more →</a>
        </div>
    </div>

@endsection
