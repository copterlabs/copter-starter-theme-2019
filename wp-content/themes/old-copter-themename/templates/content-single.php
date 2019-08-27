<?php while (have_posts()) : the_post(); ?>
  <section class="copter--panel copter--single">
    <div class="container">
      <div class="row">
        <div class="copter--column copter--column__primary">
          <article <?php post_class('copter--post'); ?>>
            <header class="copter--post__header">
              <h1 class="copter--post__title"><?php the_title(); ?></h1>
              <?php get_template_part('templates/entry-meta'); ?>
            </header>
            <div class="copter--post__image">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('750w'); ?>
              </a>
            </div>
            <div class="copter--post__single">
              <?php the_content(); ?>
            </div>
            <footer>
              <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
            </footer>
            <?php comments_template('/templates/comments.php'); ?>
          </article>
        </div>
      </div>
    </div>
  </section>
<?php endwhile; ?>
