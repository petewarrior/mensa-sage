<?php 
if(is_active_sidebar( 'sidebar-primary' )) {
  $active_sidebar = true;
} else {
  $active_sidebar = false;
}
?>

<!-- <div class="row"> -->
  <div class="col-sm-9 col-xs-12 <?php if(false) echo 'col-sm-offset-1' ?>">
    <?php while (have_posts()) : the_post(); ?>
      <article <?php post_class(); ?>>
        <header>
          <h1 class="entry-title"><?php the_title(); ?></h1>
          <?php get_template_part('templates/entry-meta'); ?>
        </header>
        <div class="entry-content">

          <?php if ( has_post_thumbnail() ) { ?>
          <div class="post-image-container">
          <?php the_post_thumbnail( 'medium', array('class' => 'img-responsive') ); ?>
          </div>
          <?php } ?>
        <?php the_content(); ?>
        </div>
        <footer>
          <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
        </footer>
        <?php comments_template('/templates/comments.php'); ?>
      </article>
    <?php endwhile; ?>
  </div>
  <?php if ( false && $active_sidebar == true ) : ?>
  <div class="col-md-3">
    <ul id="sidebar">
      <?php dynamic_sidebar( 'sidebar-primary' ); ?>
    </ul>
  </div>
  <?php endif; ?>
<!-- </div> -->