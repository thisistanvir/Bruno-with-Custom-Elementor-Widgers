<?php

/**
 * The template for displaying better comments
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bruno
 */


if (!function_exists('better_comments')) :
  function better_comments($comment, $args, $depth) {
?>
    <li class="comment_list d-flex">
      <?php if ($comment->comment_approved == '0') : ?>
        <em><?php esc_html_e('Your comment is awaiting moderation.', 'bruno') ?></em>
        <br />
      <?php endif; ?>
      <div class="comment_thumb">
        <?php echo get_avatar($comment, '70'); ?>
      </div>
      <div class="comment_content">
        <h5><?php echo get_comment_author(); ?> - <span><?php echo get_comment_date(); ?></span></h5>
        <?php comment_text(); ?>
        <div class="reply-btn">
          <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => '<span class="btn-reply text-uppercase">reply</span>'))) ?>
        </div>
        <?php edit_comment_link(); ?>
      </div>
    </li>
<?php
  }
endif;
