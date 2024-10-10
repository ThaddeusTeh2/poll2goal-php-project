@extends("layouts.app")

@auth

@if (auth()->user()->role === "admin")

@section('content')

<div class="d-flex m-2 justify-content-between align-items-center">
    <h1>Manage Users</h1>
</div>
@foreach( $users as $user )
    
    @if (auth()->user()->id === $user->id)
    <div class="card m-2 d-flex border border-black">
        <div class="card-body">
            <h3 class="text-dark">{{ $user->name }}</h3>

            <form action="/users/{{ $user->id }}" method="POST">
                @csrf
                @method ("PUT")
                <div class="form-group mb-3">
                    <label for="role">Role</label>
                    <select name="role" id="role">


                        <option value="user" <?php echo $user->role== 'user' ? "selected" : "" ?> >User</option>

                        <option value="tm" <?php echo $user->role== 'mod' ? "selected" : "" ?> >Mod</option>

                        <option value="admin" <?php echo $user->role== 'admin' ? "selected" : "" ?> >Admin</option>

                    </select>
                </div>
                <button class="btn btn-outline-dark rounded btn-sm">Update</button>            
            </form>
            

            <h4>{{ $user->email }}</h4>
            <h5>created on {{ $user->created_at }}</h5>
            <div class="d-flex align-items-center gap-2">
                <form action="/users/{{ $user->id }}" method="POST">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    @else
    <div class="card m-2 d-flex border border-black">
        <div class="card-body">
            <h3 class="text-dark">{{ $user->name }}</h3>
            
            <form action="/users/{{ $user->id }}" method="POST">
                @csrf
                @method ("PUT")
                <div class="form-group mb-3">
                    <label for="role">Role</label>
                    <select name="role" id="role">


                        <option value="user" <?php echo $user->role== 'user' ? "selected" : "" ?> >User</option>

                        <option value="tm" <?php echo $user->role== 'mod' ? "selected" : "" ?> >Mod</option>

                        <option value="admin" <?php echo $user->role== 'admin' ? "selected" : "" ?> >Admin</option>

                    </select>
                </div>
                <button class="btn btn-outline-dark rounded btn-sm">Update</button>            
            </form>
              
            <h4>{{ $user->email }}</h4>
            <h5>created on {{ $user->created_at }}</h5>
            <div class="d-flex align-items-center gap-2">
                <form action="/users/{{ $user->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger rounded btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endif

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