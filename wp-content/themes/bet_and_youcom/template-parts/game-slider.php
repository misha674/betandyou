<?php
  $posts_on_page = 15;

  $posts = get_posts("numberposts=$posts_on_page&orderby=rand");

if ($posts) : ?>

<div class="game-slider">
  <h2 class="game-slider__title">
    mais jogos
  </h2>
  <div class="game-slider__body">
    <?php foreach ($posts as $post) : setup_postdata($post); ?>
    <div class="game">

      <div class="game__image">
        <?php if (has_post_thumbnail()) {
          echo get_the_post_thumbnail(null, 'full');
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
  <div class="game-slider__nav"></div>
</div>
<?php endif; ?>
