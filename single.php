<?php

/**
 * The template for displaying all single posts.
 *
 * @package wordpress-boilerplate
 */

get_header(); ?>

<div class="single-blog">
  <div>
    <div>
      <div>
        <?php while (have_posts()) : the_post();
          $post_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
          $title = get_the_title();
          $content = get_the_content();
          $author = get_the_author();
          $date = get_the_time("j F Y");
          $tags = get_the_tags();
          $commentNumber = get_comments_number();
        ?>

          <div>
            <div class="single-blog__image" style="background-image: url(<?php echo $post_image ?>);"></div>
            <h1><?php echo $title ?></h1>
            <p><?php echo $content ?></p>
          </div>

          <div>
            <div class="row single-blog__informations">
              <?php if ($author) : ?>
                <div><?php _e('Von', 'wordpress-boilerplate'); ?>: <?php echo $author ?><span> | </span></div>
              <?php endif; ?>
              <?php if ($date) : ?>
                <div><?php echo $date ?> <span> | </span></div>
              <?php endif; ?>
              <div><?php _e('Kategorien', 'wordpress-boilerplate'); ?>: <?php the_category(', '); ?> <span> | </span></div>
              <?php if ($tags) : ?>
                <div><?php _e('Tags', 'wordpress-boilerplate'); ?>: <?php foreach (get_the_tags($post->ID) as $tag) {
                                                                      echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . ' </a>';
                                                                    } ?><span> | </span></div>
              <?php endif; ?>
              <div><?php echo $commentNumber ?> <?php _e('Kommentare', 'wordpress-boilerplate'); ?></div>
            </div>
          </div>

          <div class="single-blog__social">
            <div>
              <div>
                <h3><?php _e('Share it!', 'wordpress-boilerplate'); ?></h3>
              </div>
              <div>
                <ul>
                  <li>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank">
                      <div class="social-icon facebook"><i aria-hidden="true"></i></div>
                    </a>
                  </li>
                  <li>
                    <a href="https://twitter.com/home?status=<?php echo urlencode(get_permalink()); ?>" target="_blank">
                      <div class="social-icon twitter"><i aria-hidden="true"></i></div>
                    </a>
                  </li>
                  <li>
                    <a href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&media=&description=" target="_blank">
                      <div class="social-icon pinterest"><i aria-hidden="true"></i></div>
                    </a>
                  </li>
                  <li>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php the_title(); ?>&summary=&source=" target="_blank">
                      <div class="social-icon linkedin"><i aria-hidden="true"></i></div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="single-blog__comments">
            <div>
              <?php foreach (get_comments() as $comment) : ?>
                <div class="single-blog__single-comment">
                  <div>
                    <p><b><?php echo $comment->comment_author; ?></b> <span><?php comment_date('j. F Y H:i'); ?></span></p>
                  </div>
                  <div><?php echo $comment->comment_content; ?></div>
                </div>
              <?php endforeach; ?>
            </div>

            <div class="row ">
              <?php comment_form(); ?>.
            </div>
          </div>

          <div>
            <h3><?php _e('Related Posts', 'wordpress-boilerplate'); ?></h3>
            <div class="single-blog__related-posts">
              <?php
              $custom_query_args = array(
                'posts_per_page' => 3,
                'post__not_in' => array($post->ID),
                'orderby' => 'rand',
              );
              $custom_query = new WP_Query($custom_query_args);
              if ($custom_query->have_posts()) : ?>
                <?php while ($custom_query->have_posts()) : $custom_query->the_post();
                  $related_post_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
                  <div class="single-blog__related-posts__post">
                    <?php if (has_post_thumbnail()) { ?>
                      <a href="<?php the_permalink(); ?>">
                        <div class="single-blog__image single-blog__image--related" style="background-image: url(<?php echo $related_post_image ?>);"></div>
                      </a>
                    <?php } ?>
                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                  </div>
                <?php endwhile; ?>
              <?php else : ?>
                <p><?php _e('Keine Artikel', 'wordpress-boilerplate'); ?></p>
              <?php endif;
              wp_reset_postdata();
              ?>
            </div>
          </div>

        <?php endwhile; ?>
      </div>
    </div>

    <div class="sidebar-right">
      <?php dynamic_sidebar('blog_sidebar'); ?>
    </div>
  </div>
</div>


<?php get_footer(); ?>