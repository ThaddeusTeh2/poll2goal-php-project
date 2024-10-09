@extends("layouts.app")

@auth

@if (auth()->user()->role === "user" || "mod" || "admin")

@section('content')
<div class="container">
    <h1>Edit Post</h1>
        <!-- error box -->
        @if ( $errors->any() )
        <div class="alert alert-danger">
            @foreach ( $errors->all() as $error )
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
    <form action="/posts/{{ $post->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5">{{ $post->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>
@endsection

@else
<div class="card w-75 mb-3">
    <div class="card-body">
      <h5 class="card-title">You do not have access to this page</h5>
      <a href="#" class="btn btn-primary">Button</a>
    </div>
  </div>
  @endif
@endauth