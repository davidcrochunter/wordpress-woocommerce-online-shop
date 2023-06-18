<?php

add_action( 'widgets_init', 'fk_recent_post_widget_setup' );

if( ! function_exists('fk_recent_post_widget_setup') ):
    function fk_recent_post_widget_setup() {
        register_widget( 'Recent_Posts_Widget' );
    }
endif;

class Recent_Posts_Widget extends WP_Widget {

    public function __construct() {
        $widget_ops = array(
            'classname' => 'fk-recent-posts-widget',
            'description' => 'Displays a list of recent posts with titles and publication dates'
        );
        parent::__construct( 'fk-recent_posts_widget', 'FK-Recent Posts Widget', $widget_ops );
    }

    public function form( $instance ) {
        // widget form code goes here
    }

    public function widget( $args, $instance ) {
        // widget output code goes here
    }
}


?>