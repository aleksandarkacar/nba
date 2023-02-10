@extends('layout.default')



@section('content')
<div class="container">
    <div class="row g-5">
        <div class="col-md-8 col-lg-8 ml-5">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-success">News:</strong>
              <h3 class="mb-0">{{ $new->title }}</h3>
              <h5>{{ $new->content }}</h5>
              <div class="mb-1 text-muted">{{ $new->user->name }}</div>
              <p class="mb-auto">{{ $new->user->email }}</p>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 order-md-last">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text">Related teams:</span>
                </h4>
                <ul class="list-group mb-3">
                    @foreach ($new->teams as $team)
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <a href="/news/team/{{ $team->name }}" class="stretched-link">{{ $team->name }}</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>


@endsection