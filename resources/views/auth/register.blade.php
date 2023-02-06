@extends('layout.default')

@section('content')

 <form class="container mb-5" action="{{ url('register') }}" method="POST">
    @csrf
    <div class="mb-3">
      <input type="text" class="form-control" name="name" placeholder="Name" required>
    </div>
    <div class="mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
    <div class="mb-3">
        <input type="email" class="form-control" name="email" placeholder="example@email.com" required>
    </div>
    {{-- <div class="mb-3">
      <label for="admin">Are you an Admin?</label>
      <input type="checkbox" name="admin">
    </div> --}}


    <button type="submit" class="btn btn-primary">Create Account</button>
</form>

@endsection