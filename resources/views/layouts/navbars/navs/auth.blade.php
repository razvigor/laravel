<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <div class="navbar-minimize">
          <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
            <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
          </button>
        </div>
        <a class="navbar-brand" href="#pablo">{{ $titlePage }}</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end">
        {{--
        <form class="navbar-form">
          <div class="input-group no-border">
            <input type="text" value="" class="form-control" placeholder="Traži...">
            <button type="submit" class="btn btn-white btn-round btn-just-icon">
              <i class="material-icons">search</i>
              <div class="ripple-container"></div>
            </button>
          </div>
        </form>
        --}}
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
              <i class="material-icons">home</i>
              <p class="d-lg-none d-md-block">
                {{ __('Početna') }}
              </p>
            </a>
          </li>
        {{--
          <li class="nav-item dropdown">
            <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">notifications</i>
              <span class="notification">4</span>
              <p class="d-lg-none d-md-block">
                {{ __('obavijesti') }}
              </p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">{{ __('Imate novi email') }}</a>
              <a class="dropdown-item" href="#">{{ __('Imate 5 novih taskova') }}</a>
              <a class="dropdown-item" href="#">{{ __('još jedna obavijest...') }}</a>
              <a class="dropdown-item" href="#">{{ __('i još jedna') }}</a>
            </div>
          </li>
        --}}
          <li class="nav-item dropdown">
            <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">person</i>
              <p class="d-lg-none d-md-block">
                  {{ __('Nalog') }}
              </p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Korisnički profil') }}</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Odjava') }}</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->