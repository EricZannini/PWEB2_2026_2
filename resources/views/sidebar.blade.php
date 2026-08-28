<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="{{ url('/') }}">TapCine</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/') }}">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('filme') }}">Filmes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('sessao') }}">Sessões</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('ingresso') }}">Ingressos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('aluno') }}">Aluno</a>
        </li>
      </ul>
      @if (session()->has('usuario_id'))
        <span class="navbar-text me-3">Olá, {{ session('usuario_nome') }}</span>
        <a class="btn btn-outline-light btn-sm" href="{{ url('logout') }}">Sair</a>
      @endif
    </div>
  </div>
</nav>
