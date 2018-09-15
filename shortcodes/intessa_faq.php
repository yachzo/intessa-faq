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


 function intessa_faq_shortcode($atts) {
	
	// First lets set some arguments for the query:
	// Optionally, those could of course go directly into the query,
	// especially, if you have no others but post type.
	$args = array(
	    'page_id' => 63,
	    'posts_per_page' => 1
	    // Several more arguments could go here. Last one without a comma.
	);

	// Query the posts:
	$faq_query = new WP_Query($args);
	$i = 0;

	// Loop through the posts:
	while ($faq_query->have_posts()) : $faq_query->the_post();
	    // Echo some markup
	    $html= '<ul class="vertical menu accordion-menu" data-accordion-menu >';
	    
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

$html.= '<li>' . '<a href="#' . $i . 'a" >' .$question  . '</a>' . $answer;
  
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