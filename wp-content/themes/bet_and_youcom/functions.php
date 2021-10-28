<?php

include_once dirname(__FILE__) . '/components/Breadcrumbs.php';
include_once dirname(__FILE__) . '/components/Blog.php';
include_once dirname(__FILE__) . '/components/Live.php';
include_once dirname(__FILE__) . '/components/Line.php';

// Generate menu
register_nav_menus(array(
  'header-menu' => __('Header menu'),
  'page-menu' => __('Page menu'),
  'footer-menu' => __('Footer menu'),
));
add_filter('nav_menu_item_id', '__return_false');
//remove indentation
// remove_filter('the_content', 'wpautop');
// SHOW THUMBNAILS
if (function_exists('add_theme_support')) {
  add_theme_support('post-thumbnails');
}
// remove admin-bar on front-page
show_admin_bar(true);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
function my_function_admin_bar() {return false;}
// remove unnesusary wp-styles
add_filter('show_admin_bar', 'my_function_admin_bar');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_resource_hints', 2);

//remove rest api
function chuck_disable_rest_endpoints($access) {
  if (!is_user_logged_in()) {
    return new WP_Error('rest_cannot_access', __('Only logged users are able to call REST API.', 'disable-json-api'), array('status' => rest_authorization_required_code()));
  }
  return $access;
}
add_filter('rest_authentication_errors', 'chuck_disable_rest_endpoints');

