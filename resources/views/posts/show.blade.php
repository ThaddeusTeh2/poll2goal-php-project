@extends("layouts.app")

@auth

@if (auth()->user()->role === "user" || "mod" || "admin")

@section('content')
<div class="container text-center border border-black rounded p-5">
    <div class="p-3">
      <h1>{{ $post->content }}</h1>
      <h4>by {{ $post->user->name }}</h4>
    </div>

    <!--voting func here-->
    <div class="d-flex justify-content-center">
      <!-- form for Yes -->
      <form action="/votes" method="POST">
          @csrf
          <input type="hidden" name="vote" value="1"> <!-- Yes vote -->
          <input type="hidden" name="post_id" value={{$post->id}}>
          <button type="submit" class="btn btn-outline-success m-2"><i class="bi bi-hand-thumbs-up"></i> {{$votesYes}}</button>
        </form>
        
        <!-- form for No -->
        <form action="/votes" method="POST">
          @csrf
          <input type="hidden" name="vote" value="0"> <!-- No vote -->
          <input type="hidden" name="post_id" value={{$post->id}}>
          <button type="submit" class="btn btn-outline-danger m-2"><i class="bi bi-hand-thumbs-down"></i> {{$votesNo}}</button>
      </form>
  </div>

    <!--comments func here-->
    <div class="m-5">
      <form action="/comments" method="POST">
        <input type="hidden" name="post_id" value="{{$post->id}}" >
          @CSRF
          <label for="comment-box" class="form-label">Leave a comment.</label>
          <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>

          <button type="submit" class="btn btn-outline-primary m-2"><i class="bi bi-send"></i></button>
      </form>
  </div>

      <!--comments echoed here-->

      <div>
        @foreach($comments as $comment)
        <div class="card m-2">
          <div class="card-body d-flex flex-start">
              <h4>{{ $comment->user->name }}: {{ $comment->comment }}</h4>
          </div>
       </div>
       @endforeach
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