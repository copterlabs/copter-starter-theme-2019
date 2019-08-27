<footer class="copter--footer pt-4 mt-4">
  <div class="container">
    <div class="row">

      <div class="col-sm-6">
        @php dynamic_sidebar('sidebar-footer') @endphp
      </div>

      <div class="col-sm-6">
        <ul class="list-inline d-flex justify-content-center justify-content-sm-end">
          <li class="px-2"><a href="#"><i class="fab fa-facebook-square"></i></a></li>
          <li class="px-2"><a href="#"><i class="fab fa-instagram"></i></a></li>
          <li class="px-2"><a href="#"><i class="fab fa-youtube"></i></a></li>
        </ul>
      </div>

    </div>

    <div class="copter--footer__byline text-center mb-4">
      <p class="small">Copyright {{date('Y')}} {{bloginfo()}}. Website design by <a href="https://www.copterlabs.com/ref=">Copter Labs</a></p>
    </div>

  </div>
</footer>
