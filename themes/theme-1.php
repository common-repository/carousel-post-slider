<?php

    if( !defined( 'ABSPATH' ) ){
        exit;
    }

    $item_no                = get_post_meta( $postid, 'item_no', true );
    $loop                   = get_post_meta( $postid, 'loop', true );
    $margin                 = get_post_meta( $postid, 'margin', true );
    $navigation             = get_post_meta( $postid, 'navigation', true );
    $pagination             = get_post_meta( $postid, 'pagination', true );
    $autoplay               = get_post_meta( $postid, 'autoplay', true );
    $autoplay_speed         = get_post_meta( $postid, 'autoplay_speed', true );
    $stop_hover             = get_post_meta( $postid, 'stop_hover', true );
    $autoplaytimeout        = get_post_meta( $postid, 'autoplaytimeout', true );
    $itemsdesktop           = get_post_meta( $postid, 'itemsdesktop', true );
    $itemsdesktopsmall      = get_post_meta( $postid,'itemsdesktopsmall', true );
    $itemsmobile            = get_post_meta( $postid, 'itemsmobile', true ); 
    $advncps_font_size              = get_post_meta( $postid, 'advncps_font_size', true );
    $advncps_heading_cpicker   = get_post_meta( $postid, 'advncps_heading_cpicker', true );
    $advncps_content_color          = get_post_meta( $postid, 'advncps_content_color', true );
    $advncps_date_text_cpicker  = get_post_meta( $postid, 'advncps_date_text_cpicker', true ); 
    $advncps_date_cpicker      = get_post_meta( $postid, 'advncps_date_cpicker', true );
    $advncps_content_info        = get_post_meta( $postid, 'advncps_content_info', true );
    $advncps_post_tag            = get_post_meta( $postid, 'advncps_post_tag', true );  
    $advncps_tag_color           = get_post_meta( $postid, 'advncps_tag_color', true );
    $advncps_img_opc_color          = get_post_meta( $postid, 'advncps_img_opc_color', true );
    $opacity                = get_post_meta( $postid, 'opacity', true );
    $advncps_excerpt_color          = get_post_meta( $postid, 'advncps_excerpt_color', true );
    $advncps_show_hide          = get_post_meta( $postid, 'advncps_show_hide', true );

    $content = '';
    require_once( ADVNCPS_PLUGIN_DIR.'assets/js/slider_options.php' );
      
    $content .='<style>
            .advncps-slide:hover .over-layer{
                opacity:'.$opacity.';
            }';
    $content .='.owl-theme .owl-nav [class*='.'owl-'.'] {
                background:#'.$advncps_nav_bg_color.';      // Owl Carousel  Navigation Background Color
            }';
	$content .='
		.advncps-slide .advncps-title a {
		  color:#'.$advncps_heading_cpicker.';
		  display: inline-block;
		  font-size:'.$advncps_font_size.'px;
		  font-weight: bold;
		  text-transform: capitalize;
		  transition: all 0.3s ease 0s;
		}
	';
	$content .='
		.advncps-slide .tag_list{
			color:#'.$advncps_tag_color.'
		}
	';
	$content .='
		.advncps-slide .cp-description {
		  color:#'.$advncps_content_color.'
		}
	';
    $content .='.advncps-slide .over-layer{
		  background:#'.$advncps_img_opc_color.'
		}
	';
    $content .='
		.advncps-slide .read-more{
		color:#'.$advncps_excerpt_color.'
		}
	';
    $content .='
		.advncps-slide .date{
		background-color:#'.$advncps_date_cpicker.';
		color:#'.$advncps_date_text_cpicker.';
		}
	';
    $content .='
		.advncps-slide .month{
		background-color:#'.$advncps_date_cpicker.';
		color:#'.$advncps_date_text_cpicker.';
		}
	';
    $content .='</style>';

    $content .='<div class="content_area">'; 
    $content .= '<div id="cp-'.$postid.'" class="owl-carousel owl-theme">';
    while ( $query->have_posts() ) : $query->the_post();
    $content .='<div class="advncps-slide">';
    
    if( $advncps_show_hide  == 1 && has_post_thumbnail() ) {
    $content .='<div class="advncps-img">';
        if( $advncps_image_size == "custom" ) {

            $custom_size = get_the_post_thumbnail( $post->ID, array($advncps_img_width, $advncps_img_height) );
            $content .= '<div class="post_thumb">'.$custom_size.'</div>';
            $content .='<div class="over-layer">
                            <ul class="advncps-link">
                                 <li><a href="'.esc_url( get_the_permalink() ).'" class="fa fa-link"></a></li>
                            </ul>
                        </div>';

            if( $advncps_show_date == 1 ){
                
            $content .='<div class="advncps-date" >
                            <span class="date">'.get_the_date( 'd' ).'</span>
                            <span class="month">'.get_the_date( 'M' ).'</span>
                        </div>';             
            }                          
        } else {
                  
            $post_thumb = get_the_post_thumbnail_url( $post->ID, $advncps_image_size );

            $content .= '<div class="post_thumb"><img src="'.$post_thumb.'"></div>';
            $content .='<div class="over-layer">
                            <ul class="advncps-link">
                                <li><a href="'.esc_url( get_the_permalink() ).'" class="fa fa-link"></a></li>
                            </ul>
                        </div>';
            if( $advncps_show_date == 1 ){

            $content .='<div class="advncps-date" >
                            <span class="date">'.get_the_date( 'd' ).'</span>
                            <span class="month">'.get_the_date( 'M' ).'</span>
                        </div>';             
            }
         }

        $content .='</div>';
    }

    if( $advncps_content_info == 1 ){

        $catId = get_the_ID();
        $cats  = get_the_category( $catId );

		$content .='<div class="advncps-admin-info">';
		$content .='<a href="'.get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ).'">'.get_the_author().'</a>';
        foreach( $cats as $cat ){
           $content .=' / <a href="'.get_category_link( $cat->cat_ID ).'">'.$cat->name.'</a>';
        }
		$content .='</div>';
    }

    $content .='<div class="advncps-content">';
    if( $advncps_title == 1 ) {

        $content .='<h3 class="advncps-title">';
        $content .='<a href="'.esc_url( get_the_permalink() ).'">'.get_the_title().'</a>';
        $content .='</h3>'; 

    }            
     if( $advncps_show_excerpt == "excerpt" ) {

         $limit     = $advncps_excerpt_lenght+1;
         $excerpt   = explode( ' ', get_the_excerpt(), $limit );
         array_pop( $excerpt );
         $excerpt   = implode( " ",$excerpt );
         $content   .= '<p class="cp-description">'.$excerpt.'</p>';
         
         if( $advncps_post_tag  == 1 ){

            $content .='<div class ="tag_list">';
            $tags = get_the_tags( $post->ID );
            foreach( (array) $tags as $tag ){
                if( $tag !=null ){

                    $content .='<span class=""><i class="fa fa-tag" aria-hidden="true"></i></span>'. $tag->name. ' &nbsp;';

                }
            }
            $content .='</div>';
        }            
         $read_more = "read-more";
         $content .= "<a href='" .get_the_permalink()."' class='".$read_more."'>".$advncps_btn_readmore."</a>";       
     }
     else {
         $content .= '<p class="cp-description">'.get_the_content().'</p>';
        if( $advncps_post_tag  == 1 ){

            $content .='<div class ="tag_list">';
            $tags = get_the_tags( $post->ID );
            foreach( (array) $tags as $tag ){
                if( $tag !=null ){
					
                    $content .='<span class=""><i class="fa fa-tag" aria-hidden="true"></i></span>'. $tag->name. ', &nbsp;';
					
                }
            }
            $content .='</div>';
        }            
     }
    $content .='</div>';   #End cp img
    $content .='</div>';   #End cp slide
    endwhile;
    $content .='</div>';   #End owl carousal 
    $content .='</div>';   #End Content Area