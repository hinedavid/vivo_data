
<div class="menu-container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('lote.create') }}">Registrar lote</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/delivery') }}">Registrar entrega</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/report') }}">Reportes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.index') }}">Administrativo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">Salir
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
      </ul>
    </div>
  </nav>
</div>

