<header class="header align-items-center justify-content-evenly">
  <a class="text-ligth" href="{{route('home')}}" style="font-weight: 900"><h2 class="m-0" ><i class="fas fa-bullhorn"></i>  Presto</h2></a>
  <div class="menu-btn">
    <div class="menu-btn__lines"></div>
  </div>
  <ul class="menu-items m-0">
    <li class="nav-item dropdown">
      <a class="ancoder-nav display-6 nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">{{ __('ui.categorie')}}</a>
      <ul class="dropdown-menu" aria-labelledby="dropdown04">
        @foreach ($categories as $category)
        <a class="ancoder-nav display-6 nav-link text-black " href="{{route('public.announcements.category', [$category->name, $category->id])}}">
          <h6 class="text-black">{{$category->name}}</h6>
        </a>
        @endforeach
      </ul>
    </li>
    @guest
    <li class="ms-3"><button type="button" class="btn btn-accent" id="login">{{ __('ui.login')}}</button></li>
    <li class="ms-3"><button type="button" class="btn btn-accent" id="signup">{{ __('ui.registrati')}}</button></li>
    @endguest
    @auth
    <li class="nav-item">
      <a class="ancoder-nav display-6 nav-link" href="{{route('createAnnouncement')}}">{{ __('ui.creaannuncio')}}</a>
    </li>
    @if (Auth::user()->is_revisor)
    <li class="nav-item">
      <a class="ancoder-nav display-6 nav-link" href="{{route('revisor.home')}}">{{ __('ui.arearevisori')}} 
      <span class="badge badge-pill badge-warning display-6 " >{{\App\Models\Announcement::ToBeRevisionedCount()}}</span> </a>

    </li>  
    @endif  
    <li class="nav-item dropdown">
      
      <a class="ancoder-nav display-6 nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">{{ __('ui.ciao')}}, <br> {{Auth::user()->name}}</a>
      <ul class="dropdown-menu" aria-labelledby="dropdown04">
        @if (Auth::user()->is_revisor==0)
        <li class='text-black'><a class="ancoder-nav display-6 dropdown-item text-black" href="{{route('revisorRequest')}}">{{ __('ui.diventarevisore')}}</a></li>
        @endif
        <li class="logout-li text-black"><a class="ancoder-nav display-6 dropdown-item text-black" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('form-logout').submit();">{{ __('ui.logout')}}</a></li>
        <form method="POST" action="{{route('logout')}}" id="form-logout">
          @csrf
        </form>   
      </ul>
    </li> 
    @endauth 
    <li class="nav-item mx-2 bandiera-ita lead">
      <form action="{{route('locale', 'it')}}" method="POST" class="bandiere">
        @csrf
        <button type="submit" class="btnTransparent ">
          <span class="flag-icon flag-icon-it "></span>
        </button>
      </form>  
    </li>
    <li class="nav-item mx-2 lead">
      <form action="{{route('locale', 'en')}}" method="POST" class="bandiere">
        @csrf
        <button type="submit" class="btnTransparent ">
          <span class="flag-icon flag-icon-gb "></span>
        </button>
      </form>  
    </li>
    <li class="nav-item mx-2 lead">
      <form action="{{route('locale', 'ja')}}" method="POST" class="bandiere">
        @csrf
        <button type="submit" class="btnTransparent ">
          <span class="flag-icon flag-icon-jp "></span>
        </button>
      </form>  
    </li>
  </ul>
</header>

<x-login/>
<x-register/>


{{-- <nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}">Presto.it</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarsExample04">
      <ul class="navbar-nav ms-auto mb-2 mb-md-0">
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Categorie</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown04">
            @foreach ($categories as $category)
            <a class="nav-link text-black" href="{{route('public.announcements.category', [$category->name, $category->id])}}">
              {{$category->name}}
            </a>
            @endforeach
          </ul>
        </li>
        
        
        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('register')}}">Registrati</a>
        </li>     
        @endguest
        @auth
        <li class="nav-item">
          <a class="nav-link" href="{{route('createAnnouncement')}}">Crea articolo</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Ciao, {{Auth::user()->name}}</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown04">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li class="logout-li"><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('form-logout').submit();">Logout</a></li>
            <form method="POST" action="{{route('logout')}}" id="form-logout">
              @csrf
            </form>   
          </ul>
        </li>
        @endauth
        
      </ul>
    </div>
  </div>
</nav> --}}