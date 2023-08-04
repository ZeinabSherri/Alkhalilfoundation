
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="MobileOptimized" content="320" />
    <meta content="telephone=no" name="format-detection" />
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <meta name="Description" content="<?php bloginfo('description'); ?>" />
    <meta name="Keywords" content="El Khalil Foundation,foundation,empowering society,Non-Profit NGO,Hasbaya District,hasbaya,youth development & leadership" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" />
    <link rel="canonical" href="<?php echo esc_url(home_url()); ?>" />
    <link rel="alternate" hreflang="en" href="<?php echo esc_url(home_url()); ?>" />
    
<?php wp_head(); ?>
    
 <script>var test="https://elkhalilfoundation.org:443/";var test1="https://elkhalilfoundation.org:443/";</script>
<script type="text/javascript" src="https://elkhalilfoundation.org:443/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://elkhalilfoundation.org:443/js/modernizr.custom.67980.js"></script>

<script type="text/javascript" src="https://elkhalilfoundation.org:443/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="https://elkhalilfoundation.org:443/js/jquery.waitforimages.js"></script>

    <script type="text/javascript" src="https://elkhalilfoundation.org:443/scripts/jquery.validate.js"></script>


<script type="text/javascript" src="https://elkhalilfoundation.org:443/manage.js"></script>
<script>
$(document).ready(function(){
	$('body').waitForImages(true).done(function() {
					load1=1; load2=1; loadhome('2');
			});
});
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-102326149-1', 'auto');
  ga('send', 'pageview');

</script></head>
<body>
	 <div class="header_navigationInner-mobile">
     <a id="nav-toggle" ><span></span></a>
     <a class="mob_logo" href="https://elkhalilfoundation.org:443/El-Khalil-Foundation">
        <?php  $custom_logo_id = get_theme_mod('theme_logo');
    if ($custom_logo_id) {
        $custom_logo = wp_get_attachment_image_src($custom_logo_id, 'full');
        if ($custom_logo) {
            echo '<img src="' . esc_url($custom_logo[0]) . '" alt="El Khalil Foundation" title="El Khalil Foundation" />';
        }
    } ?>    <!-- <img src="https://elkhalilfoundation.org:443/images/logo.png" alt="El Khalil Foundation" title="El Khalil Foundation" /> -->
        </a>
     <nav class="mobile-navigation">
   
        <ul class="mob_menu">             
            <li><a href="https://elkhalilfoundation.org:443/El-Khalil-Foundation" title="Home" class="mob_menu_item active">Home</a></li>
            <li><a href="https://elkhalilfoundation.org:443/About" title="About" class="mob_menu_item">About</a></li>
            <li><a href="https://elkhalilfoundation.org:443/Services" title="Programs" class="mob_menu_item">Programs</a></li>
            <li><a href="javascript:void(0)" onclick="openSub()" id="mob_menu_item" yes="0" class="mob_menu_item">News &amp; Events</a>
            	<ul class="sub-distance-mob">
                    <li><a href="https://elkhalilfoundation.org:443/News" title="Programs">News</a></li>
                    <li><a href="https://elkhalilfoundation.org:443/Events" title="Programs">Events</a></li>
                </ul>
            </li>
            <li><a href="https://elkhalilfoundation.org:443/Contact" title="2017 EL KHALIL FOUNDATION - All Rights Reserved" class="mob_menu_item">Contact</a></li>
            <li>
            	<div class="follow-us">Follow Us</div>
                <div class="follow-us-social">
                    <a href="https://www.facebook.com" title="Facebook" class="menu_item-social" target="_blank">                    <div class="facebook-mob"></div>
                    </a>                </div>
                <div class="follow-us-social">
                	<a href="https://www.instagram.com" title="Instagram" class="menu_item-social" target="_blank">                    <div class="instagram-mob"></div>
                    </a>                </div>
                <div class="mobile-language">
                	<div class="mobile-language-title">
                    <a href="https://elkhalilfoundation.org:443/ar/" title="العربية">
					العربية                    </a>
                    </div>
                    <div class="mobile-language-sep"></div>
                	<div class="mobile-language-title">
                    <a href="https://elkhalilfoundation.org:443/" title="ENGLISH">
					ENGLISH                    </a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
   
