@extends("layouts.app")

@auth

@if (auth()->user()->role === "user" || "mod" || "admin")

@section('content')
<div class="container text-center p-5">
    <div class="p-3">
      <h1>{{ $post->content }}</h1>
      <h4>by {{ $post->user->name }}</h4>
    </div>

    <div>
        <button type="button" class="btn btn-success">Yes</button>
        <button type="button" class="btn btn-danger">No</button>
    </div>


    <!--TODO voting func here-->

    <!--TODO comments func here-->
    <div class="m-5">
        <form action="" method="POST">
            @CSRF
        <label for="comment-box" class="form-label">Leave a comment.</label>
        <textarea class="form-control" id="comment" rows="3"></textarea>
        <a href="#" class="btn btn-primary m-2"><i class="bi bi-send"></i></a>
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