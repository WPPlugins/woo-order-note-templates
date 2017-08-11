<?php
/*
get template data	
*/
class wont_gyrix_order_note_view
{
	public function wont_gyrix_get_note_template()
	{
		if ( ! current_user_can( 'edit_shop_orders' ) ) {
			die(0);
		}
		$post_data = array();
		$template_array = array();
		$return = false;
		$args = array(
			'posts_per_page'   => -1,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_type'        => 'wont_gyrix_templates'
		);
		$the_query = new WP_Query( $args );
		$posts = $the_query->get_posts();
		$post_data = array();
		if(count($posts))
		{
			foreach($posts as $post) :
				$post_data[] = array('Id'=>intval($post->ID),
									'title' => $post->post_title, 
									'content' => $post->post_content, 
									'type' => get_post_meta($post->ID,"wont_gyrix_note_type",true)
								);
			endforeach;
			return $post_data;
		}		
		return(false);
	}
}