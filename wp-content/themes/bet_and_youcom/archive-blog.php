<?php get_header();

$current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;

$query = new WP_Query( array(
  'posts_per_page' => 6,
  'post_type' => array( 'blog' ),
  'order' => 'DESC',
  'paged' => $current_page,
) );
?>

<div class="page">
  <div class="container">
    <div class="blog">
      <?php if( function_exists('custom_breadcrumbs') ) custom_breadcrumbs(' > '); ?>

      <span class="styled-text center">
        <h1>Blog</h1>
      </span>

      <?php if($query->have_posts()) : ?>
      <div class="blog__body">
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

      <?php echo paginate_links( array(
        'base'      => site_url() . '/' . add_query_arg( array(), $wp->request ) .'/' . '%_%',
        'format'    => '?page=%#%',
        'total'     => $query->max_num_pages,
        'current'   => $current_page,
        'end_size'  => 1,
        'mid_size'  => 1,
        'prev_text' => '',
        'next_text' => '',
        'type'      => 'list',
      ) );

      wp_reset_postdata();
      else:
        echo "No posts yet.";
      endif; ?>

    </div>
  </div>
</div>


<?php get_footer();?>
