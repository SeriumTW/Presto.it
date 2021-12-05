<nav id="navbar" class="navbar line-nav navbar-expand-md navbar-dark bg_main fixed-top" aria-label="Fourth navbar example">
    <div class="container py-1">
      <a class="navbar-brand ps-2" href="{{route('home')}}"><img class="logo" src="/img/logo.it.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fad fa-bars fa-2x"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample04">
        
        
        <ul class="navbar-nav ms-auto mb-2 mb-md-0">
          <li class="nav-item @if(request()->route()->getName() == 'home') d-none @endif   dropdown">
            <a class="nav-link line dropdown-toggle" href="#" id="dropdown06" data-bs-toggle="dropdown" aria-expanded="false"><i class="fad fa-search"></i></a>
            <ul class="dropdown-menu" aria-labelledby="dropdown06">
              <form action="{{route('announcement.search')}}" method="get" class="px-4 pt-3">
                <div class="mb-3 form-search d-flex">
                    <label for="searchbar" class="form-label"></label>
                    <input type="text" name='search' class="form-control" id="searchbar" placeholder="{{ __('ui.cercaAnnuncio') }}">
                    <span class="input-group-text border-0" id="search-addon">
                      <button type="submit" class="border-0 bg-transparent"><i class="zoom fad fa-search"></i></button>
                    </span>
                </div>
              </form>
            </ul>
          </li> 
          <li class="nav-item">
            <a class="nav-link line active" aria-current="page" href="{{route('home')}}">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link line dropdown-toggle" href="#" id="dropdown05" data-bs-toggle="dropdown" aria-expanded="false">{{ __('ui.annunci') }}</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown05">
              <li><a class="dropdown-item" href="{{route('announcement.index')}}">{{ __('ui.tuttiAnnunci') }}</a></li>
              @switch(Lang::locale())
                    @case('it')
                      @foreach ($categories as $category)
                        <li><a class="dropdown-item" href="{{route('announcement.researchCategory', ['category' => $category->id])}}">{{$category->it}}</a></li>
                      @endforeach
                        @break
                    @case('en')
                      @foreach ($categories as $category)
                        <li><a class="dropdown-item" href="{{route('announcement.researchCategory', ['category' => $category->id])}}">{{$category->en}}</a></li>
                      @endforeach
                        @break
                    @case('es')
                      @foreach ($categories as $category)
                        <li><a class="dropdown-item" href="{{route('announcement.researchCategory', ['category' => $category->id])}}">{{$category->es}}</a></li>
                      @endforeach
                        @break           
                @endswitch
            </ul>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link line" aria-current="page" href="{{route('chi-siamo')}}">{{__('ui.chiSiamo')}}</a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link line" href="{{route('announcement.create')}}">{{ __('ui.inserisci') }}</a>
          </li>
        </ul>
          
        <ul class="navbar-nav mb-2 mb-md-0" >

          @auth

            <li class="nav-item dropdown">

              <a class="nav-link line dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">
                {{Auth::user()->name}}
              </a>
              
              <ul class="dropdown-menu" aria-labelledby="dropdown01">
                <li><a class="dropdown-item" href="{{route('profile')}}"><i class="fad fa-user-circle"></i> {{ __('ui.profilo') }}</a></li>
                <li><a class="dropdown-item" href="{{route('messages')}}"><i class="fad fa-comment-dots"></i> Presto Messages </a></li>
                @if(Auth::id()==1)
                  <li><a class="dropdown-item" href="{{route('admin.dashboard')}}"><i class="fad fa-chalkboard-teacher"></i> Dashboard <span class="badge badge-pill badge-warning">{{\App\Models\Announcement::ToBeRevisionedCount()}} </span><span class="badge badge-pill badge-danger"> {{\App\Models\User::ToBeRevisionedCount()}}</span></a></li>
                  <li><a class="dropdown-item" href="{{route('revisor.trashed')}}"><i class="fad fa-trash-alt"></i> {{ __('ui.cestino') }}<span class="badge badge-pill badge-warning">{{\App\Models\Announcement::ToBeRevisionedCountFalse()}}</span></a></li>  
                @elseif (Auth::user()->is_revisor)
                  <li><a class="dropdown-item" href="{{route('revisor.dashboard')}}"><i class="fad fa-chalkboard-teacher"></i> Dashboard <span class="badge badge-pill badge-warning">{{\App\Models\Announcement::ToBeRevisionedCount()}} </span></a></li>
                  <li><a class="dropdown-item" href="{{route('revisor.trashed')}}"><i class="fad fa-trash-alt"></i> {{ __('ui.cestino') }}<span class="badge badge-pill badge-warning">{{\App\Models\Announcement::ToBeRevisionedCountFalse()}}</span></a></li>
                @endif
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item " href="{{route ('logout')}}" onclick="event.preventDefault(); document.getElementById('form-logout').submit();"><i class="fad fa-sign-out-alt"></i> {{ __('ui.esci')}}</a></li>
                <form action="{{route('logout')}}" method="POST" style="display: none" id="form-logout">@csrf</form>
              </ul>
            </li> 

          @else 

            <li class="nav-item dropdown">
              <a class="nav-link line dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fad fa-sign-in-alt mr-2" aria-hidden="true"></i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdown04">
                <li><a class="dropdown-item" href="{{route ('login')}}"><i class="fas fa-user"></i> {{ __('ui.login') }}</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{route ('register')}}"><i class="fas fa-user-plus"></i> {{ __('ui.registrati') }}</a></li>
              </ul>
            </li>

          @endauth
          
        </ul>
          

      </div>
    </div>
  </nav>