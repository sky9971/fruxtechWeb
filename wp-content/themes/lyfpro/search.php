<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Lyfpro
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>
<div id="primary" class="content-area <?php if( dsvy_check_sidebar() ) { ?>col-md-9 col-lg-9<?php } ?>">
	<main id="main" class="site-main">
	<?php
	if ( have_posts() ) :
		?>
		<div class="dsvy-top-search-form">
			<?php get_search_form(); ?>
		</div>
		<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();
			get_template_part( 'theme-parts/search-results', 'style-1' );
		endwhile; // End of the loop.
		// Pagination
		dsvy_pagination();
	else : ?>
		<?php
		$title	= dsvy_get_base_option('no-results-title');
		$text	= dsvy_get_base_option('no-results-text');
		?>
		<div class="search-no-results-content">
			<?php if( !empty($title) ) : ?>
			<h3 class="dsvy-no-results-heading"><?php echo esc_html($title); ?></h3>
			<?php endif; ?>
			<?php if( !empty($text) ) : ?>
			<p class="dsvy-no-results-text"><?php echo esc_html($text); ?></p>
			<?php endif; ?>
			<?php get_search_form(); ?>
		</div>
	<?php endif; ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer();