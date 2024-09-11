<?php 

/*
* Plugin name: Database
* Plugin URI:  http://www.deveconfbd.com 
* Description: Simple Database system
* Author:      Nazmul Hasan
* Version:     1.0.0

*/


function database_register_cpt(){
    $labels= [
        'name' => 'Database',
    ];
    $args= [
        'labels' => $labels,
        'public' => false,
        'show_ui' => true,
        'supports' => [ 'title', 'editor','thumbnail','page-attributes' ]
    ];

    register_post_type('database-system',$args);

}
add_action('init','database_register_cpt');








?>