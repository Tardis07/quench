<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @author Javis <javismay@gmail.com>
 * @license MIT
 */
?>
<!DOCTYPE html>
<html <?php if( dopt('d_autospace_b') != '' ) echo 'class="han-la"';?>>
<head>
	<title>
	<?php
	if(is_front_page() || is_home()) {
		bloginfo('name');
	} else if(is_single() || is_page()) {
		 wp_title('');
	} else if(is_category()) {
		printf(__('Category Archives: %1$s', 'quench' ), single_cat_title('', false));
	} else if(is_search()) {
		printf(__('Search Result: %1$s', 'quench' ), wp_specialchars($s, 1));
	} else if(is_tag()) {
		printf(__('Tag Archives: %1$s', 'quench' ), single_tag_title('', false));
	} else if(is_date()) {
		$title = '';
		if(is_day()) {
			$title = get_the_time('Y年n月j日');
		} else if(is_year()) {
			$title = get_the_time('Y年');
		} else {
			$title = get_the_time('Y年n月');
		}
		printf('%1$s的文章存档', $title);
	} else {
		bloginfo('name');
	}
	?>
	</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
	<?php if( dopt('d_headcode_b') != '' ) echo dopt('d_headcode');?>
</head>


<body class="nav-open">
<?php
	if( is_mobile() ) {
	echo '<div id="mobile-nav" class="f12 yahei"><form class="mm-search" action="'.get_bloginfo('url').'" method="get" role="search"><input type="text" autocomplete="off" placeholder="Search" name="s" value=""><input id="mobilesubmit" type="submit" value="Search"></form> ';
	if(function_exists('wp_nav_menu')) {
						wp_nav_menu(array( 'theme_location' => 'header-menu','container' => 'ul', 'menu_class' => 'nav'));
					}
	echo '</div>';
	}
?>
	<div id="bg-over"></div>
	<div id="wrap">
        <div id="preheader"><?php echo dopt('d_notice');?></div>
        <header id="header" class="clearfix">
			<div class="head">
				<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name')?></a></h1>
				<p class="desc yahei"><span><?php bloginfo('description')?></span></p>
			</div>

			<?php
				if( !is_mobile() ) {
					echo '<nav id="main-nav" class="clearfix yahei">';
					if(function_exists('wp_nav_menu')) {
						wp_nav_menu(array( 'theme_location' => 'header-menu','container' => 'ul', 'menu_class' => 'nav'));
					}
					echo '</nav>';
				} else {
				  echo '<a href="javascript:;" class="open-nav icon-list"><i class="fa fa-bars"></i></a>';
				}
			?>

			<div id="announcement">
				<a href="#" class="openpre close" title="Announcement"><i class="fa fa-star"></i></a>
			</div>
		</header>

        <div id="container" class="clearfix">
            <div id="content">
				<div <?php body_class();?>>
