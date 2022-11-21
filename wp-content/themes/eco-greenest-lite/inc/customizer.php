<?php    
/**
 *eco-greenest-lite Theme Customizer
 *
 * @package Eco Greenest Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function eco_greenest_lite_customize_register( $wp_customize ) {	
	
	function eco_greenest_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function eco_greenest_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	} 
	
	function eco_greenest_lite_sanitize_phone_number( $phone ) {
		// sanitize phone
		return preg_replace( '/[^\d+]/', '', $phone );
	} 
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	 //Panel for section & control
	$wp_customize->add_panel( 'eco_greenest_lite_panel_section', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'eco-greenest-lite' ),		
	) );
	
	//Site Layout Options
	$wp_customize->add_section('eco_greenest_lite_layout_sections',array(
		'title' => __('Site Layout Options','eco-greenest-lite'),			
		'priority' => 1,
		'panel' => 	'eco_greenest_lite_panel_section',          
	));		
	
	$wp_customize->add_setting('eco_greenest_lite_boxlayoutoptions',array(
		'sanitize_callback' => 'eco_greenest_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'eco_greenest_lite_boxlayoutoptions', array(
    	'section'   => 'eco_greenest_lite_layout_sections',    	 
		'label' => __('Check to Show Box Layout','eco-greenest-lite'),
		'description' => __('If you want to show box layout please check the Box Layout Option.','eco-greenest-lite'),
    	'type'      => 'checkbox'
     )); //Site Layout Options 
	
	$wp_customize->add_setting('eco_greenest_lite_template_coloroptions',array(
		'default' => '#77c720',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'eco_greenest_lite_template_coloroptions',array(
			'label' => __('Color Options','eco-greenest-lite'),			
			'description' => __('More color options available in PRO Version','eco-greenest-lite'),
			'section' => 'colors',
			'settings' => 'eco_greenest_lite_template_coloroptions'
		))
	);
	
	$wp_customize->add_setting('eco_greenest_lite_template_hover_color',array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'eco_greenest_lite_template_hover_color',array(
			'label' => __('Hover Color Options','eco-greenest-lite'),			
			'section' => 'colors',
			'settings' => 'eco_greenest_lite_template_hover_color'
		))
	);	
	
	//Top Short Heading Text
	$wp_customize->add_section('eco_greenest_lite_top_shortheadingtext_sections',array(
		'title' => __('Top Short Heading Text','eco-greenest-lite'),
		'description' => __( 'Add short description in header.', 'eco-greenest-lite' ),			
		'priority' => null,
		'panel' => 	'eco_greenest_lite_panel_section', 
	));	
	
	
	$wp_customize->add_setting('eco_greenest_lite_shortdesc_section',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('eco_greenest_lite_shortdesc_section',array(	
		'type' => 'text',		
		'section' => 'eco_greenest_lite_top_shortheadingtext_sections',
		'setting' => 'eco_greenest_lite_shortdesc_section'
	)); 
	
	$wp_customize->add_setting('eco_greenest_lite_show_shortdesc_section',array(
		'default' => false,
		'sanitize_callback' => 'eco_greenest_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'eco_greenest_lite_show_shortdesc_section', array(
	   'settings' => 'eco_greenest_lite_show_shortdesc_section',
	   'section'   => 'eco_greenest_lite_top_shortheadingtext_sections',
	   'label'     => __('Check To show This Section','eco-greenest-lite'),
	   'type'      => 'checkbox'
	 ));//Show Short Top Short Heading Text Sections 
	 
	 //Social icons Section
	$wp_customize->add_section('eco_greenest_lite_header_footer_social_icons_sections',array(
		'title' => __('Header & Footer Social Sections','eco-greenest-lite'),
		'description' => __( 'Add social icons link here to display icons in header and footer.', 'eco-greenest-lite' ),			
		'priority' => null,
		'panel' => 	'eco_greenest_lite_panel_section', 
	));
	
	$wp_customize->add_setting('eco_greenest_lite_facebook_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'	
	));
	
	$wp_customize->add_control('eco_greenest_lite_facebook_link',array(
		'label' => __('Add facebook link here','eco-greenest-lite'),
		'section' => 'eco_greenest_lite_header_footer_social_icons_sections',
		'setting' => 'eco_greenest_lite_facebook_link'
	));	
	
	$wp_customize->add_setting('eco_greenest_lite_twitter_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('eco_greenest_lite_twitter_link',array(
		'label' => __('Add twitter link here','eco-greenest-lite'),
		'section' => 'eco_greenest_lite_header_footer_social_icons_sections',
		'setting' => 'eco_greenest_lite_twitter_link'
	));
	
	$wp_customize->add_setting('eco_greenest_lite_googleplus_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('eco_greenest_lite_googleplus_link',array(
		'label' => __('Add google plus link here','eco-greenest-lite'),
		'section' => 'eco_greenest_lite_header_footer_social_icons_sections',
		'setting' => 'eco_greenest_lite_googleplus_link'
	));
	
	$wp_customize->add_setting('eco_greenest_lite_linkedin_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('eco_greenest_lite_linkedin_link',array(
		'label' => __('Add linkedin link here','eco-greenest-lite'),
		'section' => 'eco_greenest_lite_header_footer_social_icons_sections',
		'setting' => 'eco_greenest_lite_linkedin_link'
	));
	
	$wp_customize->add_setting('eco_greenest_lite_instagram_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('eco_greenest_lite_instagram_link',array(
		'label' => __('Add instagram link here','eco-greenest-lite'),
		'section' => 'eco_greenest_lite_header_footer_social_icons_sections',
		'setting' => 'eco_greenest_lite_instagram_link'
	));
	
	$wp_customize->add_setting('eco_greenest_lite_show_header_footer_social_icons_sections',array(
		'default' => false,
		'sanitize_callback' => 'eco_greenest_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'eco_greenest_lite_show_header_footer_social_icons_sections', array(
	   'settings' => 'eco_greenest_lite_show_header_footer_social_icons_sections',
	   'section'   => 'eco_greenest_lite_header_footer_social_icons_sections',
	   'label'     => __('Check To show This Section','eco-greenest-lite'),
	   'type'      => 'checkbox'
	 ));//Show Header &footer Social icons Section
	 
	 
	 //Donate Button
	$wp_customize->add_section('eco_greenest_lite_donate_button_sections',array(
		'title' => __('Donate Button','eco-greenest-lite'),
		'description' => __( 'Add link here to display donate button in header.', 'eco-greenest-lite' ),			
		'priority' => null,
		'panel' => 	'eco_greenest_lite_panel_section', 
	));	
	
	
	$wp_customize->add_setting('eco_greenest_lite_donatebutton',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('eco_greenest_lite_donatebutton',array(	
		'type' => 'text',
		'label' => __('enter slider Read more button name here','eco-greenest-lite'),
		'section' => 'eco_greenest_lite_donate_button_sections',
		'setting' => 'eco_greenest_lite_donatebutton'
	)); // donate button text
	
	
	$wp_customize->add_setting('eco_greenest_lite_donatebutton_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('eco_greenest_lite_donatebutton_link',array(
		'label' => __('Add button link here','eco-greenest-lite'),
		'section' => 'eco_greenest_lite_donate_button_sections',
		'setting' => 'eco_greenest_lite_donatebutton_link'
	));
	
	$wp_customize->add_setting('eco_greenest_lite_show_donatebutton_sections',array(
		'default' => false,
		'sanitize_callback' => 'eco_greenest_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'eco_greenest_lite_show_donatebutton_sections', array(
	   'settings' => 'eco_greenest_lite_show_donatebutton_sections',
	   'section'   => 'eco_greenest_lite_donate_button_sections',
	   'label'     => __('Check To show This Section','eco-greenest-lite'),
	   'type'      => 'checkbox'
	 ));//Show Donate Button
	
	
	// Front Slider Section		
	$wp_customize->add_section( 'eco_greenest_lite_frontpageslider_section', array(
		'title' => __('Frontpage Slider Sections', 'eco-greenest-lite'),
		'priority' => null,
		'description' => __('Default image size for slider is 1400 x 735 pixel.','eco-greenest-lite'), 
		'panel' => 	'eco_greenest_lite_panel_section',           			
    ));
	
	$wp_customize->add_setting('eco_greenest_lite_homepageslider1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eco_greenest_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('eco_greenest_lite_homepageslider1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slider 1:','eco-greenest-lite'),
		'section' => 'eco_greenest_lite_frontpageslider_section'
	));	
	
	$wp_customize->add_setting('eco_greenest_lite_homepageslider2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eco_greenest_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('eco_greenest_lite_homepageslider2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slider 2:','eco-greenest-lite'),
		'section' => 'eco_greenest_lite_frontpageslider_section'
	));	
	
	$wp_customize->add_setting('eco_greenest_lite_homepageslider3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eco_greenest_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('eco_greenest_lite_homepageslider3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slider 3:','eco-greenest-lite'),
		'section' => 'eco_greenest_lite_frontpageslider_section'
	));	// Homepage Slider Section
	
	$wp_customize->add_setting('eco_greenest_lite_homepagesliderbutton',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('eco_greenest_lite_homepagesliderbutton',array(	
		'type' => 'text',
		'label' => __('enter slider Read more button name here','eco-greenest-lite'),
		'section' => 'eco_greenest_lite_frontpageslider_section',
		'setting' => 'eco_greenest_lite_homepagesliderbutton'
	)); // Home Slider Read More Button Text
	
	$wp_customize->add_setting('eco_greenest_lite_show_frontpageslider_section',array(
		'default' => false,
		'sanitize_callback' => 'eco_greenest_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'eco_greenest_lite_show_frontpageslider_section', array(
	    'settings' => 'eco_greenest_lite_show_frontpageslider_section',
	    'section'   => 'eco_greenest_lite_frontpageslider_section',
	    'label'     => __('Check To Show This Section','eco-greenest-lite'),
	   'type'      => 'checkbox'
	 ));//Show Frontpage Slider Section	
	 
	 
	 //Welcome page Sections
	$wp_customize->add_section('eco_greenest_lite_welcome_sections', array(
		'title' => __('Welcome Section','eco-greenest-lite'),
		'description' => __('Select Pages from the dropdown for welcome page section','eco-greenest-lite'),
		'priority' => null,
		'panel' => 	'eco_greenest_lite_panel_section',          
	));		
	
	$wp_customize->add_setting('eco_greenest_lite_welcome_page',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eco_greenest_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'eco_greenest_lite_welcome_page',array(
		'type' => 'dropdown-pages',			
		'section' => 'eco_greenest_lite_welcome_sections',
	));		
	
	$wp_customize->add_setting('eco_greenest_lite_show_welcome_page',array(
		'default' => false,
		'sanitize_callback' => 'eco_greenest_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'eco_greenest_lite_show_welcome_page', array(
	    'settings' => 'eco_greenest_lite_show_welcome_page',
	    'section'   => 'eco_greenest_lite_welcome_sections',
	    'label'     => __('Check To Show This Section','eco-greenest-lite'),
	    'type'      => 'checkbox'
	));//Show Welcome Page Section
	 
	 
	 //three column Section
	$wp_customize->add_section('eco_greenest_lite_threecolumn_sections', array(
		'title' => __('Three column Services Section','eco-greenest-lite'),
		'description' => __('Select pages from the dropdown for three column sections','eco-greenest-lite'),
		'priority' => null,
		'panel' => 	'eco_greenest_lite_panel_section',          
	));	
	
	
	$wp_customize->add_setting('eco_greenest_lite_3pagebx1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eco_greenest_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'eco_greenest_lite_3pagebx1',array(
		'type' => 'dropdown-pages',			
		'section' => 'eco_greenest_lite_threecolumn_sections',
	));		
	
	$wp_customize->add_setting('eco_greenest_lite_3pagebx2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eco_greenest_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'eco_greenest_lite_3pagebx2',array(
		'type' => 'dropdown-pages',			
		'section' => 'eco_greenest_lite_threecolumn_sections',
	));
	
	$wp_customize->add_setting('eco_greenest_lite_3pagebx3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'eco_greenest_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'eco_greenest_lite_3pagebx3',array(
		'type' => 'dropdown-pages',			
		'section' => 'eco_greenest_lite_threecolumn_sections',
	));	
	
	
	$wp_customize->add_setting('eco_greenest_lite_show_3pagebx_sections',array(
		'default' => false,
		'sanitize_callback' => 'eco_greenest_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'eco_greenest_lite_show_3pagebx_sections', array(
	   'settings' => 'eco_greenest_lite_show_3pagebx_sections',
	   'section'   => 'eco_greenest_lite_threecolumn_sections',
	   'label'     => __('Check To Show This Section','eco-greenest-lite'),
	   'type'      => 'checkbox'
	 ));//Show four column Section
	 
	 //Footer Contact info section
	$wp_customize->add_section('eco_greenest_lite_footerinfo_sections',array(
		'title' => __('Footer Contact Section','eco-greenest-lite'),				
		'priority' => null,
		'panel' => 	'eco_greenest_lite_panel_section',
	));		
	
	
	$wp_customize->add_setting('eco_greenest_lite_footerphone',array(
		'default' => null,
		'sanitize_callback' => 'eco_greenest_lite_sanitize_phone_number'	
	));
	
	$wp_customize->add_control('eco_greenest_lite_footerphone',array(	
		'type' => 'text',
		'label' => __('Enter phone number here','eco-greenest-lite'),
		'section' => 'eco_greenest_lite_footerinfo_sections',
		'setting' => 'eco_greenest_lite_footerphone'
	));	
	
	$wp_customize->add_setting('eco_greenest_lite_footeremail',array(
		'sanitize_callback' => 'sanitize_email'
	));
	
	$wp_customize->add_control('eco_greenest_lite_footeremail',array(
		'type' => 'email',
		'label' => __('enter email id here.','eco-greenest-lite'),
		'section' => 'eco_greenest_lite_footerinfo_sections'
	));		
		
	
	$wp_customize->add_setting('eco_greenest_lite_show_footerinfo_sections',array(
		'default' => false,
		'sanitize_callback' => 'eco_greenest_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'eco_greenest_lite_show_footerinfo_sections', array(
	   'settings' => 'eco_greenest_lite_show_footerinfo_sections',
	   'section'   => 'eco_greenest_lite_footerinfo_sections',
	   'label'     => __('Check To show This Section','eco-greenest-lite'),
	   'type'      => 'checkbox'
	 ));//Show Footer Contact section
	 
	 
	//Sidebar Settings
	$wp_customize->add_section('eco_greenest_lite_sidebar_options', array(
		'title' => __('Sidebar Options','eco-greenest-lite'),		
		'priority' => null,
		'panel' => 	'eco_greenest_lite_panel_section',          
	));	
	
	$wp_customize->add_setting('eco_greenest_lite_hidesidebar_from_homepage',array(
		'default' => false,
		'sanitize_callback' => 'eco_greenest_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'eco_greenest_lite_hidesidebar_from_homepage', array(
	   'settings' => 'eco_greenest_lite_hidesidebar_from_homepage',
	   'section'   => 'eco_greenest_lite_sidebar_options',
	   'label'     => __('Check to hide sidebar from latest post page','eco-greenest-lite'),
	   'type'      => 'checkbox'
	 ));// Hide sidebar from latest post page
	 
	 
	 $wp_customize->add_setting('eco_greenest_lite_hidesidebar_singlepost',array(
		'default' => false,
		'sanitize_callback' => 'eco_greenest_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'eco_greenest_lite_hidesidebar_singlepost', array(
	   'settings' => 'eco_greenest_lite_hidesidebar_singlepost',
	   'section'   => 'eco_greenest_lite_sidebar_options',
	   'label'     => __('Check to hide sidebar from single post','eco-greenest-lite'),
	   'type'      => 'checkbox'
	 ));// hide sidebar single post	 

		 
}
add_action( 'customize_register', 'eco_greenest_lite_customize_register' );

function eco_greenest_lite_custom_css(){ 
?>
	<style type="text/css"> 					
        a, .listview_blogstyle h2 a:hover,
        #sidebar ul li a:hover,						
        .listview_blogstyle h3 a:hover,		
        .postmeta a:hover,		
		.site-navigation .menu a:hover,
		.site-navigation .menu a:focus,
		.site-navigation .menu ul a:hover,
		.site-navigation .menu ul a:focus,
		.site-navigation ul li a:hover, 
		.site-navigation ul li.current-menu-item a,
		.site-navigation ul li.current-menu-parent a.parent,
		.site-navigation ul li.current-menu-item ul.sub-menu li a:hover,		 			
        .button:hover,
		.topsocial_icons a:hover,
		.nivo-caption h2 span,
		h2.services_title span,		
		.blog_postmeta a:hover,
		.blog_postmeta a:focus,				
		.site-footer ul li a:hover, 
		.site-footer ul li.current_page_item a		
            { color:<?php echo esc_html( get_theme_mod('eco_greenest_lite_template_coloroptions','#77c720')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,		
        .nivo-controlNav a.active,
		.sd-search input, .sd-top-bar-nav .sd-search input,			
		a.blogreadmore,	
		h3.widget-title,
		.services_3col:hover,			
		.nivo-caption .slide_morebtn:hover,
		.learnmore:hover,		
		.copyrigh-wrapper:before,
		.ftr3colbx a.get_an_enquiry:hover,									
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current,		
		.blogreadbtn,
		a.donatebutton,
		.services_3col .iconbox:before, 
		.services_3col .iconbox:after,		
        .toggle a	
            { background-color:<?php echo esc_html( get_theme_mod('eco_greenest_lite_template_coloroptions','#77c720')); ?>;}
			
		
		.tagcloud a:hover,		
		.topsocial_icons a:hover,		
		h3.widget-title::after
            { border-color:<?php echo esc_html( get_theme_mod('eco_greenest_lite_template_coloroptions','#77c720')); ?>;}
			
			
		 button:focus,
		input[type="button"]:focus,
		input[type="reset"]:focus,
		input[type="submit"]:focus,
		input[type="text"]:focus,
		input[type="email"]:focus,
		input[type="url"]:focus,
		input[type="password"]:focus,
		input[type="search"]:focus,
		input[type="number"]:focus,
		input[type="tel"]:focus,
		input[type="range"]:focus,
		input[type="date"]:focus,
		input[type="month"]:focus,
		input[type="week"]:focus,
		input[type="time"]:focus,
		input[type="datetime"]:focus,
		input[type="datetime-local"]:focus,
		input[type="color"]:focus,
		textarea:focus,
		#templatelayout a:focus
            { outline:thin dotted <?php echo esc_html( get_theme_mod('eco_greenest_lite_template_coloroptions','#77c720')); ?>;}				
		
		 
		a.donatebutton:hover
       	 { background-color:<?php echo esc_html( get_theme_mod('eco_greenest_lite_template_hover_color','#000000')); ?>;} 					
	
    </style> 
<?php                                                                                                 
}
         
add_action('wp_head','eco_greenest_lite_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function eco_greenest_lite_customize_preview_js() {
	wp_enqueue_script( 'eco_greenest_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '19062019', true );
}
add_action( 'customize_preview_init', 'eco_greenest_lite_customize_preview_js' );