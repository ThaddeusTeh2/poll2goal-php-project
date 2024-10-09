@extends("layouts.app")

@auth

@if (auth()->user()->role === "user" || "mod" || "admin")

@section('content')
<div class="container text-center p-5">
    <div class="p-3">
      <h1>{{ $post->content }}</h1>
    </div>

    <div>
        <button type="button" class="btn btn-success">Yes</button>
        <button type="button" class="btn btn-danger">No</button>
    </div>


    <!--TODO voting func here-->
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