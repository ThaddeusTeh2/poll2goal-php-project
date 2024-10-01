@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!--card-->
    <div class="container min-vh-100">
        <div class="card">
            <h5 class="card-header">Poll</h5>
            <div class="card-body">
              <h5 class="card-title">Pineapple on pizza</h5>
              <p class="card-text">Some ppl like some dont, which one r u?</p>
              <form>
              <a href="#" class="btn btn-primary">vote</a>
              </form>
            </div>
          </div>
    </div>
@endsection
