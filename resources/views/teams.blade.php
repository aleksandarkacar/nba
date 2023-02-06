@extends('layout.default')



@section('content')

<div class="row mb-2">
    
@foreach ($teams as $team)
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Team:</strong>
          <h3 class="mb-0">{{ $team->name }}</h3>
          <h5>{{ $team->email }}</h5>
          <div class="mb-1 text-muted">{{ $team->address }}</div>
          <p class="mb-auto">{{ $team->city }}</p>
          <a href="/teams/{{ $team->id }}" class="stretched-link">Go to team</a>
        </div>
      </div>
    </div>
    @endforeach

  </div>



@endsection