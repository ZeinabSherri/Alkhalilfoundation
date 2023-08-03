<?php get_header();?>
    <!-- <section class="about-content">
    	<article class="about-image" style="background-image:url(https://elkhalilfoundation.org:443/uploads/about/11493201567home-about.jpg);background-repeat:no-repeat;background-position:center center;background-size:cover;"></article>
        <article class="about-info">
        	<div class="about-box">
                <h2 class="page-subtitle">El Khalil Foundation</h2>
                <h3 class="page-title">Who We Are</h3>
                <div class="page-text">
					EL Khalil Foundation (EKF), is a Non-Profit NGO, established by the El-Khalil Family in 2003 with the purpose of assisting the people of Hasbaya District through various programs that will help improve conditions on personal, social and business levels.                    <div class="home-submit1">
                		<a href="https://facebook.com" title="Who We Are">
                        <div class="button">Learn More</div>
                        </a>
                    </div>
                </div>
            </div>
        </article>
    </section> -->
    <?php

$args_about = array(
    'post_type' => 'about_section',
    'posts_per_page' => 1,
);
$about_query = new WP_Query( $args_about );

if ( $about_query->have_posts() ) {
    while ( $about_query->have_posts() ) {
        $about_query->the_post();

        $about_title = get_post_meta( get_the_ID(), '_about_title', true );
        $about_content = get_post_meta( get_the_ID(), '_about_content', true );
        $about_image = get_post_meta( get_the_ID(), '_about_image', true );

        
        ?>
        <section class="about-content">
            <article class="about-image" style="background-image:url(<?php echo esc_url( $about_image ); ?>);background-repeat:no-repeat;background-position:center center;background-size:cover;"></article>
            <article class="about-info">
                <div class="about-box">
                    <h2 class="page-subtitle"><?php echo esc_html( $about_title ); ?></h2>
                    <h3 class="page-title">Who We Are</h3>
                    <div class="page-text">
                        <?php echo wp_kses_post( $about_content ); ?>
                        <div class="home-submit1">
                            <a href="<?php the_permalink(); ?>" title="Who We Are">
                                <div class="button">Learn More</div>
                            </a>
                        </div>
                    </div>
                </div>
            </article>
        </section>
        <?php
    }
    wp_reset_postdata();
}
?>
<?php


$args_services = array(
    'post_type' => 'services_section',
    'posts_per_page' => 1,
);

$services_query = new WP_Query($args_services);

if ($services_query->have_posts()) {
    while ($services_query->have_posts()) {
        $services_query->the_post();

        // Get the custom fields
        $services_title = get_post_meta(get_the_ID(), '_services_title', true);
        $services_subtitle = get_post_meta(get_the_ID(), '_services_subtitle', true);
        $services_background_image = get_post_meta(get_the_ID(), '_services_background_image', true);
        $services_button_text = get_post_meta(get_the_ID(), '_services_button_text', true);
        $services_button_link = get_post_meta(get_the_ID(), '_services_button_link', true);

        // Display the dynamic section
        ?>
        <section class="services-content-home" style="background:url(<?php echo esc_url($services_background_image); ?>);background-repeat:no-repeat;background-position:center top;background-size:cover;">
            <article>
                <div class="services-text-holder">
                    <h3 class="services-title"><?php echo esc_html($services_title); ?></h3>
                    <div class="services-text"><?php echo esc_html($services_subtitle); ?></div>
                    <div class="home-submit">
                        <a href="<?php echo esc_url($services_button_link); ?>" title="Our Programs">
                            <div class="button"><?php echo esc_html($services_button_text); ?></div>
                        </a>
                    </div>
                </div>
                <hgroup class="our-services">
                    <?php
                    $args_service_items = array(
                        'post_type' => 'service_item',
                        'posts_per_page' => -1,
                        'order' => 'ASC',
                        'orderby' => 'meta_value_num',
                        'meta_key' => '_service_number', // Use the meta key for sorting by the service number
                    );

                    $service_items_query = new WP_Query($args_service_items);

                    if ($service_items_query->have_posts()) {
                        while ($service_items_query->have_posts()) {
                            $service_items_query->the_post();
                            $service_number = get_post_meta(get_the_ID(), '_service_number', true);
                            $service_title = get_post_meta(get_the_ID(), '_service_title', true);
                            $service_description = get_post_meta(get_the_ID(), '_service_description', true);
                            ?>
                            <style>
                                .statement-title<?php echo esc_html($service_number); ?>{position:relative;}
                                #service_<?php echo esc_html($service_number); ?>:before{content:"<?php echo esc_html($service_number); ?>";position:absolute;top:-15px;left:-45px;font-family: 'Roboto-Black'; font-size:3rem;color:#d8d1ca;}
                                @media screen and (max-width: 1100px) {
                                    #service_<?php echo esc_html($service_number); ?>:before{top:-4px;left:-30px;font-size:2.8rem;}
                                }
                            </style>
                            <h2 class="statement-title statement-title<?php echo esc_html($service_number); ?>" id="service_<?php echo esc_html($service_number); ?>"><?php echo esc_html($service_title); ?></h2>
                            <div class="statement-text"><?php echo wp_kses_post($service_description); ?></div>
                            <?php
                        }
                        wp_reset_postdata();
                    }
                    ?>
                </hgroup>
            </article>
        </section>
        <?php
    }
    wp_reset_postdata();
}


