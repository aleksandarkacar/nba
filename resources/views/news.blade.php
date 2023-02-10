@extends('layout.default')



@section('content')

<div style="display: flex; justify-content: center;">{{ $news }}</div>

<div class="row mb-2">
@foreach ($news as $new)
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">News:</strong>
          <h3 class="mb-0">{{ $new->title }}</h3>
          <h5>{{ $new->content }}</h5>
          {{-- <div class="mb-1 text-muted">{{ $new->user->name }}</div> --}}
          {{-- <p class="mb-auto">{{ $new->user->email }}</p> --}}
          <a href="/news/{{ $new->id }}" class="stretched-link">Go to News</a>
        </div>
      </div>
    </div>
    @endforeach

  </div>
  <div style="display: flex; justify-content: center;">{{ $news }}</div>


@endsection