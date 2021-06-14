<?php
if(function_exists('add_theme_support')){
  add_theme_support('post-thumbnails');
  //add_theme_support('woocommerce');
}

remove_action('wp_head', 'wp_generator');

//require_once 'seo.php';

/*function footer_enqueue_scripts(){
   remove_action('wp_head','wp_print_scripts');
    remove_action('wp_head','wp_print_head_scripts',9);
    remove_action('wp_head','wp_enqueue_scripts',1);
    add_action('wp_footer','wp_print_scripts',5);
    add_action('wp_footer','wp_enqueue_scripts',5);
    add_action('wp_footer','wp_print_head_scripts',5);
}
add_action('after_setup_theme','footer_enqueue_scripts');*/

/*function jquery_scripts_method(){
  // отменяем зарегистрированный jQuery
  // вместо "jquery-core" просто "jquery", чтобы отключить jquery-migrate
  wp_deregister_script('jquery-core');
  wp_register_script('jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
  wp_enqueue_script('jquery');
}    
add_action('wp_enqueue_scripts', 'jquery_scripts_method');*/

/*
// WP admin-ajax.php
function jsAjaxUrl(){
  $vars = array(
    'ajaxUrl' => admin_url('admin-ajax.php'),
    'is_mobile' => wp_is_mobile()
  );
  echo 
    '<script type="text/javascript">window.wpData = '.
    json_encode($vars).
    ';</script>';
}
add_action('wp_head', 'jsAjaxUrl');

function get_request_callback(){
  echo(json_encode( array('status'=>'ok','request_vars'=>$_REQUEST) ));
  wp_die();
}

add_action('wp_ajax_get_request', 'get_request_callback');
add_action('wp_ajax_nopriv_get_request', 'get_request_callback');
// End WP admin-ajax.php
*/

register_nav_menus(array(
  'mainmenu' => 'Главное меню',
  'footermenu' => 'Меню подвала'
));

// gzip
function enable_zlib(){
    ini_set('zlib.output_compression', 'On');
    ini_set('zlib.output_compression_level', '1');
}
add_action('init', 'enable_zlib');

if('disable_gutenberg'){
  add_filter('use_block_editor_for_post_type', '__return_false', 100);
  add_action('admin_init', function(){
    remove_action('admin_notices', ['WP_Privacy_Policy_Content', 'notice']);
    add_action('edit_form_after_title', ['WP_Privacy_Policy_Content', 'notice']);
  });
}