?>




<!--    
      <section class="services-content-home" style="background:url(https://elkhalilfoundation.org:443/uploads/home_services/1493911124OUR-SERVICES-HOMEPAGE.jpg);background-repeat:no-repeat;background-position:center top;background-size:cover;">
    	<article>
        	<div class="services-text-holder">
                <h3 class="services-title">Our Programs</h3>
                <div class="services-text">As a result of the circumstances that has afflicted the District, people living in the District lack various resources and knowledge on different subjects, which will requires direct involvement, training and exposure in the areas that we have focused on as our objectives.<br />
Furthermore, we will be exploring and assisting in the development of programs that will enable participants to become self-sufficient economically.<br /></div>
                <div class="home-submit">
                	<a href="https://elkhalilfoundation.org:443/Services" title="Our Programs">
                    <div class="button">Learn More</div>
                    </a>
                </div>
            </div>
            <hgroup class="our-services">
            	                <style>
				.statement-title{position:relative;}
				#service_1:before{content:"1";position:absolute;top:-15px;left:-45px;font-family: 'Roboto-Black'; font-size:3rem;color:#d8d1ca;}
				@media screen and (max-width: 1100px) {
					#service_1:before{top:-4px;left:-30px;font-size:2.8rem;}
				}
								</style>
                
                	<h2 class="statement-title" id="service_1">Cultural Exposure & Integration</h2>
                    <div class="statement-text">In this thematic area, we have included programs that can benefit all inhabitants within the District.</div>
                                <style>
				.statement-title{position:relative;}
				#service_2:before{content:"2";position:absolute;top:-15px;left:-45px;font-family: 'Roboto-Black'; font-size:3rem;color:#d8d1ca;}
				@media screen and (max-width: 1100px) {
					#service_2:before{top:-4px;left:-30px;font-size:2.8rem;}
				}
								</style>
                
                	<h2 class="statement-title" id="service_2">Youth Development & Leadership</h2>
                    <div class="statement-text">A recent research that we have conducted found that almost equal numbers of youth wish to stay, as those wishing to leave their villages. Although this &ndash; in itself &ndash; is not significant in anyway, the reasons are obvious: youth wishing to stay is due to attachment to family, and those wishing to leave is due to the lack of opportunities and the inability to build a descent future.</div>
                                <style>
				.statement-title{position:relative;}
				#service_3:before{content:"3";position:absolute;top:-15px;left:-45px;font-family: 'Roboto-Black'; font-size:3rem;color:#d8d1ca;}
				@media screen and (max-width: 1100px) {
					#service_3:before{top:-4px;left:-30px;font-size:2.8rem;}
				}
								</style>
                
                	<h2 class="statement-title" id="service_3">Women Empowerment</h2>
                    <div class="statement-text">This is the most sensitive thematic area we will be working on. There were some very important observations to be noted. While women in generally were conservative, they showed lack of confidence, lack of communication skills, the absence of satisfaction and most notably, a poor educational level. Women in the District suffer from routine, emptiness and the inability to express who they are, and as a result.</div>
                            </hgroup>
                            
        </article>
    </section>    -->



     <!-- <section class="about-content" id="about-content">
    	<article class="board-image" style="background:url(https://elkhalilfoundation.org:443/uploads/home_board/1493202440home-board.jpg);background-repeat:no-repeat;background-position:center;background-size:cover;">
        </article>
        <article class="board-info">
        	<div class="board-box">
                <h2 class="board-subtitle">El Khalil Foundation</h2>
                <h3 class="board-title">Board</h3>
                <div class="board-text">
					Guided by the wisdom of our Founding Father, Mohammed El-Khalil, and in the light of his teachings, united in our beliefs and aspirations, we have resolved to build a Foundation that will strive to create value for our communities and the people at large.                    <div class="home-submit1" id="button-left">
                		<a href="https://elkhalilfoundation.org:443/About/5" title="El Khalil Foundation">
                        <div class="button">Learn More</div>
                        </a>
                    </div>
                </div>
            </div>
        </article>
    </section>  -->
   <?php 
  
