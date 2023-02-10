@extends('layout.default')



@section('content')

        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">News:</strong>
          <h3 class="mb-0">{{ $new->title }}</h3>
          <h5>{{ $new->content }}</h5>
          <div class="mb-1 text-muted">{{ $new->user->name }}</div>
          <p class="mb-auto">{{ $new->user->email }}</p>
        </div>


@endsection