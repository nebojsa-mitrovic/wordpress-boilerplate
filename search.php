<?php

/**
 * The template for displaying search results pages.
 *
 * @package wordpress-boilerplate
 */

get_header(); ?>

<div class="search-post">
  <div>
    <?php if (have_posts()) : ?>
      <h1 class="page-title"><?php printf(__('Suchen: %s', 'wordpress-boilerplate'), '<span>' . get_search_query() . '</span>'); ?></h1>
      <?php while (have_posts()) : the_post();
        $post_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
        $title = get_the_title();
        $content = get_the_content();
        $author = get_the_author();
        $date = get_the_time("j F Y");
        $tags = get_the_tags();
      ?>
        <div class="search-post__single">
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
        <?php echo paginate_links(array('prev_text' => __('&laquo;'), 'next_text' => __('&raquo;'))); ?>
      </div>

    <?php else : ?>
      <h2><?php _e('Leider kein Ergebnis gefunden!', 'wordpress-boilerplate'); ?></h2>
    <?php endif; ?>
  </div>

  <aside class="sidebar-right">
    <div class="section">
      <?php dynamic_sidebar('archive_sidebar'); ?>
    </div>
  </aside>
</div>

<?php get_footer(); ?>