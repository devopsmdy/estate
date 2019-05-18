<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="/estate/search">Search</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/estate?page=1">Real Estates</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/township/create">Township</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/type/create">Type</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/estate/create">New Estates</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/help">How To</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/user/edit">Change Password</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" 
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
  </div>
</nav>