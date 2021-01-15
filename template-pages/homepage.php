<?php
/*
 * Template Name: Homepage Template
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
				<div class="glide__track" data-glide-el="track">
					<ul class="glide__slides">
						<?php
							global $post;
							$child_pages_query_args = array(
								'post_type'   => 'page',
								'post_parent' => 16,
								'orderby' => 'menu_order',
								'order'     => 'ASC'
							);
	
							$child_pages = new WP_Query($child_pages_query_args);
	
							$count = 0;
	
							while ($child_pages->have_posts()) : $child_pages->the_post();
								$count++;
							?>
								<li class="glide__slide">
									<div class="slide-service-card">
										<div class="card-image" href="<?php echo the_permalink(); ?>">
											<img class="img-fliud w-100" style="height: 400px; object-fit: contain;" src="<?php echo get_the_post_thumbnail_url(null, array(500, 500)); ?>"><a class="faux-link" href="<?php echo the_permalink(); ?>" >
										</div>
										<div class="card-content">
											<a class="more-link" href="<?php echo the_permalink(); ?>">
												<h3><?php echo the_title(); ?></h3>
											</a>
										</div>
									</div>
								</li>
							<?php
								wp_reset_postdata(); //remember to reset data
							endwhile;
						?>
					</ul>
                </div>

				<div class="glide__arrows" data-glide-el="controls">
					<button class="glide__arrow glide__arrow--left" style="color: #44b4e0" data-glide-dir="<">prev</button>
					<button class="glide__arrow glide__arrow--right" style="color: #44b4e0" data-glide-dir=">">next</button>
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
