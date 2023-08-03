<!-- <section class="services-content-home" style="background:url(<?php echo get_template_directory_uri(); ?>/uploads/home_services/1493911124OUR-SERVICES-HOMEPAGE.jpg);background-repeat:no-repeat;background-position:center top;background-size:cover;">
    <article>
        <div class="services-text-holder">
            <h3 class="services-title">Our Programs</h3>
            <div class="services-text">
                <?php echo get_theme_mod('services_content_text'); ?>
            </div>
            <div class="home-submit">
                <a href="<?php echo esc_url(get_theme_mod('services_link_url')); ?>" title="Our Programs">
                    <div class="button"><?php echo esc_html(get_theme_mod('services_link_text')); ?></div>
                </a>
            </div>
        </div>
        <hgroup class="our-services">
            <?php
            $services = array(
                'service_1' => array(
                    'title' => get_theme_mod('service_1_title'),
                    'text'  => get_theme_mod('service_1_text'),
                ),
                'service_2' => array(
                    'title' => get_theme_mod('service_2_title'),
                    'text'  => get_theme_mod('service_2_text'),
                ),
                'service_3' => array(
                    'title' => get_theme_mod('service_3_title'),
                    'text'  => get_theme_mod('service_3_text'),
                ),
            );

            foreach ($services as $service_id => $service) {
                echo '<style>';
                echo '.statement-title{position:relative;}';
                echo '#' . esc_attr($service_id) . ':before{content:"1";position:absolute;top:-15px;left:-45px;font-family: \'Roboto-Black\'; font-size:3rem;color:#d8d1ca;}';
                echo '@media screen and (max-width: 1100px) {';
                echo '#' . esc_attr($service_id) . ':before{top:-4px;left:-30px;font-size:2.8rem;}';
                echo '}';
                echo '</style>';
                echo '<h2 class="statement-title" id="' . esc_attr($service_id) . '">' . esc_html($service['title']) . '</h2>';
                echo '<div class="statement-text">' . esc_html($service['text']) . '</div>';
            }
            ?>
        </hgroup>
    </article>
</section> -->
<!-- <section class="services-content-home" style="background:url(<?php echo esc_url(get_theme_mod('our_program_background_image', 'https://elkhalilfoundation.org:443/uploads/home_services/1493911124OUR-SERVICES-HOMEPAGE.jpg')); ?>);background-repeat:no-repeat;background-position:center top;background-size:cover;">
    <article>
        <div class="services-text-holder">
            <h3 class="services-title"><?php echo esc_html(get_theme_mod('our_program_title', 'Our Programs')); ?></h3>
            <div class="services-text"><?php echo wp_kses_post(get_theme_mod('our_program_subtitle', '')); ?></div>
            <div class="home-submit">
                <a href="<?php echo esc_url(get_permalink(get_page_by_title('Our Programs'))); ?>" title="<?php echo esc_attr(get_theme_mod('our_program_button_text', 'Our Programs')); ?>">
                    <div class="button"><?php echo esc_html(get_theme_mod('our_program_button_text', 'Learn More')); ?></div>
                </a>
            </div>
        </div>
        <hgroup class="our-services">
        <?php
            $args = array(
                'post_type' => 'services',
                'posts_per_page' => 3, // Show 3 services, change as needed
            );

            $services_query = new WP_Query($args);
            $services_counter = 1;

            while ($services_query->have_posts()) : $services_query->the_post();
                $service_title = get_the_title();
                $service_text = get_the_content();
            ?>
                <style>
                    .statement-title{position:relative;}
                    #service_<?php echo esc_attr($services_counter); ?>:before {
                        content: "<?php echo esc_html($services_counter); ?>";
                        position: absolute;
                        top: -15px;
                        left: -45px;
                        font-family: 'Roboto-Black';
                        font-size: 3rem;
                        color: #d8d1ca;
                    }
                    @media screen and (max-width: 1100px) {
                        #service_<?php echo esc_attr($services_counter); ?>:before {
                            top: -4px;
                            left: -30px;
                            font-size: 2.8rem;
                        }
                    }
                </style>
                <h2 class="statement-title" id="service_<?php echo esc_attr($services_counter); ?>"><?php echo esc_html($service_title); ?></h2>
                <div class="statement-text"><?php echo wp_kses_post($service_text); ?></div>
            <?php
                $services_counter++;
            endwhile;
            wp_reset_postdata();
            ?>
        </hgroup>
    </article>
</section>
 -->
 
    <!-- <section class="services-content-home" style="background:url(<?php echo get_stylesheet_directory_uri(); ?>/uploads/home_services/1493911124OUR-SERVICES-HOMEPAGE.jpg);background-repeat:no-repeat;background-position:center top;background-size:cover;">
  <article>
    <div class="services-text-holder">
      <h3 class="services-title"><?php echo get_theme_mod('custom_theme_programs_title', 'Our Programs'); ?></h3>
      <div class="services-text">
      <?php echo get_theme_mod('custom_theme_programs_text', 'As a result of the circumstances that has afflicted the District, people living in the District lack various resources and knowledge on different subjects, which will requires direct involvement, training and exposure in the areas that we have focused on as our objectives.<br />Furthermore, we will be exploring and assisting in the development of programs that will enable participants to become self-sufficient economically.<br />'); ?>
      </div>
      <div class="home-submit">
        <a href="<?php echo get_theme_mod('custom_theme_programs_link', 'https://elkhalilfoundation.org:443/Services'); ?>" title="Our Programs">
          <div class="button">Learn More</div>
        </a>
      </div>
    </div>
    <hgroup class="our-services">
      <?php
      $args = array('post_type' => 'program', 'posts_per_page' => -1);
      $programs = new WP_Query($args);

      if ($programs->have_posts()) :
        $service_number = 1;
        while ($programs->have_posts()) :
          $programs->the_post();
          // Get the service title and content from custom field
          $service_title = get_post_meta(get_the_ID(), 'custom_theme_service_title', true);
          $service_content = get_post_meta(get_the_ID(), 'custom_theme_service_content', true);
      ?>
          <h2 class="statement-title" id="service_<?php echo $service_number; ?>">
            <span class="service-number"><?php echo $service_number; ?></span>
            <?php echo esc_html($service_title); ?>
          </h2>
          <div class="statement-text"><?php echo wpautop(esc_html($service_content)); ?></div>
      <?php
          $service_number++;
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </hgroup>
  </article>
</section> -->