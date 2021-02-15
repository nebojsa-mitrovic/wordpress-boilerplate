<?php

/**
 * Template name: Lorem Ipsum template page
 *
 * @package wordpress-boilerplate
 */

get_header(); ?>

<div class="contact-page">
  <div>
    <div class="contact-page__content">
      <h1>Lorem Ipsum template page</h1>
    </div>
    <div class="">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
      <?php endwhile;
      endif; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>