<?php 

/*
* Plugin name: bddonation
* Plugin URI:  
* Description: Blood Donation system
* Author:      Nazmul Hasan
* Author URI:  https://www.facebook.com/no203521/
* Version:     1.0.

*/


if(!function_exists('nb_donation')){
    function nb_donation(){

        register_post_type('mbpersoninfo', array(
            'labels' => array(
            'name' => __('person inofs','bddonation'),
            'singular name' => __('person info','bddonation'),
            ),

            'public' => true,
            'has_archive' => true,
        ));
        
    }
}

add_action('init','nb_donation');



?>