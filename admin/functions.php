
<?php
    function load_admin_things() {
        wp_enqueue_media();
        wp_enqueue_script('general-admin');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');
    }
    add_action( 'admin_enqueue_scripts', 'load_admin_things' );

    function general_admin_menus() {
        add_menu_page('General Settings', 'General Settings', 8, 'theme_settings', 'general_settings_page');
        add_menu_page('Testimonial', 'Testimonial', 8, 'testimonial', 'Testimonial_settings'); 
        add_submenu_page('testimonials','testimonials', 'testimonials', 8,'testimonial_form', 'testimonial_form');
        add_submenu_page('testimonials','testimonials', 'testimonials', 8,'testimonial_edit', 'testimonial_edit');
    }
    add_action("admin_menu", "general_admin_menus");



    function general_settings_page()
    {
        require_once ( get_stylesheet_directory() . '/admin/general_settings.php' );
    } 
    function testimonial_settings(){
        require_once ( get_stylesheet_directory() . '/admin/testimonial/testimonial.php');  
    }
    function testimonial_form(){
        require_once ( get_stylesheet_directory() . '/admin/testimonial/testimonial_form.php');  
    }
    function testimonial_edit(){
        require_once ( get_stylesheet_directory() . '/admin/testimonial/testimonial_edit.php');  
    } 


    function slider_admin_menus() {  
        add_menu_page('Slider', 'Slider', 8, 'slider', 'slider_settings');  
        add_submenu_page('Sliders','Sliders', 'sliders', 8,'slider_form', 'slider_form'); 
        add_submenu_page('Sliders','Sliders', 'sliders', 8,'slider_edit', 'slider_edit');
    }
    add_action("admin_menu", "slider_admin_menus");    

    function slider_settings(){
        require_once ( get_stylesheet_directory() . '/admin/slider/slider.php');   
    } 
    function slider_form(){
        require_once ( get_stylesheet_directory() . '/admin/slider/slider_form.php');   
    }
    function slider_edit(){
        require_once ( get_stylesheet_directory() . '/admin/slider/slider_edit.php');   
    }
?>

