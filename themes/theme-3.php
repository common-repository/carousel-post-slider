<?php

    if( !defined( 'ABSPATH' ) ){
        exit;
    }
    
    $item_no             	= get_post_meta( $postid, 'item_no', true );
    $loop                	= get_post_meta( $postid, 'loop', true );
    $margin              	= get_post_meta( $postid, 'margin', true );
    $navigation          	= get_post_meta( $postid, 'navigation', true );
    $pagination          	= get_post_meta( $postid, 'pagination', true );
    $autoplay            	= get_post_meta( $postid, 'autoplay', true );
    $autoplay_speed     	= get_post_meta( $postid, 'autoplay_speed', true );
    $stop_hover          	= get_post_meta( $postid, 'stop_hover', true );
    $autoplaytimeout    	= get_post_meta( $postid, 'autoplaytimeout', true );
    $itemsdesktop        	= get_post_meta( $postid, 'itemsdesktop', true );
    $itemsdesktopsmall   	= get_post_meta( $postid,'itemsdesktopsmall', true );
    $itemsmobile         	= get_post_meta( $postid, 'itemsmobile', true ); 
    $advncps_font_size           	= get_post_meta( $postid, 'advncps_font_size', true );
    $advncps_heading_cpicker	= get_post_meta( $postid, 'advncps_heading_cpicker', true );
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
    require_once(ADVNCPS_PLUGIN_DIR.'assets/js/slider_options.php'); 

        $content .='<style>';
        $content .='.owl-theme .owl-nav [class*='.'owl-'.'] {
                    background:#'.$advncps_nav_bg_color.';      // Owl Carousel  Navigation Background Color
                }';                      
        $content .='h3.advncps3-title > a {
                    color: #'.$advncps_heading_cpicker.';
                    font-size: '.$advncps_font_size.'px;
                }';               
        $content .='.advncps3-description {
                    color: #'.$advncps_content_color.';
                }'; 
        $content .='.advncps3-bar > li {
                    color:#'.$advncps_date_text_cpicker.';
                }';
        $content .='.advncps3-bar > li > a {
                    color:#'.$advncps_date_text_cpicker.';
                }'; 
        $content .='.advncps3-review .tag_list{
                    color:#'.$advncps_tag_color.'
                }';
        $content .='.advncps3-category-ul li a{
                    color:#'.$advncps_date_text_cpicker.'
                }';                                         
        $content .='.advncps3-review a{
                    color:#'.$advncps_excerpt_color.';
                }';   

        $content .='</style>';

    $content .= '<div class="content_area">'; 
        $content .= '<div id="cp-'.$postid.'" class="owl-carousel owl-theme">';

            while ( $query->have_posts() ) : $query->the_post();  
            $content .='<div class="advncps3-slide">';
                if( $advncps_show_hide == 1 && has_post_thumbnail() ) { 

                    $content .='<div class="advncps3-img">';            
                        if( $advncps_image_size == "custom" ) {

                            $custom_size = get_the_post_thumbnail( $post->ID, array($advncps_img_width, $advncps_img_height) );
                            $content .= '<div class="post_thumb">'.$custom_size.'</div>';
                        
                        } else {

                            $post_thumb = get_the_post_thumbnail_url( $post->ID, $advncps_image_size );
                            $content .= '<div class="post_thumb"><img src="'.$post_thumb.'"></div>';
                        
                        }
                    $content .='</div>';

                }

                $content .='<div class="advncps3-review">';
                    $content .='<ul class="advncps3-bar">';
                    if( $advncps_show_date == 1 ){                   
                                $content .='<li>'.get_the_date().'</li>';
                    }  
                    if( $advncps_content_info == 1 ){
                        $content .='<li><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename') ).'">'.get_the_author().'</a></li>';
                    }                                                                    
                    $content .='</ul>';

                    if( $advncps_content_info == 1 ){

                        $catId  = get_the_ID();
                        $cats   = get_the_category( $catId );
                        $content .='<div class="advncps3-category">';
                           $content .='<ul class="advncps3-category-ul">';
                            foreach( $cats as $cat ){
                               $content .='<li><a href="'.get_category_link( $cat->cat_ID ).'"><i class="fa fa-sitemap" aria-hidden="true"></i> '.$cat->name.'</a></li>';
                            }
                           $content .='</ul>'; 
                        $content .='</div>';

                    }

                    if( $advncps_title == 1 ) {
                        $content .='<h3 class="advncps3-title"><a href="'.esc_url(get_the_permalink()).'">'.get_the_title().'</a></h3>';                
                    } 

                    if( $advncps_show_excerpt == "excerpt" ) {

                        $limit      = $advncps_excerpt_lenght+1;
                        $excerpt    = explode(' ', get_the_excerpt(), $limit);
                        array_pop( $excerpt );
                        $excerpt = implode(" ",$excerpt);

                        $content .='<p class="advncps3-description">'.$excerpt.'</p>';

                         if( $advncps_post_tag  == 1 ){     // Tag List

                            $content .='<div class ="tag_list">';
                            $tags = get_the_tags($post->ID);
                            foreach( (array) $tags as $tag ){
                                if( $tag !=null ){

                                    $content .='<span class=""><i class="fa fa-tag" aria-hidden="true"></i></span>'. $tag->name. ' &nbsp;';

                                }
                            }
                            $content .='</div>';
                        }

                        $read_more = "read-more";
                        $content .= "<a href='" .get_the_permalink() ."' class='".$read_more."'>".$advncps_btn_readmore."</a>";                           
                    
                    } else {

                        $content .='<p class="advncps3-description">'.get_the_content().'</p>'; 

                    }

                $content .='</div>';
            $content .='</div>';
            endwhile; 

    $content .='</div>';      # end owl-carousel
    $content .='</div>';      # end content area     
