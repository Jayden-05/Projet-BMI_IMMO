<!-- Sidebar -->
<nav class="sidebar sidebar-offcanvas modern-sidebar" id="sidebar">
  <ul class="nav modern-nav">

    <!-- Profile Section -->
    <li class="nav-item nav-profile modern-profile-card">
      <a href="#" class="nav-link modern-profile-content">
        <div class="nav-profile-image modern-avatar-wrapper">
          <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="profile" class="modern-avatar" />
          <span class="login-status online modern-online-badge"></span>
        </div>
       <div class="nav-profile-text text-center modern-profile-info">
          <span class="font-weight-bold mb-1 d-block modern-username">{{ Auth::user()->name }}</span>
          <span class="text-small d-block modern-user-role">{{ Auth::user()->email }}</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge modern-check-badge"></i>
      </a>
    </li>

    <!-- Dashboard -->
    <li class="nav-item modern-menu-item">
      <a class="nav-link modern-menu-link" href="{{ route('dashboard') }}">
        <span class="menu-title modern-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon modern-icon modern-icon-primary"></i>
      </a>
    </li>

    <!-- Edition des données -->
    <li class="nav-item modern-menu-item">
      <a class="nav-link modern-menu-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title modern-title">Edition des données</span>
        <i class="menu-arrow modern-arrow"></i>
        <i class="mdi mdi-crosshairs-gps menu-icon modern-icon modern-icon-purple"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu modern-submenu">
          <li class="nav-item">
            <a class="nav-link modern-submenu-link" href="{{ route('proprietaire.index') }}">
              <i class="mdi mdi-account-multiple modern-submenu-icon"></i>Propriétaires
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link modern-submenu-link" href="{{ route('bien.index') }}">
              <i class="mdi mdi-home-city modern-submenu-icon"></i>Biens
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link modern-submenu-link" href="{{ route('agent.index') }}">
              <i class="mdi mdi-account-tie modern-submenu-icon"></i>Agents
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link modern-submenu-link" href="{{ route('client.index') }}">
              <i class="mdi mdi-account-group modern-submenu-icon"></i>Clients
            </a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Etats -->
    <li class="nav-item modern-menu-item">
      <a class="nav-link modern-menu-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
        <span class="menu-title modern-title">Etats</span>
        <i class="menu-arrow modern-arrow"></i>
        <i class="mdi mdi-contacts menu-icon modern-icon modern-icon-pink"></i>
      </a>
      <div class="collapse" id="icons">
        <ul class="nav flex-column sub-menu modern-submenu">
          <li class="nav-item">
            <a class="nav-link modern-submenu-link" href="{{ route('visite.index') }}">
              <i class="mdi mdi-calendar-clock modern-submenu-icon"></i>Visites
            </a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Actions -->
    <li class="nav-item modern-menu-item">
      <a class="nav-link modern-menu-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
        <span class="menu-title modern-title">Actions</span>
        <i class="menu-arrow modern-arrow"></i>
        <i class="mdi mdi-format-list-bulleted menu-icon modern-icon modern-icon-green"></i>
      </a>
      <div class="collapse" id="forms">
        <ul class="nav flex-column sub-menu modern-submenu">
          <li class="nav-item">
            <a class="nav-link modern-submenu-link" href="{{ route('contrats.index') }}">
              <i class="mdi mdi-file-document modern-submenu-icon"></i>Contrats
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link modern-submenu-link" href="{{ route('transactions.index') }}">
              <i class="mdi mdi-swap-horizontal modern-submenu-icon"></i>Transactions
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link modern-submenu-link" href="{{ route('paiements.index') }}">
              <i class="mdi mdi-cash-multiple modern-submenu-icon"></i>Paiements
            </a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Admin Only: Activity Log -->
    @if(Auth::check() && Auth::user()->role === 'Admin')
    <li class="nav-item modern-menu-item">
      <a class="nav-link modern-menu-link" href="{{ route('activity-log.index') }}">
        <span class="menu-title modern-title">Journal d'Activité</span>
        <i class="mdi mdi-history menu-icon modern-icon modern-icon-orange"></i>
      </a>
    </li>
    @endif

  </ul>
</nav>
