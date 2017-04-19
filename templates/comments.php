<?php
if (post_password_required()) {
  return;
}
?>

<section id="comments" class="comments">
  <?php if (have_comments()) : ?>
    <h2><?php printf(_nx('One response to &ldquo;%2$s&rdquo;', '%1$s responses to &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'sage'), number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>'); ?></h2>

    <ol class="comment-list">
      <?php wp_list_comments(['style' => 'ol', 'short_ping' => true]); ?>
    </ol>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
      <nav>
        <ul class="pager">
          <?php if (get_previous_comments_link()) : ?>
            <li class="previous"><?php previous_comments_link(__('&larr; Older comments', 'sage')); ?></li>
          <?php endif; ?>
          <?php if (get_next_comments_link()) : ?>
            <li class="next"><?php next_comments_link(__('Newer comments &rarr;', 'sage')); ?></li>
          <?php endif; ?>
        </ul>
      </nav>
    <?php endif; ?>
  <?php endif; // have_comments() ?>

  <?php if (!comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments')) : ?>
    <div class="alert alert-warning">
      <?php _e('Comments are closed.', 'sage'); ?>
    </div>
  <?php endif; ?>

  <?php 
  $fields = [
  		'author' =>
  		'<div class="form-group"><label class="control-label" for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
  		( $req ? '<span class="required">*</span>' : '' ) .
  		'<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
  		'" size="30"' . $aria_req . ' /></div>',
  		
  		'email' =>
  		'<div class="form-group"><label class="control-label" for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
  		( $req ? '<span class="required">*</span>' : '' ) .
  		'<input class="form-control" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
  		'" size="30"' . $aria_req . ' /></div>',
  		
  		'url' =>
  		'<div class="form-group"><label class="control-label" for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
  		'<input class="form-control" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
  		'" size="30" /></div>',
  ];
  
  comment_form([
  		'comment_field' => '<div class="form-group"><label class="control-label" for="comment">' 
  		. _x( 'Comment', 'noun' ) 
  		. '</label><textarea id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
  		'fields' => apply_filters( 'comment_form_default_fields', $fields )
  ]); ?>
</section>
