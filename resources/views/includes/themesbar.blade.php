<nav class="navbar navbar-expand-lg navbar-dark">    
  <ul data-aos="fade-right" class="nav text-nowrap flex-nowrap" style="overflow-x: auto;">     
    @foreach ($themes as $theme)
      <li 
        data-aos="flip-left" 
        data-aos-offset="400"
        data-aos-easing="ease-in-sine"
        class="nav-item theme-link"
      >
        <a class="nav-link" href="{{ route('theme.index', $theme->id) }}">
          {{ $theme->title }}
        </a>
      </li>                   
    @endforeach                                     
  </ul>          
</nav>