// H1 for category.php
add_action('admin_init', 'category_custom_fields', 1);
add_action('create_category', 'category_custom_fields_save');
add_action('category_add_form_fields', 'category_custom_fields_form');
function category_custom_fields() {
  add_action('edit_category_form_fields', 'category_custom_fields_form');
  add_action('edited_category', 'category_custom_fields_save');
}
function category_custom_fields_form($tag) {
  $t_id = $tag->term_id;
  $cat_meta = get_option("category_$t_id");
  ?>
<tr class="form-field">
  <th scope="row" valign="top"><label for="extra1"><?php _e('H1 для категории');?></label></th>
  <td>
    <input type="text" name="Cat_meta[cat_h1]" id="Cat_meta[cat_h1]" size="25" style="width:60%;" value="<?php echo
  $cat_meta['cat_h1'] ? $cat_meta['cat_h1'] : ''; ?>"><br />
    <span class="description"><?php _e('H1 категории');?></span>
  </td>
</tr>
<?php
}
function category_custom_fields_save($term_id) {
  if (isset($_POST['Cat_meta'])) {
    $t_id = $term_id;
    $cat_meta = get_option("category_$t_id");
    $cat_keys = array_keys($_POST['Cat_meta']);
    foreach ($cat_keys as $key) {
      if (isset($_POST['Cat_meta'][$key])) {
        $cat_meta[$key] = $_POST['Cat_meta'][$key];
      }
    }
    update_option("category_$t_id", $cat_meta);
  }
}
// H1 for tag.php
add_action('admin_init', 'tag_custom_fields', 1);
function tag_custom_fields() {
  add_action('edit_tag_form_fields', 'tag_custom_fields_form');
  add_action('edited_post_tag', 'tag_custom_fields_save');
  add_action('create_post_tag', 'tag_custom_fields_save');
  add_action('post_tag_add_form_fields', 'tag_custom_fields_form');
}
function tag_custom_fields_form($tag) {
  $t_id = $tag->term_id;
  $cat_meta = get_option("post_tag_$t_id");
  ?>
<tr class="form-field">
  <th scope="row" valign="top"><label for="extra1"><?php _e('H1 для tag.php');?></label></th>
  <td>
    <input type="text" name="Cat_meta[h1_for_tag]" id="Cat_meta[h1_for_tag]" size="25" style="width:60%;" value="<?php echo
  $cat_meta['h1_for_tag'] ? $cat_meta['h1_for_tag'] : ''; ?>"><br />
    <span class="description"><?php _e('Title');
  echo ' H1';?></span>
  </td>
</tr>
<?php
}
function tag_custom_fields_save($term_id) {
  if (isset($_POST['Cat_meta'])) {
    $t_id = $term_id;
    $cat_meta = get_option("post_tag_$t_id");
    $cat_keys = array_keys($_POST['Cat_meta']);
    foreach ($cat_keys as $key) {
      if (isset($_POST['Cat_meta'][$key])) {
        $cat_meta[$key] = $_POST['Cat_meta'][$key];
      }
    }
    update_option("post_tag_$t_id", $cat_meta);
  }
}
// Вывод произвольных игр. В код страницы вставить код: <!--@@@\d+-->
function insert_random_game($content) {
  $pattern = '/<!--@@@\d+-->/miU';
  preg_match_all($pattern, $content, $matches);
  $size = count($matches[0]);
  $second_query = new WP_Query();
  $second_query->query(array('orderby' => 'rand' /*,'category__not_in'=>12*/));
  $array[] = 0;
  $m = 0;
  while ($second_query->have_posts()) {
    $second_query->the_post();
    $array[$m] = get_post($post->ID);
    $m++;
  }
  $len = count($array);
  $k = 0;
  for ($i = 0; $i < $size; $i++) {
    $game_line_part = '<ul class="wp-spisok-igr">';
    $result = substr($matches[0][$i], 7, -3) * 1;
    $result = $result + $k;
    for ($k; $k < $result && $k < $len; $k++) {
      $game_line_part = $game_line_part . '<li><a href="' . get_permalink($array[$k]->ID) . '" title="' . get_the_title($array[$k]->ID) . '">' .
      get_the_post_thumbnail($array[$k]->ID) . '<b>' . get_the_title($array[$k]->ID) . '</b></a></li>';
    }
    $game_line_part = $game_line_part . ' </ul>';
    $content = preg_replace($pattern, $game_line_part, $content, 1);
  }
  wp_reset_postdata();
  return $content;
}
// подключаем функцию активации мета блока (my_extra_fields) произвольных полей
add_action('add_meta_boxes', 'my_extra_fields', 1);
function my_extra_fields() {
  add_meta_box('extra_fields', 'Дополнительные поля', 'extra_fields_box_func', 'post', 'normal', 'high');
}
// код блока
function extra_fields_box_func($post) {
  ?>
<p><label><input type="text" name="extra[h1]" value="<?php echo get_post_meta($post->ID, 'h1', 1); ?>"
      style="width:50%" /> h1 записи </label></p>

<p>Универсальный iframe игры (выводится и на мобильном и на десктопном экране):
  <textarea type="text" name="extra[mob_iframe]"
    style="width:100%;height:50px;"><?php echo get_post_meta($post->ID, 'mob_iframe', 1); ?></textarea>
</p>
<p>iframe игры только для десктопной версии (на мобильном сработает заглушка):
  <textarea type="text" name="extra[iframe]"
    style="width:100%;height:50px;"><?php echo get_post_meta($post->ID, 'iframe', 1); ?></textarea>
</p>
<p>Если нет iframe игры, то сюда вписываем название скриншота игрушки, например так -
  <b>aztec-gold-slot-game-screenshot.png</b>
  <br>скриншот заранее загрузить через Медиафайлы:
  <textarea type="text" name="extra[picture]"
    style="width:100%;height:50px;"><?php echo get_post_meta($post->ID, 'picture', 1); ?></textarea>
</p>

<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php
}
// включаем обновление полей при сохранении
add_action('save_post', 'my_extra_fields_update', 0);
/* Сохраняем данные, при сохранении поста */
function my_extra_fields_update($post_id) {
  if (!wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__)) {
    return false;
  }
  // проверка
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return false;
  }
  // выходим если это автосохранение
  if (!current_user_can('edit_post', $post_id)) {
    return false;
  }
  // выходим если юзер не имеет право редактировать запись
  if (!isset($_POST['extra'])) {
    return false;
  }
  // выходим если данных нет
  // Все ОК! Теперь, нужно сохранить/удалить данные
  $_POST['extra'] = array_map('trim', $_POST['extra']); // чистим все данные от пробелов по краям
  foreach ($_POST['extra'] as $key => $value) {
    if (empty($value)) {
      delete_post_meta($post_id, $key); // удаляем поле если значение пустое
      continue;
    }
    update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
  }
  return $post_id;
}

// URL toLowerCase

if ($_SERVER['REQUEST_URI'] != strtolower($_SERVER['REQUEST_URI']) && !is_admin()) {
  header('Location: //' . $_SERVER['HTTP_HOST'] . strtolower($_SERVER['REQUEST_URI']), true, 301);
  exit();
}

// Visual redactor on category page
remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );

function remove_category_description(){ ?>
		<script type="text/javascript">
		jQuery(function($) {
			$('textarea#description').closest('tr.form-field').remove();
		});
		</script>
<?php }

add_action('category_edit_form_fields','remove_category_description');

function edit_my_category_description ($container = ''){
	$content = is_object($container) && isset($container->description) ? html_entity_decode($container->description) : '';
	$editor_id = 'tag_description';
	$settings = 'description'; ?>

	<tr class="form-field term-description-wrap">
		<th scope="row" valign="top"><label for="description">Описание</label></th>
		<td><?php wp_editor($content, $editor_id, array(
		'textarea_name' => $settings,
		'editor_css' => '<style>.html-active .wp-editor-area{border:0;}</style>',
		)); ?><br>
		</td>
	</tr>

	<?php }

