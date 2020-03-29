<!-- Sidebar -->
<ul class="navbar-nav bg-dark sidebar text-light accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center text-light" href="/home">
      <div class="sidebar-brand-text ">Gestão de Retalho</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link text-light" href="/home">
        <i class="fas fa-home"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading text-muted">
      Gerir retalho
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed text-light" href="#" data-toggle="collapse" data-target="#retalho" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-layer-group"></i>
        <span>Retalho</span>
      </a>
      <div id="retalho" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <!--<h6 class="collapse-header">Custom Components:</h6>-->
          <a class="collapse-item" href="/retalho">Retalho disponível</a>
          <a class="collapse-item" href="/retalho/create">Adicionar retalho</a>
        </div>
      </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading text-muted">
        Gerir tipos de vidro
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed text-light" href="#" data-toggle="collapse" data-target="#tiposVidro" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-box-open"></i>
        <span>Tipos de vidro</span>
      </a>
      <div id="tiposVidro" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <!--<h6 class="collapse-header">Custom Components:</h6>-->
          <a class="collapse-item" href="/tipoVidro">Ver tipos de vidro</a>
          <a class="collapse-item" href="/tipoVidro/create">Adicionar tipo de vidro</a>
        </div>
      </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading text-muted">
        Gerir categorias
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed text-light" href="#" data-toggle="collapse" data-target="#categorias" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-folder"></i>
        <span>Categorias</span>
      </a>
      <div id="categorias" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <!--<h6 class="collapse-header">Custom Components:</h6>-->
          <a class="collapse-item" href="/categoria">Ver categorias</a>
          <a class="collapse-item" href="/categoria/create">Adicionar categoria</a>
        </div>
      </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading text-muted">
        Gerir localizações
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed text-light" href="#" data-toggle="collapse" data-target="#localizacao" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-map-pin"></i>
            <span>Localizações</span>
        </a>
        <div id="localizacao" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!--<h6 class="collapse-header">Custom Components:</h6>-->
                <a class="collapse-item" href="/localizacao">Ver localizações</a>
                <a class="collapse-item" href="/localizacao/create">Adicionar localização</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading text-muted">
        Gerir utilizadores
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed text-light" href="#" data-toggle="collapse" data-target="#utilizadores" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-users"></i>
            <span>Utilizadores</span>
        </a>
        <div id="utilizadores" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!--<h6 class="collapse-header">Custom Components:</h6>-->
                <a class="collapse-item" href="/utilizadores">Ver operarios</a>
                <a class="collapse-item" href="/localizacao">Ver administradores</a>
                <a class="collapse-item" href="/localizacao/create">Adicionar utilizador</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
