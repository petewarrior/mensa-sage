<article <?php post_class(); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="row">
	  <?php if ( has_post_thumbnail() ) { ?>
	  <div class="post-image-container col-sm-3">
	  	<?php the_post_thumbnail( 'thumbnail', array('class' => 'img-responsive img-rounded') ); ?>
	  </div>
	  <?php } ?>
	  <div class="entry-summary <?php if ( has_post_thumbnail() ) echo "col-sm-9"; else echo "col-sm-12"; ?>">
	    <?php the_excerpt(); ?>
	  </div>
  </div>
</article>