add_action('category_edit_form_fields', 'edit_my_category_description');

// Walker for custom menu
class Beautiful_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    $indent = ($depth) ? str_repeat("\t", $depth) : '';
    $class_names = $value = '';
    $classes = empty($item->classes) ? array() : (array) $item->classes;
    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $output .= $indent . '<li id="menu-item-' . $item->ID . '"' . $value . $class_names . '>';

    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    $description = !empty($item->description) ? '<span>' . esc_attr($item->description) . '</span>' : '';

    if (in_array("current-menu-item", $item->classes)) {
      $item_output = $args->before;
      $item_output .= '<span class="item-wrap"><span class="item-text">';
      $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID);
      $item_output .= $description . $args->link_after;
      $item_output .= '</span></span>';
      $item_output .= $args->after;
    } else {
      $item_output = $args->before;
      $item_output .= '<a' . $attributes . '><span class="item-text">';
      $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID);
      $item_output .= $description . $args->link_after;
      $item_output .= '</span></a>';
      $item_output .= $args->after;

    }

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}

add_filter('excerpt_more', function($more) {
	return '...';
});
add_filter('excerpt_length', function($length) {
  return 40;
}, 999);

// register field for api
add_action( 'rest_api_init', function(){

	register_rest_field( 'live', 'live', array(
    'get_callback'    => function ( $object, $field_name, $request ) {
      return get_field('live', $object['id']);
    },
    'update_callback' => function ( $value, $object, $field_name, $request ) {
      if ( ! $value || ! is_string( $value ) ) {
        return;
      }
      $json = json_decode($value);

      $new_value = array(
        "chemp_name" => $json->chemp_name,
        'col1' => $json->col1,
        'col2' => $json->col2,
        'col3' => $json->col3,
        'col4' => $json->col4,
        'player1' => $json->player1,
        'player2' => $json->player2
      );
      return update_field( "live", $new_value, $object->ID );
    },
		'schema' => null
	) );

	register_rest_field( 'line', 'line', array(
    'get_callback'    => function ( $object, $field_name, $request ) {
      return get_field('line', $object['id']);
    },
    'update_callback' => function ( $value, $object, $field_name, $request ) {
      if ( ! $value || ! is_string( $value ) ) {
        return;
      }
      $json = json_decode($value);

      $new_value = array(
        "chemp_name" => $json->chemp_name,
        'col1' => $json->col1,
        'col2' => $json->col2,
        'col3' => $json->col3,
        'col4' => $json->col4,
        'player1' => $json->player1,
        'player2' => $json->player2
      );
      return update_field( "line", $new_value, $object->ID );
    },
		'schema' => null
	) );

} );



// add acf fields to rest api
// function wp_api_encode_acf($data,$post,$context){
// 	$data['meta'] = array_merge($data['meta'],get_fields($post['ID']));
// 	return $data;
// }

// if( function_exists('get_fields') ){
// 	add_filter('json_prepare_post', 'wp_api_encode_acf', 10, 3);
// }

//style and script
add_action('wp_enqueue_scripts', 'theme_scripts_and_styles', 11);
function theme_scripts_and_styles() {
  // new styles
  wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), 'bld_1613660306223');
  wp_enqueue_style('upgrade-style', get_template_directory_uri() . '/upgradeStyle.min.css', 'theme-style');

  // new scripts
  wp_enqueue_script('theme-script', get_template_directory_uri() . '/js/bundle.js', array('jquery'), 'bld_1613660306222', true);
}


