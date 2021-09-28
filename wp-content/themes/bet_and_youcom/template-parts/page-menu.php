<?php
$page_menu = wp_nav_menu( array(
  'echo' => FALSE,
  'theme_location' => 'page-menu',
  'menu_class' => 'nav-list-wrapper kill-list',
  'container' => '',
  'fallback_cb' => '__return_empty_string',
  'items_wrap' => '<ul class="%2$s">
      <li data-link="Z28tYmV0" class="current-menu-item">
        <span class="item-wrap"><span class="item-text">All</span></span>
      </li>
    %3$s</ul>',
  'walker'=> new Beautiful_Walker_Nav_Menu(),
  'depth' => 1
) );

if (!empty($page_menu)) { ?>
<nav class="page__menu menu flat scrollable">
  <button class="menu__arrow left" disabled></button>
  <?php echo $page_menu; ?>
  <button class="menu__arrow right" disabled></button>
  <span data-link="Z28tYmV0" class="menu__search">
    <img src="<?php bloginfo("template_url"); ?>/images/icons/search.svg" alt="">
  </span>
</nav>
<?php } ?>
