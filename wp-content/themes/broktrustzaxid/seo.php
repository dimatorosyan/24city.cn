<?php
// микроразметка JSON-LD
function application_ld_json(){
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
  "headline": "<?php echo addslashes(get_the_title($post->post_ID)); ?>",
  "description": "<?php echo addslashes(get_the_content(null, '', $post->post_ID)); ?>",
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
    "name": "TellTrue"
  },  
  "publisher": {
    "@type": "Organization",
    "name": "TellTrue",
    "logo": {
      "@type": "ImageObject",
      "url": "<?php echo get_bloginfo('template_url'); ?>/images/logo.png",
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
add_action('wp_head', 'application_ld_json');
// END JSON-LD


// удалим стандартный вывод title
remove_action( 'wp_head', '_wp_render_title_tag', 1 );

// вызов всех функций в HEAD страницы
add_action( 'wp_head', 'kama_render_seo_tags', 1 );
function kama_render_seo_tags(){
	//remove_theme_support( 'title-tag' ); // не обязательно

	echo '<title>'. kama_meta_title(' » ') .'</title>'."\n\n";

	echo kama_meta_description('Текст для главной');
	echo kama_meta_keywords('ключи, для, главной');
	echo kama_meta_robots();

	echo kama_og_meta(); // Open Graph, twitter данные
}

/**
 * Open Graph, twitter данные в <head>.
 * документация: http://ogp.me/
 *
 * @version 5
 */
function kama_og_meta(){

	$obj = get_queried_object();

	// только для записей или терминов
	if( isset($obj->post_type) )
		$post = $obj;
	elseif( isset($obj->term_id) )
		$term = $obj;

	$is_post_page = isset($post);
	$is_term_page = isset($term);

	$title = kama_meta_title( '–' );
	$desc  = preg_replace( '/^.+content="([^"]*)".*$/s', '$1', kama_meta_description() );

	// Open Graph
	$els = array();
	$els['og:locale']      = '<meta property="og:locale" content="'. get_locale() .'" />';
	$els['og:site_name']   = '<meta property="og:site_name" content="'. esc_attr( get_bloginfo('name') ) .'" />';
	$els['og:title']       = '<meta property="og:title" content="'. esc_attr( $title ) .'" />';
	$els['og:description'] = '<meta property="og:description" content="'. esc_attr( $desc ) .'" />';
	$els['og:type']        = '<meta property="og:type" content="'.( is_singular() ? 'article' : 'object' ).'" />';

	if( $is_post_page ) $pageurl = get_permalink( $post );
	if( $is_term_page ) $pageurl = get_term_link( $term );
	if( isset($pageurl) )
		$els['og:url'] = '<meta property="og:url" content="'. esc_attr( $pageurl ) .'" />';

	if( apply_filters( 'kama_og_meta_show_article_section', true ) ){
		if( is_singular() && $post_taxname =  get_object_taxonomies($post->post_type) ){
			$post_terms = get_the_terms( $post, reset($post_taxname) );
			if( $post_terms && $post_term = array_shift($post_terms) )
				$els['article:section'] = '<meta property="article:section" content="'. esc_attr( $post_term->name ) .'" />';
		}
	}

	// image
	$thumb_id = 0;
	if    ( $is_post_page ) $thumb_id = get_post_thumbnail_id( $post );
	elseif( $is_term_page ) $thumb_id = get_term_meta( $term->term_id, '_thumbnail_id', 1 );
	$thumb_id = apply_filters( 'kama_og_meta_thumb_id', $thumb_id );

	if( $thumb_id ){
		list( $image_url, $img_width, $img_height ) = image_downsize( $thumb_id, 'full' );

		// Open Graph image
		$els['og:image']        = '<meta property="og:image" content="'. esc_url($image_url) .'" />';
		$els['og:image:width']  = '<meta property="og:image:width" content="'. (int) $img_width .'" />';
		$els['og:image:height'] = '<meta property="og:image:height" content="'. (int) $img_height .'" />';
	}

	// twitter
	$els['twitter:card']         = '<meta name="twitter:card" content="summary" />';
	$els['twitter:description']  = '<meta name="twitter:description" content="'. esc_attr( $desc ) .'" />';
	$els['twitter:title']        = '<meta name="twitter:title" content="'. esc_attr( $title ) .'" />';
	if( isset($image_url) )
		$els['twitter:image'] = '<meta name="twitter:image" content="'. esc_url($image_url) .'" />';

	$els = apply_filters( 'kama_og_meta_elements', $els );

	return "\n\n". implode("\n", $els ) ."\n\n";
}

/**
 * Выводит заголовок страницы <title>
 *
 * Для меток и категорий указывается в настройках, в описании: [title=Заголовок].
 * Для записей, если нужно, чтобы заголовок страницы отличался от заголовка записи,
 * создайте произвольное поле title и впишите туда произвольный заголовок.
 *
 * @version 4.7
 *
 * @param string     $sep            разделитель
 * @param true|false $add_blog_name  добавлять ли название блога в конец заголовка для архивов.
 */
function kama_meta_title( $sep = '»', $add_blog_name = true ){
	static $cache; if( $cache ) return $cache;

	global $post;

	$l10n = apply_filters( 'kama_meta_title_l10n', array(
		'404'     => 'Ошибка 404: такой страницы не существует',
		'search'  => 'Результаты поиска по запросу: %s',
		'compage' => 'Комментарии %s',
		'author'  => 'Статьи автора: %s',
		'archive' => 'Архив за',
		'paged'   => '(страница %d)',
	) );

	$parts = array(
		'prev'  => '',
		'title' => '',
		'after' => '',
		'paged' => '',
	);
	$title = & $parts['title']; // упростим
	$after = & $parts['after']; // упростим

	if(0){}
	// 404
	elseif ( is_404() ){
		$title = $l10n['404'];
	}
	// поиск
	elseif ( is_search() ){
		$title = sprintf( $l10n['search'], get_query_var('s') );
	}
	// главная
	elseif( is_front_page() ){
		if( is_page() && $title = get_post_meta( $post->ID, 'title', 1 ) ){
			// $title определен
		} else {
			$title = get_bloginfo('name');
			$after = get_bloginfo('description');
		}
	}
	// отдельная страница
	elseif( is_singular() || ( is_home() && ! is_front_page() ) || ( is_page() && ! is_front_page() ) ){
		$title = get_post_meta( $post->ID, 'title', 1 ); // указанный title у записи в приоритете

		if( ! $title ) $title = apply_filters( 'kama_meta_title_singular', '', $post );
		if( ! $title ) $title = single_post_title( '', 0 );

		if( $cpage = get_query_var('cpage') )
			$parts['prev'] = sprintf( $l10n['compage'], $cpage );
	}
	// архив типа поста
	elseif ( is_post_type_archive() ){
		$title = post_type_archive_title('', 0 );
		$after = 'blog_name';
	}
	// таксономии
	elseif( is_category() || is_tag() || is_tax() ){
		$term = get_queried_object();

		$title = get_term_meta( $term->term_id, 'title', 1 );

		if( ! $title ){
			$title = single_term_title('', 0 );

			if( is_tax() )
				$parts['prev'] = get_taxonomy($term->taxonomy)->labels->name;
		}

		$after = 'blog_name';
	}
	// архив автора
	elseif ( is_author() ){
		$title = sprintf( $l10n['author'], get_queried_object()->display_name );
		$after = 'blog_name';
	}
	// архив даты
	elseif ( ( get_locale() === 'ru_RU' ) && ( is_day() || is_month() || is_year() ) ){
		$rus_month  = array('', 'январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь');
		$rus_month2 = array('', 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
		$year       = get_query_var('year');
		$monthnum   = get_query_var('monthnum');
		$day        = get_query_var('day');

		if( is_year() )      $dat = "$year год";
		elseif( is_month() ) $dat = "$rus_month[$monthnum] $year года";
		elseif( is_day() )   $dat = "$day $rus_month2[$monthnum] $year года";

		$title = sprintf( $l10n['archive'], $dat );
		$after = 'blog_name';
	}
	// остальные архивы
	else {
		$title = get_the_archive_title();
		$after = 'blog_name';
	}

	// номера страниц для пагинации и деления записи
	$pagenum = get_query_var('paged') ?: get_query_var('page');
	if( $pagenum )
		$parts['paged'] = sprintf( $l10n['paged'], $pagenum );

	if( $after == 'blog_name' )
		$after = $add_blog_name ? get_bloginfo('name') : '';

	// позволяет фильтровать title как угодно. Сам заголово
	// $parts содержит массив с элементами: prev - текст до, title - заголовок, after - текст после
	$parts = apply_filters( 'kama_meta_title_parts', $parts, $l10n );

	// добавим пагинацию в title
	if( $parts['paged'] ){
		$parts['title'] .=  " {$parts['paged']}";
		unset( $parts['paged'] );
	}

	$title = implode( ' '. trim($sep) .' ', array_filter($parts) );

	//$title = apply_filters( 'kama_meta_title', $title );

	$title = wptexturize( $title );
	$title = esc_html( $title );

	return $cache = $title;
}

/**
 * Выводит метатег description.
 *
 * Для элементов таксономий: метаполе description или в описании такой шоткод [description = текст описания]
 * У постов сначала проверяется, метаполе description, или цитата, или начальная часть контента.
 * Цитата или контент обрезаются до указанного в $maxchar символов.
 *
 * @param $home_description Указывается описание для главной страницы сайта.
 * @param $maxchar          Максимальная длина описания (в символах).
 *
 * @version 0.15
 */
function kama_meta_description( $home_description = '', $maxchar = 160 ){
	static $cache; if( $cache ) return $cache;

	global $post;

	$cut = true;
	$desc = '';

	// front
	if( is_front_page() ){
		// когда для главной установлена страница
		if( is_page() && $desc = get_post_meta($post->ID, 'description', true )  ){
			$cut = false;
		}

		if( ! $desc )
			$desc = $home_description ?: get_bloginfo( 'description', 'display' );
	}
	// singular
	elseif( is_singular() ){
		if( $desc = get_post_meta($post->ID, 'description', true ) )
			$cut = false;

		if( ! $desc ) $desc = $post->post_excerpt ?: $post->post_content;

		$desc = trim( strip_tags( $desc ) );
	}
	// term
	elseif( is_category() || is_tag() || is_tax() ){
		$term = get_queried_object();

		$desc = get_term_meta( $term->term_id, 'meta_description', true );
		$cut = false;

		if( ! $desc && $term->description ){
			$desc = strip_tags( $term->description );
			$cut = true;
		}
	}

	if( $desc ){
		$origin_out = $desc;
		$desc = str_replace( array("\n", "\r"), ' ', $desc );
		$desc = preg_replace( '~\[[^\]]+\](?!\()~', '', $desc ); // удаляем шоткоды. Оставляем маркдаун [foo](URL)

		$desc = apply_filters( 'kama_meta_description_pre_cut', $desc );

		if( $cut ){
			$char = mb_strlen( $desc );
			if( $char > $maxchar ){
				$desc     = mb_substr( $desc, 0, $maxchar );
				$words    = explode(' ', $desc );
				$maxwords = count($words) - 1; // убираем последнее слово, оно в 90% случаев неполное
				$desc     = join(' ', array_slice($words, 0, $maxwords)).' ...';
			}
		}

		$desc = apply_filters( 'kama_meta_description', $desc, $origin_out, $cut, $maxchar );
		if( $desc )
			return $cache = '<meta name="description" content="'. esc_attr( trim($desc) ) .'" />'."\n";
	}

}

/**
 * Генерирует метатег keywords для head части сайта
 *
 * Чтобы задать свои keywords для записи, создайте произвольное поле keywords и впишите в значения необходимые ключевые слова.
 * Для постов (post) ключевые слова генерируются из меток и названия категорий, если не указано произвольное поле keywords.
 *
 * Для меток, категорий и произвольных таксономий, ключевые слова указываются в описании, в шоткоде: [keywords=слово1, слово2, слово3]
 *
 * @ $home_keywords: Для главной, ключевые слова указываются в первом параметре: kama_meta_keywords( 'слово1, слово2, слово3' );
 * @ $def_keywords: сквозные ключевые слова - укажем и они будут прибавляться к остальным на всех страницах
 *
 * version 0.6
 */
function kama_meta_keywords( $home_keywords = '', $def_keywords = '' ){
	global $wp_query, $post;
	$out = '';

	if ( is_front_page() ){
		$out = $home_keywords;
	}
	elseif( is_singular() ){
		$out = get_post_meta( $post->ID, 'keywords', true );

		// для постов указываем ключами метки и категории, если не указаны ключи в произвольном поле
		if( ! $out && $post->post_type == 'post' ){
			$res = wp_get_object_terms( $post->ID, array('post_tag', 'category'), array('orderby' => 'none') ); // получаем категории и метки
			if( $res ) foreach( $res as $tag ) $out .= ", $tag->name";

			$out = ltrim( $out, ', ' );
		}
	}
	elseif ( is_category() || is_tag() || is_tax() ){
		$term = get_queried_object();

		// wp 4.4
		if( function_exists('get_term_meta') ){
			$out = get_term_meta( $term->term_id, "keywords", true );
		}
		else{
			preg_match( '!\[keywords=([^\]]+)\]!iU', $term->description, $match );
			$out = isset($match[1]) ? $match[1] : '';
		}

	}

	if( $out && $def_keywords )
		$out = $out .', '. $def_keywords;

	if( $out )
		return "<meta name=\"keywords\" content=\"$out\" />\n";
}

/**
 * Метатег robots
 *
 * Чтобы задать свои атрибуты метатега robots записи, создайте произвольное поле с ключом robots
 * и необходимым значением, например: noindex,nofollow
 *
 * Укажите параметр $allow_types, чтобы разрешить индексацию типов страниц.
 *
 * @ $allow_types Какие типы страниц нужно индексировать (через запятую):
 *                cpage, is_category, is_tag, is_tax, is_author, is_year, is_month,
 *                is_attachment, is_day, is_search, is_feed, is_post_type_archive, is_paged
 *                (можно использовать любые условные теги в виде строки)
 *                cpage - страницы комментариев
 * @ $robots      Как закрывать индексацию: noindex,nofollow
 *
 * version 0.6
 */
function kama_meta_robots( $allow_types = null, $robots = 'noindex,nofollow' ){
	global $post;

	if( null === $allow_types ) $allow_types = 'cpage, is_category, is_attachment, is_tag, is_tax, is_paged, is_post_type_archive';

	if( ( is_home() || is_front_page() ) && ! is_paged() ) return;

	if( is_singular() ){
		// если это не вложение или вложение но оно разрешено
		if( ! is_attachment() || false !== strpos($allow_types,'is_attachment') ){
			$robots = get_post_meta( $post->ID, 'robots', true );
		}
	}
	else {
		$types = preg_split('~[, ]+~', $allow_types );
		$types = array_filter( $types );

		foreach( $types as $type ){
			if( $type == 'cpage' && strpos($_SERVER['REQUEST_URI'], '/comment-page') ) $robots = false;
			elseif( function_exists($type) && $type() )                                $robots = false;
		}
	}

	$robots = apply_filters( 'kama_meta_robots_close', $robots );

	if( $robots )
		return "<meta name=\"robots\" content=\"$robots\" />\n";
}
?>