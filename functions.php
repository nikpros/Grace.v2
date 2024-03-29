<?php

add_action('wp_enqueue_scripts', 'load_styles_scritps_fonts');
add_action('after_setup_theme', 'theme_register_nav_menu');
add_action('admin_menu', 'register_menu_page_settings'); //Добавление в админ-панель своей вкладки
add_action('admin_init', 'register_nedwsettings'); // Добавление редактируемых полей в своей вкладке

add_action('wp_ajax_loadmore', 'true_load_posts'); // Выполнение JS-скрипта на загрузку постов для зарегистрированных
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts'); // и незарегистрированных пользователей

add_action('wp_ajax_showgallerypost', 'true_show_images'); // Выполнение JS-скрипта для показа галереи картинок конкретного поста
add_action('wp_ajax_nopriv_showgallerypost', 'true_show_images');

add_action('wp_ajax_sendmail', 'true_send_request'); // Отправка заявки на почту
add_action('wp_ajax_nopriv_sendmail', 'true_send_request');

add_action('wp_ajax_daytime', 'true_get_time'); // Загрузка расписания для возрастной группы
add_action('wp_ajax_nopriv_daytime', 'true_get_time');

add_filter('nav_menu_link_attributes', 'add_class_to_all_menu_anchors', 10 ); // хук на добавление класса к тегу <a> ссылки в меню
add_filter( 'nav_menu_css_class', 'add_my_class_to_nav_menu', 10, 2 ); // Добавление custom class к тегу li меню
add_filter('delete_wrap_filter', 'delete_wrapping_image', 20); // Удаление обертки для Галереи

add_theme_support( 'post-thumbnails' ); // Добавить постам миниатюру

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
show_admin_bar(false);


function load_styles_scritps_fonts() {
    wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css');
	wp_enqueue_style('sandwich', get_template_directory_uri() . '/assets/css/sandwich.css');
	wp_enqueue_style('lightgallery', get_template_directory_uri() . '/assets/css/lightgallery.css');
	wp_enqueue_style('nprogress', get_template_directory_uri() . '/assets/css/nprogress.css');
    wp_enqueue_style('iconmonstr-iconic-font', get_template_directory_uri() . '/assets/css/iconic/css/iconmonstr-iconic-font.css');
    wp_enqueue_style('iconmonstr-iconic-font.min', get_template_directory_uri() . '/assets/css/iconic/css/iconmonstr-iconic-font.min.css');
    wp_enqueue_style('iconmonstr-iconic-font', get_template_directory_uri() . '/assets/css/iconic/fonts/iconmonstr-iconic-font.min.eot');
    wp_enqueue_style('iconmonstr-iconic-font', get_template_directory_uri() . '/assets/css/iconic/fonts/iconmonstr-iconic-font.min.ttf');
    wp_enqueue_style('iconmonstr-iconic-font', get_template_directory_uri() . '/assets/css/iconic/fonts/iconmonstr-iconic-font.min.woff');
	wp_enqueue_style('iconmonstr-iconic-font', get_template_directory_uri() . '/assets/css/iconic/fonts/iconmonstr-iconic-font.min.woff2');
	wp_enqueue_style('lg', get_template_directory_uri() . '/assets/fonts/lg.eot');
	wp_enqueue_style('lg', get_template_directory_uri() . '/assets/fonts/lg.svg');
	wp_enqueue_style('lg', get_template_directory_uri() . '/assets/fonts/lg.ttf');
	wp_enqueue_style('lg', get_template_directory_uri() . '/assets/fonts/lg.woff');
    wp_enqueue_style('bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
	wp_enqueue_style('fontawesome', '//use.fontawesome.com/releases/v5.0.13/css/all.css');
	wp_enqueue_style('animate', '//cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css');
	
	
	
	//////
	// wp_register_script('jquery', '//code.jquery.com/jquery-3.3.1.slim.min.js', false);
	wp_enqueue_script('jquery');
	wp_register_script('popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'), false);
	wp_enqueue_script('popper');
	wp_register_script('bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery'), false);
	wp_enqueue_script('bootstrap');
	wp_register_script('parallax', get_template_directory_uri() . '/assets/js/parallax.min.js', array('jquery'));
	wp_enqueue_script('parallax');
	wp_register_script('jquery.waypoints.min', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', array('jquery'));
	wp_enqueue_script('jquery.waypoints.min');
	wp_register_script('waypoint', get_template_directory_uri() . '/assets/js/waypoint.js', array('jquery'));
	wp_enqueue_script('waypoint');
	wp_register_script('ionicons', '//unpkg.com/ionicons@4.5.10-0/dist/ionicons.js', false);
	wp_enqueue_script('ionicons');
	wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery', 'nprogress'));
	wp_enqueue_script('loadmore', get_template_directory_uri() . '/assets/js/loadmore.js', array('jquery'));
	wp_enqueue_script('lightgallery-all.min', get_template_directory_uri() . '/assets/js/lightgallery-all.min.js', array('jquery'));
	wp_enqueue_script('lg-fullscreen.min', get_template_directory_uri() . '/assets/js/lg-fullscreen.min.js', array('jquery'));
	wp_enqueue_script('smooth-scroll.polyfills.min', get_template_directory_uri() . '/assets/js/smooth-scroll.polyfills.min.js');
	wp_enqueue_script('showgallerypost', get_template_directory_uri() . '/assets/js/showgallerypost.js', array('jquery') );
	wp_enqueue_script('masked.min', get_template_directory_uri() . '/assets/js/masked.min.js', array('jquery') );
	wp_enqueue_script('sendmail', get_template_directory_uri() . '/assets/js/sendmail.js', array('jquery') );
	wp_enqueue_script('sha256', get_template_directory_uri() . '/assets/js/sha256.js', array('jquery') );
	wp_enqueue_script('jquery-cookie', get_template_directory_uri() . '/assets/js/jquery-cookie.js', array('jquery') );
	wp_register_script('scrollreveal', '//unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js', array('jquery'));
	wp_enqueue_script('scrollreveal');
	wp_enqueue_script('nprogress', get_template_directory_uri() . '/assets/js/nprogress.js');
}

