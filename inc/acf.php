<?php

/**
 * ACF
 * 
 *
 * 
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;


//resources
function resource_image()
{
    if (get_field('featured_image')) {
        $img_data = get_field('featured_image');
        $url = $img_data['url'];
        $alt = $img_data['alt'];
        return "<img src='{$url}' alt='{$alt}' class='resource_image'>";
    } else {
        $img_url = get_stylesheet_directory_uri() . '/imgs/binary.svg';
        return "<img src='{$img_url}' alt='Random image meant to convey the idea of data.' class='resource-image'>";
    }
}

function excel_intro()
{
    if (get_field('introduction')) {
        $intro = get_field('introduction');
        return "<div class='col-md-9 offset-md-2 introduction'>{$intro}</div>";
    }
}

function excel_example_file()
{
    if (get_field('example_excel_file')) {
        $url = get_field('example_excel_file')['url'];
        return "<div class='col-md-12'><a class='btn btn-primary btn-excel' href='{$url}'>Download Example File <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='#fff' class='bi bi-cloud-download' viewBox='0 0 16 16'>
  <path d='M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z'/>
  <path d='M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z'/>
</svg></a></div>";
    }
}

function excel_nav_builder()
{
    $functions = get_field('how_to_loop') . false;
    $uses = get_field('uses_loop');
    $course = get_field('course_content');
    $modules = get_field('modules');
    $html = '';
    $html .= excel_sidebar_nav_li_alt('introduction', 'Introduction');
    $html .= excel_sidebar_nav_li_alt('modules', 'Modules');
    if ($functions) {
        $html .= '<li class="nav-item"><a class="nav-link" href="#functions">Functions</a></li><ul class="secondary nav nav-pills">';
        foreach ($functions as $key => $row) {
            $title = $row['section_title'];
            $slug = sanitize_title($title) . '-' . $key;
            $html .= excel_sidebar_nav_li($slug, $title);
            // $media = $row[''];
            // $body = $row[''];
        }
        $html .= '</ul>';
    }
    if ($uses) {
        $html .= '<li class="nav-item"><a class="nav-link" href="#uses">Uses</a></li><ul class="secondary nav nav-pills">';
        foreach ($uses as $key => $use) {
            $title = $use['section_title'];
            $slug = sanitize_title($title) . '-' . $key;
            $html .= excel_sidebar_nav_li($slug, $title);
            // $media = $row[''];
            // $body = $row[''];
        }
        $html .= '</ul>';
    }
    if ($course) {
        $html .= '<li class="nav-item"><a class="nav-link" href="#Units">Units</a></li><ul class="secondary nav nav-pills">';
        foreach ($course as $key => $section) {
            $title = $section['section_title'];
            $slug = sanitize_title($title) . '-' . $key;
            $html .= excel_sidebar_nav_li($slug, $title);
            // $media = $row[''];
            // $body = $row[''];
        }
        $html .= '</ul>';
    }
    // $html .= excel_sidebar_nav_li_alt('apple_specific', 'Apple Specific');
    //$html .= excel_sidebar_nav_li_alt('uses', 'Uses');
    $html .= excel_sidebar_nav_li_alt('practice', 'Practice');
    $html .= excel_sidebar_nav_li_alt('conclusion', 'Conclusion');
    $html .= excel_sidebar_nav_li_alt('example_files', 'Example Files');

    return $html;
}



function excel_sidebar_nav_li($slug, $title)
{
    if ($title != '') {
        return "<li class='nav-item'>
                <a class='nav-link' href='#{$slug}'>{$title}</a>
             </li>";
    }
}

function excel_sidebar_nav_li_alt($slug, $title)
{
    $div_id = sanitize_title($title);
    if ($title != '' && get_field($slug)) {
        return "<li class='nav-item'>
                <a class='nav-link' href='#{$div_id}'>{$title}</a>
             </li>";
    }
}



function excel_how_to_loop()
{
    $rows = get_field('how_to_loop');
    $html = '';
    if ($rows) {
        $html .= '<div class="row"><div class="col-md-9 "><h2 id="functions">Functions</h2></div></div>';
        foreach ($rows as $key => $row) {
            $title = $row['section_title'];
            $full_title = '';
            $slug = sanitize_title($title) . '-' . $key;
            $media =  excel_generic_media($row['media']);
            $body = $row['how_to_text'];
            if ($title) {
                $full_title = "<h3 id='{$slug}'> {$title}</h3>";
            }
            if ($media && $body) {
                $html .= "<div class='row tutorial-row'>
                                <div class='col-md-9 '>
                                {$full_title}                               
                                </div>                               
                                <div class='col-md-6'>
                                {$body}
                                </div>
                                <div class='col-md-6'>
                                    {$media}
                                </div>
                            </div>
                            ";
            }
            if ($body && $media == '' || $media && $body == '') {
                if ($media) {
                    $content = $media;
                } else {
                    $content = $body;
                }
                $html .= "<div class='row  tutorial-row'>
                                <div class='col-md-9'>
                                    {$full_title}                               
                                </div>
                                <div class='col-md-9'>   
                                    {$content}                        
                                </div>
                            </div>
                            ";
            }
        }
    }
    return $html;
}

function excel_uses_loop()
{
    $rows = get_field('uses_loop');
    $html = '';
    if ($rows) {
        $html .= '<div class="row"><div><h2 id="uses">Uses</h2></div></div>';
        foreach ($rows as $key => $row) {
            $title = $row['section_title'];
            $full_title = '';
            $slug = sanitize_title($title) . '-' . $key;
            $media =  excel_generic_media($row['media']);
            $body = $row['how_to_text'];
            if ($title) {
                $full_title = "<h3 id='{$slug}'>{$title}</h3>";
            }
            if ($media && $body) {
                $html .= "<div class='row tutorial-row'>
                                <div class='col-md-12'>
                                {$full_title}                               
                                </div>                               
                                <div class='col-md-6'>
                                {$body}
                                </div>
                                <div class='col-md-6'>
                                    {$media}
                                </div>
                            </div>
                            ";
            }
            if ($body && $media == '' || $media && $body == '') {
                if ($media) {
                    $content = $media;
                } else {
                    $content = $body;
                }
                $html .= "<div class='row  tutorial-row'>
                                <div class='col-md-12'>
                                    {$full_title}                               
                                </div>
                                <div class='col-md-12'>   
                                    {$content}                        
                                </div>
                            </div>
                            ";
            }
        }
    }
    return $html;
}

function excel_course_content_loop()
{
    $rows = get_field('course_content');
    $html = '';
    if ($rows) {
        $html .= '<div class="row"><div class="col-md-12"><h2 id="units" class="col-md-12">Units</h2>';
        foreach ($rows as $key => $row) {
            $title = $row['section_title'];
            $full_title = '';
            $slug = sanitize_title($title) . '-' . $key;
            $media =  excel_generic_media($row['media']);
            $body = $row['content'];
            if ($title) {
                $full_title = "<h3 id='{$slug}' class='col-md-12'>{$title}</h3>";
            }
            if ($media && $body) {
                $html .= "<div class='row tutorial-row'>
                                <div class='col-md-12'>
                                {$full_title}                               
                                </div>                               
                                <div class='col-md-6'>
                                {$body}
                                </div>
                                <div class='col-md-6'>
                                    {$media}
                                </div>
                            </div>
                            ";
            }
            if ($body && $media == '' || $media && $body == '') {
                if ($media) {
                    $content = $media;
                } else {
                    $content = $body;
                }
                $html .= "<div class='row  tutorial-row'>
                                <div class='col-md-12'>
                                    {$full_title}                               
                                </div>
                                <div class='col-md-12'>   
                                    {$content}                        
                                </div>
                            </div>
                            ";
            }
        }
        $html .= '</div></div>';
    }
    return $html;
}

// development code
function excel_modules_loop()
{
    $rows = get_field('modules');
    $html = '';
    if ($rows) {
        $html .= '<div class="row tutorial-row"><div class="col-md-12 row"><h2 id="modules" class="col-md-12">Modules</h2>';
        foreach ($rows as $module) {

            $perma = get_permalink($module->ID);
            $thumb = get_field('featured_image', $module->ID);
            $url = $thumb['url'];
            $alt = $thumb['alt'];
            $title = get_the_title($module->ID);
            $html .= "
            <div class='col-md-4'>
            <div class='card'>
                <a href='{$perma}'>
                    <img src='{$url}' alt='{$alt}'/>
                </a>
              <div class='card-body'>
                <a href='{$perma}'>{$title}</a>        
              </div>
            </div>
        </div>
            ";
        }
        $html .= '</div></div>';
    }

    return $html;
}


function excel_header($field, $title)
{
    if (get_field($field)) {
        $clean = sanitize_title($title);
        $text = excel_block($field);
        if ($field == 'how_to') {
            $img = excel_primary_gif();
        } else {
            $img = '';
        }
        return "<div class='col-md-12 $clean'>
                    <h2 id='{$clean}'>{$title}</h2>
                    {$img}{$text}
                </div>
                ";
    }
}

function excel_generic_media($file)
{
    if ($file) {
        $url = $file['url'];
        $type = $file['type'];
        if ($type == 'image') {
            return "<img src='{$url}' class='generic-gif'>"; //may need to add modal link or direct file link
        }
        if ($type == 'video') {
            return "<video class='generic-gif' controls width='250' loop='true' autoplay='true'><source src='{$url}' type='video/mp4' ></video>";
        }
    }
}

function excel_primary_gif()
{
    if (get_field('primary_gif')) {
        $file = get_field('primary_gif');
        $url = $file['url'];
        $type = $file['type'];
        if ($type == 'image') {
            return "<img src='{$url}' class='primary-gif'>"; //may need to add modal link or direct file link
        }
        if ($type == 'video') {
            return "<video class='primary-gif' controls width='250' loop='true' autoplay='true'><source src='{$url}' type='video/mp4' ></video>";
        }
    }
}

function excel_block($field)
{
    if (get_field($field)) {
        $text = get_field($field);
        return "<div class='excel-block-text'>{$text}</div>";
    }
}

function excel_syntax()
{
    if (get_field('formula_syntax')) {
        $syntax = get_field('formula_syntax');
        $first_para = strpos($syntax, '(');
        $new = str_replace("=", "<span class='equal'>=</span><span class='function-action'>", $syntax);
        $final = str_replace('(', '</span>(', $new);
        return "<div class='col-md-10 offset-md-1'><h2 id='syntax'>Syntax</h2><div class='syntax-box'><span class='syntax'>{$final}</span></div></div>";
    }
}

function excel_additional_examples()
{
    if (have_rows('example_files')) :
        $html = "<div class='col-md-10 offset-md-1'>
                    <h2 id='additional-examples'>Examples</h2><ul class='downloads'>";
        // Loop through rows.
        while (have_rows('example_files')) : the_row();

            // Load sub field value.
            $title = get_sub_field('example_file_title');
            $link = get_sub_field('example_file')['url'];
            // Do something...
            $html .= "<li><a class='btn btn-primary btn-excel' href='{$link}'>{$title} <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='#fff' class='bi bi-cloud-download' viewBox='0 0 16 16'>
  <path d='M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z'/>
  <path d='M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z'/>
</svg></a></li>";
        // End loop.
        endwhile;
        return $html . '</ul></div>';
    // No value.
    else :
    // Do something...
    endif;
}

function excel_tutorial_nav()
{
    $html = '';
    if (get_field('previous_link')) {
        $prev = get_field('previous_link');
        $html .= "<a class='previous-btn tutorial-nav-btn' href='{$prev}'>Previous</a>";
    }
    if (get_field('next_link')) {
        $next = get_field('next_link');
        $html .= "<a class='next-btn tutorial-nav-btn' href='{$next}'>Next</a>";
    }
    return "<div class='col-md-8 offset-md-2 d-flex justify-content-between'>{$html}</div>";
}



/** add additional classes / id to the facetwp-template div generated by a facetwp 
 ** layout template
 **/
add_filter('facetwp_shortcode_html', function ($output, $atts) {
    if ($atts['template'] = 'example') { // replace 'example' with name of your template
        /** modify replacement as needed, make sure you keep the facetwp-template class **/
        $output = str_replace('class="facetwp-template"', 'class="facetwp-template row"', $output);
    }
    return $output;
}, 10, 2);



//save acf json
add_filter('acf/settings/save_json', 'excel_tutorials_json_save_point');

function excel_tutorials_json_save_point($path)
{

    // update path
    $path = get_stylesheet_directory() . '/acf-json'; //replace w get_stylesheet_directory() for theme


    // return
    return $path;
}


// load acf json
add_filter('acf/settings/load_json', 'excel_tutorials_json_load_point');

function excel_tutorials_json_load_point($paths)
{

    // remove original path (optional)
    unset($paths[0]);


    // append path
    $paths[] = get_stylesheet_directory()  . '/acf-json'; //replace w get_stylesheet_directory() for theme


    // return
    return $paths;
}
