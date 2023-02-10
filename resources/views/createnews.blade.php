@extends('layout.default')

@section('content')

 <form class="container mb-5" action="{{ url('createnews') }}" method="POST">
    @csrf
    <h1>Create News:</h1>
    <div class="mb-3">
      <input type="text" class="form-control" name="title" placeholder="News Title" required>
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="content" placeholder="News Content..." required>
    </div>
    <div class="mb-3">
        <fieldset>
            <legend>Choose team to tag</legend>
            @foreach ($teams as $team)
        
            <div>
              <input type="checkbox" name="teams[]" value="{{ $team->id }}">
              <label for="scales">{{ $team->name }}</label>
            </div>
            
            @endforeach
        </fieldset>
    </div>


    <button type="submit" class="btn btn-primary">Create Account</button>
</form>

@endsection