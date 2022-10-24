<?php

/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @package Bruno
 */

if (post_password_required()) {
  return;
}
?>

<div id="comments" class="comments_box">

  <?php
  // You can start editing here -- including this comment!
  if (have_comments()) :
    $bruno_comment_count = get_comments_number();
  ?>
    <!-- .comments-title -->
    <div class="section_title text-center">
      <h2><?php echo $bruno_comment_count . ($bruno_comment_count === '1' ? ' <span>Comment</span>' : ' <span>Comments</span>'); ?></h2>
    </div>

    <?php the_comments_navigation(); ?>

    <!-- Comments List -->
    <ul class="comments">
      <?php
      wp_list_comments(
        array(
          'style'      => 'ul',
          'short_ping' => true,
          'callback' => 'better_comments'
        )
      );
      ?>
    </ul>
    <!-- end: comments list -->
</div>
<div class="comments_form">
  <?php
    the_comments_navigation();

    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open()) :
  ?>
    <p class="no-comments"><?php esc_html_e('Comments are closed.', 'bruno'); ?></p>
<?php
    endif;

  endif; // Check for have_comments().

  comment_form([
    'fields' => [
      'author' => '<div class="form_input_list">
                    <input type="text" name="author" id="author" placeholder="Enter your name..." required="required">
                  </div>',

      'email' => '<div class="form_input_list">
                    <input type="email" name="email" id="email" placeholder="youemail@domain.com" required="required">
                  </div>',

      'url' => '<div class="form_input_list">
                  <input type="text" name="url" id="url" placeholder="Website">
                </div>'
    ],
    'comment_field' => '<textarea name="comment" id="comment" cols="30" rows="7" class="form-control w-100" placeholder="Here goes your message" required="required"></textarea>',

    'class_form' => 'comments_form_input d-flex',

    'submit_button' => ' <div class="footer_form_btn text-center">
                            <button name="%1$s" type="submit" id="%2$s" class=" button-contactForm btn btn-link %3$s">%4$s</button>
                          </div>',

    'title_reply' => '<div class="section_title text-center">
                        <h2>Leave <span>A Comments</span></h2>
                      </div>'

  ]);
?>

</div>
<!-- #comments -->