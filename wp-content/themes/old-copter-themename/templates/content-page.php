<section class="copter--panel copter--single">
  <div class="container">
    <div class="row">
      <div class="copter--column copter--column__primary">
        <?php the_content(); ?>
        <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
      </div>
    </div>
  </div>
</section>
