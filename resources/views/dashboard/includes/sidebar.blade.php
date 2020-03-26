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
      <a class="nav-link" href="/home">
        <i class="fas fa-home"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Gerir retalho
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#retalho" aria-expanded="true" aria-controls="collapseTwo">
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

    <div class="sidebar-heading">
        Gerir tipos de vidro
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tiposVidro" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-layer-group"></i>
        <span>Tipos de vidro</span>
      </a>
      <div id="tiposVidro" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <!--<h6 class="collapse-header">Custom Components:</h6>-->
          <a class="collapse-item" href="/tipoVidro">Ver tipos de vidro</a>
          <a class="collapse-item" href="/tipoVidro/create">Adicionar novo</a>
        </div>
      </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        Gerir categorias
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categorias" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-layer-group"></i>
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

    <div class="sidebar-heading">
        Gerir localizaçoes
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#localizacao" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-map-pin"></i>
            <span>Localizaçoes</span>
        </a>
        <div id="localizacao" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!--<h6 class="collapse-header">Custom Components:</h6>-->
                <a class="collapse-item" href="/retalho">Ver localizaçoes</a>
                <a class="collapse-item" href="/retalho/create">Adicionar localizaçao</a>
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
