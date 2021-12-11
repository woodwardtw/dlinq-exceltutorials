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

	<header class="entry-header col-md-9 offset-md-2">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">			

			<?php //understrap_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php //echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="row tutorial">
		<div class="col-md-2">
			<div class="tutorial-nav">
			<nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
  <a class="navbar-brand" href="#">Navbar</a>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" href="#scrollspyHeading1">First</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#scrollspyHeading2">Second</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#scrollspyHeading3">Third</a></li>
        <li><a class="dropdown-item" href="#scrollspyHeading4">Fourth</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#scrollspyHeading5">Fifth</a></li>
      </ul>
    </li>
  </ul>
</nav>
				<nav id="scroll-nav" class="navbar navbar-light bg-light px-3">
					<a class="navbar-brand" href="#">Intro</a>
					<ul class="nav nav-pills">
						<li class="nav-item">
						<a class="nav-link" href="#how-to">How to</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" href="#scrollspyHeading2">Second</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" href="#apple-specific">Apple</a>      
						</li>
					</ul>
				</nav>
			</div>			
		</div>		
		<div data-bs-spy="scroll" data-bs-target="#scroll-nav">
			<?php echo excel_header('introduction', 'Introduction');?>
			<?php echo excel_example_file();?>
			
			<?php echo excel_header('how_to', 'How To');?>

			<?php echo excel_header('apple_specific', 'Apple Specific');?>

			<?php echo excel_header('uses', 'Uses');?>

			<?php echo excel_syntax();?>
			<?php echo excel_additional_examples();?>
			<?php echo excel_header('conclusion', 'Conclusion');?>
		</div>
		<?php //the_content(); ?>

<div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
  <h4 id="scrollspyHeading1">First heading</h4>
  <p class='big'>...</p>
  <h4 id="scrollspyHeading2">Second heading</h4>
  <p class='big'>...</p>
  <h4 id="scrollspyHeading3">Third heading</h4>
  <p>...</p>
  <h4 id="scrollspyHeading4">Fourth heading</h4>
  <p>...</p>
  <h4 id="scrollspyHeading5">Fifth heading</h4>
  <p>...</p>
</div>

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
