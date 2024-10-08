@extends("layouts.app")

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Manage Posts</h1>
        <a href="/posts/create" class="btn btn-success rounded">Add New Post</a>
    </div>
    @foreach( $posts as $post )
        <div class="card m-2">
            <div class="card-body">
                <h3>{{ $post->content }}</h3>
                <h5>Posted by {{ $post->user->name }}</h5>
                <div class="d-flex align-items-center gap-2">
                    <a href="/posts/{{ $post->id }}" class="btn btn-success rounded btn-sm">View</a>
                    <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary rounded btn-sm">Edit</a>
                    <form action="/posts/{{ $post->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger rounded btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-between align-items-center">
        <h1>Manage Users</h1>
    </div>
    @foreach( $users as $user )
        <div class="card">
            <div class="card-body">
                <h3>{{ $user->email }}</h3>
                <h5>created on {{ $user->created_at }}</h5>
                <div class="d-flex align-items-center gap-2">
                    <form action="/posts/{{ $user->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger rounded btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    
</div>
@endsection