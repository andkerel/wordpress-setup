<?php
/**
 * @package WordPress
 * @subpackage Scratch_Theme
 */

		get_header();
		
		?>
		
		<div id="primary_content" class="single"><?php
	
		if(have_posts()):
			while(have_posts()):
				the_post();
				
				?>
		
			<div id="single_<?php the_ID(); ?>" <?php post_class() ?>>
				<h1 class="post_title single_title"><a href="<?php the_permalink() ?>" rel="bookmark" class="post_title_link single_title_link"><?php the_title(); ?></a></h1>
				<p class="post_meta single_meta">Published in <?php the_category(',') ?> on <?php the_date(); ?>.</p>
				<p class="post_comments single_comments"><?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?></p>
				<div class="post_content single_content">
					<?php the_content(); ?>
					
				</div><!-- / post_content single_content -->
			</div><!-- / single_<?php the_ID(); ?> --><?php
		
			comments_template();
			
			endwhile;
		endif;
		
		posts_nav_link(' &#8212; ', __('&laquo; Newer Posts'), __('Older Posts &raquo;'));
				
		?>
		
		</div><!-- / primary_content --><?php
		
		get_sidebar();
		get_footer();
		
		?>