if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
    'key' => 'group_api',
    'title' => 'Select a Category for Table',
    'fields' => array(
      array(
        'key' => 'select_api',
        'label' => '',
        'name' => 'select_category',
        'type' => 'select',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'choices' => array(
          'default' => '-- SELECT CATEGORY --',
          'Angry Birds' => 'Angry Birds',
          'Assault Squad' => 'Assault Squad',
          'Baccarat' => 'Baccarat',
          'Basketball' => 'Basketball',
          'Battleship' => 'Battleship',
          'Beach Volleyball' => 'Beach Volleyball',
          'Blade and Soul' => 'Blade and Soul',
          'Boat Race' => 'Boat Race',
          'Bomberman' => 'Bomberman',
          'Boxing Champs' => 'Boxing Champs',
          'Brawlout' => 'Brawlout',
          'Card football' => 'Card football',
          'Counter Strike' => 'Counter Strike',
          'Crash' => 'Crash',
          'Cut The Rope' => 'Cut The Rope',
          'Dead Or Alive' => 'Dead Or Alive',
          'Dice' => 'Dice',
          'Dota' => 'Dota',
          'Durak' => 'Durak',
          'Esports' => 'Esports',
          'eSports Australian Rules' => 'eSports Australian Rules',
          'eSports Baseball' => 'eSports Baseball',
          'eSports Basketball' => 'eSports Basketball',
          'eSports Bicycle Racing' => 'eSports Bicycle Racing',
          'eSports Cricket' => 'eSports Cricket',
          'eSports F1' => 'eSports F1',
          'eSports Footvolley' => 'eSports Footvolley',
          'eSports Golf' => 'eSports Golf',
          'eSports Handball' => 'eSports Handball',
          'eSports Horse Racing' => 'eSports Horse Racing',
          'eSports Ice Hockey' => 'eSports Ice Hockey',
          'eSports Lacrosse' => 'eSports Lacrosse',
          'eSports Poker' => 'eSports Poker',
          'eSports Pool' => 'eSports Pool',
          'eSports Rally' => 'eSports Rally',
          'eSports Rugby' => 'eSports Rugby',
          'eSports Table Football' => 'eSports Table Football',
          'eSports Table Tennis' => 'eSports Table Tennis',
          'eSports Tennis' => 'eSports Tennis',
          'eSports UFC' => 'eSports UFC',
          'eSports Volleyball' => 'eSports Volleyball',
          'eSports Wrestling' => 'eSports Wrestling',
          'FIFA' => 'FIFA',
          'Flatout' => 'Flatout',
          'Football' => 'Football',
          'Greyhound Racing' => 'Greyhound Racing',
          'Handball' => 'Handball',
          'Heroes' => 'Heroes',
          'Horse Racing' => 'Horse Racing',
          'Ice Hockey' => 'Ice Hockey',
          'Injustice' => 'Injustice',
          'Jump force' => 'Jump force',
          'Keirin' => 'Keirin',
          'Killer Instinct' => 'Killer Instinct',
          'Kopanito Soccer' => 'Kopanito Soccer',
          'League Of Legends' => 'League Of Legends',
          'Live Darts' => 'Live Darts',
          'Lottery' => 'Lottery',
          'Marble ╨бollision' => 'Marble ╨бollision',
          'Marble Baseball' => 'Marble Baseball',
          'Marble Basketball' => 'Marble Basketball',
          'Marble Billiards' => 'Marble Billiards',
          'Marble Block Breaker' => 'Marble Block Breaker',
          'Marble Curling' => 'Marble Curling',
          'Marble Fidget Spinners' => 'Marble Fidget Spinners',
          'Marble Football' => 'Marble Football',
          'Marble Golf' => 'Marble Golf',
          'Marble LOTTO' => 'Marble LOTTO',
          'Marble MMA' => 'Marble MMA',
          'Marble Race' => 'Marble Race',
          'Marble Round Target' => 'Marble Round Target',
          'Marble Shooting' => 'Marble Shooting',
          'Marble Slides' => 'Marble Slides',
          'Marble Volleyball' => 'Marble Volleyball',
          'Marble Waves' => 'Marble Waves',
          'Mega Baseball' => 'Mega Baseball',
          'Mortal Kombat' => 'Mortal Kombat',
          'Overcooked' => 'Overcooked',
          'PES' => 'PES',
          'Pixel Cup Soccer' => 'Pixel Cup Soccer',
          'Playgrounds' => 'Playgrounds',
          'Raid: Shadow Legends' => 'Raid: Shadow Legends',
          'Robot Champions' => 'Robot Champions',
          'Rocket League' => 'Rocket League',
          'Rumble Stars' => 'Rumble Stars',
          'Seka' => 'Seka',
          'Sekiro' => 'Sekiro',
          'Sociable Soccer' => 'Sociable Soccer',
          'Sonic' => 'Sonic',
          'StarCraft' => 'StarCraft',
          'Steep' => 'Steep',
          'Street Fighter' => 'Street Fighter',
          'Street Power Football' => 'Street Power Football',
          'Subway Surfers' => 'Subway Surfers',
          'Super Kickers League' => 'Super Kickers League',
          'Table Football Pro' => 'Table Football Pro',
          'Table Tennis' => 'Table Tennis',
          'TABS' => 'TABS',
          'Tekken' => 'Tekken',
          'Tennis' => 'Tennis',
          'The King of Fighters' => 'The King of Fighters',
          'TvBet' => 'TvBet',
          'TwentyOne' => 'TwentyOne',
          'Victory Formula' => 'Victory Formula',
          'Volleyball' => 'Volleyball',
          'World of tanks' => 'World of tanks',
        ),
        'default_value' => false,
        'allow_null' => 0,
        'multiple' => 0,
        'ui' => 0,
        'return_format' => 'value',
        'ajax' => 0,
        'placeholder' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'page',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
  ));

endif;

add_filter('wpseo_locale', 'override_og_locale');
function override_og_locale($locale)
{
    return "pt_BR";
}