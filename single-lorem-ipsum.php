<?php
/*
  Template name: Lorem Ipsum Custom Post Type - Single - Test
  @package wordpress-boilerplate
*/

get_header();

while (have_posts()) : the_post();
  //Default Values
  $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
  $post_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
  $image_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE);
  $image_title = get_the_title($post_thumbnail_id);
  $title = get_the_title();
  $content = get_the_content();
?>

  <div class="container lorem-ipsum-single">
    <div class="row">

      <?php if ($post_image) : ?>
        <div class="col-12 image-fit">
          <figure>
            <img src="<?php echo $post_image ?>" alt="<?php echo $image_alt ?>" title="<?php echo $image_title ?>">
          </figure>
        </div>
      <?php endif; ?>

      <div class="col-12 lorem-ipsum-single__content">
        <?php if ($title) : ?>
          <h1><?php echo $title ?></h1>
        <?php endif; ?>
        <?php if ($content) : ?>
          <p>
            <?php echo $content ?>
          </p>
        <?php endif; ?>
      </div>

    </div>
  </div>

<?php
endwhile;
get_footer();
?>