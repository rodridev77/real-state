<nav class="dash-topbar-menu">
  <div>
    <div><span class="hello-user">Olá, </span>{{auth()->user()->name}}</div>
    <div><span class="hello-user"></span>{{auth()->user()->roles[0]->name ?? 'sem permissão'}}</div>
   
  </div>
  <div class="btn-logout opacity-btn" style="display:flex; justify-content: space-between; align-items:center">
    <a class="nav-item nav-link btn-login" href="{{route('logout')}}">Sair <i class="fas fa-sign-out-alt"></i></a>
  </div>
</nav>

</div>