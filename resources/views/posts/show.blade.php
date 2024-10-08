@extends("layouts.app")

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