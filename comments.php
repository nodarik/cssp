<?php

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments">

	<?php if ( have_comments() ) : ?>

	<h3 style="margin-bottom: 60px;"><?php comments_number("0", "1", "%"); ?> Comments</h4>

	<?php get_template_part("includes/walkers/walker-comments"); ?>

	<?php
		wp_list_comments( array(
			'short_ping' => true,
			'avatar_size'=> 34,
			'max_depth'  => 1,
			'walker'     => new comment_walker
		) );
	?>

	<?php endif; ?>

	<div class="row">
		<div class="col-md-12">
			<?php if ( ! comments_open() ) : ?>
			<h3 style="margin-top:50px;">Comments are closed.</h3>
			<?php else: ?>
			<h3 style="margin-top:50px;">Leave a Reply</h3>
			<?php endif; ?>
		</div>
	</div>

	<?php
		$fields =  array(
			'author' =>
			'<div class="col-md-4">
				<input type="text" id="author" name="author" placeholder="Name">
			</div>',

			'email' =>
			'<div class="col-md-4">
				<input type="email" id="email" name="email" placeholder="Email">
			</div>',

			'phone' =>
			'<div class="col-md-4">
				<input type="text" id="phone" name="phone" placeholder="Phone">
			</div>'
		);
		$args = array(
				'fields' => apply_filters( 'comment_form_default_fields', $fields ),
				'comment_field' => '<div class="col-md-12"><textarea id="comment" name="comment" placeholder="Your message"></textarea></div>',
				'comment_notes_before' => '<div class="form row">',
				'comment_notes_after' => '</div>',
				'title_reply' => '',
				'title_reply_to' => '',
				'label_submit' => 'Comment'
			);
	?>

	<div class="hidden">
		<?php paginate_comments_links(); ?>
	</div>
	
	<div class="comment-form">
		<div class="row">
			<div class="comment-form">
				<?php comment_form($args); ?>
			</div>
		</div>
	</div>

</div><!-- #comments -->