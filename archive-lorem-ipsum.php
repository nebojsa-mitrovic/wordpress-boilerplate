<?php
/*
  Template name: Lorem Ipsum Custom Post Type - Archive - Test
  @package wordpress-boilerplate
*/

get_header();
?>

<?php
$args = array();
$loop = new WP_Query($args);

while (have_posts()) : the_post();
  //Default Values
  $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
  $post_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
  $image_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
  $image_title = get_the_title($post_thumbnail_id);
  $title = get_the_title();
  $content = get_the_content();
  $post_link = get_post_permalink();
?>

  <div class="lorem-ipsum-archive">
    <div>

      <?php if ($post_image) : ?>
        <div class="image-fit">
          <figure>
            <img src="<?php echo $post_image ?>" alt="<?php echo $image_alt ?>" title="<?php echo $image_title ?>">
          </figure>
        </div>
      <?php endif; ?>

      <div class="lorem-ipsum-archive__content">
        <?php if ($title) : ?>
          <a href="<?php echo $post_link ?>">
            <h1><?php echo $title ?></h1>
          </a>
        <?php endif; ?>
        <?php if ($content) : ?>
          <p><?php the_excerpt(); ?></p>
        <?php endif; ?>
      </div>

    </div>
  </div>

<?php
endwhile;
get_footer();
?>