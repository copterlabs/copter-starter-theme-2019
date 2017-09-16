<footer class="copter--footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <nav class="copter--navbar--footer">
        <?php
        if (has_nav_menu('footer_navigation')) :
          wp_nav_menu([
            'theme_location' => 'footer_navigation',
            'container'      => '',
            'menu_class'     => 'copter--navbar--inline__menu copter--navbar--footer__menu',
            'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
            'walker'         => new wp_bootstrap_navwalker()
          ]);
        endif;
        ?>
        </nav>
      </div>
      <div class="col-md-12">
        <p class="copter--footer__copyright">
          Copyright <?= date('Y') ?> <?php bloginfo('name') ?>. Built by <a href="http://www.copterlabs.com/?utm_source=<?php sanitize_title(get_bloginfo('name')) ?>&utm_medium=footer_link&utm_campaign=referrals">Copter Labs</a>
        </p>
      </div>
    </div>
  </div>
</footer>
