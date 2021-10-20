<?php
  get_header();

  $term = get_queried_object();
?>

<article id="sql-text" class="post-content">
  <h1>
    <?php
    $cat_id = get_query_var('cat');
    $cat_data = get_option("category_$cat_id");
    if (!empty($cat_data['cat_h1'])) { echo $cat_data['cat_h1']; } ?>
  </h1>
  <?php
    $term_description = term_description();
    if (!empty($term_description)) :
      printf('%s', $term_description);
    endif;
  ?>
</article>

<div class="page">
  <div class="container fluid-mobile">
    <?php get_template_part('template-parts/slider'); ?>
  </div>

  <div class="container">
    <?php if( function_exists('custom_breadcrumbs') ) custom_breadcrumbs(' > '); ?>
    <span class="for-h styled-text"></span>
    <?php get_template_part('template-parts/game-list'); ?>
  </div>

  <div class="container columns">
    <div class="primary">
      <div class="main-text styled-text"></div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
