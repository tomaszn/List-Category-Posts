<?php
/*
Plugin Name: List Category Posts - Template "FAQ page - Entries"
Description: Second of two templates for List Category Post Plugin for Wordpress to create linked entries on a simple FAQ page
Version: 1.0
Author: Tomasz Nowak
*/

/*
Copyright 2018 Tomasz Nowak

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or any
later version.

This program is distributed in the hope that it will be useful, but
WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301
USA
*/

/* This is the string which will gather all the information.*/
$lcp_display_output = '';

//Add 'starting' tag
$lcp_display_output .= '<ul class="lcp_catlist">';

global $post;
while ( have_posts() ):
  the_post();

  $lcp_display_output .= "<li>";
  //Start a link to the contents on the same page
  $lcp_display_output .= '<a href="#post-' . $this->ID . '">';

  //Simple anchor
  $lcp_display_output .= '<a name="post-' . get_the_ID() . '">';
  $lcp_display_output .= the_title('<h3>', '</h3>', false);
  $lcp_display_output .= '</a>';

  /**
   * Post content, produces: <div class="lcp_content">The content</p>
   */
  $lcp_display_output .= get_the_content();

  $lcp_display_output .= '</li>';
endwhile;

// Close the wrapper I opened at the beginning:
$lcp_display_output .= '</ul>';

//Pagination
$lcp_display_output .= $this->get_pagination();

$this->lcp_output = $lcp_display_output;
