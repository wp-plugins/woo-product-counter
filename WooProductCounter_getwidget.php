<?php
class WooProductCounter_getwidget extends WP_Widget {

function __construct() {
parent::__construct(
'WooProductCounter_getwidget', 
__('WooPCounter', 'wpb_widget_domain'), 
array( 'description' => __( 'No settings to change yet.', 'wpb_widget_domain' ), ) 
);
}

public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

$args = array( 'post_type' => 'product', 'post_status' => 'publish', 'posts_per_page' => -1 );
			$products = new WP_Query( $args );
?> <div id="woopcmain"><label class="woopclabel"><?php echo $products->found_posts;?></label><span>products in store</span></div> <?php
echo $args['after_widget'];
}
		
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'Product Counter', 'wpb_widget_domain' );
}
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
}
function wpb_load_widget() {
	register_widget( 'WooProductCounter_getwidget' );
}

?>