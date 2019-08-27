<header class="copter--header py-2">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light p-lg-0">
      <a class="navbar-brand" href="{{ home_url('/') }}">
        {{ get_bloginfo('name', 'display') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="navbarSupportedContent" class="navbar-collapse collapse">
        @if (has_nav_menu('primary_navigation'))
        {!!
          wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
            'container'       => false,
            'menu_class'      => 'navbar-nav ml-auto',
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker()
          ])
        !!}
        @endif
      </div>
    </nav>
  </div>
</header>
