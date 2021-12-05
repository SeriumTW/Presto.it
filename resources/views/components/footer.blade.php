
<!-- Footer -->
<footer class="container-fluid bg_footer shadow-sm ">

    <!-- Footer header -->
    <section class="row justify-content-evenly align-content-center">

      <!-- Col-1 -->
      <section class="col-12 col-lg-3  mb-4 mb-lg-0 pt-5 px-5 text-center text-lg-start">

        <img class="mt-2 mx-1" style="width: 100px" src="/img/logo.it.png" alt="">

        <hr>

        <p class="bold text-white" itemprop="address">
          {{ __('ui.address') }}
        </p>

        <ul class="bold list-unstyled mb-4">
          <li><a href="#" class="text-white"><i class="fa fa-envelope mr-2 text-white" aria-hidden="true"></i> {{ __('ui.contattaci') }}</a></li>
          <li><i class="fa fa-phone mr-2 text-white" aria-hidden="true"></i><span class="text-white" itemprop="telephone"> 3247771000</span></li>
        </ul>

      <!-- Social Networks -->
        <ul class="list-inline">
          <li class="list-inline-item "><a class="list-inline-item" href="#" target="_blank" class="footer-icons mx-1" title="facebook"><i class="fab fa-2x fa-facebook-f" aria-hidden="true"></i></a></li>
          <li class="list-inline-item ps-3"><a class="list-inline-item" href="#" target="_blank" class="footer-icons mx-1" title="instagram"><i class="fab fa-2x fa-instagram" aria-hidden="true"></i></a></li>
          <li class="list-inline-item px-3"><a class="list-inline-item" href="#" target="_blank" class="footer-icons mx-1" title="whatsapp"><i class="fab fa-2x fa-whatsapp" aria-hidden="true"></i></a></li>
          {{-- <li class="list-inline-item "><a class="list-inline-item" href="#" target="_blank" class="footer-icons mx-1" title="discord"><i class="fab fa-2x fa-discord" aria-hidden="true"></i></a></li> --}}
        </ul>

      {{-- flags --}}

        <ul class="list-inline mb-0 mt-3">
          <li class="list-inline-item"><x-locale lang="it" nation="it"/></li>
          <li class="list-inline-item"><x-locale lang="en" nation="gb"/></li>
          <li class="list-inline-item"><x-locale lang="es" nation="es"/></li>
        </ul>

      </section>

      <!-- Col-2 -->
      <section class="col-12 col-lg-3 mb-4 mb-lg-0 pt-5 px-5 text-center text-lg-start">

        <h3 class="color_sec bold mb-0">Quick Menù</h3>

        <hr>

        <ul class="bold list-unstyled mb-4">
          <li class="mb-2"><a href="{{route('home')}}" class="footer-li">Home</a></li>
          <li class="mb-2"><a href="{{route('announcement.index')}}" class="footer-li">{{ __('ui.annunci') }}</a></li>
          <li class="mb-2"><a href="{{route('revisor.lavoraConNoi')}}" class="footer-li">{{ __('ui.lavoraConNoi') }}</a></li>
          <li class="mb-2"><a href="{{route('chi-siamo')}}" class="footer-li">{{ __('ui.chiSiamo') }}</a></li>      
          {{-- <li class="mb-2"><a href="#" class="footer-li">{{ __('ui.refounde') }}</a></li> --}}
          <li class="mb-2"><a href="{{route('messages')}}" class="footer-li">Presto Messages</a></li>
          {{-- <li class="mb-2"><a href="#" class="footer-li">{{ __('ui.service') }}</a></li> --}}
          <li class="mb-2"><a href="{{route ('login')}}" class="footer-li">{{ __('ui.login') }}</a></li>
          <li class="mb-2"><a href="{{route ('register')}}" class="footer-li">{{ __('ui.registrati') }}</a></li>
        </ul>

      </section>

      {{-- col-3 --}}

      <section class="col-12 col-lg-3 mb-4 mb-lg-0 pt-5 px-5 text-center text-lg-start">

        <h3 class="color_sec bold mb-0">{{ __('ui.dove') }}</h3>

        <hr>

        <p>
            <iframe class="radius-20 img-fluid" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25464.713781724306!2d15.253386820192265!3d37.07918180130244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1313ce8da28bdf79%3A0xd1736683b2c58b87!2s96100%20Siracusa%20SR!5e0!3m2!1sit!2sit!4v1636889132767!5m2!1sit!2sit" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </p>

      </section>
          

    </section>

    <hr>
    <!-- Footer-bottom -->
    <section class="row hero-wrap ">

      <section class="col-12">

        <p class="text-center text-white my-4 p-0">
          TM 2021  <strong class="color_sec"><img class="mt-2 mx-1" style="width: 70px" src="/img/logo.it.png" alt=""></strong> {{ __('ui.diritti') }} • justDevs <a href="#" target="_blank" class="color_sec" title="privacy"><i class="fa fa-info-circle mr-1" aria-hidden="true"></i> Privacy Policy</a> • <a href="#" rel="nofollow" target="_blank" class="color_sec" title="privacy"><i class="fa fa-gavel mr-1" aria-hidden="true"></i> {{ __('ui.etico') }}</a>
        </p>

      </section>

    </section>

</footer>