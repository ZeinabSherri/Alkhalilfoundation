<?php
function enqueue_custom_stylesheets() {

     wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css');
     wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');
         wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css');
        wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css');
     }
    
    
     add_action('wp_enqueue_scripts', 'enqueue_custom_stylesheets');
    
     function enqueue_custom_scripts() {
   
        wp_enqueue_script('jquery', get_template_directory_uri() . '/jquery.js', array(), '1.11.0', true);
        wp_enqueue_script('modernizr', get_template_directory_uri() . '/modernizr.js', array(), '67980', true);
        wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/jquery.easing.js', array('jquery'), '1.3', true);
        wp_enqueue_script('jquery-waitforimages', get_template_directory_uri() . '/jquery.waitforimages.js', array('jquery'), '1.0', true);
        wp_enqueue_script('jquery-validate', get_template_directory_uri() . '/jquery.validate.js', array('jquery'), '1.0', true);
        wp_enqueue_script('manage', get_template_directory_uri() . '/manage.js', array('jquery'), '1.0', true);
    
      
       
    }
    
    add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


// function project_register_styles() {
//     $version = wp_get_theme()->get('Version');

//     wp_enqueue_style('project-style', '/assets/css/style.css', array(), $version, 'all');
//     wp_enqueue_style('project-animate', '/assets/css/animate.css',  array(), 'all');
//     wp_enqueue_style('project-responsive',  '/assets/css/responsive.css', array(), 'all');
//      wp_enqueue_style('project-fontawsome',  '/assets/css/font-awesome.css',  array(), 'all');
// }
// add_action('wp_enqueue_scripts', 'project_register_styles');




function my_theme_setup() {
    
    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    add_theme_support('automatic-feed-links');

    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

    add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'));

    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
    ));

    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ));
}
add_action('after_setup_theme', 'my_theme_setup');


function my_theme_add_custom_metadata() {
    ?>
    <meta name="HandheldFriendly" content="true" />
    <meta name="MobileOptimized" content="320" />
    <meta content="telephone=no" name="format-detection" />
    <link rel="canonical" href="<?php echo esc_url(home_url()); ?>" />
    <link rel="alternate" hreflang="en" href="<?php echo esc_url(home_url()); ?>" />
    <?php
}
add_action('wp_head', 'my_theme_add_custom_metadata');

function my_theme_add_facebook_open_graph_metadata() {
    if (is_front_page() || is_home()) {
        $og_title = get_bloginfo('name');
        $og_description = get_bloginfo('description');
        $og_type = 'website';
        $og_url = esc_url(home_url());
        $og_image = 'https://elkhalilfoundation.org:443/uploads/banners/p1b8edp1ge9dm1e67149m1h2q1d2t4.jpg';

        ?>
        <meta property="og:title" content="<?php echo esc_attr($og_title); ?>" />
        <meta property="og:description" content="<?php echo esc_attr($og_description); ?>" />
        <meta property="og:type" content="<?php echo esc_attr($og_type); ?>" />
        <meta property="og:url" content="<?php echo esc_url($og_url); ?>" />
        <meta property="og:image" content="<?php echo esc_url($og_image); ?>" />
        <?php
    }
}
add_action('wp_head', 'my_theme_add_facebook_open_graph_metadata');

function create_about_section_post_type() {
    register_post_type( 'about_section',
        array(
            'labels' => array(
                'name' => __( 'About Sections' ),
                'singular_name' => __( 'About Section' ),
            ),
            'public' => true,
            'has_archive' => false,
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'rewrite' => array( 'slug' => 'about-section' ),
        )
    );
}
add_action( 'init', 'create_about_section_post_type' );