function theme_register_nav_menu() { // аналогичная ситуация с добавлением actionа на регистрацию меню
    register_nav_menu('top', 'menu in a header'); //
} //

function add_class_to_all_menu_anchors( $atts ) {
	$atts['class'] = 'nav-link';
	return $atts;
}

function register_menu_page_settings() {
	add_menu_page('Настройки Темы', 'Настройки Темы', 6, 'settings_page.php', 'theme_settings');
}

function theme_settings() { ?>
	<div class="wrap">
		<h2>Настройки темы</h2>

		<form method="POST" action="options.php" enctype="multipart/form-data">
			<?php settings_fields('nedw-settings-group'); ?>
		<table class="form-table">
			<tr valign="top">
			<th scope="row">Логотип</th>
			<td><?php if(get_option('logo')){?><img src="<?php echo get_option('logo'); ?>" alt="Logo"><br><?php } ?><input type="file" name="logo"></td>
			</tr>
			<tr valign="top">
			<th scope="row">Подпись в footer о защите прав пользователя</th>
			<td><input type="text" name="copy" value="<?php echo get_option('copy'); ?>"></td>
			</tr>
		</table>

		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>">
		</p>
		</form>
	</div>
<?php }

function register_nedwsettings() {
	register_setting('nedw-settings-group', 'logo', 'validate_setting');
	register_setting('nedw-settings-group', 'copy');
}

function validate_setting($plugin_options) {
	$keys = array_keys($_FILES);
	$i = 0;
	foreach ( $_FILES as $image) {
		if ($image['size']) {
			if (preg_match('/(jpg|jpeg|png|gif)$/', $image['type'])) {
				$override = array('test_form' => false);
				$file = wp_handle_upload($image, $override);
				$plugin_options = $file['url'];
			} else {
				$options = get_option('logo');
				$plugin_options = $options;
				wp_die('No image was uploaded.');
			}
		} else {
			$options = get_option('logo');
			$plugin_options = $options;
		} 
		$i++;
	}
	return $plugin_options;
}

function true_load_posts(){
 
	$args = array(
		'numberposts' => -1,
		'post_type' => 'post',
		'suppress_filters' => true,
	);

	
	$posts = get_posts($args);
	$posts_per_page = get_option('posts_per_page');
	$current_page = $_POST['page'];
	$start_frame = $posts_per_page  * $current_page;
	$end_frame = $posts_per_page;

	$new_posts = array_slice( $posts, $start_frame, $end_frame);
	// echo "<pre>"; print_r($new_posts[1]); echo "</pre>";
	$current_page++; // следующая страница


	// если посты есть
	if ( $new_posts ) {

		// запускаем цикл
		foreach ( $new_posts as $new_post) { 
			?>
			
		<li class="animated fadeIn">
			<div class="timeline-image">
				<img class="rounded-circle img-fluid" src="<?php echo get_the_post_thumbnail_url( $new_post->ID, $size ); ?>" alt="">
			</div>
			<div class="timeline-panel">
				<div class="timeline-heading">
					<h4>
						<?php print($new_post->post_date); ?>
					</h4>
					<h4 class="subheading">
						<?php print($new_post->post_title); ?>
					</h4>
				</div>
				<div class="timeline-body">
					<div class="timeline-description">
						<?php   $content = $new_post->post_content;
								$postOutput = preg_replace('/(<)([img])(\w+)([^>]*>)/', "", $content);
								echo $postOutput;
						?>
					</div>
					<div class="timeline-gallery"></div>
				</div>
			</div>
		</li>

		<?php };
		die;
	}
}

