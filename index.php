<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-md-12 col-lg-8">
		<div id="main" class="site-main" role="main">
			<div class="row">
				<div class="col-12">
					<h3>Welcome</h3>
					<p>HPCC is a voluntary, independent body run by and for users of handheld and portable computers and calculators. The club has been helping members for more than 30 years to get the most from their Hewlett Packard equipment and to further the exchange of information and ideas.

While most members' main interest is in the HP range of models, the club is happy to discuss other models too, at meetings, through the club journal - Datafile, and on these web pages. HPCC is not supported by Hewlett Packard or any other commercial organisation; its activities are funded and undertaken by its members.</p>
				</div>
			</div>
			<div class="glide">
				<div class="glide__track" data-glide-el="track">...</div>

				<div class="glide__arrows" data-glide-el="controls">
					<button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
					<button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
				</div>
			</div>
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</div><!-- #main -->
	</section><!-- #primary -->

	

	<script>
  		new Glide('.glide').mount()
	</script>
<?php
get_sidebar();
get_footer();
