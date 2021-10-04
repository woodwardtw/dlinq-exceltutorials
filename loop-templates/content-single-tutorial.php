<?php
/**
 * Single tutorial partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header col-md-10 offset-md-1">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<div class="tutorial-nav">
				<a href="#intro">Intro</a>
				<a href="#how-to">How To</a>
				<a href="#uses">Uses</a>
				<a href="#additional-examples">Examples</a>
<!-- 				<a href="#practice">Practice</a>
 -->				<a href="#conclusion">Conclusion</a>
<!-- 				<a href="#related-content">Related Content</a>
 -->			</div>

			<?php //understrap_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php //echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="row tutorial">
		<?php echo excel_header('introduction', 'Introduction');?>
		<?php echo excel_example_file();?>
		
		<?php echo excel_header('how_to', 'How To');?>

		<?php echo excel_header('apple_specific', 'Apple Specific');?>

		<?php echo excel_header('uses', 'Uses');?>

		<?php echo excel_syntax();?>
		<?php echo excel_additional_examples();?>
		<?php echo excel_header('conclusion', 'Conclusion');?>
	
		<?php //the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
