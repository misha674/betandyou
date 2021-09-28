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
  </div>

  <div class="container columns centered">
    <div class="primary">

      <span class="for-h styled-text center"></span>

      <?php
        if (has_post_thumbnail()) :
          echo get_the_post_thumbnail(null, 'full', array('class' => 'blog__img') );
        endif;
      ?>

      <div class="main-text styled-text"></div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