$args_home_about = array(
    'post_type' => 'home_about_section',
    'posts_per_page' => 1,
);

$home_about_query = new WP_Query($args_home_about);

if ($home_about_query->have_posts()) {
    while ($home_about_query->have_posts()) {
        $home_about_query->the_post();

        // Get the custom fields
        $about_image = get_post_meta(get_the_ID(), '_home_about_image', true);
        $board_subtitle = get_post_meta(get_the_ID(), '_home_board_subtitle', true);
        $board_title = get_post_meta(get_the_ID(), '_home_board_title', true);
        $board_text = get_post_meta(get_the_ID(), '_home_board_text', true);
        $button_url = get_post_meta(get_the_ID(), '_home_button_url', true);
        $button_text = get_post_meta(get_the_ID(), '_home_button_text', true);

        // Display the dynamic section
        ?>
        <section class="about-content" id="about-content">
            <article class="board-image" style="background:url(<?php echo esc_url($about_image); ?>);background-repeat:no-repeat;background-position:center;background-size:cover;">
            </article>
            <article class="board-info">
                <div class="board-box">
                    <h2 class="board-subtitle"><?php echo esc_html($board_subtitle); ?></h2>
                    <h3 class="board-title"><?php echo esc_html($board_title); ?></h3>
                    <div class="board-text">
                        <?php echo wp_kses_post($board_text); ?>
                        <div class="home-submit1" id="button-left">
                            <a href="<?php echo esc_url($button_url); ?>" title="El Khalil Foundation">
                                <div class="button"><?php echo esc_html($button_text); ?></div>
                            </a>
                        </div>
                    </div>
                </div>
            </article>
        </section>
        <?php
    }
    wp_reset_postdata();
}

   ?>
   <?php 
   $args_news = array(
    'post_type' => 'news',
    'posts_per_page' => 2,
);

$news_query = new WP_Query($args_news);

// Query for the "events" custom post type
$args_events = array(
    'post_type' => 'events',
    'posts_per_page' => 2,
);

$events_query = new WP_Query($args_events);

// Display all posts from the "news" and "events" custom post types
?>
<section class="news-events-holder">
    <article id="news-events-title" class="news-events-b">
        <h3 class="page-title1">News &amp; Events</h3>
        <div class="home-submit1">
            <a href="https://elkhalilfoundation.org:443/News" title="News &amp; Events">
                <div class="button">View All</div>
            </a>
        </div>
    </article>
    <article id="news-events-listing" class="news-events-b">
        <?php
        // Display News posts
        if ($news_query->have_posts()) {
            while ($news_query->have_posts()) {
                $news_query->the_post();
                ?>
                <a href="<?php the_permalink(); ?>">
                    <article class="news-events-box">
                        <hgroup>
                            <h2><?php echo 'News / ' . get_the_date(); ?></h2>
                            <h5><?php the_title(); ?></h5>
                            <div class="news-events-info"><?php the_content(); ?></div>
                        </hgroup>
                    </article>
                </a>
                <?php
            }
            wp_reset_postdata();
        }

        // Display Events posts
        if ($events_query->have_posts()) {
            while ($events_query->have_posts()) {
                $events_query->the_post();
                ?>
                <a href="<?php the_permalink(); ?>">
                    <article class="news-events-box">
                        <hgroup>
                            <h2><?php echo 'Events / ' . get_the_date(); ?></h2>
                            <h5><?php the_title(); ?></h5>
                            <div class="news-events-info"><?php the_content(); ?></div>
                        </hgroup>
                    </article>
                </a>
                <?php
            }
            wp_reset_postdata();
        }
        ?>
    </article>
</section>
   <?php 
   $args_instagram_feed = array(
    'post_type' => 'instagram_feed',
    'posts_per_page' => 1,
);

$instagram_feed_query = new WP_Query($args_instagram_feed);

