<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html">
            <img src="{{asset('backend/assets/images/logo.svg')}}" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html">
            <img src="{{asset('backend/assets/images/logo-mini.svg')}}" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="{{asset('backend/assets/images/faces/face15.jpg')}}" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
        <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                  <span>{{ Auth::user()->email }}</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Configuración de cuenta</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Cambiar contraseña</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navegación</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('dashboard')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>


@if(Auth::user()->category == 1)

          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Categorías</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
   <a class="nav-link" href="{{ route('categories') }}">Categoría</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('subcategories') }}">Subcategoría</a></li>
                 
              </ul>
            </div>
          </li>
   @else
   
   @endif       

@if(Auth::user()->provincia == 1)
 <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#provincia" aria-expanded="false" aria-controls="provincia">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">Provincia</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="provincia">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('provincia') }}">Provincia </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('distrito') }}"> Distrito </a></li>
                
              </ul>
            </div>
          </li>


   @else
   
   @endif   
@if(Auth::user()->post == 1)
<li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#post" aria-expanded="false" aria-controls="post">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">Publicaciones</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="post">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('create.post') }}">Agregar publicación </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('all.post') }}"> Todas las publicación </a></li>
                
              </ul>
            </div>
          </li>


   @else
   
   @endif   
@if(Auth::user()->setting == 1)
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#setting" aria-expanded="false" aria-controls="setting">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Configuraciones</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="setting">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('social.setting') }}">Configuraciones de redes sociales </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('seo.setting') }}">Configuración SEO </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('livetv.setting') }}">Configuración Live Tv </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('notice.setting') }}">Configuración Noticia </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('website.setting') }}">Configuración Sitio Web </a></li>
                
                
              </ul>
            </div>
          </li>

   @else
   
   @endif   

@if(Auth::user()->website == 1)
<li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#website" aria-expanded="false" aria-controls="website">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Sitio Web</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="website">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('add.website') }}">Agregar enlace de sitio web</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('all.website') }}">Todos los enlaces web </a></li>
                  
              </ul>
            </div>
          </li>

@else
   
  @endif


@if(Auth::user()->gallery == 1)
<li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#photo" aria-expanded="false" aria-controls="photo">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Galería</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="photo">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('photo.gallery') }}">Galería de fotos</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('video.gallery') }}">Galeria de videos</a></li>
                  
              </ul>
            </div>
          </li>


   @else
   
   @endif 

@if(Auth::user()->ads == 1)
<li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ads" aria-expanded="false" aria-controls="ads">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">Anuncio publicitario</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ads">
              <ul class="nav flex-column sub-menu">
       <li class="nav-item"> <a class="nav-link" href="{{ route('list.add') }}">Lista de anuncios </a></li>
               
                  
              </ul>
            </div>
          </li>

   @else
   
   @endif   
  

   @if(Auth::user()->role == 1)
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">Roles del usuario</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('add.writer') }}"> Agregar usuarios </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('all.writer') }}"> Todos los usuarios </a></li>
                
              </ul>
            </div>
          </li>

   @else
   
   @endif   
        </ul>
      </nav>