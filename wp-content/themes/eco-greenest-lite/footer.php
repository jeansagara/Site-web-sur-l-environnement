<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Eco Greenest Lite
 */
 
$eco_greenest_lite_show_header_footer_social_icons_sections  	= esc_attr( get_theme_mod('eco_greenest_lite_show_header_footer_social_icons_sections', false) ); 
?>

<div class="site-footer">
           <div class="container fixfooter">  
           
            <div class="fter_logo">
                <?php bloginfo('name'); ?>
            </div><!-- .fter_logo --> 
           
                    
         <?php if( $eco_greenest_lite_show_header_footer_social_icons_sections != ''){ ?>                
                    <div class="topsocial_icons">                                                
					   <?php $eco_greenest_lite_facebook_link = get_theme_mod('eco_greenest_lite_facebook_link');
                        if( !empty($eco_greenest_lite_facebook_link) ){ ?>
                        <a class="fab fa-facebook-f" target="_blank" href="<?php echo esc_url($eco_greenest_lite_facebook_link); ?>"></a>
                       <?php } ?>
                    
                       <?php $eco_greenest_lite_twitter_link = get_theme_mod('eco_greenest_lite_twitter_link');
                        if( !empty($eco_greenest_lite_twitter_link) ){ ?>
                        <a class="fab fa-twitter" target="_blank" href="<?php echo esc_url($eco_greenest_lite_twitter_link); ?>"></a>
                       <?php } ?>
                
                      <?php $eco_greenest_lite_googleplus_link = get_theme_mod('eco_greenest_lite_googleplus_link');
                        if( !empty($eco_greenest_lite_googleplus_link) ){ ?>
                        <a class="fab fa-google-plus" target="_blank" href="<?php echo esc_url($eco_greenest_lite_googleplus_link); ?>"></a>
                      <?php }?>
                
                      <?php $eco_greenest_lite_linkedin_link = get_theme_mod('eco_greenest_lite_linkedin_link');
                        if( !empty($eco_greenest_lite_linkedin_link) ){ ?>
                        <a class="fab fa-linkedin" target="_blank" href="<?php echo esc_url($eco_greenest_lite_linkedin_link); ?>"></a>
                      <?php } ?> 
                      
                      <?php $eco_greenest_lite_instagram_link = get_theme_mod('eco_greenest_lite_instagram_link');
                        if( !empty($eco_greenest_lite_instagram_link) ){ ?>
                        <a class="fab fa-instagram" target="_blank" href="<?php echo esc_url($eco_greenest_lite_instagram_link); ?>"></a>
                      <?php } ?> 
                 </div><!--end .topsocial_icons--> 
               <?php } ?>  
           
      </div><!--end .container-->            

        <div class="copyrigh-wrapper"> 
            <div class="container">               
                <div class="left_fter">
				   <?php bloginfo('name'); ?> - <?php esc_html_e('Theme by Grace Themes','eco-greenest-lite'); ?>  
                </div>
                <div class="menu_fter"><?php wp_nav_menu( array( 'theme_location' => 'footer') ); ?></div>
                <div class="clear"></div>                                
             </div><!--end .container-->             
        </div><!--end .copyrigh-wrapper-->  
                             
     </div><!--end #site-footer-->
</div><!--#end templatelayout-->
<?php wp_footer(); ?>
</body>
</html>