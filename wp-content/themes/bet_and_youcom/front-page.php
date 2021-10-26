<?php get_header(); ?>

<article id="sql-text" class="post-content">
  <h1>
    <?php echo $title = (get_post_meta($post->ID, "h1", true)) ? get_post_meta($post->ID, "h1", true) : get_the_title() ; ?>
  </h1>
  <?php if (have_posts()) : the_post() ?>
  <?php the_content();?>
  <?php edit_post_link(__('Edit This')); ?>
  <?php endif; ?>
</article>

<div class="page">
  <div class="container fluid-mobile">
    <?php get_template_part('template-parts/slider'); ?>

    <?php get_template_part('template-parts/page-menu'); ?>
  </div>

  <div class="container">
    <span class="for-h styled-text"></span>
  </div>

  <div class="container columns">
    <div class="primary">

      <?php set_query_var( 'stream', 'live' ); ?>
      <?php get_template_part('template-parts/table-live', 'js'); ?>
      <?php //get_template_part('template-parts/table', 'api'); ?>

      <div class="styled-text">
        <h2>Line</h2>
      </div>

      <?php set_query_var( 'stream', 'line' ); ?>
      <?php get_template_part('template-parts/table-line', 'js'); ?>
      <?php //get_template_part('template-parts/table', 'api'); ?>
      
      <?php get_template_part('template-parts/all-news');?>

      <div class="main-text styled-text">
      </div>
    </div>
    <div class="secondary">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>