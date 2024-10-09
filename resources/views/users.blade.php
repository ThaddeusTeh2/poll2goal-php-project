@extends("layouts.app")

@auth

@if (auth()->user()->role === "admin")

@section('content')

<div class="d-flex justify-content-between align-items-center">
    <h1>Manage Users</h1>
</div>
@foreach( $users as $user )
    <div class="card m-2 d-flex">
        <div class="card-body">
            <h3 class="text-primary">{{ $user->name }}</h3>
            <h3 class="text-warning">{{ $user->role }}</h3>
            <h4>{{ $user->email }}</h4>
            <h5>created on {{ $user->created_at }}</h5>
            <div class="d-flex align-items-center gap-2">
                <form action="/users/{{ $user->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger rounded btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endforeach

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