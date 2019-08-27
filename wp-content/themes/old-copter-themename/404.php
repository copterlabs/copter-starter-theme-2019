<?php get_template_part('templates/page', 'header'); ?>

<section class="copter--panel copter--single copter--404">
  <div class="container">
    <div class="row">
      <div class="copter--column copter--column__primary">
        <div class="alert alert-warning">
          <?php _e('Sorry, but the page you were trying to view does not exist.', 'sage'); ?>
          <?php get_search_form(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
