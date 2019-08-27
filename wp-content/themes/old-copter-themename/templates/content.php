<article <?php post_class('copter--post'); ?>>
  <header class="copter--post__header">
    <h2 class="copter--post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="copter--post__image">
    <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail('750w'); ?>
    </a>
  </div>
  <div class="copter--post__excerpt">
    <?php the_excerpt(); ?>
  </div>
</article>
