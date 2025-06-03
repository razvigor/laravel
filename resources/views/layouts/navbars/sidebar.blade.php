<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/trabant_res_1280x720.jpg">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
  <div class="logo">
    <a href="#" class="simple-text logo-mini">
      <i class="material-icons">home</i>
      
    </a>
    <a href="#" class="simple-text logo-normal">
      {{--{{ __('Turbo SAVIĆ') }}--}}
      <img style="width:160px" src="{{ asset('material') }}/img/TURBO_logo.png">
    </a>
  </div>
  <div class="sidebar-wrapper">
    <div class="user">
      <div class="photo">
        <img src="{{ auth()->user()->profilePicture() }}" />
      </div>
      <div class="user-info">
        <a data-toggle="collapse" href="#collapseExample" class="username">
          <span>
            {{ auth()->user()->name }}
            <b class="caret"></b>
          </span>
        </a>
        <div class="collapse" id="collapseExample">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> MP </span>
                <span class="sidebar-normal"> Moj profil </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> IP </span>
                <span class="sidebar-normal"> Izmjena profila </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <ul class="nav">
 {{--
      <li class="nav-item {{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Početna') }}</p>
        </a>
      </li>
--}}
      <li class="nav-item{{ $activePage == 'predracuni' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('predracun.index') }}">
          <i class="material-icons">list_alt</i>
          <p> {{ __('Predračuni') }} </p>
        </a>
      </li>  

      <li class="nav-item{{ $activePage == 'turbine' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('turbina.index') }}">
          <i class="material-icons">air</i>
          <p> {{ __('OEM turbine') }} </p>
        </a>
      </li>       

      <li class="nav-item {{ ($menuParent == 'laravel' || $activePage == 'dashboard') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" {{ ($menuParent == 'laravel' || $activePage == 'dashboard') ? ' aria-expanded="true"' : '' }}>
          {{--<i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>--}}
          <i class="material-icons">settings</i>
          <p>{{ __('Administracija') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ ($menuParent == 'dashboard' || $menuParent == 'laravel') ? ' show' : '' }}" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> KP </span>
                <span class="sidebar-normal">{{ __('Korisnički profil') }} </span>
              </a>
            </li>
            @can('manage-users', App\User::class)
              <li class="nav-item{{ $activePage == 'role-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('role.index') }}">
                  <span class="sidebar-mini"> VK </span>
                  <span class="sidebar-normal"> {{ __('Vrste korisnika') }} </span>
                </a>
              </li>
            @endcan
            @can('manage-users', App\User::class)
              <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}">
                  <span class="sidebar-mini"> K </span>
                  <span class="sidebar-normal"> {{ __('Korisnici') }} </span>
                </a>
              </li>
            @endcan

                {{--

                          @can('manage-rnalozi', App\User::class)
                            <li class="nav-item{{ $activePage == 'rnalog-management' ? ' active' : '' }}">
                              <a class="nav-link" href="{{ route('rnalog.index') }}">
                                <span class="sidebar-mini"> RN </span>
                                <span class="sidebar-normal"> {{ __('Radni nalozi') }} </span>
                              </a>
                            </li>
                          @else
                            <li class="nav-item{{ $activePage == 'rnalog-management' ? ' active' : '' }}">
                              <a class="nav-link" href="{{ route('rnalog.index') }}">
                                <span class="sidebar-mini"> PRN </span>
                                <span class="sidebar-normal"> {{ __('Pregled radnih naloga') }} </span>
                              </a>
                            </li>
                          @endcan

                --}}
          </ul>
        </div>
      </li>
      <li class="nav-item {{ $menuParent == 'sifrarnici' ? 'active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#sifrarnici" {{ $menuParent == 'Pages' ? 'aria-expanded="true"' : '' }}>
          <i class="material-icons">feed</i>
          <p> {{ __('Šifrarnici') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse{{ $menuParent == 'sifrarnici' ? ' show' : '' }}" id="sifrarnici">
          <ul class="nav">




            
            <li class="nav-item{{ $activePage == 'turbinadijelovi' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('turbinadio.index') }}">
                <span class="sidebar-mini"> DT </span>
                <span class="sidebar-normal"> {{ __('Dijelovi za turbine') }} </span>
              </a>
            </li>

            <li class="nav-item{{ $activePage == 'kupci' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('kupac.index') }}">
                <span class="sidebar-mini"> K </span>
                <span class="sidebar-normal"> {{ __('Kupci') }} </span>
              </a>
            </li>          
          
              {{--

              @can('manage-proizvodi', App\User::class)
                <li class="nav-item{{ $activePage == 'proizvod-management' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('proizvod.index') }}">
                    <span class="sidebar-mini"> PU </span>
                    <span class="sidebar-normal"> {{ __('Proizvodi') }} </span>
                  </a>
                </li>
              @else
                <li class="nav-item{{ $activePage == 'proizvod-management' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('proizvod.index') }}">
                    <span class="sidebar-mini"> PP </span>
                    <span class="sidebar-normal"> {{ __('Pregled proizvoda') }} </span>
                  </a>
                </li>
              @endcan
              --}}
          </ul>
        </div>
      </li>

  {{--
  
      <li class="nav-item {{ $menuParent == 'sifrarnici' ? 'active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#sifrarnici" {{ $menuParent == 'Pages' ? 'aria-expanded="true"' : '' }}>
          <i class="material-icons">image</i>
          <p> {{ __('Šifrarnici') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse{{ $menuParent == 'sifrarnici' ? ' show' : '' }}" id="sifrarnici">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'proizvrstamodeli' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('proizvrstamodel.index') }}">
                <span class="sidebar-mini"> MP </span>
                <span class="sidebar-normal"> {{ __('Modeli proizvoda') }} </span>
              </a>
            </li>            
            <li class="nav-item{{ $activePage == 'masine' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('masina.index') }}">
                <span class="sidebar-mini"> M </span>
                <span class="sidebar-normal"> {{ __('Mašine') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'vrste_masina' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('masinvrsta.index') }}">
                <span class="sidebar-mini"> VM </span>
                <span class="sidebar-normal"> {{ __('Vrste mašina') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'lokacije_masina' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('masinlokacija.index') }}">
                <span class="sidebar-mini"> LM </span>
                <span class="sidebar-normal"> {{ __('Lokacije mašina//RM') }} </span>
              </a>
            </li>            
            <li class="nav-item{{ $activePage == 'radnici' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('radnik.index') }}">
                <span class="sidebar-mini"> R </span>
                <span class="sidebar-normal"> {{ __('Radnici') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'alati' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('alat.index') }}">
                <span class="sidebar-mini"> A </span>
                <span class="sidebar-normal"> {{ __('Alati') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'grupe_alata' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('alatnaziv.index') }}">
                <span class="sidebar-mini"> GA </span>
                <span class="sidebar-normal"> {{ __('Grupe alata') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'proizvodjaci' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('proizvodjac.index') }}">
                <span class="sidebar-mini"> PA </span>
                <span class="sidebar-normal"> {{ __('Proizvođači alata') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'materijali' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('materijal.index') }}">
                <span class="sidebar-mini"> MAT </span>
                <span class="sidebar-normal"> {{ __('Materijali') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'mat_oznake' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('mattipoznaka.index') }}">
                <span class="sidebar-mini"> OM </span>
                <span class="sidebar-normal"> {{ __('Oznake lakova i presvlaka') }} </span>
              </a>
            </li>                
            <li class="nav-item{{ $activePage == 'mat_vrste' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('mattipvrsta.index') }}">
                <span class="sidebar-mini"> VM </span>
                <span class="sidebar-normal"> {{ __('Vrste materijala') }} </span>
              </a>
            </li>            
            <li class="nav-item{{ $activePage == 'mat_tipovi' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('mattip.index') }}">
                <span class="sidebar-mini"> TM </span>
                <span class="sidebar-normal"> {{ __('Tipovi materijala') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'kupci' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('kupac.index') }}">
                <span class="sidebar-mini"> K </span>
                <span class="sidebar-normal"> {{ __('Kupci') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'parametri' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('parametar.index') }}">
                <span class="sidebar-mini"> OP </span>
                <span class="sidebar-normal"> {{ __('Opšti parametri') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>

 --}}

    </ul>
  </div>
</div>
