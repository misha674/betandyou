<?php get_header();

$query = new WP_Query( array(
  'posts_per_page' => 2,
  'post_type' => array( 'blog' ),
  'order' => 'DESC',
) );
?>

<?php if($query->have_posts()) : ?>
      <div class="blog__body blog__body-onMain">
        <?php while( $query->have_posts() ) : $query->the_post();?>
        <div class="blog__item">
          <a href="<?php the_permalink() ?>" class="blog__link">
            <?php
          if (has_post_thumbnail()) :
            echo get_the_post_thumbnail(null, 'full', array('class' => 'blog__thumbnail') );endif;
        ?>
          </a>
          <div class="blog__content">
            <div class="blog__info">
              <div class="blog__title">
                <?php the_title(); ?>
              </div>
              <div class="blog__date">
                <?php the_time('d.m.y'); ?>
              </div>
            </div>

            <div class="blog__text">
              <?php the_excerpt(); ?>
            </div>

            <a href="<?php the_permalink() ?>" class="btn btn_o blog__button">
              <span>Leia mais</span>
            </a>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    <?php
    else:
        echo "No posts yet.";
    endif;