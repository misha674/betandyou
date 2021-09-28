<?php get_header(); ?>

<div class="page-404">
  <div class="container">

    <div class="item-404">
      <div class="item-404__img">
        <img src="<?php bloginfo('template_url'); ?>/images/404.png" alt="404">
      </div>

      <div class="item-404__text">
        <div class="code-404">404</div>
        <div class="text-404">PAGE NOT FOUND</div>
      </div>
    </div>

    <article class="post_content" id="sql-text">
      <p class="err-text">The resource you are looking for might have been removed, had its name changed, or is
        temporarily
        unavailable.</p>

      <a href="/" rel="nofollow" class="btn btn_o err-link">
        <span>VOLTAR À PÁGINA PRINCIPAL</span>
      </a>

    </article>

  </div>
</div>

<?php get_footer(); ?>
