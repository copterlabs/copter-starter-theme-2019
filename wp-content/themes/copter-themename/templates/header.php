<header class="copter--header">
  <button class="copter--header__button copter--hamburger hamburger hamburger--squeeze" type="button" aria-label="Menu" aria-controls="navigation" data-toggle="copter--navbar">
    <span class="hamburger-box">
      <span class="hamburger-inner"></span>
    </span>
  </button>
  <div class="container">
    <div class="copter--header__logo d-lg-flex align-items-center">
      <a href="<?= esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
        <img src="http://via.placeholder.com/100x50?text=LOGO" srcset="http://via.placeholder.com/100x40?text=LOGO, http://via.placeholder.com/200x80?text=LOGO 2x" alt="<?php bloginfo('name'); ?>">
      </a>
      <?php get_template_part('templates/navbar-inline'); ?>
    </div>
  </div>
</header>
