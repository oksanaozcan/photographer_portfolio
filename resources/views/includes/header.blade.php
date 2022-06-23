<section class="section presentation row mt-5">      
  <div data-aos="fade-right" class="presentation__description">        
    <h3 class="mt-3">Профессиональный фотограф</h3>
    <h1 class="main_name">Сергей Алексеев</h1>      
    <q class="main_quot">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</q>        
    <a href="{{ route('contact.index') }}" type="button" class="btn btn-appoint d-block">
      Записаться на фотосессию
      <span></span>
    </a>
    
    <div class="mt-5 d-flex justify-content-arownd">
      <a class="smm-icon" href="#">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a class="smm-icon" href="#">
        <i class="fab fa-twitter"></i>
      </a>         
      <a class="smm-icon" href="#">
        <i class="fab fa-instagram"></i>
      </a>
      <a class="smm-icon" href="#">
        <i class="fab fa-behance"></i>
      </a>
    </div>

    <div style="margin-top: 6rem;">      
      @include('includes.themesbar')
    </div>   

  </div> 

  <div data-aos="zoom-in-up" class="presentation__photo">
    <img class="main__photo" src="{{ asset('images/main_photo.jpg') }}" alt="photo alekseev">
  </div>

</section>

