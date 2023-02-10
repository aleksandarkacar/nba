@extends('layout.default')



@section('content')
    <div class="container center">
        <strong class="d-inline-block mb-2 text-success">Team:</strong>
        <h3 class="mb-0">{{ $team->name }}</h3>
        <h5>{{ $team->email }}</h5>
        <div class="mb-1 text-muted">{{ $team->address }}</div>
        <p class="mb-auto">{{ $team->city }}</p>
        <a href="/news/team/{{ $team->name }}" class="btn-default">Show all news relating to team</a>
    </div>

    <div class="row mb-2">
        <h1>Players:</h1>
        @foreach ($players as $player)
            <div class="col-md-6">
              <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                  <strong class="d-inline-block mb-2 text-success">Player:</strong>
                  <h3 class="mb-0">{{$player->first_name}} {{$player->last_name}}</h3>
                  <h5>{{ $player->email }}</h5>
                  <a href="/players/{{ $player->id }}" class="stretched-link">Go to player</a>
                </div>
              </div>
            </div>
            @endforeach
        
          </div>

    @include('components.comments')

@endsection