<?php

//
//  Custom Child Theme Functions
//

// I've included a "commented out" sample function below that'll add a home link to your menu
// More ideas can be found on "A Guide To Customizing The Thematic Theme Framework" 
// http://themeshaper.com/thematic-for-wordpress/guide-customizing-thematic-theme-framework/

// Adds a home link to your menu
// http://codex.wordpress.org/Template_Tags/wp_page_menu

function childtheme_menu_args($args) {
    $args = array(
        'show_home' => 'Hjem',
        'sort_column' => 'menu_order',
        'menu_class' => 'menu',
        'echo' => true
    );
	return $args;
}
add_filter('wp_page_menu_args','childtheme_menu_args');

// Add the favicon
function childtheme_favicon() { ?>
    <link rel="shortcut icon" href="http://spilltelegrafen.no/wp-content/themes/spilltelegrafen/favicon.ico">
<?php }

add_action('wp_head', 'childtheme_favicon');

// Adds the header image.
function add_header_image() { 
?>
		<div class="logopic" style="float: left; width: 60px"><img src="http://spilltelegrafen.no/wp-content/themes/spilltelegrafen/NES_SMALL.jpg" /></div>
				<div style="float: left">
<?php
}
add_filter('thematic_header', 'add_header_image', 3);

// And closes the div
function add_header_end() { 
?>
</div><br /><br /><br />
<?php
}
add_filter('thematic_header', 'add_header_end', 6);

/*
function add_beta() {
?>
		<div style="font-family:Helvetica,Arial,sans-serif;color:#ccc;font-size:18px">beta</div>
<?php
}
add_filter('thematic_header', 'add_beta', 4);
*/

// Add a link to the forum
 function add_childtheme_forum_link($args) {
	$args .= '<li><a href="http://forum.spilltelegrafen.no">Forum</a></li>';
	return $args;
	}
add_filter('wp_list_pages','add_childtheme_forum_link');

// Generate footer code
 function childtheme_footer($thm_footertext) {
	$cats = wp_list_categories("title_li=");
	$date = date('Y');
    $blog_name = get_bloginfo('name');
	
    $thm_footertext = sprintf(
	'<div id="keepreading">Les mer om: </div><ul>%s</ul>
    <p><a href="http://creativecommons.org/licenses/by/3.0/deed.no">CC-BY</a> %s %s | Drevet av <a href=�http://wordpress.org/�>WordPress</a> | Bygget p&aring; <a href="http://themeshaper.com/thematic/">Thematic Theme Framework</a></p>',
    $cats, $date, $blog_name);
    return $thm_footertext;
}
add_filter('thematic_footertext', 'childtheme_footer');


?>