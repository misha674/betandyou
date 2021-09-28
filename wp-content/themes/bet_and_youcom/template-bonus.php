<?php
/*
Template Name: Bonus Page
*/
?>
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
  </div>

  <?php get_template_part('template-parts/bonus-list'); ?>

  <div class="container columns centered">
    <div class="primary">
      <div class="main-text styled-text"></div>
    </div>
    <div class="secondary">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
