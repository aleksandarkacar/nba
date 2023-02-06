@extends('layout.default')


@section('content')

<div class="col p-4 d-flex flex-column position-static">
    <strong class="d-inline-block mb-2 text-success">Player:</strong>
    <h3 class="mb-0">{{ $player->first_name}} {{$player->last_name}}</h3>
    <h5>{{ $player->email }}</h5>
    <a href="/teams/{{ $player->team_id }}" class="stretched-link">Go to team</a>
</div>


@endsection