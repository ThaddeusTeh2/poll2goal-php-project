@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container min-vh-100">
    <h1>Hello, {{ $name }}</h1>

</br>

<h1>All Posts</h1>

<!--responsible for making displayed data dynamic-->
    @foreach( $posts as $post )
        <div class="card m-2">
            <div class="card-body">
                <h3>{{ $post->content }}</h3>
                <h5>Posted by {{ $post->user->name }}</h5>
                <div class="d-flex align-items-center gap-2">
                    <a href="/posts/{{ $post->id }}" class="btn btn-success rounded btn-sm">View</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection