<?php
  if (post_password_required()) {
  	return;
  }
  if (have_comments()) {
?>
<section id="comments" class="col-sm-12">
  <h3>
    <?php
      printf(_n('One Response to &ldquo;%2$s&rdquo;', '%1$s Responses to &ldquo;%2$s&rdquo;', get_comments_number(), 'roots'), number_format_i18n(get_comments_number()), get_the_title())
    ?>
  </h3>
  <ol class="media-list">
    <?php wp_list_comments(array('format' => 'html5','avatar_size' => 42)); ?>
  </ol>
  <?php
    if (get_comment_pages_count() > 1 && get_option('page_comments')) {
  ?>
  <nav>
    <ul class="pager">
      <?php
        if (get_previous_comments_link()) {
      ?>
      <li class="previous">
        <?php
          previous_comments_link(__('&larr; Older comments', 'roots'));
        ?>
      </li>
      <?php
        }
        if (get_next_comments_link()) {
      ?>
      <li class="next">
        <?php
          next_comments_link(__('Newer comments &rarr;', 'roots'));
        ?>
      </li>
      <?php
        }
      ?>
    </ul>
  </nav>
  <?php
    }
    if (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) {
  ?>
  <div class="alert alert-info">
    <?php
      _e('Comments are closed.', 'roots');
    ?>
  </div>
  <?php
    }
  ?>
</section>
<?php
  }
  if (comments_open()) {
?>
<section id="respond" class="col-sm-12">
  <h3><?php echo comment_form_title(__('Leave a Reply', 'roots'), __('Leave a Reply to %s', 'roots')); ?></h3>
  <p class="cancel-comment-reply"><?php echo cancel_comment_reply_link(); ?></p>
  <?php
    if (get_option('comment_registration') && !is_user_logged_in()) {
  ?>
  <p><?php echo printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'roots'), wp_login_url(get_permalink())); ?></p>
  <?php
    } else {
  ?>
  <form id="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
    <?php
      if (is_user_logged_in()) {
    ?>
    <p>
      <?php
        printf(__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'roots'), get_option('siteurl'), $user_identity)
      ?>
    </p>
    <a href="<?php wp_logout_url(get_permalink()); ?>" title="<?php __('Log out of this account', 'roots'); ?>"><?php echo __('Log out &raquo;', 'roots'); ?></a>
    <?php
      } else {
    ?>
    <div class="form-group">
      <label for="author">
        <?php
          _e('Name', 'roots');
          if ($req) { _e(' (required)', 'roots'); }
        ?>
      </label>
      <input type="text" class="form-control" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" <?php if ($req) { echo 'aria-required="true"'; } ?>>
    </div>
    <div class="form-group">
      <label for="email">
        <?php
          _e('Email (will not be published)', 'roots');
          if ($req) { _e(' (required)', 'roots'); }
        ?>
      </label>
      <input type="email" class="form-control" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" <?php if ($req) { echo 'aria-required="true"'; } ?>>
    </div>
    <div class="form-group">
      <label for="url">
        <?php
          _e('Website', 'roots');
        ?>
      </label>
      <input type="url" class="form-control" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22">
    </div>
    <?php
      }
    ?>
    <div class="form-group">
      <label for="comment">
        <?php
          _e('Comment', 'roots');
        ?>
      </label>
      <textarea name="comment" id="comment" class="form-control" rows="5" aria-required="true"></textarea>
    </div>
    <p>
      <input class="btn btn-primary" id="submit" name="submit" type="submit" value="<?php _e('Submit Comment', 'roots'); ?>">
    </p>
    <?php
      comment_id_fields();
      do_action('comment_form', $post->ID);
    ?>
  </form>
  <?php
    }
  ?>
</section>
<?php
  }
?>