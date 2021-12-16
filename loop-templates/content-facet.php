<?php
/**
 * Partial template for face search facet-search.php
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title sr-only">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php the_content(); ?>
		<div class="row facet-row">
			<div class="col-md-3">
				<div class="facet-block">
					<h2>Search</h2>
					<?php echo facetwp_display( 'facet', 'search');?>	
				</div>
				<div class="facet-block">
					<h2>Objective</h2>
					<?php echo facetwp_display( 'facet', 'objective');?>	
				</div>				
				<div class="facet-block">
					<h2>Course</h2>
					<?php echo facetwp_display( 'facet', 'course');?>	
				</div>
			</div>
			<div class="col-md-9">
					<div class="row"><div class="col-md-12 facet-sort-box"><?php echo facetwp_display( 'sort' );?></div></div>
					<?php echo facetwp_display( 'template', 'resources' );?>	
			</div>
			<div class="col-md-12">
				<?php echo do_shortcode('[facetwp pager="true"]') ;?>
								<button class="btn btn-alp btn-dark" value="Reset" onclick="FWP.reset()" class="facet-reset" />Reset Filters</button>	
				
			</div>
		</div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
