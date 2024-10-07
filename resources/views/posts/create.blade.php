@extends("layouts.app")

@section('content')
<div class="container">
    <h1>Add New Post</h1>
    <!-- error box -->
    @if ( $errors->any() )
        <div class="alert alert-danger">
            @foreach ( $errors->all() as $error )
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
    <form action="/posts" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>
@endsection