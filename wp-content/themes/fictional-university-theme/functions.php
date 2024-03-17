<?php 

// link custom REST API
require get_theme_file_path('/inc/search-route.php');

// add custom field for WP REST API
function university_custom_rest() {
  register_rest_field('post', 'authorName', array(
    'get_callback' => function() {return get_the_author();}
  ));
}
add_action('rest_api_init', 'university_custom_rest');

// create dynamic page banner
function pageBanner($args = NULL) {
  
  if(!isset($args['title'])) {
    $args['title'] = get_the_title();
  }

  if(!isset($args['subtitle'])) {
    $args['subtitle'] = get_field('page_banner_subtitle');
  }

  if(!isset($args['photo'])) {
    if(get_field('page_banner_background_image') AND !is_archive() AND !is_home()) {
      $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
    } else {
      $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
    }
  }
  ?>
<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>)"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
    <div class="page-banner__intro">
      <p><?php echo $args['subtitle']; ?></p>
    </div>
  </div>
</div>
<?php }

// include important files such as css, js, google font
function university_files() {
  wp_enqueue_script('university-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
  wp_enqueue_script('university-js', get_theme_file_uri('/src/index.js'), array('jquery'), '1.0', true);
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('google-font', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('university-style', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_style('university-extra-style', get_theme_file_uri('/build/index.css'));

  wp_localize_script('university-js', 'universityData', array(
    'root_url' => get_site_url()
  ));
}
add_action('wp_enqueue_scripts', 'university_files');

// add custom features to theme : nav, custom image size, dynamic title, thumbnail
function university_features() {
  register_nav_menu('footerMenu1', 'Footer Menu 1');
  register_nav_menu('footerMenu2', 'Footer Menu 2');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('professorLandscape', 400, 260, true);
  add_image_size('professorPortrait', 480, 650, true);
  add_image_size('pageBanner', 1500, 350, true);
}
add_action('after_setup_theme', 'university_features');

// customize wp query for certain cases
function university_adjust_queries($query) {
  if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) { //is_main_query = not custom query
    $today = date('Ymd');
    $query->set('meta_key', 'event_date');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', array(
      array(
        'key' => 'event_date',
        'compare' => '>=',
        'value' => $today,
        'type' => 'numeric',
      )
    ));
  };

  if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) { //is_main_query = not custom query
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
    $query->set('posts_per_page', -1);
  };

  if(!is_admin() AND is_post_type_archive('campus') AND $query->is_main_query()) { //is_main_query = not custom query
    $query->set('posts_per_page', -1);
  };
}
add_action('pre_get_posts', 'university_adjust_queries');

// Redirect subscriber out of Admin into homepage
function redirectSub() {
  $currentUser = wp_get_current_user();
  if (count($currentUser->roles) == 1 AND $currentUser->roles[0] == 'subscriber') {
    wp_redirect(site_url(''));
    exit;
  }
}
add_action('admin_init', 'redirectSub');

function noAdminBar() {
  $currentUser = wp_get_current_user();
  if (count($currentUser->roles) == 1 AND $currentUser->roles[0] == 'subscriber') {
    show_admin_bar(false);
  }
}
add_action('wp_loaded', 'noAdminBar');

// Customize login screen
function ourHeaderUrl() {
  return esc_url(site_url(''));
}
add_filter('login_headerurl', 'ourHeaderUrl');

function ourHeaderTitle() {
  return get_bloginfo('name');
}
add_filter('login_headertitle', 'ourHeaderTitle');

function ourLoginCSS() {
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('google-font', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('university-style', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_style('university-extra-style', get_theme_file_uri('/build/index.css'));
}
add_action('login_enqueue_scripts', 'ourLoginCSS');

