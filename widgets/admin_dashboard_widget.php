<?php

add_action( 'wp_dashboard_setup', 'my_dashboard_widget_init' );

function my_dashboard_widget_init() {
    wp_add_dashboard_widget(
        'my_dashboard_widget_id',
        'FoodKingdom Admin Dashboard Widget',
        'my_dashboard_widget_content'
    );
}

function my_dashboard_widget_content() {
    echo '<p>Hello, Food Kingdom!</p>';
}

?>