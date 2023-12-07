<nav class="navbar navbar-expand-lg ">
    <div class="container">
      <a class="navbar-brand" href="#">Web Artikel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""><i class="fa-solid fa-bars fs-3 text-light"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link" href="/semua/artikel">Semua Artikel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-light " href="/logout">Logout <i class="fa-solid fa-right-from-bracket"></i></a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link btn btn-light " href="{{route('login')}}">Login <i class="fa-solid fa-right-to-bracket"></i></a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
