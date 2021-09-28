<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WWJPMXZ');</script>
<!-- End Google Tag Manager -->

<!-- add coogle search console -->
<meta name="google-site-verification" content="NbaqD8-boh4g1EN0q68EDCG7qYkg6dNmtBKSOo9cMtY" />
<!-- end coogle search console -->


  <title><?php wp_title(''); ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo("template_url"); ?>/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo("template_url"); ?>/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo("template_url"); ?>/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo("template_url"); ?>/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo("template_url"); ?>/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo("template_url"); ?>/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo("template_url"); ?>/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo("template_url"); ?>/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo("template_url"); ?>/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"
    href="<?php bloginfo("template_url"); ?>/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo("template_url"); ?>/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo("template_url"); ?>/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo("template_url"); ?>/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?php bloginfo("template_url"); ?>/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?php bloginfo("template_url"); ?>/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-RX1CYFEKF5"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-RX1CYFEKF5');
  </script>
  <?php wp_head(); ?>
</head>

<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WWJPMXZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

  <header class="header">
    <div class="container">
      <div class="header__body">
        <div class="header__burger burger">
          <span class="burger__line burger__line_top"></span>
          <span class="burger__line burger__line_middle"></span>
          <span class="burger__line burger__line_bottom"></span>
        </div>

        <?php if ( is_front_page() || is_home() ) { ?>
        <span class="header__logo">
          <img src="<?php bloginfo("template_url"); ?>/images/logo.png" alt="bet-and-you.com">
        </span>
        <?php } else { ?>
        <a href="/" class="header__logo" title="bet-and-you.com">
          <img src="<?php bloginfo("template_url"); ?>/images/logo.png" alt="bet-and-you.com">
        </a>
        <?php } ?>

        <div class="header__right">

          <nav class="header__menu menu">
            <?php wp_nav_menu( array(
            'theme_location' => 'header-menu',
            'menu_class' => 'nav-list-wrapper kill-list',
            'container' => '',
            'fallback_cb' => '__return_empty_string',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            'walker'=> new Beautiful_Walker_Nav_Menu()
          ) ); ?>
          </nav>

          <div class="header__socials socials">
            <span class="socials__icon" data-link="Z28tYmV0">
              <img src="<?php bloginfo("template_url"); ?>/images/icons/fb.svg" alt="Facebook">
            </span>
            <span class="socials__icon" data-link="Z28tYmV0">
              <img src="<?php bloginfo("template_url"); ?>/images/icons/tw.svg" alt="Twitter">
            </span>
            <span class="socials__icon" data-link="Z28tYmV0">
              <img src="<?php bloginfo("template_url"); ?>/images/icons/mail.svg" alt="E-Mail">
            </span>
          </div>

          <div class="header__buttons">
            <button data-link="Z28tYmV0" class="btn btn_red header__buttons_login">
              <span>ENTRAR</span>
            </button>
            <button data-link="Z28tYmV0" class="btn btn_blue header__buttons_reg">
              <span>REGISTRO</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </header>