<?php
/*
Plugin Name: List Category Posts - Template
Plugin URI: http://picandocodigo.net/programacion/wordpress/list-category-posts-wordpress-plugin-english/
Description: Template file for List Category Post Plugin for Wordpress which is used by plugin by argument template=value.php
Version: 0.9
Author: Radek Uldrych & Fernando Briano 
Author URI: http://picandocodigo.net http://radoviny.net
*/

/* Copyright 2009  Radek Uldrych  (email : verex@centrum.cz), Fernando Briano (http://picandocodigo.net)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or 
any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
 * The format for templates changed since version 0.17.
 * Since this code is included inside CatListDisplayer, $this refers to
 * the instance of CatListDisplayer that called this file.
 */

/* This is the string which will gather all the information.*/
$lcp_display_output = '';

// Show category link:
$lcp_display_output .= $this->get_category_link('strong');

//Add 'starting' tag. Here, I'm using an unordered list (ul) as an example:
$lcp_display_output .= '<div class="page-posts">';

/**
 * Posts loop.
 * The code here will be executed for every post in the category.
 * As you can see, the different options are being called from functions on the
 * $this variable which is a CatListDisplayer.
 *
 * The CatListDisplayer has a function for each field we want to show.
 * So you'll see get_excerpt, get_thumbnail, etc.
 * You can now pass an html tag as a parameter. This tag will sorround the info
 * you want to display. You can also assign a specific CSS class to each field.
 */
foreach ($this->catlist->get_categories_posts() as $single):

    $lcp_display_output .= '<article class="post type-post preview-post hentry" >';
    $lcp_display_output .= '<header class="entry-header">'; 
                
    
     
    // $lcp_display_output .= '<div class="entry-meta">';
    // $lcp_display_output .= 'date' . $this->get_date($single);
    // $lcp_display_output .= '</div><!-- .entry-meta -->';
            
    
    
       // $lcp_display_output .= '<a href="' . get_permalink($single->ID) . '" title="Zum Artikel" >';
    if ($this->get_thumbnail($single)) {
        $lcp_display_output .= $this->get_thumbnail($single);
    } else {
        $lcp_display_output .= '<img width="150" height="150" src="' . get_header_image('flatdesign_header_image'). '" class="attachment-thumbnail colorbox-242  wp-post-image" alt="" />';
    }
    $lcp_display_output .= '<h1 class="h2 post-title">' . $this->get_post_title($single) . '</h1>';
    //$lcp_display_output .= '</a>';
    $lcp_display_output .= '</header><!-- .entry-header -->';

    $lcp_display_output .= '<section class="entry-content clearfix">';

    $lcp_display_output .= $this->get_excerpt($single, '', 'lcp_excerpt');

    //$lcp_display_output .= '<a href="' . get_permalink($single->ID) . '" title="Read more">...</a>' ;

    $lcp_display_output .= '</section> <!-- end article section -->';
        
    $lcp_display_output .= '<footer class="entry-meta">';
    $lcp_display_output .= '</footer><!-- .entry-meta -->';
    $lcp_display_output .= '</article><!-- #post -->';

endforeach;

$lcp_display_output .= '</div';

// If there's a "more link", show it:
$lcp_display_output .= $this->catlist->get_morelink();

//Pagination
$lcp_display_output .= '<nav class="page-navigation">';
$lcp_display_output .= $this->get_pagination();
$lcp_display_output .= '</nav>';

$this->lcp_output = $lcp_display_output;

