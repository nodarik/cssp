		<footer>
			<span><?php 
		    if (function_exists('the_field')) {
				echo esc_attr(the_field("cassiopeia_footer_copyrights","option"));
			}
			else {
				echo esc_html__('Cassiopeia footer',"cassiopeia");
			}
			 ?></span>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>


