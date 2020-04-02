<?php
/**
 *
 * Intessa FAQs Shortcode
 * Write [intessa_faq] in your post editor to render this shortcode
 *
 * @category Intessa FAQ
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */


function get_page_by_slug($page_slug, $output = OBJECT, $post_type = 'faq' ) { 
  global $wpdb; 
   $page = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_name = %s AND post_type= %s AND post_status = 'publish'", $page_slug, $post_type ) ); 
     if ( $page ) 
        return get_post($page, $output); 
    return null; 
  }

 function intessa_faq_shortcode($atts) {
	
	// First lets set some arguments for the query:
	// Optionally, those could of course go directly into the query,
	// especially, if you have no others but post type.
	$args = array(
	    //'page_id' => 63,
	    'page_id' => 111,
	    'posts_per_page' => 1
	    // Several more arguments could go here. Last one without a comma.
	);

	// Query the posts:
	$faq_query = new WP_Query($args);
	$i = 0;

	// Loop through the posts:
	while ($faq_query->have_posts()) : $faq_query->the_post();
	    // Echo some markup
	    $html= '<ul class="vertical menu accordion accordion-menu" data-accordion-menu >';
	    
	    // As with regular posts, you can use all normal display functions, such as
	    //the_title();
	    // Within the loop, you can access custom fields like so:
    

	
   $faq_item  = get_post_meta( get_the_ID(), '_intessa_faq_group_', true );


    foreach ( (array) $faq_item as $key => $entry ) 

    	 {
    	 	$i++;
    $question = $answer = '';
  
    $question = esc_html( $entry['question'] );
    $answer = $entry['answer'];

	$html.= '<li class="accordion-item">' . '<h3>' . $question  . '</h3><div class="accordion-item-content"><p>' . $answer . '</p></div>';
  
	}
	endwhile;
	$html.= '</ul>'; // Markup closing tags.
	return $html;
	// Reset Post Data
	wp_reset_postdata();

	}
	
	add_shortcode('intessa_faq','intessa_faq_shortcode', true);

	// Add this as select list to contact form7



?>