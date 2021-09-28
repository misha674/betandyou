<?php get_header();?>

<article class="post-content">
  <h1>
    <?php echo $retVal = (get_post_meta($post->ID, "h1", true)) ? get_post_meta($post->ID, "h1", true) : get_the_title() ; ?>
  </h1>
  <?php if (have_posts()) : the_post() ?>
  <?php the_content();?>
  <?php edit_post_link(__('Edit This')); ?>
  <?php endif; ?>
</article>

<div class="page">
  <div class="container">
    <?php if( function_exists('custom_breadcrumbs') ) custom_breadcrumbs(' > '); ?>
    <span class="for-h styled-text"></span>

    <button data-link="Z28tYmV0" class="btn games__btn">
      <span>Jogar por dinheiro</span>
    </button>

    <div class="frame">
      <div class="iframe">
        <div class="iframe_adopt">
          <iframe src="<?php echo get_post_meta( $post->ID, 'iframe', true ); ?>" scrolling="no" marginheight="0"
            marginwidth="0" frameborder="0"></iframe>
        </div>
      </div>

      <div class="banner">
        <img src="<?php bloginfo("template_url");?>/images/sidebar-bg.png" alt="">
        <button data-link="Z28tYmV0" class="btn banner__button">
          <span>REGISTRO</span>
        </button>
      </div>
    </div>

    <?php get_template_part('template-parts/game-slider'); ?>
  </div>

  <div class="container columns centered">
    <div class="primary">
      <div class="main-text styled-text"></div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
