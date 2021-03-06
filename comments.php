<?php

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments">

	<?php if ( have_comments() ) : ?>

	<h3><?php comments_number("0", "1", "%"); ?> Comments</h4>

	<?php get_template_part("includes/walkers/walker-comments"); ?>

	<?php
		wp_list_comments( array(
			'short_ping' => true,
			'avatar_size'=> 34,
			'max_depth'  => 1,
			'walker'     => new radiuzz_cassiopeia_comment_walker
		) );
	?>

	<?php endif; ?>

	<div class="row">
		<div class="col-md-12">
			<?php if ( ! comments_open() ) : ?>
			<h3 ><?php echo esc_html_e("Comments are closed","cassiopeia")?></h3>
			<?php else: ?>
			<h3 ><?php echo esc_html_e("Leave a Reply","cassiopeia")?></h3>
			<?php endif; ?>
		</div>
	</div>

	<?php
		$fields =  array(
			'author' =>'<div class="col-md-6"><input type="text" id="author" name="author" placeholder="'. esc_html__('Name', 'cassiopeia').'"></div>',

			'email' =>'<div class="col-md-6"><input type="email" id="email" name="email" placeholder="'. esc_html__('Email', 'cassiopeia').'"></div>'
			
		);
		$args = array(
				'fields' => apply_filters( 'comment_form_default_fields', $fields ),
				'comment_field' => '<div class="col-md-12"><textarea id="comment" name="comment" placeholder="'. esc_html__('Message', 'cassiopeia').'"></textarea></div>',
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