function cartrust_customizer_init($wp_customize){
  $wp_customize->add_section(
    'btz_options',
    array(
      'title'     => 'Настройки сайта',
      'priority'  => 200,
      'description' => 'Настройте Ваш сайт'
    )
  );
  // Email
  $wp_customize->add_setting(
    'btz_email',
    array(
      'default'   => '',
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
    'btz_email',
    array(
      'section'  => 'btz_options',
      'label'    => 'E-mail',
      'type'     => 'text'
    )
  );
  // Phone
  $wp_customize->add_setting(
    'btz_phone',
    array(
      'default'   => '',
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
    'btz_phone',
    array(
      'section'  => 'btz_options',
      'label'    => 'Phone',
      'type'     => 'textarea'
    )
  );
  // Address
  $wp_customize->add_setting(
    'btz_address',
    array(
      'default'   => '',
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
    'btz_address',
    array(
      'section'  => 'btz_options',
      'label'    => 'Addres',
      'type'     => 'textarea'
    )
  );
  // Shedule
  $wp_customize->add_setting(
    'btz_shedule',
    array(
      'default'   => '',
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
    'btz_shedule',
    array(
      'section'  => 'btz_options',
      'label'    => 'Shedule',
      'type'     => 'textarea'
    )
  );
  // Instagram
  $wp_customize->add_setting(
    'btz_social_in',
    array(
      'default'   => '',
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
    'btz_social_in',
    array(
      'section'  => 'btz_options',
      'label'    => 'Instagram',
      'type'     => 'text'
    )
  );
  // Twitter
  $wp_customize->add_setting(
    'btz_social_tw',
    array(
      'default'   => '',
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
    'btz_social_tw',
    array(
      'section'  => 'btz_options',
      'label'    => 'Twitter',
      'type'     => 'text'
    )
  );
  // Youtube
  $wp_customize->add_setting(
    'btz_social_yt',
    array(
      'default'   => '',
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
    'btz_social_yt',
    array(
      'section'  => 'btz_options',
      'label'    => 'Youtube',
      'type'     => 'text'
    )
  );
  // Facebook
  $wp_customize->add_setting(
    'btz_social_fb',
    array(
      'default'   => '',
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
    'btz_social_fb',
    array(
      'section'  => 'btz_options',
      'label'    => 'Facebook',
      'type'     => 'text'
    )
  );
  // Facebook
  $wp_customize->add_setting(
    'btz_social_fb',
    array(
      'default'   => '',
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
    'btz_social_fb',
    array(
      'section'  => 'btz_options',
      'label'    => 'Facebook',
      'type'     => 'text'
    )
  );
  // Linkedin
  $wp_customize->add_setting(
    'btz_social_lin',
    array(
      'default'   => '',
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
    'btz_social_lin',
    array(
      'section'  => 'btz_options',
      'label'    => 'Linkedin',
      'type'     => 'text'
    )
  );
  // Copyright
  $wp_customize->add_setting(
    'btz_copyright',
    array(
      'default'   => '',
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
    'btz_copyright',
    array(
      'section'  => 'btz_options',
      'label'    => 'Copyright',
      'type'     => 'text'
    )
  );
}
add_action('customize_register', 'cartrust_customizer_init');

/*function shortcode_func($atts, $content=""){
   return 'shortcode';
}
add_shortcode('attension', 'shortcode_func');*/

// Колонка ID
if (is_admin()) {
  // колонка "ID" для таксономий (рубрик, меток и т.д.) в админке
  foreach (get_taxonomies() as $taxonomy){
    add_action("manage_edit-${taxonomy}_columns", 'tax_add_col');
    add_filter("manage_edit-${taxonomy}_sortable_columns", 'tax_add_col');
    add_filter("manage_${taxonomy}_custom_column", 'tax_show_id', 10, 3);
  }
  add_action('admin_print_styles-edit-tags.php', 'tax_id_style');
  function tax_add_col($columns) {return $columns + array ('tax_id' => 'ID');}
  function tax_show_id($v, $name, $id) {return 'tax_id' === $name ? $id : $v;}
  function tax_id_style() {print '<style>#tax_id{width:4em}</style>';}

  // колонка "ID" для постов и страниц в админке
  add_filter('manage_posts_columns', 'posts_add_col', 5);
  add_action('manage_posts_custom_column', 'posts_show_id', 5, 2);
  add_filter('manage_pages_columns', 'posts_add_col', 5);
  add_action('manage_pages_custom_column', 'posts_show_id', 5, 2);
  add_action('admin_print_styles-edit.php', 'posts_id_style');
  function posts_add_col($defaults) {$defaults['wps_post_id'] = __('ID'); return $defaults;}
  function posts_show_id($column_name, $id) {if ($column_name === 'wps_post_id') echo $id;}
  function posts_id_style() {print '<style>#wps_post_id{width:4em}</style>';}
}

// Type Reviews
add_action('init', 'cartrust_review_init');
function cartrust_review_init()
{
  $labels = array(
    'name' => 'Review',
    'singular_name' => 'Review',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New',
    'edit_item' => 'Edit',
    'new_item' => 'New Review',
    'view_item' => 'View Review',
    'search_items' => 'Search Model',
    'not_found' =>  'Cars not found',
    'not_found_in_trash' => 'In cart Reviews not found',
    'parent_item_colon' => '',
    'menu_name' => 'Reviews'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'taxonomies' => array(),
    'menu_icon' => 'dashicons-format-status',
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','author','thumbnail')
  );
  register_post_type('review',$args);
}

add_filter('post_updated_messages', 'cartrust_reviews_updated_messages');
function cartrust_reviews_updated_messages($messages){
  global $post, $post_ID;

  $messages['reviews'] = array(
    0 => '',
    1 => sprintf('Reviews updated. <a href="%s">Vew Review</a>', esc_url(get_permalink($post_ID))),
    2 => 'Custom field updated.',
    3 => 'Custom field removed.',
    4 => 'Reviews updated.',
    5 => isset($_GET['revision']) ? sprintf('Review restored from revision %s', wp_post_revision_title((int) $_GET['revision'], false)) : false,
    6 => sprintf('Review posted. <a href="%s">Go to Review</a>', esc_url(get_permalink($post_ID))),
    7 => 'Review saved.',
    8 => sprintf('Review saved. <a target="_blank" href="%s">Preview Review</a>', esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
    9 => sprintf('Review is scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Review</a>',
      date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
    10 => sprintf('Review draft updated. <a target="_blank" href="%s">Preview Review</a>', esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
  );

  return $messages;
}

function disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );  
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );  
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

function disable_emojis_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

add_filter('style_loader_tag', 'expert_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'expert_remove_type_attr', 10, 2);
function expert_remove_type_attr($tag, $handle){
  return preg_replace( "/ type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}

/*function application_ld_json(){
  global $post;
  
  ob_start();
  if(is_front_page()){
?>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "item": 
      {
        "@id":"<?php echo home_url('/'); ?>",
        "name": "<?php echo get_bloginfo('name'); ?>"
      }
    },
    {
      "@type": "ListItem",
      "position": 2,
      "item": 
      {
        "@id":"<?php echo home_url('/'); ?>#",
        "name": "<?php echo get_bloginfo('description'); ?>"
      }
    }
  ]
}
</script>
<?php
  } elseif(is_category()){
    $categories = get_the_category($post->post_ID);
?>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
  {
    "@type": "ListItem",
    "position": 1,
    "item": 
    {
      "@id": "<?php echo home_url('/'); ?>",
      "name": "<?php echo get_bloginfo('name'); ?>"
    }
  },
  {
    "@type": "ListItem",
    "position": 2,
    "item": 
    {
      "@id": "<?php echo get_category_link($categories[0]->cat_ID); ?>",
      "name": "<?php echo $categories[0]->cat_name; ?>"
    }
  }]
}</script>
<?php
  } elseif(is_page()){
?>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
  {
    "@type": "ListItem",
    "position": 1,
    "item": 
    {
      "@id": "<?php echo home_url('/'); ?>",
      "name": "<?php echo get_bloginfo('name'); ?>"
    }
  },
  {
    "@type": "ListItem",
    "position": 2,
    "item": 
    {
      "@id": "<?php echo get_permalink($post->post_ID); ?>",
      "name": "<?php echo $post->post_title; ?>"
    }
  }]
}</script>
<?php
  } elseif(is_single()){
    $categories = get_the_category($post->post_ID);
?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "<?php echo get_the_permalink($post->post_ID); ?>"
  },
  "headline": "<?php echo addslashes(strip_tags(get_the_title($post->post_ID))); ?>",
  "description": "<?php echo addslashes(strip_tags(get_the_content(null, '', $post->post_ID))); ?>",
  <?php if(has_post_thumbnail($post->post_ID)): ?>
  "image": {
    "@type": "ImageObject",
    "url": "<?php echo get_the_post_thumbnail_url($post->post_ID); ?>",
    "width": 1795,
    "height": 1205
  },
  <?php endif; ?>
  "author": {
    "@type": "Organization",
    "name": "CarTrust"
  },  
  "publisher": {
    "@type": "Organization",
    "name": "CarTrust",
    "logo": {
      "@type": "ImageObject",
      "url": "<?php echo get_bloginfo('template_url'); ?>/images/logo.svg",
      "width": 255,
      "height": 55
    }
  },
  "datePublished": "<?php echo get_the_date('Y-m-d', $post->post_ID); ?>",
  "dateModified": "<?php echo get_the_modified_date('Y-m-d', $post->post_ID); ?>"
}
</script>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
  {
    "@type": "ListItem",
    "position": 1,
    "item": 
    {
      "@id": "<?php echo home_url('/'); ?>",
      "name": "<?php echo get_bloginfo('name'); ?>"
    }
  },
  {
    "@type": "ListItem",
    "position": 2,
    "item": 
    {
      "@id": "<?php echo get_category_link($categories[0]->cat_ID); ?>",
      "name": "<?php echo $categories[0]->cat_name; ?>"
    }
  },
  {
    "@type": "ListItem",
    "position": 3,
    "item": 
    {
      "@id": "<?php echo get_permalink($post->post_ID); ?>",
      "name": "<?php echo $post->post_title; ?>"
    }
  }]
}</script>
<?php
  }
  $html = ob_get_contents();
  ob_clean();
  echo $html;
}
add_action('wp_head', 'application_ld_json');*/


function kama_breadcrumbs( $sep = ' » ', $l10n = array(), $args = array() ){
  $kb = new Kama_Breadcrumbs;
  echo $kb->get_crumbs( $sep, $l10n, $args );
}
class Kama_Breadcrumbs {
  public $arg;
  // Локализация
  static $l10n = array(
    'home'       => 'Главная',
    'paged'      => 'Страница %d',
    '_404'       => 'Ошибка 404',
    'search'     => 'Результаты поиска по запросу - <b>%s</b>',
    'author'     => 'Архив автора: <b>%s</b>',
    'year'       => 'Архив за <b>%d</b> год',
    'month'      => 'Архив за: <b>%s</b>',
    'day'        => '',
    'attachment' => 'Медиа: %s',
    'tag'        => 'Записи по метке: <b>%s</b>',
    'tax_tag'    => '%1$s из "%2$s" по тегу: <b>%3$s</b>',
    // tax_tag выведет: 'тип_записи из "название_таксы" по тегу: имя_термина'.
    // Если нужны отдельные холдеры, например только имя термина, пишем так: 'записи по тегу: %3$s'
  );
  // Параметры по умолчанию
  static $args = array(
    'on_front_page'   => true,  // выводить крошки на главной странице
    'show_post_title' => true,  // показывать ли название записи в конце (последний элемент). Для записей, страниц, вложений
    'show_term_title' => true,  // показывать ли название элемента таксономии в конце (последний элемент). Для меток, рубрик и других такс
    'title_patt'      => '<span class="kb_title">%s</span>', // шаблон для последнего заголовка. Если включено: show_post_title или show_term_title
    'last_sep'        => true,  // показывать последний разделитель, когда заголовок в конце не отображается
    'markup'          => 'schema.org', // 'markup' - микроразметка. Может быть: 'rdf.data-vocabulary.org', 'schema.org', '' - без микроразметки
                       // или можно указать свой массив разметки:
                       // array( 'wrappatt'=>'<div class="kama_breadcrumbs">%s</div>', 'linkpatt'=>'<a href="%s">%s</a>', 'sep_after'=>'', )
    'priority_tax'    => array('category'), // приоритетные таксономии, нужно когда запись в нескольких таксах
    'priority_terms'  => array(), // 'priority_terms' - приоритетные элементы таксономий, когда запись находится в нескольких элементах одной таксы одновременно.
                    // Например: array( 'category'=>array(45,'term_name'), 'tax_name'=>array(1,2,'name') )
                    // 'category' - такса для которой указываются приор. элементы: 45 - ID термина и 'term_name' - ярлык.
                    // порядок 45 и 'term_name' имеет значение: чем раньше тем важнее. Все указанные термины важнее неуказанных...
    'nofollow' => false, // добавлять rel=nofollow к ссылкам?
    // служебные
    'sep'             => '',
    'linkpatt'        => '',
    'pg_end'          => '',
  );
  function get_crumbs( $sep, $l10n, $args ){
    global $post, $wp_query, $wp_post_types;
    self::$args['sep'] = $sep;
    // Фильтрует дефолты и сливает
    $loc = (object) array_merge( apply_filters('kama_breadcrumbs_default_loc', self::$l10n ), $l10n );
    $arg = (object) array_merge( apply_filters('kama_breadcrumbs_default_args', self::$args ), $args );
    $arg->sep = '<span class="kb_sep">'. $arg->sep .'</span>'; // дополним
    // упростим
    $sep = & $arg->sep;
    $this->arg = & $arg;
    // микроразметка ---
    if(1){
      $mark = & $arg->markup;
      // Разметка по умолчанию
      if( ! $mark ) $mark = array(
        'wrappatt'  => '<div class="kama_breadcrumbs">%s</div>',
        'linkpatt'  => '<a href="%s">%s</a>',
        'sep_after' => '',
      );
      // rdf
      elseif( $mark === 'rdf.data-vocabulary.org' ) $mark = array(
        'wrappatt'   => '<div class="kama_breadcrumbs" prefix="v: http://rdf.data-vocabulary.org/#">%s</div>',
        'linkpatt'   => '<span typeof="v:Breadcrumb"><a href="%s" rel="v:url" property="v:title">%s</a>',
        'sep_after'  => '</span>', // закрываем span после разделителя!
      );
      // schema.org
      elseif( $mark === 'schema.org' ) $mark = array(
        'wrappatt'   => '<div class="kama_breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">%s</div>',
        'linkpatt'   => '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="%s" itemprop="item"><span itemprop="name">%s</span></a></span>',
        'sep_after'  => '',
      );
      elseif( ! is_array($mark) )
        die( __CLASS__ .': "markup" parameter must be array...');
      $wrappatt  = $mark['wrappatt'];
      $arg->linkpatt  = $arg->nofollow ? str_replace('<a ','<a rel="nofollow"', $mark['linkpatt']) : $mark['linkpatt'];
      $arg->sep      .= $mark['sep_after']."\n";
    }
    $linkpatt = $arg->linkpatt; // упростим
    $q_obj = get_queried_object();
    // может это архив пустой таксы?
    $ptype = null;
    if( empty($post) ){
      if( isset($q_obj->taxonomy) )
        $ptype = & $wp_post_types[ get_taxonomy($q_obj->taxonomy)->object_type[0] ];
    }
    else $ptype = & $wp_post_types[ $post->post_type ];
    // paged
    $arg->pg_end = '';
    if( ($paged_num = get_query_var('paged')) || ($paged_num = get_query_var('page')) )
      $arg->pg_end = $sep . sprintf( $loc->paged, (int) $paged_num );
    $pg_end = $arg->pg_end; // упростим
    // ну, с богом...
    $out = '';
    if( is_front_page() ){
      return $arg->on_front_page ? sprintf( $wrappatt, ( $paged_num ? sprintf($linkpatt, get_home_url(), $loc->home) . $pg_end : $loc->home ) ) : '';
    }
    // страница записей, когда для главной установлена отдельная страница.
    elseif( is_home() ) {
      $out = $paged_num ? ( sprintf( $linkpatt, get_permalink($q_obj), esc_html($q_obj->post_title) ) . $pg_end ) : esc_html($q_obj->post_title);
    }
    elseif( is_404() ){
      $out = $loc->_404;
    }
    elseif( is_search() ){
      $out = sprintf( $loc->search, esc_html( $GLOBALS['s'] ) );
    }
    elseif( is_author() ){
      $tit = sprintf( $loc->author, esc_html($q_obj->display_name) );
      $out = ( $paged_num ? sprintf( $linkpatt, get_author_posts_url( $q_obj->ID, $q_obj->user_nicename ) . $pg_end, $tit ) : $tit );
    }
    elseif( is_year() || is_month() || is_day() ){
      $y_url  = get_year_link( $year = get_the_time('Y') );
      if( is_year() ){
        $tit = sprintf( $loc->year, $year );
        $out = ( $paged_num ? sprintf($linkpatt, $y_url, $tit) . $pg_end : $tit );
      }
      // month day
      else {
        $y_link = sprintf( $linkpatt, $y_url, $year);
        $m_url  = get_month_link( $year, get_the_time('m') );
        if( is_month() ){
          $tit = sprintf( $loc->month, get_the_time('F') );
          $out = $y_link . $sep . ( $paged_num ? sprintf( $linkpatt, $m_url, $tit ) . $pg_end : $tit );
        }
        elseif( is_day() ){
          $m_link = sprintf( $linkpatt, $m_url, get_the_time('F'));
          $out = $y_link . $sep . $m_link . $sep . get_the_time('l');
        }
      }
    }
    // Древовидные записи
    elseif( is_singular() && $ptype->hierarchical ){
      $out = $this->_add_title( $this->_page_crumbs($post), $post );
    }
    // Таксы, плоские записи и вложения
    else {
      $term = $q_obj; // таксономии
      // определяем термин для записей (включая вложения attachments)
      if( is_singular() ){
        // изменим $post, чтобы определить термин родителя вложения
        if( is_attachment() && $post->post_parent ){
          $save_post = $post; // сохраним
          $post = get_post($post->post_parent);
        }
        // учитывает если вложения прикрепляются к таксам древовидным - все бывает :)
        $taxonomies = get_object_taxonomies( $post->post_type );
        // оставим только древовидные и публичные, мало ли...
        $taxonomies = array_intersect( $taxonomies, get_taxonomies( array('hierarchical' => true, 'public' => true) ) );
        if( $taxonomies ){
          // сортируем по приоритету
          if( ! empty($arg->priority_tax) ){
            usort( $taxonomies, function($a,$b)use($arg){
              $a_index = array_search($a, $arg->priority_tax);
              if( $a_index === false ) $a_index = 9999999;
              $b_index = array_search($b, $arg->priority_tax);
              if( $b_index === false ) $b_index = 9999999;
              return ( $b_index === $a_index ) ? 0 : ( $b_index < $a_index ? 1 : -1 ); // меньше индекс - выше
            } );
          }
          // пробуем получить термины, в порядке приоритета такс
          foreach( $taxonomies as $taxname ){
            if( $terms = get_the_terms( $post->ID, $taxname ) ){
              // проверим приоритетные термины для таксы
              $prior_terms = & $arg->priority_terms[ $taxname ];
              if( $prior_terms && count($terms) > 2 ){
                foreach( (array) $prior_terms as $term_id ){
                  $filter_field = is_numeric($term_id) ? 'term_id' : 'slug';
                  $_terms = wp_list_filter( $terms, array($filter_field=>$term_id) );
                  if( $_terms ){
                    $term = array_shift( $_terms );
                    break;
                  }
                }
              }
              else
                $term = array_shift( $terms );
              break;
            }
          }
        }
        if( isset($save_post) ) $post = $save_post; // вернем обратно (для вложений)
      }
      // вывод
      // все виды записей с терминами или термины
      if( $term && isset($term->term_id) ){
        $term = apply_filters('kama_breadcrumbs_term', $term );
        // attachment
        if( is_attachment() ){
          if( ! $post->post_parent )
            $out = sprintf( $loc->attachment, esc_html($post->post_title) );
          else {
            if( ! $out = apply_filters('attachment_tax_crumbs', '', $term, $this ) ){
              $_crumbs    = $this->_tax_crumbs( $term, 'self' );
              $parent_tit = sprintf( $linkpatt, get_permalink($post->post_parent), get_the_title($post->post_parent) );
              $_out = implode( $sep, array($_crumbs, $parent_tit) );
              $out = $this->_add_title( $_out, $post );
            }
          }
        }
        // single
        elseif( is_single() ){
          if( ! $out = apply_filters('post_tax_crumbs', '', $term, $this ) ){
            $_crumbs = $this->_tax_crumbs( $term, 'self' );
            $out = $this->_add_title( $_crumbs, $post );
          }
        }
        // не древовидная такса (метки)
        elseif( ! is_taxonomy_hierarchical($term->taxonomy) ){
          // метка
          if( is_tag() )
            $out = $this->_add_title('', $term, sprintf( $loc->tag, esc_html($term->name) ) );
          // такса
          elseif( is_tax() ){
            $post_label = $ptype->labels->name;
            $tax_label = $GLOBALS['wp_taxonomies'][ $term->taxonomy ]->labels->name;
            $out = $this->_add_title('', $term, sprintf( $loc->tax_tag, $post_label, $tax_label, esc_html($term->name) ) );
          }
        }
        // древовидная такса (рибрики)
        else {
          if( ! $out = apply_filters('term_tax_crumbs', '', $term, $this ) ){
            $_crumbs = $this->_tax_crumbs( $term, 'parent' );
            $out = $this->_add_title( $_crumbs, $term, esc_html($term->name) );                     
          }
        }
      }
      // влоежния от записи без терминов
      elseif( is_attachment() ){
        $parent = get_post($post->post_parent);
        $parent_link = sprintf( $linkpatt, get_permalink($parent), esc_html($parent->post_title) );
        $_out = $parent_link;
        // вложение от записи древовидного типа записи
        if( is_post_type_hierarchical($parent->post_type) ){
          $parent_crumbs = $this->_page_crumbs($parent);
          $_out = implode( $sep, array( $parent_crumbs, $parent_link ) );
        }
        $out = $this->_add_title( $_out, $post );
      }
      // записи без терминов
      elseif( is_singular() ){
        $out = $this->_add_title( '', $post );
      }
    }
    // замена ссылки на архивную страницу для типа записи
    $home_after = apply_filters('kama_breadcrumbs_home_after', '', $linkpatt, $sep, $ptype );
    if( '' === $home_after ){
      // Ссылка на архивную страницу типа записи для: отдельных страниц этого типа; архивов этого типа; таксономий связанных с этим типом.
      if( $ptype && $ptype->has_archive && ! in_array( $ptype->name, array('post','page','attachment') )
        && ( is_post_type_archive() || is_singular() || (is_tax() && in_array($term->taxonomy, $ptype->taxonomies)) )
      ){
        $pt_title = $ptype->labels->name;
        // первая страница архива типа записи
        if( is_post_type_archive() && ! $paged_num )
          $home_after = sprintf( $this->arg->title_patt, $pt_title );
        // singular, paged post_type_archive, tax
        else{
          $home_after = sprintf( $linkpatt, get_post_type_archive_link($ptype->name), $pt_title );
          $home_after .= ( ($paged_num && ! is_tax()) ? $pg_end : $sep ); // пагинация
        }
      }
    }
    $before_out = sprintf( $linkpatt, home_url(), $loc->home ) . ( $home_after ? $sep.$home_after : ($out ? $sep : '') );
    $out = apply_filters('kama_breadcrumbs_pre_out', $out, $sep, $loc, $arg );
    $out = sprintf( $wrappatt, $before_out . $out );
    return apply_filters('kama_breadcrumbs', $out, $sep, $loc, $arg );
  }
  function _page_crumbs( $post ){
    $parent = $post->post_parent;
    $crumbs = array();
    while( $parent ){
      $page = get_post( $parent );
      $crumbs[] = sprintf( $this->arg->linkpatt, get_permalink($page), esc_html($page->post_title) );
      $parent = $page->post_parent;
    }
    return implode( $this->arg->sep, array_reverse($crumbs) );
  }
  function _tax_crumbs( $term, $start_from = 'self' ){
    $termlinks = array();
    $term_id = ($start_from === 'parent') ? $term->parent : $term->term_id;
    while( $term_id ){
      $term       = get_term( $term_id, $term->taxonomy );
      $termlinks[] = sprintf( $this->arg->linkpatt, get_term_link($term), esc_html($term->name) );
      $term_id    = $term->parent;
    }
    if( $termlinks )
      return implode( $this->arg->sep, array_reverse($termlinks) ) /*. $this->arg->sep*/;
    return '';
  }
  // добалвяет заголовок к переданному тексту, с учетом всех опций. Добавляет разделитель в начало, если надо.
  function _add_title( $add_to, $obj, $term_title = '' ){
    $arg = & $this->arg; // упростим...
    $title = $term_title ? $term_title : esc_html($obj->post_title); // $term_title чиститься отдельно, теги моугт быть...
    $show_title = $term_title ? $arg->show_term_title : $arg->show_post_title;
    // пагинация
    if( $arg->pg_end ){
      $link = $term_title ? get_term_link($obj) : get_permalink($obj);
      $add_to .= ($add_to ? $arg->sep : '') . sprintf( $arg->linkpatt, $link, $title ) . $arg->pg_end;
    }
    // дополняем - ставим sep
    elseif( $add_to ){
      if( $show_title )
        $add_to .= $arg->sep . sprintf( $arg->title_patt, $title );
      elseif( $arg->last_sep )
        $add_to .= $arg->sep;
    }
    // sep будет потом...
    elseif( $show_title )
      $add_to = sprintf( $arg->title_patt, $title );
    return $add_to;
  }
}

function kama_pagenavi($before='', $after='', $echo=true) {  
  /* ================ Настройки ================ */  
  $text_num_page = ''; // Текст для количества страниц. {current} заменится текущей, а {last} последней. Пример: 'Страница {current} из {last}' = Страница 4 из 60  
  $num_pages = 5; // сколько ссылок показывать  
  $stepLink = ''; // после навигации ссылки с определенным шагом (значение = число (какой шаг) или '', если не нужно показывать). Пример: 1,2,3...10,20,30  
  $dotright_text = '…'; // промежуточный текст "до".  
  $dotright_text2 = '…'; // промежуточный текст "после".  
  $backtext = '<svg width="16" height="8" viewBox="0 0 16 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.646445 3.64645C0.451183 3.84171 0.451183 4.15829 0.646445 4.35355L3.82843 7.53553C4.02369 7.7308 4.34027 7.7308 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82843L1.70711 4L4.53553 1.17157C4.73079 0.976312 4.73079 0.659729 4.53553 0.464467C4.34027 0.269205 4.02369 0.269205 3.82843 0.464467L0.646445 3.64645ZM16 3.5L0.999999 3.5L0.999999 4.5L16 4.5L16 3.5Z" fill="#383838"/></svg>'; // текст "перейти на предыдущую страницу". Ставим '', если эта ссылка не нужна.  
  $nexttext = '<svg width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.3536 4.14645C15.5488 4.34171 15.5488 4.65829 15.3536 4.85355L12.1716 8.03553C11.9763 8.2308 11.6597 8.2308 11.4645 8.03553C11.2692 7.84027 11.2692 7.52369 11.4645 7.32843L14.2929 4.5L11.4645 1.67157C11.2692 1.47631 11.2692 1.15973 11.4645 0.964467C11.6597 0.769205 11.9763 0.769205 12.1716 0.964467L15.3536 4.14645ZM4.37114e-08 4L15 4L15 5L-4.37114e-08 5L4.37114e-08 4Z" fill="#383838"/></svg>'; // текст "перейти на следующую страницу". Ставим '', если эта ссылка не нужна.  
  $first_page_text = ''; // текст "к первой странице" или ставим '', если вместо текста нужно показать номер страницы.  
  $last_page_text = ''; // текст "к последней странице" или пишем '', если вместо текста нужно показать номер страницы.  
  /* ================ Конец Настроек ================ */   

  global $wp_query;  
  $posts_per_page = (int) $wp_query->query_vars['posts_per_page'];  
  $paged = (int) $wp_query->query_vars['paged'];  
  $max_page = $wp_query->max_num_pages;  

  if($max_page <= 1 ) return false; //проверка на надобность в навигации  

  if(empty($paged) || $paged == 0) $paged = 1;  

  $pages_to_show = intval($num_pages);  
  $pages_to_show_minus_1 = $pages_to_show-1;  

  $half_page_start = floor($pages_to_show_minus_1/2); //сколько ссылок до текущей страницы  
  $half_page_end = ceil($pages_to_show_minus_1/2); //сколько ссылок после текущей страницы  

  $start_page = $paged - $half_page_start; //первая страница  
  $end_page = $paged + $half_page_end; //последняя страница (условно)  

  if($start_page <= 0) $start_page = 1;  
  if(($end_page - $start_page) != $pages_to_show_minus_1) $end_page = $start_page + $pages_to_show_minus_1;  
  if($end_page > $max_page) {  
    $start_page = $max_page - $pages_to_show_minus_1;  
    $end_page = (int) $max_page;  
  }  
  if($start_page <= 0) $start_page = 1;  
  $out='';
  $out.= $before;  
  if ($text_num_page){  
    $text_num_page = preg_replace ('!{current}|{last}!','%s',$text_num_page);  
    $out.= sprintf ("<span class='pages'>$text_num_page</span>",$paged,$max_page);  
  }  
  if ($backtext && $paged!=1) $out.= '<a href="'.get_pagenum_link(($paged-1)).'" class="prev">'.$backtext.'</a>';  
  if ($start_page >= 2 && $pages_to_show < $max_page) {  
    $out.= '<a href="'.get_pagenum_link().'">'. ($first_page_text?$first_page_text:1) .'</a>';  
    if($dotright_text && $start_page!=2) $out.= $dotright_text;  
  }  

  for($i = $start_page; $i <= $end_page; $i++) {  
    if($i == $paged) {  
      $out.= '<span>'.$i.'</span>';  
    } else {
      $out.= '<a href="'.get_pagenum_link($i).'">'.$i.'</a>';  
    }  
  }  
  //ссылки с шагом  
  if ($stepLink && $end_page < $max_page){  
    for($i=$end_page+1; $i<=$max_page; $i++) {  
      if($i % $stepLink == 0 && $i!==$num_pages) {  
        if (++$dd == 1) $out.= '<span>'.$dotright_text2.'</span>';  
        $out.= '<a href="'.get_pagenum_link($i).'"><span>'.$i.'</span></a>';  
      }  
    }  
  }  
  if ($end_page < $max_page) {  
      if($dotright_text && $end_page!=($max_page-1)) $out.= '<span>'.$dotright_text2.'</span>';  
      $out.= '<a href="'.get_pagenum_link($max_page).'"><span>'. ($last_page_text?$last_page_text:$max_page) .'</span></a>';  
  }  
  if ($nexttext && $paged!=$end_page) $out.= '<a href="'.get_pagenum_link(($paged+1)).'" class="next"><span>'.$nexttext.'</span></a>';  
  $out.= $after."\n";  
  if ($echo) echo $out;  
  else return $out;  
}

// add http if not (ftp://, ftps://, http://, https://)
function addhttp($url){
  if(!preg_match("~^(?:f|ht)tps?://~i", $url)){
    $url = "http://".$url;
  }
  return $url;
}

?>