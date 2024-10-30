<?php 

if ( ! defined( 'ABSPATH' ) )
	exit; # Exit if accessed directly

# shortocde
function advcps_post_query( $atts, $content = null ){
	$atts = shortcode_atts(
		array(
			'id' => "",
			), $atts );
	global $post;	
	$postid = $atts['id'];

	$advncps_set_cat        			= get_post_meta( $postid, 'advncps_set_cat', true );
	$advncps_cat_name       			= get_post_meta( $postid, 'advncps_cat_name', true );
	$advncps_order_cat      			= get_post_meta( $postid, 'advncps_order_cat', true );
	$advncps_theme_id       			= get_post_meta( $postid, 'advncps_theme_id', true );
	$advncps_image_size     			= get_post_meta( $postid, 'advncps_image_size', true );
	$advncps_img_width      			= get_post_meta( $postid, 'advncps_img_width', true ); 
	$advncps_img_height     			= get_post_meta( $postid, 'advncps_img_height', true ); 	
	$advncps_title          			= get_post_meta( $postid, 'advncps_title', true );
	$advncps_show_date      			= get_post_meta( $postid, 'advncps_show_date', true );
	$advncps_show_excerpt   			= get_post_meta( $postid, 'advncps_show_excerpt', true );
	$advncps_excerpt_lenght 			= get_post_meta( $postid, 'advncps_excerpt_lenght', true );
	$advncps_btn_readmore 				= get_post_meta( $postid, 'advncps_btn_readmore', true );
	$advncps_nav_text_color 			= get_post_meta( $postid, 'advncps_nav_text_color', true );	
	$advncps_nav_bg_color   			= get_post_meta( $postid, 'advncps_nav_bg_color', true );
	$advncps_pagination_color 			= get_post_meta( $postid, 'advncps_pagination_color', true );
	$advncps_pagination_bg_color		= get_post_meta( $postid, 'advncps_pagination_bg_color', true );

	$newarr 							=  array();
	$num 								= count( $advncps_cat_name );
	for( $j=0; $j<$num; $j++ ){
		array_push( $newarr, $advncps_cat_name[$j] );
	}
	 
  	$args = array(
      'post_type'       => 	'post',     
      'posts_per_page'  => -1,
      'category__in'    => $newarr,
      'orderby'	   	    => $advncps_order_cat,	
    );

  	$query = new WP_Query( $args );	    
	
	switch ( $advncps_theme_id ) {
	    case '1':
	        require_once( ADVNCPS_PLUGIN_DIR.'themes/theme-1.php' );
	        break;
	    case '2':
	        require_once( ADVNCPS_PLUGIN_DIR.'themes/theme-2.php' );
	        break;
	    case '3':
	        require_once( ADVNCPS_PLUGIN_DIR.'themes/theme-3.php' );
	        break;    
	} 

	return $content; 			
}
add_shortcode( 'advncps_controller', 'advcps_post_query' );