function true_show_images() {

	$index = $_POST['index']; // принимаем индекс элемента массива, который отработал клик

	$posts = get_posts( array(
		'numberposts' => -1,
		'orderby'     => 'date',
		'order'		  => 'DESC',
		'post_type'   => 'post',
		'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
	));
	
	$post = $posts[$index];
	$indexToID = $post->ID;
	$content_post = get_post($indexToID);
	$content = $content_post->post_content;

	preg_match_all('/src="([^"]+)"/i', $content, $matches);
	$img_urls = $matches[1];

	if($img_urls) {
		foreach ($img_urls as $img_url) { ?>
			<a class="d-none" href="<?php echo $img_url; ?>" title="<?php the_title(); ?>">
				<img src="<?php echo $img_url; ?>" alt="" />
			</a>

	<?php }}

	die();
}

function true_send_request() {
	$name = $_POST['name'];
    $surname = $_POST['surname'];
    $age = $_POST['age'];
	$mail = $_POST['mail'];
	$phone = $_POST['phone'];
	$extraMsg = $_POST['extra'];
    //
    $name = htmlspecialchars($name);
    $surname = htmlspecialchars($surname);
    $age = htmlspecialchars($age);
	$mail = htmlspecialchars($mail);
	$phone = htmlspecialchars($phone);
	$extraMsg = htmlspecialchars($extraMsg);
    //
    $name = urldecode($name);
    $surname = urldecode($surname);
    $age = urldecode($age);
	$mail = urldecode($mail);
	$phone = urldecode($phone);
	$extraMsg = urldecode($extraMsg);
    //
    $name = trim($name);
    $surname = trim($surname);
    $age = trim($age);
	$mail = trim($mail);
	$phone = urldecode($phone);
	$extraMsg = urldecode($extraMsg);
//
	echo mail("ivan_kalita90@mail.ru", "Заявка в студию танцев - 'Грация'",
				"\nИмя: ".$name.
				"\nФамилия: ".$surname.
				"\nВозраст: ".$age. " лет".
				"\nКонтакты:\nТелефон: ".$phone.
				", Почта: ".$mail.
				"\nСообщение: ".$extraMsg,
				"From: <wordpress@orelgrace.ru> \r\n");

	die();
}

function true_get_time() {
	$value = $_POST['value'];
	$pageID = get_option('page_on_front');
	$json = array(
		'monday' => array(
			'from'	=> get_field($value, $pageID)['monday']['from'],
			'to'	=> get_field($value, $pageID)['monday']['to']
		),
		'tuesday' => array(
			'from'	=> get_field($value, $pageID)['tuesday']['from'],
			'to'	=> get_field($value, $pageID)['tuesday']['to']
		),
		'wednesday' => array(
			'from'	=> get_field($value, $pageID)['wednesday']['from'],
			'to'	=> get_field($value, $pageID)['wednesday']['to']
		),
		'thursday' => array(
			'from'	=> get_field($value, $pageID)['thursday']['from'],
			'to'	=> get_field($value, $pageID)['thursday']['to']
		),
		'friday' => array(
			'from'	=> get_field($value, $pageID)['friday']['from'],
			'to'	=> get_field($value, $pageID)['friday']['to']
		),
		'saturday' => array(
			'from'	=> get_field($value, $pageID)['saturday']['from'],
			'to'	=> get_field($value, $pageID)['saturday']['to']
		),
		'sunday' => array(
			'from'	=> get_field($value, $pageID)['sunday']['from'],
			'to'	=> get_field($value, $pageID)['sunday']['to']
		)
	);

	echo json_encode($json);
	die();
}


function add_my_class_to_nav_menu( $classes, $item ){
	/* $classes содержит
	Array(
		[1] => menu-item
		[2] => menu-item-type-post_type
		[3] => menu-item-object-page
		[4] => menu-item-284
	)
	*/
	$classes[] = 'nav__li';

	return $classes;
}
function delete_wrapping_image( $content ) {
	$out = array();
	$reg = '/(<a.*>.*<\/a>){1,}/iU';
	$count = preg_match_all($reg, $content, $gallery);

	// function wrapping($el) {
	// 	return '<div class="gallery__item">'.$el.'</div>';
	// }

	// $sub = array_map('wrapping', $gallery[0]);
	$result = join('', $gallery[0]);
	return $result;
}
?>