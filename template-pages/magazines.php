<?php
/*
 * Template Name: Magazines Template
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-md-12 col-lg-8">
		<div id="main" class="site-main" role="main">
        <script>
        "use strict";

$(() => {
  let stickyTop = 0,
      scrollTarget = false;
  let timeline = $('.timeline__nav'),
      items = $('li', timeline),
      milestones = $('.timeline__section .milestone'),
      offsetTop = parseInt(timeline.css('top'));
  const TIMELINE_VALUES = {
    start: 190,
    step: 30
  };
  $(window).resize(function () {
    timeline.removeClass('fixed');
    stickyTop = timeline.offset().top - offsetTop;
    $(window).trigger('scroll');
  }).trigger('resize');
  $(window).scroll(function () {
    if ($(window).scrollTop() > stickyTop) {
      timeline.addClass('fixed');
    } else {
      timeline.removeClass('fixed');
    }
  }).trigger('scroll');
  items.find('span').click(function () {
    let li = $(this).parent(),
        index = li.index(),
        milestone = milestones.eq(index);

    if (!li.hasClass('active') && milestone.length) {
      scrollTarget = index;
      let scrollTargetTop = milestone.offset().top - 80;
      $('html, body').animate({
        scrollTop: scrollTargetTop
      }, {
        duration: 400,
        complete: function complete() {
          scrollTarget = false;
        }
      });
    }
  });
  $(window).scroll(function () {
    let viewLine = $(window).scrollTop() + $(window).height() / 3,
        active = -1;

    if (scrollTarget === false) {
      milestones.each(function () {
        if ($(this).offset().top - viewLine > 0) {
          return false;
        }

        active++;
      });
    } else {
      active = scrollTarget;
    }

    timeline.css('top', -1 * active * TIMELINE_VALUES.step + TIMELINE_VALUES.start + 'px');
    items.filter('.active').removeClass('active');
    items.eq(active != -1 ? active : 0).addClass('active');
  }).trigger('scroll');
});
        </script>
            <article class="timeline">
            <nav class="timeline__nav" style="margin-top: 250px;">
            <ul>
        <?php
            global $post;
            $child_pages_query_args = array(
                'post_type'   => 'page',
                'post_parent' => $post->ID,
                'orderby' => 'menu_order',
                'order'     => 'ASC'
            );
 
        $child_pages = new WP_Query($child_pages_query_args);

        $count = 0;

        while ($child_pages->have_posts()) : $child_pages->the_post();
            $count++;
        ?>
        
                <li><span><?php echo the_title(); ?></span></li>
            
        <?php
        wp_reset_postdata(); //remember to reset data
    endwhile;
?>
            </ul>
        </nav>
        </div> 
        
        <section class="timeline__section">
        <div class="wrapper">
        <?php
            global $post;
            $child_pages_query_args = array(
                'post_type'   => 'page',
                'post_parent' => $post->ID,
                'orderby' => 'menu_order',
                'order'     => 'ASC'
            );
 
        $child_pages = new WP_Query($child_pages_query_args);

        $count = 0;

        while ($child_pages->have_posts()) : $child_pages->the_post();
            $count++;
        ?>
        <h2 class="milestone"><?php echo the_title(); ?></h2>
            <p><?php echo the_content(); ?></p>
           
        <?php
        wp_reset_postdata(); //remember to reset data
    endwhile;
?>

    
        </div>
    </section>
</article>