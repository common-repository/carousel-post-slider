<?php

	if( !defined( 'ABSPATH' ) ){
	    exit;
	}

function advncps_register_meta_boxes() {

	$a = array( 'advncps' );
    add_meta_box( 
        'custom_meta_box_id',                                   		# Metabox
        __( 'Content Settings', 'advanced-carousel-post-slider' ),      # Title
        'advncps_display_post_type',                            		# Call Back func
       	$a,                                         					# post type
        'normal'                                                		# Text Content
    );

    add_meta_box( 
        'custom_meta_box_set',                                  		# Metabox
        __( 'Slider Settings', 'advanced-carousel-post-slider' ),       # Title
        'advncps_settings_func',                                		# all Back func
       	$a,                                         					# post type
        'normal'                                                		# Text Content
    );    

}
add_action( 'add_meta_boxes', 'advncps_register_meta_boxes' );

# Call Back Function...
function advncps_display_post_type( $post, $args ){

	#Call get post meta.
	$advncps_set_cat 			  	= get_post_meta( $post->ID, 'advncps_set_cat', true );
	$advncps_cat_name 			  	= get_post_meta( $post->ID, 'advncps_cat_name', true );
	$advncps_content_info         	= get_post_meta( $post->ID, 'advncps_content_info', true );
	$advncps_post_tag             	= get_post_meta( $post->ID, 'advncps_post_tag', true );
	$advncps_tag_color       		= get_post_meta( $post->ID, 'advncps_tag_color', true );
	$advncps_theme_id 			  	= get_post_meta( $post->ID, 'advncps_theme_id', true );
	$advncps_order_cat 			  	= get_post_meta( $post->ID, 'advncps_order_cat', true );
	$advncps_show_hide				= get_post_meta( $post->ID, 'advncps_show_hide', true );
	$advncps_image_size 		  	= get_post_meta( $post->ID, 'advncps_image_size', true );
	$advncps_img_width            	= get_post_meta( $post->ID, 'advncps_img_width', true );
	$advncps_img_height           	= get_post_meta( $post->ID, 'advncps_img_height', true );
	$advncps_title 			  		= get_post_meta( $post->ID, 'advncps_title', true );
	$advncps_show_date 		  		= get_post_meta( $post->ID, 'advncps_show_date', true );
	$advncps_show_excerpt 	  		= get_post_meta( $post->ID, 'advncps_show_excerpt', true );
	$advncps_excerpt_lenght 	  	= get_post_meta( $post->ID, 'advncps_excerpt_lenght', true );
	$advncps_btn_readmore         	= get_post_meta( $post->ID, 'advncps_btn_readmore', true );
	$advncps_font_size 			  	= get_post_meta( $post->ID, 'advncps_font_size', true );
	$advncps_heading_cpicker 		= get_post_meta( $post->ID, 'advncps_heading_cpicker', true );
	$advncps_content_color          = get_post_meta( $post->ID, 'advncps_content_color', true ); 
	$advncps_date_text_cpicker 		= get_post_meta( $post->ID, 'advncps_date_text_cpicker', true );
	$advncps_date_cpicker    		= get_post_meta( $post->ID, 'advncps_date_cpicker', true );
	$advncps_img_opc_color          = get_post_meta( $post->ID, 'advncps_img_opc_color', true );
	$opacity                		= get_post_meta( $post->ID, 'opacity', true );
	$advncps_excerpt_color          = get_post_meta( $post->ID, 'advncps_excerpt_color', true );
?>
<div class="wrap">
	<table class="form-table">

		<tr valign="top">
			<th scope="row">
				<label for="advncps_set_cat"><?php esc_html_e('Post Type', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="advncps_set_cat" id="advncps_set_cat" class="timezone_string">
					<option value="post" <?php if ( isset ( $advncps_set_cat ) ) selected( $advncps_set_cat, 'post' ); ?>><?php esc_html_e('Post', 'advanced-carousel-post-slider'); ?></option>
				</select>
			</td>
		</tr>
		<!-- End Post Type -->

		<tr valign="top">
			<th scope="row">
				<label for="advncps_cat_name"><?php esc_html_e('Categories', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<ul>			
					<?php
						$categories = get_categories( array( 'hide_empty' => true ) );
						foreach( $categories as $category ):
						    $cat_id  = $category->cat_ID;
						    $checked = ( in_array($cat_id,(array)$advncps_cat_name )? ' checked="checked"': "" );
						    echo'<li id="cat-'.esc_attr($cat_id).'"><input type="checkbox" name="advncps_cat_name[]" id="'.esc_attr($cat_id).'" value="'.esc_attr($cat_id).'"'.$checked.'> <label for="'.$cat_id.'">'.__( $category->name, 'advanced-carousel-post-slider' ).'</label></li>';
						endforeach;
					?>
				</ul>
			</td>
		</tr>
		<!-- End Categories -->	

		<tr valign="top">
			<th scope="row">
				<label for="advncps_content_info"><?php esc_html_e('Hide Category', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="checkbox" name="advncps_content_info" id="advncps_content_info" value="1" class="timezone_string" 
				<?php  checked($advncps_content_info, 0, true);	?>
				> <?php esc_html_e('Hide Category', 'advanced-carousel-post-slider'); ?>
			</td>
		</tr>
		<!-- Hide Content Info -->	

		<tr valign="top">
			<th scope="row">
				<label for="advncps_post_tag"><?php esc_html_e('Hide Tags', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="checkbox" name="advncps_post_tag" id="advncps_post_tag" value="1" class="timezone_string" 
				<?php  checked( $advncps_post_tag, 0, true );	?>
				> <?php esc_html_e('Hide Tags', 'advanced-carousel-post-slider'); ?>
			</td>
		</tr>
		<!-- Hide Tag -->

		<tr valign="top">
			<th scope="row">
				<label for="advncps_tag_color"><?php esc_html_e('Tag Color', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="advncps_tag_color" value="<?php if( $advncps_tag_color !='' ){ echo esc_attr($advncps_tag_color); } else { echo "DC005A"; } ?>" class="jscolor" readonly>
			</td>
		</tr>
		<!-- End Tags Color -->

		<tr valign="top">
			<th scope="row">
				<label for="advncps_theme_id"><?php esc_html_e('Slider Styles', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="advncps_theme_id" id="advncps_theme_id" class="timezone_string">
					<option value="1" <?php if ( isset ( $advncps_theme_id ) ) selected( $advncps_theme_id, '1' ); ?>><?php esc_html_e('Style 1', 'advanced-carousel-post-slider'); ?></option>
					<option value="2" <?php if ( isset ( $advncps_theme_id ) ) selected( $advncps_theme_id, '2' ); ?>><?php esc_html_e('Style 2', 'advanced-carousel-post-slider'); ?></option>
					<option value="3" <?php if ( isset ( $advncps_theme_id ) ) selected( $advncps_theme_id, '3' ); ?>><?php esc_html_e('Style 3', 'advanced-carousel-post-slider'); ?></option>
				</select>
			</td>
		</tr>
		<!-- End Styles -->

		<tr valign="top">
			<th scope="row">
				<label for="advncps_order_cat"><?php esc_html_e('Order By', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="advncps_order_cat" id="advncps_order_cat" class="timezone_string">
					<option value="author" <?php if ( isset ( $advncps_order_cat ) ) selected( $advncps_order_cat, 'author' ); ?>><?php esc_html_e('Author', 'advanced-carousel-post-slider'); ?></option>
					<option value="post_date" <?php if ( isset ( $advncps_order_cat ) ) selected( $advncps_order_cat, 'post_date' ); ?>><?php esc_html_e('date', 'advanced-carousel-post-slider'); ?></option>
					<option value="title" <?php if ( isset ( $advncps_order_cat ) ) selected( $advncps_order_cat, 'title' ); ?>><?php esc_html_e('Title', 'advanced-carousel-post-slider'); ?></option>
					<option value="modified" <?php if ( isset ( $advncps_order_cat ) ) selected( $advncps_order_cat, 'modified' ); ?>><?php esc_html_e('Modified', 'advanced-carousel-post-slider'); ?></option>
					<option value="rand" <?php if ( isset ( $advncps_order_cat ) ) selected( $advncps_order_cat, 'rand' ); ?>><?php esc_html_e('Rand', 'advanced-carousel-post-slider'); ?></option>
					<option value="comment_count" <?php if ( isset ( $advncps_order_cat ) ) selected( $advncps_order_cat, 'comment_count' ); ?>><?php esc_html_e('Popularity', 'advanced-carousel-post-slider'); ?></option>
				</select>
			</td>
		</tr>
		<!-- End Order By -->

		<tr valign="top">
			<th scope="row">
				<label for="advncps_show_hide"><?php esc_html_e('Image', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="advncps_show_hide" id="advncps_show_hide" class="timezone_string">
					<option value="1" <?php if ( isset ( $advncps_show_hide ) ) selected( $advncps_show_hide, '1' ); ?>><?php esc_html_e('Show', 'advanced-carousel-post-slider'); ?></option>
					<option value="2" <?php if ( isset ( $advncps_show_hide ) ) selected( $advncps_show_hide, '2' ); ?>><?php esc_html_e('Hide', 'advanced-carousel-post-slider'); ?></option>
				</select>
			</td>
		</tr>

		<tr valign="top" id="img_controller" style="<?php if($advncps_show_hide == 2) {	echo "display:none;"; } ?>">
			<th scope="row">
				<label for="advncps_image_size"><?php esc_html_e('Image Size', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="advncps_image_size" id="advncps_image_size" class="timezone_string">
					<option value="thumbnail" <?php if ( isset ( $advncps_image_size ) ) selected( $advncps_image_size, 'thumbnail' ); ?>><?php esc_html_e('Thumbnail', 'advanced-carousel-post-slider'); ?></option>
					<option value="medium" <?php if ( isset ( $advncps_image_size ) ) selected( $advncps_image_size, 'medium' ); ?>><?php esc_html_e('Medium', 'advanced-carousel-post-slider'); ?></option>
					<option value="full" <?php if ( isset ( $advncps_image_size ) ) selected( $advncps_image_size, 'full' ); ?>><?php esc_html_e('Full', 'advanced-carousel-post-slider'); ?></option>
					<option value="large" <?php if ( isset ( $advncps_image_size ) ) selected( $advncps_image_size, 'large' ); ?>><?php esc_html_e('Large', 'advanced-carousel-post-slider'); ?></option>
					<option value="custom" <?php if ( isset ( $advncps_image_size ) ) selected( $advncps_image_size, 'custom' ); ?>><?php esc_html_e('Custom', 'advanced-carousel-post-slider'); ?></option>
				</select>
			</td>
		</tr>

		<tr valign="top" class="custom_details">
			<th scope="row">
				<label for="img_size"><?php esc_html_e('Width and Height (px)', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="number" name="advncps_img_width" id="advncps_img_width" size='7' maxlength="4" class="timezone_string" value="<?php echo esc_attr($advncps_img_width); ?>" > <?php esc_html_e('px', 'advanced-carousel-post-slider'); ?>
				&nbsp;
				<input type="number" name="advncps_img_height" id="advncps_img_height" size='7' maxlength="4" class="timezone_string" value="<?php echo esc_attr($advncps_img_height); ?>" ><?php esc_html_e('px', 'advanced-carousel-post-slider'); ?>
			</td>
		</tr>		
		<!-- End Image Size -->	

		<tr valign="top">
			<th scope="row">
				<label for="advncps_title"><?php esc_html_e( 'Hide Title', 'advanced-carousel-post-slider' ); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="checkbox" name="advncps_title" id="advncps_title" value="1" class="timezone_string" 
				<?php  checked( $advncps_title, 0, true );	?> 
				> <?php esc_html_e('Hide Title', 'advanced-carousel-post-slider'); ?>
			</td>
		</tr>
		<!-- End Hide Title -->	

		<tr valign="top">
			<th scope="row">
				<label for="advncps_title"><?php esc_html_e('Title Font Size', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="advncps_font_size" id="advncps_font_size">
					<?php for( $i=12; $i<=72; $i++ ){ ?>
					<option value="<?php echo $i; ?>" <?php if ( isset ( $advncps_font_size ) ) selected( $advncps_font_size, $i ); ?>><?php echo $i."px"; ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<!-- End Title Font Size-->

		<tr valign="top">
			<th scope="row">
				<label for="advncps_heading_cpicker"><?php esc_html_e('Title Font Color', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="advncps_heading_cpicker" value="<?php if( $advncps_heading_cpicker !='' ){ echo $advncps_heading_cpicker; } else { echo "#7A4B94"; } ?>" class="jscolor" readonly>
			</td>
		</tr>				
		<!-- End Title Font Color -->

		<tr valign="top">
			<th scope="row">
				<label for="advncps_content_color"><?php esc_html_e('Content Color', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="advncps_content_color" value="<?php if( $advncps_content_color !='' ){ echo esc_attr($advncps_content_color); } else { echo "#666666"; } ?>" class="jscolor" readonly>
			</td>
		</tr>
		<!-- End Content Color -->

		<tr valign="top">
			<th scope="row">
				<label for="advncps_show_date"><?php esc_html_e('Hide Date', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="checkbox" name="advncps_show_date" id="advncps_show_date" value="1" class="timezone_string" <?php checked( $advncps_show_date, 0, true ); ?>> <?php esc_html_e('Hide Date', 'advanced-carousel-post-slider'); ?>
			</td>
		</tr>
		<!-- End Show Date -->

		<tr valign="top">
			<th scope="row">
				<label for="advncps_date_text_cpicker"><?php esc_html_e('Day & Month Color', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="advncps_date_text_cpicker" value="<?php if( $advncps_date_text_cpicker !='' ){ echo esc_attr($advncps_date_text_cpicker); } else { echo "#7A4B94"; } ?>" class="jscolor" readonly>
			</td>
		</tr>
		<!-- End Day & Month Text Color -->

		<tr valign="top">
			<th scope="row">
				<label for="advncps_date_cpicker"><?php esc_html_e('Day & Month Background Color', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="advncps_date_cpicker" value="<?php if( $advncps_date_cpicker !='' ){ echo esc_attr($advncps_date_cpicker); } else { echo "#DC005A"; } ?>" class="jscolor" readonly>
			</td>
		</tr>
		<!-- End Day & Month Background Color -->

		<tr valign="top">
			<th scope="row">
				<label for="advncps_show_excerpt"><?php esc_html_e('Show Full Content/Excerpt', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="advncps_show_excerpt" id="advncps_show_excerpt" class="timezone_string">
					<option value="all" <?php if ( isset ( $advncps_show_excerpt ) ) selected( $advncps_show_excerpt, 'all' ); ?>><?php esc_html_e('Full Content', 'advanced-carousel-post-slider'); ?></option>
					<option value="excerpt" <?php if ( isset ( $advncps_show_excerpt ) ) selected( $advncps_show_excerpt, 'excerpt' ); ?>><?php esc_html_e('Excerpt', 'advanced-carousel-post-slider'); ?></option>
				</select>
			</td>
		</tr>
		<!-- End Show Excerpt -->

		<tr valign="top" class="excerpt_details">
			<th scope="row">
				<label for="advncps_excerpt_lenght"><?php esc_html_e('Excerpt Length in Words', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="number" name="advncps_excerpt_lenght"  id="advncps_excerpt_lenght" maxlength="3" class="timezone_string" value="<?php echo esc_attr($advncps_excerpt_lenght); ?>" >
				<input type="text" name="advncps_btn_readmore" id="advncps_btn_readmore" maxlength="20" class="timezone_string" value="<?php echo esc_attr($advncps_btn_readmore); ?>" placeholder="Read more">
			</td>
		</tr>
		<!-- End Excerpt Length -->

		<tr valign="top" id="advncps_excerpt_color_area">
			<th scope="row">
				<label for="advncps_excerpt_color"><?php esc_html_e('Excerpt Color', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="advncps_excerpt_color" value="<?php if( $advncps_excerpt_color !='' ){ echo $advncps_excerpt_color; } else { echo "#DBEAF7"; } ?>" class="jscolor" readonly>
			</td>
		</tr>
		<!-- End Excerpt Color -->

		<tr valign="top">
			<th scope="row">
				<label for="advncps_img_opc_color"><?php esc_html_e('Image Opacity', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input name="advncps_img_opc_color" value="<?php if( $advncps_img_opc_color !='' ){ echo esc_attr($advncps_img_opc_color); } else { echo "#DC005A"; } ?>" class="jscolor" readonly>
				<select name="opacity" id="opacity" class="timezone_string">
					<option value="0.1" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.1' ); ?>><?php esc_html_e('0.1', 'advanced-carousel-post-slider'); ?></option>
					<option value="0.2" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.2' ); ?>><?php esc_html_e('0.2', 'advanced-carousel-post-slider'); ?></option>
					<option value="0.3" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.3' ); ?>><?php esc_html_e('0.3', 'advanced-carousel-post-slider'); ?></option>
					<option value="0.4" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.4' ); ?>><?php esc_html_e('0.4', 'advanced-carousel-post-slider'); ?></option>
					<option value="0.5" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.5' ); ?>><?php esc_html_e('0.5', 'advanced-carousel-post-slider'); ?></option>
					<option value="0.6" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.6' ); ?>><?php esc_html_e('0.6', 'advanced-carousel-post-slider'); ?></option>
					<option value="0.7" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.7' ); ?>><?php esc_html_e('0.7', 'advanced-carousel-post-slider'); ?></option>
					<option value="0.8" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.8' ); ?>><?php esc_html_e('0.8', 'advanced-carousel-post-slider'); ?></option>
					<option value="0.9" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.9' ); ?>><?php esc_html_e('0.9', 'advanced-carousel-post-slider'); ?></option>
					<option value="1"   <?php if ( isset ( $opacity ) ) selected( $opacity, '1' ); ?>><?php esc_html_e('1', 'advanced-carousel-post-slider'); ?></option>		
				</select>				
			</td>
		</tr>
		<!-- End Image Opacity -->														
	</table>
</div>
<?php }   //

function advncps_settings_func( $post, $args ) {

	#Call get post meta.
	$item_no 						= get_post_meta( $post->ID, 'item_no', true );
	$loop 							= get_post_meta( $post->ID, 'loop', true );
	$margin 						= get_post_meta( $post->ID, 'margin', true );
	$navigation 					= get_post_meta( $post->ID, 'navigation', true );
	$pagination 					= get_post_meta( $post->ID, 'pagination', true );
	$autoplay   					= get_post_meta( $post->ID, 'autoplay', true );
	$autoplay_speed   				= get_post_meta( $post->ID, 'autoplay_speed', true );
	$stop_hover   					= get_post_meta( $post->ID, 'stop_hover', true );
	$itemsdesktop   				= get_post_meta( $post->ID, 'itemsdesktop', true );
	$itemsdesktopsmall  			= get_post_meta( $post->ID, 'itemsdesktopsmall', true );
	$itemsmobile   					= get_post_meta( $post->ID, 'itemsmobile', true );
	$autoplaytimeout    			= get_post_meta( $post->ID, 'autoplaytimeout', true );
	$advncps_nav_text_color     	= get_post_meta( $post->ID, 'advncps_nav_text_color', true );	
	$advncps_nav_bg_color       	= get_post_meta( $post->ID, 'advncps_nav_bg_color', true );
	$advncps_pagination_color   	= get_post_meta( $post->ID, 'advncps_pagination_color', true );
	$advncps_pagination_bg_color	= get_post_meta( $post->ID, 'advncps_pagination_bg_color', true );
	
?>
<div class="wrap">
	<table class="form-table"> 
		<tr valign="top">
			<th scope="row">
				<label for="autoplay"><?php esc_html_e('Autoplay', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="autoplay" id="autoplay" class="timezone_string">
					<option value="true" <?php if ( isset ( $autoplay ) ) selected( $autoplay, 'true' ); ?>><?php esc_html_e('True', 'advanced-carousel-post-slider'); ?></option>
					<option value="false" <?php if ( isset ( $autoplay ) ) selected( $autoplay, 'false' ); ?>><?php esc_html_e('False', 'advanced-carousel-post-slider'); ?></option>
				</select>
			</td>
		</tr>
		<!-- End Autoplay -->

		<tr valign="top">
			<th scope="row">
				<label for="autoplay_speed"><?php esc_html_e('Slide Delay', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="autoplay_speed" id="autoplay_speed" maxlength="4" class="timezone_string" required value="<?php  if( $autoplay_speed !='' ){ echo esc_attr($autoplay_speed); } else { echo '700'; } ?>">							
			</td>
		</tr>
		<!-- End Slide Delay -->

		<tr valign="top">
			<th scope="row">
				<label for="stop_hover"><?php esc_html_e('Hover', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="stop_hover" id="stop_hover" class="timezone_string">
					<option value="false" <?php if ( isset ( $stop_hover ) ) selected( $stop_hover, 'false' ); ?>><?php esc_html_e('False', 'advanced-carousel-post-slider'); ?></option>
					<option value="true" <?php if ( isset ( $stop_hover ) ) selected( $stop_hover, 'true' ); ?>><?php esc_html_e('True', 'advanced-carousel-post-slider'); ?></option>	
				</select>							
			</td>
		</tr>
		<!-- End Stop Hover -->

		<tr valign="top">
			<th scope="row">
				<label for="autoplaytimeout"><?php esc_html_e('Autoplay Time Out (Sec)', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="autoplaytimeout" id="autoplaytimeout" class="timezone_string">
					<option value="1000" <?php if ( isset ( $autoplaytimeout ) ) selected( $autoplaytimeout, '1000' ); ?>><?php esc_html_e('1', 'advanced-carousel-post-slider'); ?></option>
					<option value="2000" <?php if ( isset ( $autoplaytimeout ) ) selected( $autoplaytimeout, '2000' ); ?>><?php esc_html_e('2', 'advanced-carousel-post-slider'); ?></option>
					<option value="3000" <?php if ( isset ( $autoplaytimeout ) ) selected( $autoplaytimeout, '3000' ); ?>><?php esc_html_e('3', 'advanced-carousel-post-slider'); ?></option>
					<option value="4000" <?php if ( isset ( $autoplaytimeout ) ) selected( $autoplaytimeout, '4000' ); ?>><?php esc_html_e('4', 'advanced-carousel-post-slider'); ?></option>
					<option value="5000" <?php if ( isset ( $autoplaytimeout ) ) selected( $autoplaytimeout, '5000' ); ?>><?php esc_html_e('5', 'advanced-carousel-post-slider'); ?></option>
					<option value="6000" <?php if ( isset ( $autoplaytimeout ) ) selected( $autoplaytimeout, '6000' ); ?>><?php esc_html_e('6', 'advanced-carousel-post-slider'); ?></option>
					<option value="7000" <?php if ( isset ( $autoplaytimeout ) ) selected( $autoplaytimeout, '7000' ); ?>><?php esc_html_e('7', 'advanced-carousel-post-slider'); ?></option>
					<option value="8000" <?php if ( isset ( $autoplaytimeout ) ) selected( $autoplaytimeout, '8000' ); ?>><?php esc_html_e('8', 'advanced-carousel-post-slider'); ?></option>
					<option value="9000" <?php if ( isset ( $autoplaytimeout ) ) selected( $autoplaytimeout, '9000' ); ?>><?php esc_html_e('9', 'advanced-carousel-post-slider'); ?></option>
					<option value="10000" <?php if ( isset ( $autoplaytimeout ) ) selected( $autoplaytimeout, '10000' ); ?>><?php esc_html_e('10', 'advanced-carousel-post-slider'); ?></option>
				</select>							
			</td>
		</tr>
		<!-- End Autoplay Time Out -->

		<tr valign="top">
			<th scope="row">
				<label for="item_no"><?php esc_html_e('Items No', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="item_no" id="item_no" class="timezone_string">
					<option value="3" <?php if ( isset ( $item_no ) )  selected( $item_no, '3' ); ?>><?php esc_html_e('3', 'advanced-carousel-post-slider'); ?></option>
					<option value="1" <?php if ( isset ( $item_no ) )  selected( $item_no, '1' ); ?>><?php esc_html_e('1', 'advanced-carousel-post-slider'); ?></option>
					<option value="2" <?php if ( isset ( $item_no ) )  selected( $item_no, '2' ); ?>><?php esc_html_e('2', 'advanced-carousel-post-slider'); ?></option>
					<option value="4" <?php if ( isset ( $item_no ) )  selected( $item_no, '4' ); ?>><?php esc_html_e('4', 'advanced-carousel-post-slider'); ?></option>
					<option value="5" <?php if ( isset ( $item_no ) )  selected( $item_no, '5' ); ?>><?php esc_html_e('5', 'advanced-carousel-post-slider'); ?></option>
					<option value="6" <?php if ( isset ( $item_no ) )  selected( $item_no, '6' ); ?>><?php esc_html_e('6', 'advanced-carousel-post-slider'); ?></option>
					<option value="7" <?php if ( isset ( $item_no ) )  selected( $item_no, '7' ); ?>><?php esc_html_e('7', 'advanced-carousel-post-slider'); ?></option>
					<option value="8" <?php if ( isset ( $item_no ) )  selected( $item_no, '8' ); ?>><?php esc_html_e('8', 'advanced-carousel-post-slider'); ?></option>
					<option value="9" <?php if ( isset ( $item_no ) )  selected( $item_no, '9' ); ?>><?php esc_html_e('9', 'advanced-carousel-post-slider'); ?></option>
					<option value="10" <?php if ( isset ( $item_no ) ) selected( $item_no, '10' ); ?>><?php esc_html_e('10', 'advanced-carousel-post-slider'); ?></option>
				</select>
			</td>
		</tr>
		<!-- End Items No -->

		<tr valign="top">
			<th scope="row">
				<label for="itemsdesktop"><?php esc_html_e('Items Desktop', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="itemsdesktop" id="itemsdesktop" class="timezone_string">

					<option value="3" <?php if ( isset ( $itemsdesktop ) ) selected( $itemsdesktop, '3' ); ?>><?php esc_html_e('3', 'advanced-carousel-post-slider'); ?></option>
					<option value="1" <?php if ( isset ( $itemsdesktop ) ) selected( $itemsdesktop, '1' ); ?>><?php esc_html_e('1', 'advanced-carousel-post-slider'); ?></option>
					<option value="2" <?php if ( isset ( $itemsdesktop ) ) selected( $itemsdesktop, '2' ); ?>><?php esc_html_e('2', 'advanced-carousel-post-slider'); ?></option>
					<option value="4" <?php if ( isset ( $itemsdesktop ) ) selected( $itemsdesktop, '4' ); ?>><?php esc_html_e('4', 'advanced-carousel-post-slider'); ?></option>
					<option value="5" <?php if ( isset ( $itemsdesktop ) ) selected( $itemsdesktop, '5' ); ?>><?php esc_html_e('5', 'advanced-carousel-post-slider'); ?></option>
					<option value="6" <?php if ( isset ( $itemsdesktop ) ) selected( $itemsdesktop, '6' ); ?>><?php esc_html_e('6', 'advanced-carousel-post-slider'); ?></option>
					<option value="7" <?php if ( isset ( $itemsdesktop ) ) selected( $itemsdesktop, '7' ); ?>><?php esc_html_e('7', 'advanced-carousel-post-slider'); ?></option>
					<option value="8" <?php if ( isset ( $itemsdesktop ) ) selected( $itemsdesktop, '8' ); ?>><?php esc_html_e('8', 'advanced-carousel-post-slider'); ?></option>
					<option value="9" <?php if ( isset ( $itemsdesktop ) ) selected( $itemsdesktop, '9' ); ?>><?php esc_html_e('9', 'advanced-carousel-post-slider'); ?></option>
					<option value="10" <?php if ( isset ( $itemsdesktop ) ) selected( $itemsdesktop, '10' ); ?>><?php esc_html_e('10', 'advanced-carousel-post-slider'); ?></option>
				</select>
			</td>
		</tr>
		<!-- End Items Desktop -->

		<tr valign="top">
			<th scope="row">
				<label for="itemsdesktopsmall"><?php esc_html_e('Items Desktop Small', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="itemsdesktopsmall" id="itemsdesktopsmall" class="timezone_string">
					<option value="1" <?php if ( isset ( $itemsdesktopsmall ) ) selected( $itemsdesktopsmall, '1' ); ?>><?php esc_html_e('1', 'advanced-carousel-post-slider'); ?></option>
					<option value="2" <?php if ( isset ( $itemsdesktopsmall ) ) selected( $itemsdesktopsmall, '2' ); ?>><?php esc_html_e('2', 'advanced-carousel-post-slider'); ?></option>
					<option value="3" <?php if ( isset ( $itemsdesktopsmall ) ) selected( $itemsdesktopsmall, '3' ); ?>><?php esc_html_e('3', 'advanced-carousel-post-slider'); ?></option>
					<option value="4" <?php if ( isset ( $itemsdesktopsmall ) ) selected( $itemsdesktopsmall, '4' ); ?>><?php esc_html_e('4', 'advanced-carousel-post-slider'); ?></option>
					<option value="5" <?php if ( isset ( $itemsdesktopsmall ) ) selected( $itemsdesktopsmall, '5' ); ?>><?php esc_html_e('5', 'advanced-carousel-post-slider'); ?></option>
					<option value="6" <?php if ( isset ( $itemsdesktopsmall ) ) selected( $itemsdesktopsmall, '6' ); ?>><?php esc_html_e('6', 'advanced-carousel-post-slider'); ?></option>
					<option value="7" <?php if ( isset ( $itemsdesktopsmall ) ) selected( $itemsdesktopsmall, '7' ); ?>><?php esc_html_e('7', 'advanced-carousel-post-slider'); ?></option>
					<option value="8" <?php if ( isset ( $itemsdesktopsmall ) ) selected( $itemsdesktopsmall, '8' ); ?>><?php esc_html_e('8', 'advanced-carousel-post-slider'); ?></option>
					<option value="9" <?php if ( isset ( $itemsdesktopsmall ) ) selected( $itemsdesktopsmall, '9' ); ?>><?php esc_html_e('9', 'advanced-carousel-post-slider'); ?></option>
					<option value="10" <?php if ( isset ( $itemsdesktopsmall ) ) selected( $itemsdesktopsmall, '10' ); ?>><?php esc_html_e('10', 'advanced-carousel-post-slider'); ?></option>
				</select>			
			</td>
		</tr>
		<!-- End Items Desktop Small -->

		<tr valign="top">
			<th scope="row">
				<label for="itemsmobile"><?php esc_html_e('Items Mobile', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="itemsmobile" id="itemsmobile" class="timezone_string">
					<option value="1" <?php if ( isset ( $itemsmobile ) ) selected( $itemsmobile, '1' ); ?>><?php esc_html_e('1', 'advanced-carousel-post-slider'); ?></option>
					<option value="2" <?php if ( isset ( $itemsmobile ) ) selected( $itemsmobile, '2' ); ?>><?php esc_html_e('2', 'advanced-carousel-post-slider'); ?></option>
					<option value="3" <?php if ( isset ( $itemsmobile ) ) selected( $itemsmobile, '3' ); ?>><?php esc_html_e('3', 'advanced-carousel-post-slider'); ?></option>
					<option value="4" <?php if ( isset ( $itemsmobile ) ) selected( $itemsmobile, '4' ); ?>><?php esc_html_e('4', 'advanced-carousel-post-slider'); ?></option>
					<option value="5" <?php if ( isset ( $itemsmobile ) ) selected( $itemsmobile, '5' ); ?>><?php esc_html_e('5', 'advanced-carousel-post-slider'); ?></option>
					<option value="6" <?php if ( isset ( $itemsmobile ) ) selected( $itemsmobile, '6' ); ?>><?php esc_html_e('6', 'advanced-carousel-post-slider'); ?></option>
					<option value="7" <?php if ( isset ( $itemsmobile ) ) selected( $itemsmobile, '7' ); ?>><?php esc_html_e('7', 'advanced-carousel-post-slider'); ?></option>
					<option value="8" <?php if ( isset ( $itemsmobile ) ) selected( $itemsmobile, '8' ); ?>><?php esc_html_e('8', 'advanced-carousel-post-slider'); ?></option>
					<option value="9" <?php if ( isset ( $itemsmobile ) ) selected( $itemsmobile, '9' ); ?>><?php esc_html_e('9', 'advanced-carousel-post-slider'); ?></option>
					<option value="10" <?php if ( isset ( $itemsmobile ) ) selected( $itemsmobile, '10' ); ?>><?php esc_html_e('10', 'advanced-carousel-post-slider'); ?></option>
				</select>
			</td>
		</tr>
		<!-- End Items Mobile -->

		<tr valign="top">
			<th scope="row">
				<label for="item_no"><?php esc_html_e('Loop', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="loop" id="loop" class="timezone_string">
					<option value="true" <?php if ( isset ( $loop ) ) selected( $loop, 'true' ); ?>><?php esc_html_e('True', 'advanced-carousel-post-slider'); ?></option>
					<option value="false" <?php if ( isset ( $loop ) ) selected( $loop, 'false' ); ?>><?php esc_html_e('False', 'advanced-carousel-post-slider'); ?></option>
				</select>
			</td>
		</tr>
		<!-- End Loop -->

		<tr valign="top">
			<th scope="row">
				<label for="margin"><?php esc_html_e('Margin', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="number" name="margin" id="margin" maxlength="3" class="timezone_string" value="<?php if( $margin !='' ){ echo esc_attr($margin); } else { echo '0'; } ?>" value="0">
			</td>
		</tr>
		<!-- End Margin -->

		<tr valign="top">
			<th scope="row">
				<label for="navigation"><?php esc_html_e('Navigation', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="navigation" id="navigation" class="timezone_string">
					<option value="false" <?php if ( isset ( $navigation ) ) selected( $navigation, 'false' ); ?>><?php esc_html_e('False', 'advanced-carousel-post-slider'); ?></option>
					<option value="true" <?php if ( isset ( $navigation ) ) selected( $navigation, 'true' ); ?>><?php esc_html_e('True', 'advanced-carousel-post-slider'); ?></option>
				</select>
			</td>
		</tr>
		<!-- End Navigation -->

		<tr valign="top">
			<th scope="row">
				<label for="advncps_nav_text_color"><?php esc_html_e('Navigation Color', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="advncps_nav_text_color" value="<?php if($advncps_nav_text_color !=''){ echo esc_attr($advncps_nav_text_color); } else { echo "#A28352"; } ?>" class="jscolor" readonly>
			</td>
		</tr>
		<!-- End Navigation Color -->

		<tr valign="top">
			<th scope="row">
				<label for="advncps_nav_bg_color"><?php esc_html_e('Navigation Background Color', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="advncps_nav_bg_color" value="<?php if( $advncps_nav_bg_color !='' ){ echo esc_attr($advncps_nav_bg_color); } else { echo "#DBEAF7"; } ?>" class="jscolor" readonly>
			</td>
		</tr>
		<!-- End Navigation Background Color -->

		<tr valign="top">
			<th scope="row">
				<label for="pagination"><?php esc_html_e('Pagination', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="pagination" id="pagination" class="timezone_string">
					<option value="false" <?php if ( isset ( $pagination ) ) selected( $pagination, 'false' ); ?>><?php esc_html_e('False', 'advanced-carousel-post-slider'); ?></option>
					<option value="true" <?php if ( isset ( $pagination ) ) selected( $pagination, 'true' ); ?>><?php esc_html_e('True', 'advanced-carousel-post-slider'); ?></option>
				</select>							
			</td>
		</tr>
		<!-- End Pagination -->

		<tr valign="top">
			<th scope="row">
				<label for="advncps_pagination_color"><?php esc_html_e('Pagination Color', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="advncps_pagination_color" value="<?php if( $advncps_pagination_color !='' ){ echo esc_attr($advncps_pagination_color); } else { echo "#f001f0";} ?>" class="jscolor" readonly>
			</td>
		</tr>
		<!-- End Pagination Color -->

		<tr valign="top">
			<th scope="row">
				<label for="advncps_pagination_bg_color"><?php esc_html_e('Pagination Background Color', 'advanced-carousel-post-slider'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="advncps_pagination_bg_color" value="<?php if( $advncps_pagination_bg_color !='' ){ echo esc_attr($advncps_pagination_bg_color); } else { echo "#7A4B94"; } ?>" class="jscolor" readonly>
			</td>
		</tr>
		<!-- End Pagination Background Color -->

	</table>
</div>
<?php	}
	

# Data save in custom metabox field
function advcps_save_meta_box( $post_id ){

	# Doing autosave then return.
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

	#Checks for input and saves if needed
	if( isset( $_POST['advncps_set_cat'] ) ) {
	    update_post_meta( $post_id, 'advncps_set_cat', sanitize_text_field($_POST['advncps_set_cat']) );
	}

	#Checks for input and saves if needed
	if( isset( $_POST['advncps_cat_name'] ) ) {
	    update_post_meta( $post_id, 'advncps_cat_name', array_map( 'sanitize_text_field', $_POST['advncps_cat_name'] ) );
	}

	#Checks for input and saves
	if( isset( $_POST['advncps_post_tag'] ) ) {
		update_post_meta( $post_id, 'advncps_post_tag', '0' );
	} else {
	    update_post_meta( $post_id, 'advncps_post_tag', '1' );
	}

	#Checks for input and saves if needed
	if( isset( $_POST['advncps_tag_color'] ) ) {
	    update_post_meta( $post_id, 'advncps_tag_color', sanitize_text_field($_POST['advncps_tag_color']) );
	}

	#Checks for input and saves
	if( isset( $_POST['advncps_content_info'] ) ) {
		update_post_meta( $post_id, 'advncps_content_info', '0' );
	} else {
	    update_post_meta( $post_id, 'advncps_content_info', '1' );
	}

	#Checks for input and saves if needed
	if( isset( $_POST['advncps_theme_id'] ) ) {
	    update_post_meta( $post_id, 'advncps_theme_id', sanitize_text_field($_POST['advncps_theme_id']) );
	}

	#Checks for input and saves if needed
	if( isset( $_POST['advncps_order_cat'] ) ) {
	    update_post_meta( $post_id, 'advncps_order_cat', sanitize_text_field($_POST['advncps_order_cat']) );
	}


	#Checks for input and saves if needed
	if( isset( $_POST['advncps_show_hide'] ) ) {
	    update_post_meta( $post_id, 'advncps_show_hide', sanitize_text_field($_POST['advncps_show_hide']) );
	}

	#Checks for input and saves if needed
	if( isset( $_POST['advncps_image_size'] ) ) {
	    update_post_meta( $post_id, 'advncps_image_size', sanitize_text_field($_POST['advncps_image_size']) );
	}

	#Checks for input and saves if needed
	if( isset( $_POST['advncps_img_width'] ) && ($_POST['advncps_img_width'] != '')  && ($_POST['advncps_img_width'] != 0) && ( strlen($_POST['advncps_img_width']) <= 4) ) {
	    update_post_meta( $post_id, 'advncps_img_width', sanitize_text_field($_POST['advncps_img_width']) );
	}
	#Checks for input and saves if needed
	if( isset( $_POST['advncps_img_height'] ) && ($_POST['advncps_img_height'] != '') && ($_POST['advncps_img_width'] != 0) && ( strlen($_POST['advncps_img_height']) <= 4) ) {
	    update_post_meta( $post_id, 'advncps_img_height', sanitize_text_field($_POST['advncps_img_height']) );
	}
			
	#Checks for input and saves
	if( isset( $_POST['advncps_title'] ) ) {
		update_post_meta( $post_id, 'advncps_title', '0' );
	} else {
	    update_post_meta( $post_id, 'advncps_title', '1' );
	}

	#Checks for input and saves
	if( isset( $_POST['advncps_font_size'] ) ) {
	    update_post_meta( $post_id, 'advncps_font_size', sanitize_text_field($_POST['advncps_font_size']) );
	}

	#Checks for input and saves
	if( isset( $_POST['advncps_heading_cpicker'] ) ) {
	    update_post_meta( $post_id, 'advncps_heading_cpicker', sanitize_text_field($_POST['advncps_heading_cpicker']) );
	}
	
	#Checks for input and saves
	if( isset( $_POST['advncps_content_color'] ) ) {
	    update_post_meta( $post_id, 'advncps_content_color', sanitize_text_field($_POST['advncps_content_color']) );
	}

	#Checks for input and saves
	if( isset( $_POST['advncps_show_date'] ) ) {
	    update_post_meta( $post_id, 'advncps_show_date', '0' );
	} else {
	    update_post_meta( $post_id, 'advncps_show_date', '1' );
	}


	#Checks for input and saves
	if( isset( $_POST['advncps_date_text_cpicker'] ) ) {
	    update_post_meta( $post_id, 'advncps_date_text_cpicker', sanitize_text_field($_POST['advncps_date_text_cpicker']) );
	}
	
	#Checks for input and saves
	if( isset( $_POST['advncps_date_cpicker'] ) ) {
	    update_post_meta( $post_id, 'advncps_date_cpicker', sanitize_text_field($_POST['advncps_date_cpicker']) );
	}

	#Checks for input and saves
	if( isset( $_POST['advncps_show_excerpt'] ) ) {
	    update_post_meta( $post_id, 'advncps_show_excerpt', sanitize_text_field($_POST['advncps_show_excerpt']) );
	}

	#Checks for input and sanitizes/saves if needed
    if( isset($_POST['advncps_excerpt_lenght']) && ($_POST['advncps_excerpt_lenght'] != '')  && ($_POST['advncps_excerpt_lenght'] != '0') && (strlen($_POST['advncps_excerpt_lenght']) <= 3)) {
        update_post_meta( $post_id, 'advncps_excerpt_lenght', sanitize_text_field($_POST['advncps_excerpt_lenght']) );
    }

	#Checks for input and sanitizes/saves if needed
    if( isset( $_POST['advncps_btn_readmore'] ) && ( $_POST['advncps_btn_readmore'] != '') && ( strlen($_POST['advncps_btn_readmore']) <= 20) ) {
        update_post_meta( $post_id, 'advncps_btn_readmore', sanitize_text_field($_POST['advncps_btn_readmore']) );
    }

    // Carousal Settings

	#Checks for input and sanitizes/saves if needed
    if( isset($_POST['item_no']) && ($_POST['item_no'] != '') ) {
        update_post_meta( $post_id, 'item_no', sanitize_text_field($_POST['item_no']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['loop']) && ($_POST['loop'] != '') ) {
        update_post_meta( $post_id, 'loop', sanitize_text_field($_POST['loop']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset( $_POST['margin'] ) ) {
    	if( strlen($_POST['margin']) > 2 ){     // input value length greate than 2 

    	} else{
	    	if( $_POST['margin'] == '' || $_POST['margin'] == is_null($_POST['margin']) ){
				update_post_meta( $post_id, 'margin', 0 );
	    	} else {
	    		if (is_numeric($_POST['margin'])) {
	    			update_post_meta( $post_id, 'margin', sanitize_text_field($_POST['margin']) );
	    		}
	    	}
    	}
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['navigation']) && ($_POST['navigation'] != '') ) {
        update_post_meta( $post_id, 'navigation', sanitize_text_field($_POST['navigation']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['pagination']) && ($_POST['pagination'] != '') ) {
        update_post_meta( $post_id, 'pagination', sanitize_text_field($_POST['pagination']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['pagination']) && ($_POST['pagination'] != '') ) {
        update_post_meta( $post_id, 'pagination', sanitize_text_field($_POST['pagination']) );
    }  

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['advncps_pagination_color']) && ($_POST['advncps_pagination_color'] != '') ) {
        update_post_meta( $post_id, 'advncps_pagination_color', sanitize_text_field($_POST['advncps_pagination_color']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['advncps_pagination_bg_color']) && ($_POST['advncps_pagination_bg_color'] != '') ) {
        update_post_meta( $post_id, 'advncps_pagination_bg_color', sanitize_text_field($_POST['advncps_pagination_bg_color']) );
    }    
    
 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['autoplay']) && ($_POST['autoplay'] != '') ) {
        update_post_meta( $post_id, 'autoplay', sanitize_text_field($_POST['autoplay']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['autoplay_speed']) ) {
    	if( strlen($_POST['autoplay_speed']) > 4 ){

    	} else {

    		if($_POST['autoplay_speed'] == '' || is_null($_POST['autoplay_speed'])){
				update_post_meta( $post_id, 'autoplay_speed', 700 );				
    		} else {
	    		if (is_numeric($_POST['margin']) && strlen($_POST['autoplay_speed']) <= 4) {
	    			update_post_meta( $post_id, 'autoplay_speed', sanitize_text_field($_POST['autoplay_speed']) );
	    		}    
    		}
    	}
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['stop_hover']) && ($_POST['stop_hover'] != '') ) {
        update_post_meta( $post_id, 'stop_hover', sanitize_text_field($_POST['stop_hover']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['itemsdesktop']) && ($_POST['itemsdesktop'] != '') ) {
        update_post_meta( $post_id, 'itemsdesktop', sanitize_text_field($_POST['itemsdesktop']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['itemsdesktopsmall']) && ($_POST['itemsdesktopsmall'] != '') ) {
        update_post_meta( $post_id, 'itemsdesktopsmall', sanitize_text_field($_POST['itemsdesktopsmall']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['itemsmobile']) && ($_POST['itemsmobile'] != '') ) {
        update_post_meta( $post_id, 'itemsmobile', sanitize_text_field($_POST['itemsmobile']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['autoplaytimeout']) && ($_POST['autoplaytimeout'] != '') ) {
        update_post_meta( $post_id, 'autoplaytimeout', sanitize_text_field($_POST['autoplaytimeout']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['advncps_nav_text_color']) && ($_POST['advncps_nav_text_color'] != '') ) {
        update_post_meta( $post_id, 'advncps_nav_text_color', sanitize_text_field($_POST['advncps_nav_text_color']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['advncps_nav_bg_color']) && ($_POST['advncps_nav_bg_color'] != '') ) {
        update_post_meta( $post_id, 'advncps_nav_bg_color', sanitize_text_field($_POST['advncps_nav_bg_color']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['advncps_excerpt_color']) && ($_POST['advncps_excerpt_color'] != '') ) {
        update_post_meta( $post_id, 'advncps_excerpt_color', sanitize_text_field($_POST['advncps_excerpt_color']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['advncps_img_opc_color']) && ($_POST['advncps_img_opc_color'] != '') ) {
        update_post_meta( $post_id, 'advncps_img_opc_color', sanitize_text_field($_POST['advncps_img_opc_color']) );
    }

 	#Checks for input and sanitizes/saves if needed
    if( isset($_POST['opacity']) && ($_POST['opacity'] != '') ) {
        update_post_meta( $post_id, 'opacity', sanitize_text_field($_POST['opacity']) );
    }

}
add_action( 'save_post', 'advcps_save_meta_box' );
# Custom metabox field end