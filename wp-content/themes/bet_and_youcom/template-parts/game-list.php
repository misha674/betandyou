<?php
  $count = 0;
  $posts_on_page = 15;

  if (is_category()) {
    $cat_id = get_query_var('cat');
    $posts = get_posts("numberposts=$posts_on_page&orderby=rand&category=$cat_id");
  } elseif (is_tag()) {
    $tag_id = get_query_var('tag_id');
    $term = get_term_by('id', $tag_id, 'post_tag');
  } else {
    $posts = get_posts("numberposts=$posts_on_page&orderby=rand");
  }

if ($posts) : ?>

<div class="games">

  <div class="games__search" data-link="Z28tYmV0">
    <span>
      Search games...
    </span>
    <img src="<?php bloginfo("template_url"); ?>/images/icons/search.svg" alt="">
  </div>

  <div class="games__body">
    <?php
     foreach ($posts as $post) : setup_postdata($post);

    $count++; ?>

    <div class="game ">

      <div class="game__image">
        <?php if (has_post_thumbnail()) {
          $default_attr = array('title' => $post->post_title);
          echo get_the_post_thumbnail(null, 'full', $default_attr);
        } else {
          echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/default-slots.png" alt=""/>';
        } ?>
      </div>

      <div class="game__overlay">
        <span class="game__name"><?php the_title(); ?></span>
        <button data-link="Z28tYmV0" class="btn game__btn">
          <span>JOGUE AGORA</span>
        </button>
        <a class="game__btn_demo" href="<?php the_permalink(); ?>">Demo</a>
      </div>

    </div>

    <?php endforeach; ?>
  </div>

  <button data-link="Z28tYmV0" class="btn btn_o">
    <span>Veja todas</span>
  </button>

</div>
<?php endif; ?>
