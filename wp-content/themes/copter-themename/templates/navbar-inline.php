<nav class="copter--navbar--inline">
  <?php
  if (has_nav_menu('primary_navigation')) :
    wp_nav_menu([
      'theme_location' => 'desktop_navigation',
      'container'      => '',
      'menu_class'     => 'copter--navbar--inline__menu',
      'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
      'walker'         => new wp_bootstrap_navwalker()
    ]);
  endif;
  ?>
  <ul class="copter--navbar--inline__social list-inline">
    <li class="list-inline-item">
      <a href="<?= get_field('facebook_url','options') ?>" title="<?php bloginfo('name'); ?> Facebook">
        <i class="fa fa-facebook"></i>
      </a>
    </li>
    <li class="list-inline-item">
      <a href="<?= get_field('twitter_url','options') ?>" title="<?php bloginfo('name'); ?> Twitter">
        <i class="fa fa-twitter"></i>
      </a>
    </li>
    <li class="list-inline-item">
      <a href="<?= get_field('instagram_url','options') ?>" title="<?php bloginfo('name'); ?> Instagram">
        <i class="fa fa-instagram"></i>
      </a>
    </li>
    <li class="list-inline-item">
      <a href="<?= get_field('youtube_url','options') ?>" title="<?php bloginfo('name'); ?> YouTube">
        <i class="fa fa-youtube"></i>
      </a>
    </li>
  </ul>
</nav>
