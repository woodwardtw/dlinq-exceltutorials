<?php
/**
 * ACF
 * 
 *
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


function excel_example_file(){
    if(get_field('example_excel_file')){
        $url = get_field('example_excel_file');
        return "<a class='btn btn-primary' href='{$url}'>Example File</a>";
    }

}

function excel_primary_gif(){
     if(get_field('primary_gif')){
        $url = get_field('primary_gif');
        return "<div class='col-md-3'><img src='{$url}' class='primary-gif'></div>";
    }
}

    //save acf json
        add_filter('acf/settings/save_json', 'excel_tutorials_json_save_point');
         
        function excel_tutorials_json_save_point( $path ) {
            
            // update path
            $path = get_stylesheet_directory() . '/acf-json'; //replace w get_stylesheet_directory() for theme
            
            
            // return
            return $path;
            
        }


        // load acf json
        add_filter('acf/settings/load_json', 'excel_tutorials_json_load_point');

        function excel_tutorials_json_load_point( $paths ) {
            
            // remove original path (optional)
            unset($paths[0]);
            
            
            // append path
            $paths[] = get_stylesheet_directory()  . '/acf-json';//replace w get_stylesheet_directory() for theme
            
            
            // return
            return $paths;
            
        }
