<?php

	if( !defined( 'ABSPATH' ) ){
	    exit;
	}

	function advncps_register_post_type() {		

		# Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Advanced Carousel Post Sliders', 'Post Type General Name' ),
			'singular_name'       => _x( 'Advanced Carousel Post Slider', 'Post Type Singular Name' ),
			'menu_name'           => __( 'Advanced Carousel Post Slider' ),
			'parent_item_colon'   => __( 'Parent Post Slider' ),
			'all_items'           => __( 'All Post Slider' ),
			'view_item'           => __( 'View Post Slider' ),
			'add_new_item'        => __( 'Add New Post Slider' ),
			'add_new'             => __( 'Add Post Slider' ),
			'edit_item'           => __( 'Edit Post Slider' ),
			'update_item'         => __( 'Update Post Slider' ),
			'search_items'        => __( 'Search Post Slider' ),
			'not_found'           => __( 'Not Found' ),
			'not_found_in_trash'  => __( 'Not found in Trash' )
		);
		
		# Set other options for Custom Post Type...
		$args = array(
			'labels'              => $labels,
			'label'               => __( 'advanced-carousel-post-slider' ),
			'description'         => __( 'Advanced Carousel Post Slider news and reviews' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'supports'            => array( 'title' ),
			'menu_icon'		      => 'dashicons-images-alt2'	
		);
		register_post_type( 'advncps', $args );
	}
	add_action( 'init', 'advncps_register_post_type', 0 );


	function advncps_add_shortcode_column( $columns ) {
	 return array_merge( $columns, 
	  array( 
	  		'shortcode' 	=> __( 'Shortcode', 'advanced-carousel-post-slider' ),
	  		'doshortcode' 	=> __( 'Template Shortcode', 'advanced-carousel-post-slider' ) )
	   );
	}
	add_filter( 'manage_advncps_posts_columns' , 'advncps_add_shortcode_column' );


	function advncps_shortcode_display( $advcps_column, $post_id ) {
	 if ( $advcps_column == 'shortcode' ){
	?>
	  <input style="background:#ddd" type="text" onClick="this.select();" value="[advncps_controller <?php echo 'id=&quot;'.$post_id.'&quot;';?>]" />
	  <?php  	  
	}

 	if ( $advcps_column == 'doshortcode' ){
  	?>

  	<textarea cols="40" rows="2" style="background:#ddd;" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[advncps_controller id='; echo "'".$post_id."']"; echo '"); ?>'; ?></textarea>
  	<?php    
 	}
}	
add_action( 'manage_advncps_posts_custom_column' , 'advncps_shortcode_display', 10, 2 );