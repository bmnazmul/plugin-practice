<?php

/*
 * Plugin Name:       practice
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       shortcode is very important 
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Nazmul hasan
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages

 */



if (!function_exists('nspractice')) {
    function nspractice() {
        $labels = [
            'name' => 'Practice System',
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'show_ui' => true,
        ];

        register_post_type('practice-system', $args);
    }
}
add_action('init', 'nspractice');


// make shortcode 



if (!function_exists('practicenss')) {
    function practicenss($atts = array(), $content = null, $tag = '') {
        $getatts = array_change_key_case((array)$atts, CASE_LOWER);

        $getatts = shortcode_atts(
            array(
                'class' => 'mamu',
                'id'    => 'mami',
            ),
            $getatts,
            $tag
        );

        ob_start();
        ?>
        <h2>Contact Form</h2>

        <form class="<?php echo esc_html($getatts['class']); ?>" id="<?php echo esc_html($getatts['id']); ?>" action="/action_page.php">
            <label for="fname">First name:</label><br>
            <input type="text" id="fname" name="fname" value="John"><br>
            <label for="lname">Last name:</label><br>
            <input type="text" id="lname" name="lname" value="Doe"><br><br>
            <input type="submit" value="Submit">
        </form> 
        <?php 
        $practicecon = apply_filters('the_content', $content);
        $practicecon = ob_get_clean();
        
        return $practicecon;
    }
}

if (!shortcode_exists('practicee')) {
    add_shortcode('practicee', 'practicenss');
}

/**
 * Register a custom menu page.
 * 
 */

 if(!function_exists('custom_add_menu_page')){

    function custom_add_menu_page() {
    // Create the top-level menu
    add_menu_page(
        __( 'Admin Menu', 'textdomain' ),
        'Admin Menu',
        'manage_options',
        'admin-menu',  // Correct slug
        'my_custom_menu_page',
        'dashicons-admin-users',
        3
    );

    // Create the submenu under the top-level menu
    add_submenu_page(
        'admin-menu',  // Correct slug
        __( 'Sub Menu', 'textdomain' ),
        __( 'Sub Menu', 'textdomain' ),
        'manage_options',
        'books-shortcode-ref',
        'books_ref_page_callback'
    );

 }

}
add_action( 'admin_menu', 'custom_add_menu_page' );


// Display the custom admin menu page
 
if(!function_exists('my_custom_menu_page')){

    function my_custom_menu_page() {
    ?>

    <div class='admin_header_menu'>

 <ul>
        <li><a href="">home</a></li>
        <li><a href="">about</a></li>
        <li><a href="">contact</a></li>
        <li><a href="">faq</a></li>
        <li><a href="">product</a></li>
        <li><a href="">clients</a></li>
        <li><a href="">buyers</a></li>
    </ul>
</div>
    <?php
}
}



/**
 * Display the submenu page content
 */


 if(!function_exists('books_ref_page_callback')){
    function books_ref_page_callback() {
 
    // Output HTML directly
    ?>
    <div class='header_menu'>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Service</a>
                <ul>
                    <li><a href="">Dropdown</a></li>
                    <li><a href="">Dropdown</a></li>
                    <li><a href="">Dropdown</a></li>
                    <li><a href="">Dropdown</a>
                        <ul>
                            <li><a href="">Sub Dropdown</a></li>
                            <li><a href="">Sub Dropdown</a></li>
                            <li><a href="">Sub Dropdown</a></li>
                            <li><a href="">Sub Dropdown</a></li>
                        </ul>
                    </li>
                    <li><a href="">Dropdown</a></li>
                    <li><a href="">Dropdown</a></li>
                    <li><a href="">Dropdown</a></li>
                </ul>
            </li>
            <li><a href="">Contact</a></li>
            <li><a href="">FAQ</a></li>
            <li><a href="">Product</a></li>
            <li><a href="">Clients</a></li>
            <li><a href="">Buyers</a></li>
        </ul>
    </div>
    <?php

 }
}




function menu_plugin_assets() {
    $plugin_dir_url = plugin_dir_url(__FILE__);
    
    // Enqueue custom CSS file
    wp_enqueue_style('custom-css', $plugin_dir_url . 'assets/css/custom.css');
}
add_action('admin_enqueue_scripts', 'menu_plugin_assets');




?>