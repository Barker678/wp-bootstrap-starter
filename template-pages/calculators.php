<?php
/*
 * Template Name: Calculators Template
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-lg-12">
		<div id="main" class="site-main" role="main">
			<div class="row">
				<div class="col-12">
					<h3>Calculators</h3>
					<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptates eum, numquam ipsa temporibus illum nam. Aut provident, itaque sint vitae quibusdam iste qui totam exercitationem porro laborum quia, modi quae?</p>
				</div>
			</div>
			<div class="container">
				<div class="row mt-3">
				<?php
                        global $post;
                        $child_pages_query_args = array(
                            'post_type'   => 'page',
                            'post_parent' => $post->ID,
                            'orderby' => 'menu_order',
                            'order'     => 'ASC'
                        );
 
                        $child_pages = new WP_Query($child_pages_query_args);
 
                        $count = 11;
 
                        while ($child_pages->have_posts()) : $child_pages->the_post();
                            $count++;
                        ?>
							<div class="col-xl-4 col-md-6 col-sm-12 mt-3">
								<div class="card" style=" background-color: #e0e0e0;">
									<img src="<?php echo get_the_post_thumbnail_url(null, array(500, 500)); ?>" class="card-img-top" style="height: 350px; object-fit: cover;" alt="<?php echo the_title(); ?>">
									<div class="card-body">
										<h5 class="card-title"><?php echo the_title(); ?></h5>
										<p class="card-text">Coming soon</p>
										<a type="button" href="<?php echo the_permalink(); ?>" class="btn btn-white btn-lg btn-block">Coming soon</a>
									</div>
								</div>
							</div>
                        <?php
                            wp_reset_postdata(); //remember to reset data
                        endwhile;
                    ?>					
				</div>
			</div>

		</div><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
