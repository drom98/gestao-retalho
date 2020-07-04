<!-- Sidebar -->
<ul class="navbar-nav bg-dark sidebar text-light accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center text-light" href="/admin">
      <div class="sidebar-brand-text ">Gestão de Retalho</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link text-light" href="/admin">
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
            <a class="collapse-item" href="/admin/retalho">
                Retalho disponível
                <span class="badge badge-pill badge-info">{{ \App\Retalho::count() }}</span>
            </a>
            <a class="collapse-item" href="/admin/usado">
                Retalho usado
                <span class="badge badge-pill badge-info">{{ \App\RetalhoUsado::count() }}</span>
            </a>
            <a class="collapse-item" href="/admin/retalho/eliminado">
                Retalho eliminado
                <span class="badge badge-pill badge-info">{{ \App\Retalho::onlyTrashed()->count() }}</span>
            </a>
            <a class="collapse-item" href="/admin/retalho/create">
                Adicionar retalho
            </a>
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
          <a class="collapse-item" href="/admin/tipoVidro">
              Ver tipos de vidro
              <span class="badge badge-pill badge-info">{{ \App\TipoVidro::count() }}</span>
          </a>
          <a class="collapse-item" href="/admin/tipoVidro/create">Adicionar tipo de vidro</a>
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
          <a class="collapse-item" href="/admin/categoria">
              Ver categorias
              <span class="badge badge-pill badge-info">{{ \App\Categoria::count() }}</span>
          </a>
          <a class="collapse-item" href="/admin/categoria/create">Adicionar categoria</a>
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
                <a class="collapse-item" href="/admin/localizacao">
                    Ver localizações
                    <span class="badge badge-pill badge-info">{{ \App\Localizacao::count() }}</span>
                </a>
                <a class="collapse-item" href="/admin/localizacao/create">Adicionar localização</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading text-muted">
        Gerir utilizadores
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed text-light" href="#" data-toggle="collapse" data-target="#operarios" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-users"></i>
            <span>Utilizadores</span>
        </a>
        <div id="operarios" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!--<h6 class="collapse-header">Custom Components:</h6>-->
                <a class="collapse-item" href="/admin/operario">
                    Ver operários
                    <span class="badge badge-pill badge-info">{{ \App\User::count() }}</span>
                </a>
                <a class="collapse-item" href="/admin/administrador">
                    Ver administradores
                    <span class="badge badge-pill badge-info">{{ \App\Admin::count() }}</span>
                </a>
                <a class="collapse-item" href="/admin/operario/create">Adicionar operário</a>
                <a class="collapse-item" href="/admin/operario/create">Adicionar administrador</a>
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
