<?php
include_once('WooProductCounter_ShortCodeLoader.php');
 
class WooProductCounter_getcount extends WooProductCounter_ShortCodeLoader {
    /**
     * @param  $atts shortcode inputs
     * @return string shortcode content
     */
    public function handleShortcode($atts) {
			$args = array( 'post_type' => 'product', 'post_status' => 'publish', 'posts_per_page' => -1 );
			$products = new WP_Query( $args );
			return $products->found_posts;
    }
}
?>