</div>
<header>
	<div class="top_header">
    	<div class="top_header_holder">
        	<div class="top_header-inner">
            <div class="top_header-menu">
            <?php
 $args = array(
    'theme_location' => 'custom_menu',
    'container'      => 'div',
    'container_class' => 'top_header-menu', // Add your container class 'top_header-menu'
    'menu_class'     => 'menu', // Add your menu class 'menu'

    'echo'           => false,
);

$menu = wp_nav_menu($args);

// Output the menu
echo $menu;



    
    ?>
</div>
            	<!-- <div class="top_header-menu">
                	 <ul class="menu">
                        <li class="distance">
                            
                        <a href="https://elkhalilfoundation.org:443/El-Khalil-Foundation" title="Home" class="menu_item active"><img src="https://elkhalilfoundation.org:443/images/logo.png" alt="El Khalil Foundation" title="El Khalil foundation"/></a></li>
                        <li class="distance"><a href="https://elkhalilfoundation.org:443/About" title="About" class="menu_item">About<div class="menu-border-top"></div></a></li>
                        <li class="distance"><a href="https://elkhalilfoundation.org:443/Services" title="Programs" class="menu_item">Programs<div class="menu-border-top"></div></a></li>
                        <li class="distance">
                        	<a href="javascript:void(0)" title="News &amp; Events" class="menu_item">News &amp; Events<div class="menu-border-top"></div></a>
                        	<ul class="sub-distance">
                            	<li><a href="https://elkhalilfoundation.org:443/News" title="Programs">News</a></li>
                            	<li><a href="https://elkhalilfoundation.org:443/Events" title="Programs">Events</a></li>
                            </ul>
                        </li>
                        <li class="distance"><a href="https://elkhalilfoundation.org:443/Contact" title="Contact" class="menu_item">Contact<div class="menu-border-top"></div></a></li>    
                    </ul> 
                   
                </div> -->
                <div class="top_header-social">
                	<ul class="menu">
                        <li class="distance-social">
                        <a href="https://elkhalilfoundation.org:443/ar/" title="العربية" class="menu_item-lang">
                        العربية                        </a>
                        </li>
                        <li class="distance-social"><div class="lang-sep"></div></li>
                        <li class="distance-social">
                        <a href="https://elkhalilfoundation.org:443/" title="ENGLISH" class="menu_item-lang">
						ENGLISH                        </a>
                        </li>
                        <li class="distance-social">
                        <a href="https://www.instagram.com" title="Instagram" class="menu_item-social" target="_blank">                        <div class="top-instagram"></div>
                        </a>                        </li>
                        <li class="distance-social">
                        <a href="https://www.facebook.com" title="Facebook" class="menu_item-social" target="_blank">                        <div class="top-facebook"></div>
                        </a>                        </li>
                        <li class="distance-social">Follow Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        <section class="ekf-banner" id="ekf-banner">    
        <article class="banner-slideshow" id="banner-slideshow">
            <ul id="maximage">
                                    <li class="sp-slide" style="background-image: url('https://elkhalilfoundation.org:443/uploads/banners/p1b8edp1ge9dm1e67149m1h2q1d2t4.jpg')"></li>
                                    <li class="sp-slide" style="background-image: url('https://elkhalilfoundation.org:443/uploads/banners/p1b8efhgs8pdd1ffgbk912jkan44.jpg')"></li>
                                            </ul>
        </article>
                <hgroup>
            <h1>Empowering Society</h1>
            <span>Since 2003</span>
        </hgroup>
                        <!--<nav>
            <a href="#"><span id="prev"><img src="https://elkhalilfoundation.org:443/images/prev.png" /></span></a> 
            <a href="#"><span id="next"><img src="https://elkhalilfoundation.org:443/images/next.png" /></span></a>
        </nav>-->
            </section>
	    
</header>    