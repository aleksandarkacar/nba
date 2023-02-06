<nav class="py-2 bg-light border-bottom">
  <div class="container d-flex flex-wrap">
    <ul class="nav me-auto">
      <li class="nav-item"><a href="/" class="nav-link link-dark px-2 active">Home</a></li>
    </ul>
    <ul class="nav">
        {{-- <li class="nav-item"><a href="/profile" class="nav-link link-dark px-2">Profile</a></li> --}}
        @if (!Auth::user())
        <li class="nav-item"><a href="/signin" class="nav-link link-dark px-2">Sign in</a></li>
        <li class="nav-item"><a href="/register" class="nav-link link-dark px-2">Sign up</a></li>
        @else
        <li class="nav-item"><a href="/signout" class="nav-link link-dark px-2">Sign out</a></li>
        @endif
        {{-- <li class="nav-item"><a href="/adminpanel" class="nav-link link-dark px-2">Admin Panel</a></li> --}}
    </ul>
  </div>
</nav>
<header class="py-3 mb-4 border-bottom">
  <div class="container d-flex flex-wrap justify-content-center">
    <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="/teams"/></svg>
      <span class="fs-4">NBA</span>
    </a>
  </div>
</header>
