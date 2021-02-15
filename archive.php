<?php

/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package wordpress-boilerplate
 */
get_header(); ?>


<div class="container archive-blog-post">
  <div class="row">
    <div class="col-md-8">
      <h1 class="page-title">
        <?php
        if (is_category()) :
          single_cat_title();

        elseif (is_tag()) :
          single_tag_title();

        elseif (is_author()) :
          printf(__('Author: %s', 'wordpress-boilerplate'), '<span class="vcard">' . get_the_author() . '</span>');

        elseif (is_day()) :
          printf(__('Day: %s', 'wordpress-boilerplate'), '<span>' . get_the_date() . '</span>');

        elseif (is_month()) :
          printf(__('Month: %s', 'wordpress-boilerplate'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'wordpress-boilerplate')) . '</span>');

        elseif (is_year()) :
          printf(__('Year: %s', 'wordpress-boilerplate'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'wordpress-boilerplate')) . '</span>');

        elseif (is_tax('post_format', 'post-format-aside')) :
          _e('Asides', 'wordpress-boilerplate');

        elseif (is_tax('post_format', 'post-format-gallery')) :
          _e('Galleries', 'wordpress-boilerplate');

        elseif (is_tax('post_format', 'post-format-image')) :
          _e('Images', 'wordpress-boilerplate');

        elseif (is_tax('post_format', 'post-format-video')) :
          _e('Videos', 'wordpress-boilerplate');

        elseif (is_tax('post_format', 'post-format-quote')) :
          _e('Quotes', 'wordpress-boilerplate');

        elseif (is_tax('post_format', 'post-format-link')) :
          _e('Links', 'wordpress-boilerplate');

        elseif (is_tax('post_format', 'post-format-status')) :
          _e('Statuses', 'wordpress-boilerplate');

        elseif (is_tax('post_format', 'post-format-audio')) :
          _e('Audios', 'wordpress-boilerplate');

        elseif (is_tax('post_format', 'post-format-chat')) :
          _e('Chats', 'wordpress-boilerplate');

        else :
          _e('Archives', 'wordpress-boilerplate');

        endif;
        ?>
      </h1>

      <?php
      // Show an optional term description.
      $term_description = term_description();
      if (!empty($term_description)) :
        printf('<div class="taxonomy-description">%s</div>', $term_description);
      endif;
      ?>
      <?php while (have_posts()) : the_post();
        $post_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
        $title = get_the_title();
        $content = get_the_content();
        $author = get_the_author();
        $date = get_the_time("j F Y");
        $tags = get_the_tags();
      ?>

        <div class="archive-blog-post__single">
          <div>
            <h2><a href="<?php echo get_post_permalink(); ?>"><?php echo $title ?></a></h2>
          </div>
          <div>
            <?php _e('Author', 'wordpress-boilerplate'); ?>: <?php echo $author ?>
          </div>
          <div>
            <?php _e('Daten', 'wordpress-boilerplate'); ?>: <?php echo $date ?>
          </div>
          <div>
            <?php _e('Kategorien', 'wordpress-boilerplate'); ?>:
            <?php the_category(', '); ?>
          </div>
          <div>
            <?php _e('Tags', 'wordpress-boilerplate'); ?>:
            <?php foreach (get_the_tags($post->ID) as $tag) {
              echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . ' </a>';
            } ?>
          </div>
          <div>
            <p><?php the_excerpt(); ?></p>
          </div>
        </div>

      <?php endwhile; ?>

      <div class="wordpress-boilerplate-pagination">
        <?php
        echo paginate_links(array(
          'prev_text' => __('&laquo;'),
          'next_text' => __('&raquo;')
        ));
        ?>
      </div>
    </div>

    <div class="col-md-4 sidebar-right">
      <?php dynamic_sidebar('archive_sidebar'); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>