// Display the "Instagram Feed" section
?>
<section class="instagram-feed">
    <article class="instagram-details">
        <?php
        // Display custom fields for the "instagram_feed" post
        if ($instagram_feed_query->have_posts()) {
            while ($instagram_feed_query->have_posts()) {
                $instagram_feed_query->the_post();
                $instagram_title = get_post_meta( get_the_ID(), '_instagram_title', true );
                $instagram_description = get_post_meta( get_the_ID(), '_instagram_description', true );
                $instagram_link = get_post_meta( get_the_ID(), '_instagram_link', true );
                ?>
                <h3 class="services-title"><?php echo esc_html( $instagram_title ); ?></h3>
                <div class="services-text"><?php echo wp_kses_post( $instagram_description ); ?></div>
                <div class="home-submit">
                    <a href="<?php echo esc_url( $instagram_link ); ?>" title="Instagram Feed" target="_blank">
                        <div class="button">Follow Us</div>
                    </a>
                </div>
                <?php
            }
            wp_reset_postdata();
        }
        ?>
    </article>
    <article class="instagram-listing">
     
    </article>
</section>
<?php
// Query for the "home_contact_page" custom post type
$args_home_contact_page = array(
    'post_type' => 'home_contact_page',
    'posts_per_page' => 1,
);

$home_contact_page_query = new WP_Query($args_home_contact_page);

// Display the "Home Contact Page" section
?>
<section class="home-contact-page">
    <?php
    // Display custom fields for the "home_contact_page" post
    if ($home_contact_page_query->have_posts()) {
        while ($home_contact_page_query->have_posts()) {
            $home_contact_page_query->the_post();
            $contact_title = get_post_meta( get_the_ID(), '_contact_title', true );
            $contact_email = get_post_meta( get_the_ID(), '_contact_email', true );
            $contact_fax = get_post_meta( get_the_ID(), '_contact_fax', true );
            $contact_phone = get_post_meta( get_the_ID(), '_contact_phone', true );
            ?>
            <article id="contact-info" class="contact-box">
                <h3 class="contact-page-title"><?php echo esc_html( $contact_title ); ?></h3>
                <hgroup class="contact-page-info">
                    <h4>Email</h4>
                    <div><a href="mailto:<?php echo esc_attr( $contact_email ); ?>"><?php echo esc_html( $contact_email ); ?></a></div>
                    <h4>Fax</h4>
                    <div><?php echo esc_html( $contact_fax ); ?></div>
                    <h4>Phone</h4>
                    <div><?php echo esc_html( $contact_phone ); ?></div>
                </hgroup>
            </article>
            <?php
        }
        wp_reset_postdata();
    }
    ?>

    <article id="contact-form" class="contact-box">
        <form class="cmxform" id="commentForm" method="post">
            <input type="hidden" name="submitted" id="submitted" value="true" />
            <div class="contact">
                <div class="contact-form-field"><input type="text" placeholder="Name" id="name" name="name" value="" /></div>
            </div>
            <div class="contact">
                <div class="contact-form-field"><input type="text" placeholder="Email" id="email" name="email" value="" /></div>
            </div>
            <div class="contact">
                <div class="contact-form-field"><input type="text" placeholder="Subject" id="subject" name="subject" value="" /></div>
            </div>
            <div class="contact">
                <div class="contact-form-field" id="contact-form-field"><textarea placeholder="Message" name="message" id="message"></textarea></div>
            </div>
            <div class="contact">
                <div class="g-recaptcha" data-sitekey="6LfEuyEUAAAAAEztgLy082rI3iiatrbe1S-dPO2V" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
            </div>
            <div class="contact-form-submit">
                <button class="button" type="submit" name="submit">Submit</button>
            </div>
        </form>
    </article>
</section>
  
<?php $args_contact_image = array(
    'post_type' => 'contact_image',
    'posts_per_page' => 1,
);

$contact_image_query = new WP_Query($args_contact_image);

// Display the "Contact Image" section
?>
<section class="contact-image">
    <?php
    // Display custom fields for the "contact_image" post
    if ($contact_image_query->have_posts()) {
        while ($contact_image_query->have_posts()) {
            $contact_image_query->the_post();
            $contact_image_url = get_post_meta( get_the_ID(), '_contact_image_url', true );
            ?>
            <img src="<?php echo esc_url( $contact_image_url ); ?>" alt="El Khalil Foundation" title="El Khalil Foundation" />
            <?php
        }
        wp_reset_postdata();
    }
    ?>
