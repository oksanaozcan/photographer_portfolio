<div id="topheader" class="row">
  <div class="col-12">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="logo" class="navbar-brand" href="{{ route('main') }}">                          
          <span>A</span>lekseev
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="{{  request()->routeIs('main') ? 'nav-link active' : 'nav-link' }}" href="{{ route('main') }}">Обо мне</a>
            </li>             
            {{-- <li class="nav-item">
              <a class="{{  request()->routeIs('contact.*') ? 'nav-link active' : 'nav-link' }}" href="{{ route('contact.index') }}">Контакты</a>
            </li>                        --}}
          </ul>
          <div class="#">
            @if (Route::has('login'))
              <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                  @auth                
                    <a class="nav-link" href="{{ url('/home') }}" class="#">Admin Panel</a>                                 
                    @else
                      {{-- <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a> --}}
    
                    @if (Route::has('register'))
                      <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                  @endauth
                </div>
            @endif
          </div>                
        </div>
      </div>
    </nav>
  </div>
</div>