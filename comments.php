<div class="comments">
    <?php if (post_password_required()) : ?>
    <p><?php _e( 'Post is password protected. Enter the password to view any comments.', 'signalkalaTheme' ); ?></p>
</div>

<?php return; endif; ?>

<?php if (have_comments()) : ?>

<!-- here we get comments number -->
<h2 class="fa-num font-semibold text-secondary-700"><?php echo get_comments_number(); ?> دیدگاه </h2>

<!-- here we get comments -->
<?php if (have_comments()) : ?>
<ul class="post-comments">
    <?php
			wp_list_comments( array(
				'style'       => 'ul',
				'avatar_size' => 0,
				'reverse_top_level' => true,
			));
	 ?>

</ul>
<div class="flex justify-center items-center"><?php endif;
paginate_comments_links(array('prev_text' => '&laquo;', 'next_text' =>  '&raquo;'))
?></div>



<!-- here we get comments for where we can write comments -->
<?php
comment_form(array('title_reply' => 'اضافه کردن دیدگاه','cancel_reply_link' => 'لغو پاسخ', 'comment_notes_before' => '','label_submit' => 'ارسال دیدگاه'));
?>

<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

<p><?php _e( 'Comments are closed here.', 'signalkalaTheme' ); ?></p>

<?php endif; ?>



</div>