</section>
<?php get_footer(); ?>
    <!-- <section class="news-events-holder">
    	<article id="news-events-title" class="news-events-b">
        	<h3 class="page-title1">News &amp; Events</h3>
            <div class="home-submit1">
                <a href="https://elkhalilfoundation.org:443/News" title="News &amp; Events">
                <div class="button">View All</div>
                </a>
            </div>
        </article>
        <article id="news-events-listing" class="news-events-b">
			                <a href="https://elkhalilfoundation.org:443/News/2344198240">
                <article class="news-events-box">
                	<hgroup>
                        <h2>News / Feb 17, 2019</h2>
                        <h5>Education For All</h5>
                        <div class="news-events-info"></div>
                    </hgroup>
                </article>
                </a>
                            <a href="https://elkhalilfoundation.org:443/News/7851187070">
                <article class="news-events-box">
                	<hgroup>
                        <h2>News / Feb 04, 2019</h2>
                        <h5>Launching "LEC" Program</h5>
                        <div class="news-events-info">El Khalil Foundation announces the programme "Learn English Connect" in partnership with...</div>
                    </hgroup>
                </article>
                </a>
            			                <a href="https://elkhalilfoundation.org:443/Events/9227181980">
                <article class="news-events-box">
                	<hgroup>
                    	<h2>Events / Feb 17, 2019</h2>
                    	<h5>Supporting the learning and logical difficulties and the mobility of children"</h5>
                    	<div class="news-events-info">El Khalil Foundation and Besme International Humanitarian Assistance Group held a seminar entitled...</div>
                    </hgroup>
                </article>
                </a>
                            <a href="https://elkhalilfoundation.org:443/Events/8468179676">
                <article class="news-events-box">
                	<hgroup>
                    	<h2>Events / Feb 09, 2019</h2>
                    	<h5>Cooperation between MUBS and El Khalil Foundation</h5>
                    	<div class="news-events-info">Signed cooperation between Mubs And El Khalil Foundation.</div>
                    </hgroup>
                </article>
                </a>
                    </article>
    </section> -->
    
	<!-- <section class="instagram-feed">
	<article class="instagram-details">
    	<h3 class="services-title">Instagram Feed</h3>
        <div class="services-text">El Khalil Foundation Empowering Society within the District of Hasbaya and the Southern region of Lebanon.</div>
                <div class="home-submit">
            <a href="https://www.instagram.com" title="Instagram Feed" target="_blank">
            <div class="button">Follow Us</div>
            </a>
        </div>
            </article>
    <article class="instagram-listing">
    	    </article>
</section> -->

<!-- <section class="home-contact-page">
    <article id="contact-info" class="contact-box">
        <h3 class="contact-page-title">GET IN TOUCH</h3>
        <hgroup class="contact-page-info">
            <h4>Email</h4>
            <div><a href="mailto:info@elkhalilfoundation.org">info@elkhalilfoundation.org</a></div>
            <h4>Fax</h4>
            <div>00961 1 810 973</div>
            <h4>Phone</h4>
            <div>00961 1 866 565- 07 551 410</div>
        </hgroup>
    </article>
    <article id="contact-form" class="contact-box">
    
                <form class="cmxform" id="commentForm" method="post">
        <input type="hidden" name="submitted" id="submitted" value="true" />
        <div class="contact">
            <div class="contact-form-field"><input type="text" placeholder="Name" id="name" name="name" value="" /></div>
        </div>
        <div class="contact">
        <div class="contact-form-field"><input type="text" placeholder="Email" id="email" name="email" value="" /></div>
        </div>
        <div class="contact">
        <div class="contact-form-field"><input type="text" placeholder="Subject" id="subject" name="subject" value="" /></div>
        </div>
        <div class="contact">
        <div class="contact-form-field" id="contact-form-field"><textarea placeholder="Message" name="message" id="message"></textarea></div>
        </div>
        <div class="contact">
        <div class="g-recaptcha" data-sitekey="6LfEuyEUAAAAAEztgLy082rI3iiatrbe1S-dPO2V" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
        </div>
        <div class="contact-form-submit">
            <button class="button" type="submit" name="donate">Submit</button>
        </div>
        </form>
    
    </article>
</section> -->
<!-- <section class="contact-image"><img src="https://elkhalilfoundation.org:443/images/contact-bg.png" alt="El Khalil Foundation" title="El Khalil Foundation" /></section> -->
