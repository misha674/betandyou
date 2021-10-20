
<?php get_template_part('template-parts/cta-popup'); ?>
<?php get_template_part('template-parts/popup'); ?>

<footer class="footer">

  <div class="container">

    <div class="footer__body">
      <div class="footer__top">

        <?php if ( is_front_page() || is_home() ) { ?>
        <span class="footer__logo">
          <img src="<?php bloginfo("template_url"); ?>/images/logo.svg" alt="bet-and-you.com">
        </span>
        <?php } else { ?>
        <a href="/" class="footer__logo" title="bet-and-you.com">
          <img src="<?php bloginfo("template_url"); ?>/images/logo.svg" alt="bet-and-you.com">
        </a>
        <?php } ?>

        <nav class="footer__menu menu flat">
          <?php wp_nav_menu( array(
            'theme_location' => 'footer-menu',
            'menu_class' => 'nav-list-wrapper kill-list',
            'container' => '',
            'fallback_cb' => '__return_empty_string',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            'walker'=> new Beautiful_Walker_Nav_Menu(),
            'depth' => 1
          ) ); ?>
        </nav>
      
        <div class="footer__paid paid">
          <span class="paid__icon" data-link="Z28tYmV0">
            <img src="<?php bloginfo("template_url"); ?>/images/paid/mastercard.svg" alt="mastercard">
          </span>
          <span class="paid__icon" data-link="Z28tYmV0">
            <img src="<?php bloginfo("template_url"); ?>/images/paid/visa.svg" alt="visa">
          </span>
          <span class="paid__icon" data-link="Z28tYmV0">
            <img src="<?php bloginfo("template_url"); ?>/images/paid/ecopayz.svg" alt="ecopayz">
          </span>
        </div>



      <div class="footer__bottom">
        <div class="copyright">
          <div class="copyright__text">
            Copyright © 2019 - <?php echo date('Y'); ?> "<?php bloginfo('name'); ?>". Todos os direitos reservados e
            protegidos
            por lei.
          </div>
          <span class="copyright__icon">
            <img src="<?php bloginfo("template_url"); ?>/images/icons/18.svg" alt="only 18+">
          </span>
        </div>
      </div>
    </div>

  </div>

</footer>

<?php wp_footer();?>

</body>

</html>
