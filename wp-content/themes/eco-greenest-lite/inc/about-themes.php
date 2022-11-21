<?php
/**
 * Eco Greenest Lite About Theme
 *
 * @package Eco Greenest Lite
 */

//about theme info
add_action( 'admin_menu', 'eco_greenest_lite_abouttheme' );
function eco_greenest_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'eco-greenest-lite'), __('About Theme Info', 'eco-greenest-lite'), 'edit_theme_options', 'eco_greenest_lite_guide', 'eco_greenest_lite_mostrar_guide');   
} 

//Info of the theme
function eco_greenest_lite_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		<div class="heading-gt">
		 <h3><?php esc_html_e('About Theme Info', 'eco-greenest-lite'); ?></h3>
		</div>
       <p><?php esc_html_e('Eco Greenest Lite is a modern, intuitive, elegant and bright environment WordPress theme. It is designed specifically for environmental organizations, agriculture, organic farming, recycling centers, alternative energies, ecology, ecosystems and nature-related projects. This superbly designed WordPress theme is a great option for those who wants to create eco-friendly, animal, earth or environmental style website in minutes.', 'eco-greenest-lite'); ?></p>
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'eco-greenest-lite'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'eco-greenest-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'eco-greenest-lite'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'eco-greenest-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'eco-greenest-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'eco-greenest-lite'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'eco-greenest-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'eco-greenest-lite'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'eco-greenest-lite'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">   
     <a href="http://www.gracethemesdemo.com/documentation/greenest/#homepage-lite" target="_blank"><?php esc_html_e('Documentation', 'eco-greenest-lite'); ?></a>    
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>