function add_about_section_metabox() {
    add_meta_box(
        'about_section_metabox',
        'About Section Data',
        'display_about_section_metabox',
        'about_section',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'add_about_section_metabox' );

function display_about_section_metabox() {
    global $post;
    $about_title = get_post_meta( $post->ID, '_about_title', true );
    $about_content = get_post_meta( $post->ID, '_about_content', true );
    $about_image = get_post_meta( $post->ID, '_about_image', true );

    // Display the custom metabox fields
    ?>
    <label for="about-title">Title:</label>
    <input type="text" id="about-title" name="about_title" value="<?php echo esc_attr( $about_title ); ?>" style="width: 100%;" />

    <label for="about-content">Content:</label>
    <?php wp_editor( $about_content, 'about-content', array( 'textarea_name' => 'about_content' ) ); ?>

    <label for="about-image">Background Image URL:</label>
    <input type="text" id="about-image" name="about_image" value="<?php echo esc_attr( $about_image ); ?>" style="width: 100%;" />
    <?php
}

function save_about_section_metabox( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;

    if ( isset( $_POST['about_title'] ) ) {
        update_post_meta( $post_id, '_about_title', sanitize_text_field( $_POST['about_title'] ) );
    }

    if ( isset( $_POST['about_content'] ) ) {
        update_post_meta( $post_id, '_about_content', wp_kses_post( $_POST['about_content'] ) );
    }

    if ( isset( $_POST['about_image'] ) ) {
        update_post_meta( $post_id, '_about_image', esc_url_raw( $_POST['about_image'] ) );
    }
}
add_action( 'save_post', 'save_about_section_metabox' );


  


function create_services_section_post_type() {
    register_post_type( 'services_section',
        array(
            'labels' => array(
                'name' => __( 'Services Sections' ),
                'singular_name' => __( 'Services Section' ),
            ),
            'public' => true,
            'has_archive' => false,
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'rewrite' => array( 'slug' => 'services-section' ),
        )
    );
}
add_action( 'init', 'create_services_section_post_type' );

function add_services_section_metabox() {
    add_meta_box(
        'services_section_metabox',
        'Services Section Data',
        'display_services_section_metabox',
        'services_section',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'add_services_section_metabox' );

function display_services_section_metabox() {
    global $post;
    $services_title = get_post_meta( $post->ID, '_services_title', true );
    $services_subtitle = get_post_meta( $post->ID, '_services_subtitle', true );
    $services_background_image = get_post_meta( $post->ID, '_services_background_image', true );
    $services_button_text = get_post_meta( $post->ID, '_services_button_text', true );
    $services_button_link = get_post_meta( $post->ID, '_services_button_link', true );

    // Display the custom metabox fields
    ?>
    <label for="services-title">Title:</label>
    <input type="text" id="services-title" name="services_title" value="<?php echo esc_attr( $services_title ); ?>" style="width: 100%;" />

    <label for="services-subtitle">Subtitle:</label>
    <input type="text" id="services-subtitle" name="services_subtitle" value="<?php echo esc_attr( $services_subtitle ); ?>" style="width: 100%;" />

    <label for="services-background-image">Background Image URL:</label>
    <input type="text" id="services-background-image" name="services_background_image" value="<?php echo esc_attr( $services_background_image ); ?>" style="width: 100%;" />

    <label for="services-button-text">Button Text:</label>
    <input type="text" id="services-button-text" name="services_button_text" value="<?php echo esc_attr( $services_button_text ); ?>" style="width: 100%;" />

    <label for="services-button-link">Button Link URL:</label>
    <input type="text" id="services-button-link" name="services_button_link" value="<?php echo esc_attr( $services_button_link ); ?>" style="width: 100%;" />
    <?php
}

function save_services_section_metabox( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;

    if ( isset( $_POST['services_title'] ) ) {
        update_post_meta( $post_id, '_services_title', sanitize_text_field( $_POST['services_title'] ) );
    }

    if ( isset( $_POST['services_subtitle'] ) ) {
        update_post_meta( $post_id, '_services_subtitle', sanitize_text_field( $_POST['services_subtitle'] ) );
    }

    if ( isset( $_POST['services_background_image'] ) ) {
        update_post_meta( $post_id, '_services_background_image', esc_url_raw( $_POST['services_background_image'] ) );
    }

    if ( isset( $_POST['services_button_text'] ) ) {
        update_post_meta( $post_id, '_services_button_text', sanitize_text_field( $_POST['services_button_text'] ) );
    }

    if ( isset( $_POST['services_button_link'] ) ) {
        update_post_meta( $post_id, '_services_button_link', esc_url_raw( $_POST['services_button_link'] ) );
    }
}
add_action( 'save_post', 'save_services_section_metabox' );
function create_service_item_post_type() {
    register_post_type( 'service_item',
        array(
            'labels' => array(
                'name' => __( 'Service Items' ),
                'singular_name' => __( 'Service Item' ),
            ),
            'public' => true,
            'has_archive' => false,
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'rewrite' => array( 'slug' => 'service-item' ),
        )
    );
}
add_action( 'init', 'create_service_item_post_type' );
function add_service_item_metabox() {
    add_meta_box(
        'service_item_metabox',
        'Service Item Data',
        'display_service_item_metabox',
        'service_item',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'add_service_item_metabox' );

function display_service_item_metabox() {
    global $post;
    $service_number = get_post_meta( $post->ID, '_service_number', true );
    $service_title = get_post_meta( $post->ID, '_service_title', true );
    $service_description = get_post_meta( $post->ID, '_service_description', true );

    // Display the custom metabox fields
    ?>
    <label for="service-number">Service Number:</label>
    <input type="number" id="service-number" name="service_number" value="<?php echo esc_attr( $service_number ); ?>" style="width: 100%;" />

    <label for="service-title">Service Title:</label>
    <input type="text" id="service-title" name="service_title" value="<?php echo esc_attr( $service_title ); ?>" style="width: 100%;" />

    <label for="service-description">Service Description:</label>
    <?php wp_editor( $service_description, 'service-description', array( 'textarea_name' => 'service_description' ) ); ?>
    <?php
}

function save_service_item_metabox( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;

    if ( isset( $_POST['service_number'] ) ) {
        update_post_meta( $post_id, '_service_number', sanitize_text_field( $_POST['service_number'] ) );
    }

    if ( isset( $_POST['service_title'] ) ) {
        update_post_meta( $post_id, '_service_title', sanitize_text_field( $_POST['service_title'] ) );
    }

    if ( isset( $_POST['service_description'] ) ) {
        update_post_meta( $post_id, '_service_description', wp_kses_post( $_POST['service_description'] ) );
    }
}
add_action( 'save_post', 'save_service_item_metabox' );


function create_home_about_section_post_type() {
    register_post_type( 'home_about_section',
        array(
            'labels' => array(
                'name' => __( 'Home About Sections' ),
                'singular_name' => __( 'Home About Section' ),
            ),
            'public' => true,
            'has_archive' => false,
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'rewrite' => array( 'slug' => 'home-about-section' ),
        )
    );
}
add_action( 'init', 'create_home_about_section_post_type' );
function add_home_about_section_metabox() {
    add_meta_box(
        'home_about_section_metabox',
        'Home About Section Data',
        'display_home_about_section_metabox',
        'home_about_section',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'add_home_about_section_metabox' );

function display_home_about_section_metabox() {
    global $post;
    $about_image = get_post_meta( $post->ID, '_home_about_image', true );
    $board_subtitle = get_post_meta( $post->ID, '_home_board_subtitle', true );
    $board_title = get_post_meta( $post->ID, '_home_board_title', true );
    $board_text = get_post_meta( $post->ID, '_home_board_text', true );
    $button_url = get_post_meta( $post->ID, '_home_button_url', true );
    $button_text = get_post_meta( $post->ID, '_home_button_text', true );

    // Display the custom metabox fields
    ?>
    <label for="home-about-image">Background Image URL:</label>
    <input type="text" id="home-about-image" name="home_about_image" value="<?php echo esc_attr( $about_image ); ?>" style="width: 100%;" />

    <label for="home-board-subtitle">Board Subtitle:</label>
    <input type="text" id="home-board-subtitle" name="home_board_subtitle" value="<?php echo esc_attr( $board_subtitle ); ?>" style="width: 100%;" />

    <label for="home-board-title">Board Title:</label>
    <input type="text" id="home-board-title" name="home_board_title" value="<?php echo esc_attr( $board_title ); ?>" style="width: 100%;" />

    <label for="home-board-text">Board Text:</label>
    <?php wp_editor( $board_text, 'home-board-text', array( 'textarea_name' => 'home_board_text' ) ); ?>

    <label for="home-button-url">Button URL:</label>
    <input type="text" id="home-button-url" name="home_button_url" value="<?php echo esc_attr( $button_url ); ?>" style="width: 100%;" />

    <label for="home-button-text">Button Text:</label>
    <input type="text" id="home-button-text" name="home_button_text" value="<?php echo esc_attr( $button_text ); ?>" style="width: 100%;" />
    <?php
}

function save_home_about_section_metabox( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;

    if ( isset( $_POST['home_about_image'] ) ) {
        update_post_meta( $post_id, '_home_about_image', esc_url_raw( $_POST['home_about_image'] ) );
    }

    if ( isset( $_POST['home_board_subtitle'] ) ) {
        update_post_meta( $post_id, '_home_board_subtitle', sanitize_text_field( $_POST['home_board_subtitle'] ) );
    }

    if ( isset( $_POST['home_board_title'] ) ) {
        update_post_meta( $post_id, '_home_board_title', sanitize_text_field( $_POST['home_board_title'] ) );
    }

    if ( isset( $_POST['home_board_text'] ) ) {
        update_post_meta( $post_id, '_home_board_text', wp_kses_post( $_POST['home_board_text'] ) );
    }

    if ( isset( $_POST['home_button_url'] ) ) {
        update_post_meta( $post_id, '_home_button_url', esc_url_raw( $_POST['home_button_url'] ) );
    }

    if ( isset( $_POST['home_button_text'] ) ) {
        update_post_meta( $post_id, '_home_button_text', sanitize_text_field( $_POST['home_button_text'] ) );
    }
}
add_action( 'save_post', 'save_home_about_section_metabox' );


function create_news_post_type() {
    register_post_type( 'news',
        array(
            'labels' => array(
                'name' => __( 'News' ),
                'singular_name' => __( 'News' ),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'editor' ),
            'rewrite' => array( 'slug' => 'news' ),
        )
    );
}
add_action( 'init', 'create_news_post_type' );

function create_events_post_type() {
    register_post_type( 'events',
        array(
            'labels' => array(
                'name' => __( 'Events' ),
                'singular_name' => __( 'Event' ),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'editor' ),
            'rewrite' => array( 'slug' => 'events' ),
        )
    );
}
add_action( 'init', 'create_events_post_type' );

// Add custom fields for the "news" and "events" custom post types
function add_news_events_metabox() {
    add_meta_box(
        'news_events_metabox',
        'News & Event Data',
        'display_news_events_metabox',
        array( 'news', 'events' ), // Specify both "news" and "events" post types
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'add_news_events_metabox' );

function display_news_events_metabox( $post ) {
    $news_event_type = get_post_meta( $post->ID, '_news_event_type', true );

    // Display the custom metabox fields
    ?>
    <label for="news-event-type">Select Type:</label>
    <select id="news-event-type" name="news_event_type" style="width: 100%;">
        <option value="News" <?php selected( $news_event_type, 'News' ); ?>>News</option>
        <option value="Event" <?php selected( $news_event_type, 'Event' ); ?>>Event</option>
    </select>
    <?php
}

function save_news_events_metabox( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;

    if ( isset( $_POST['news_event_type'] ) ) {
        update_post_meta( $post_id, '_news_event_type', sanitize_text_field( $_POST['news_event_type'] ) );
    }
}
add_action( 'save_post', 'save_news_events_metabox' );

function create_instagram_feed_post_type() {
    register_post_type( 'instagram_feed',
        array(
            'labels' => array(
                'name' => __( 'Instagram Feed' ),
                'singular_name' => __( 'Instagram Feed' ),
            ),
            'public' => true,
            'has_archive' => false,
            'supports' => array( 'title', 'editor' ),
            'rewrite' => array( 'slug' => 'instagram-feed' ),
        )
    );
}
add_action( 'init', 'create_instagram_feed_post_type' );

// Add custom fields for the "instagram_feed" custom post type
function add_instagram_feed_metabox() {
    add_meta_box(
        'instagram_feed_metabox',
        'Instagram Feed Data',
        'display_instagram_feed_metabox',
        'instagram_feed',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'add_instagram_feed_metabox' );

function display_instagram_feed_metabox( $post ) {
    $instagram_title = get_post_meta( $post->ID, '_instagram_title', true );
    $instagram_description = get_post_meta( $post->ID, '_instagram_description', true );
    $instagram_link = get_post_meta( $post->ID, '_instagram_link', true );

    // Display the custom metabox fields
    ?>
    <label for="instagram-title">Title:</label>
    <input type="text" id="instagram-title" name="instagram_title" value="<?php echo esc_attr( $instagram_title ); ?>" style="width: 100%;" />

    <label for="instagram-description">Description:</label>
    <?php wp_editor( $instagram_description, 'instagram-description', array( 'textarea_name' => 'instagram_description' ) ); ?>

    <label for="instagram-link">Instagram Link:</label>
    <input type="text" id="instagram-link" name="instagram_link" value="<?php echo esc_attr( $instagram_link ); ?>" style="width: 100%;" />
    <?php
}

function save_instagram_feed_metabox( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;

    if ( isset( $_POST['instagram_title'] ) ) {
        update_post_meta( $post_id, '_instagram_title', sanitize_text_field( $_POST['instagram_title'] ) );
    }

    if ( isset( $_POST['instagram_description'] ) ) {
        update_post_meta( $post_id, '_instagram_description', wp_kses_post( $_POST['instagram_description'] ) );
    }

    if ( isset( $_POST['instagram_link'] ) ) {
        update_post_meta( $post_id, '_instagram_link', esc_url_raw( $_POST['instagram_link'] ) );
    }
}
add_action( 'save_post', 'save_instagram_feed_metabox' );

function create_home_contact_page_post_type() {
    register_post_type( 'home_contact_page',
        array(
            'labels' => array(
                'name' => __( 'Home Contact Page' ),
                'singular_name' => __( 'Home Contact Page' ),
            ),
            'public' => true,
            'has_archive' => false,
            'supports' => array( 'title', 'editor' ),
            'rewrite' => array( 'slug' => 'home-contact-page' ),
        )
    );
}
add_action( 'init', 'create_home_contact_page_post_type' );

// Add custom fields for the "home_contact_page" custom post type
function add_home_contact_page_metabox() {
    add_meta_box(
        'home_contact_page_metabox',
        'Home Contact Page Data',
        'display_home_contact_page_metabox',
        'home_contact_page',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'add_home_contact_page_metabox' );

function display_home_contact_page_metabox( $post ) {
    $contact_title = get_post_meta( $post->ID, '_contact_title', true );
    $contact_email = get_post_meta( $post->ID, '_contact_email', true );
    $contact_fax = get_post_meta( $post->ID, '_contact_fax', true );
    $contact_phone = get_post_meta( $post->ID, '_contact_phone', true );

    // Display the custom metabox fields
    ?>
    <label for="contact-title">Contact Title:</label>
    <input type="text" id="contact-title" name="contact_title" value="<?php echo esc_attr( $contact_title ); ?>" style="width: 100%;" />

    <label for="contact-email">Contact Email:</label>
    <input type="text" id="contact-email" name="contact_email" value="<?php echo esc_attr( $contact_email ); ?>" style="width: 100%;" />

    <label for="contact-fax">Contact Fax:</label>
    <input type="text" id="contact-fax" name="contact_fax" value="<?php echo esc_attr( $contact_fax ); ?>" style="width: 100%;" />

    <label for="contact-phone">Contact Phone:</label>
    <input type="text" id="contact-phone" name="contact_phone" value="<?php echo esc_attr( $contact_phone ); ?>" style="width: 100%;" />
    <?php
}

function save_home_contact_page_metabox( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;

    if ( isset( $_POST['contact_title'] ) ) {
        update_post_meta( $post_id, '_contact_title', sanitize_text_field( $_POST['contact_title'] ) );
    }

    if ( isset( $_POST['contact_email'] ) ) {
        update_post_meta( $post_id, '_contact_email', sanitize_email( $_POST['contact_email'] ) );
    }

    if ( isset( $_POST['contact_fax'] ) ) {
        update_post_meta( $post_id, '_contact_fax', sanitize_text_field( $_POST['contact_fax'] ) );
    }

    if ( isset( $_POST['contact_phone'] ) ) {
        update_post_meta( $post_id, '_contact_phone', sanitize_text_field( $_POST['contact_phone'] ) );
    }
}
add_action( 'save_post', 'save_home_contact_page_metabox' );
function create_contact_image_post_type() {
    register_post_type( 'contact_image',
        array(
            'labels' => array(
                'name' => __( 'Contact Image' ),
                'singular_name' => __( 'Contact Image' ),
            ),
            'public' => true,
            'has_archive' => false,
            'supports' => array( 'title', 'thumbnail' ),
            'rewrite' => array( 'slug' => 'contact-image' ),
        )
    );
}
add_action( 'init', 'create_contact_image_post_type' );

// Add custom fields for the "contact_image" custom post type
function add_contact_image_metabox() {
    add_meta_box(
        'contact_image_metabox',
        'Contact Image Data',
        'display_contact_image_metabox',
        'contact_image',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'add_contact_image_metabox' );

function display_contact_image_metabox( $post ) {
    $contact_image_url = get_post_meta( $post->ID, '_contact_image_url', true );

    // Display the custom metabox fields
    ?>
    <label for="contact-image-url">Image URL:</label>
    <input type="text" id="contact-image-url" name="contact_image_url" value="<?php echo esc_attr( $contact_image_url ); ?>" style="width: 100%;" />
    <?php
}

function save_contact_image_metabox( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;

    if ( isset( $_POST['contact_image_url'] ) ) {
        update_post_meta( $post_id, '_contact_image_url', esc_url_raw( $_POST['contact_image_url'] ) );
    }
}
add_action( 'save_post', 'save_contact_image_metabox' );


?>
