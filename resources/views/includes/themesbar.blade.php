<nav class="navbar navbar-expand-lg navbar-dark">    
  <ul class="nav text-nowrap flex-nowrap" style="overflow-x: auto;">     
    @foreach ($themes as $theme)
      <li class="nav-item theme-link">
        <a class="nav-link" href="#">
          {{ $theme->title }}
        </a>
      </li>                   
    @endforeach                                     
  </ul>          
</nav>