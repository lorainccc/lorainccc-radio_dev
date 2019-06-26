<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package LCCC Framework
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script src="https://code.jquery.com/jquery-latest.js"></script>
	<script>
	(function($)
{
	$(document).ready(function()
	{
	$('#nowplaying').load('<?php echo get_stylesheet_directory_uri(); ?>/nowplay.php');
	});
})(jQuery);

(function($)
{
    $(document).ready(function()
    {
		setInterval(function()
        {
            $('#nowplaying').load('<?php echo get_stylesheet_directory_uri(); ?>/nowplay.php');
        }, 30000);
    });
})(jQuery);
	</script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PWJL5TQ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="page" class="hfeed site">
	<a class="show-on-focus hide-for-print" href="#content"><?php esc_html_e( 'Skip to content', 'lccc-framework' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
	<div class="row show-for-small-only mobile-nav-bar">
    <div class="small-8 columns"> <a href="/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/lccclogo_white.svg" alt="LCCC Logo" width="165" height="31.875" /></a> </div>
    <div class="small-2 columns clearfix"> <span data-responsive-toggle="mobile-search" data-hide-for="medium"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/magnifying-glass.svg" height="25" width="25" alt="Search the LCCC Website" class="float-right" data-toggle/></span> </div>
    <div class="small-2 columns"> <span data-responsive-toggle="responsive-menu" data-hide-for="medium">
      <button class="menu-icon" type="button" data-toggle></button>
      </span> </div>
  </div>
		<div class="row">
    <div class="hide-for-small-only large-6 medium-6 columns"><a href="/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/LCCC-Logo.png" height="70" width="325" alt="Lorain County Community College Logo" /></a>  </div>
    <div id="responsive-shortcuts" class="hide-for-small large-6 medium-6 columns">
			<div class="row">
				<div class="hide-for-small-only medium-12 columns">
     									<?php
          wp_nav_menu(array(
											'container' => false,
											'menu' => __( 'Header Shortcuts Menu', 'textdomain' ),
											'menu_class' => 'menu align-right',
											'theme_location' => 'header-shortcuts',
											//'items_wrap'      => '<ul id="%1$s header-menu" class="%2$s">%3$s</ul>',
           						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
           ));
											?>
				</div>
				<div id="mobile-search" class="small-12 medium-9 medium-offset-3 columns searchbox hide-for-print">
						<?php if ( is_active_sidebar( 'lccc-search-sidebar' ) ) { 
																		dynamic_sidebar( 'lccc-search-sidebar' ); 
										}		?>
				</div><!-- End Search box -->
		 	</div>
    </div>
	</div>
<!-- <div class="medium-blue-bg show-for-medium"> -->
<div id="responsive-menu" class="medium-blue-bg">
			<nav class="menu-centered" role="navigation" aria-label="Main Menu">
								<?php
				wp_nav_menu(array(
										'container' => false,
										'menu' => __( 'Primary', 'textdomain' ),
										'menu_class' => 'dropdown menu',
										'theme_location' => 'primary',
										'items_wrap'      => '<ul id="%1$s" class="%2$s" role="menubar" data-dropdown-menu>%3$s</ul>',
										//Recommend setting this to false, but if you need a fallback...
										'fallback_cb' => 'lc_topbar_menu_fallback',
										'walker' => new lc_top_bar_menu_walker,
											));
										?>
			</nav>
  </div>
		</div>
	</header><!-- #masthead -->

	<div id="content" tabindex="0" class="site-content">