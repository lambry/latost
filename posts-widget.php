<?php
/**
 * Plugin Name: Mild Posts Widget
 * Plugin URI: https://github.com/lambry/mild-posts-widget
 * Description: Display the latest posts with optional title, date and image.
 * Version: 0.1.0
 * Author: David Featherston
 * Text Domain: mild-iw
 * Domain Path: /languages
 */

namespace Mild\PostsWidget;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) die;

/* Init Class */
class Init extends \WP_Widget {

    /*
    * Construct
    */
    public function __construct() {

        // Load text domain.
        load_plugin_textdomain( 'mild-pw', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

        // Widget details
        parent::__construct(
            'posts-widget',
            __( 'Posts Widget', 'mild-pw' ),
            [
                'classname'   => 'posts-widget',
                'description' => __( 'Display the latest posts with optional title, date and image.', 'mild-pw' )
            ]
        );

        // Register admin styles and scripts
        add_action( 'admin_print_styles', [ $this, 'register_admin_styles' ] );

    }

    // Outputs the content of the widget.
    public function widget( $args, $instance ) {
        extract( $args, EXTR_SKIP );
        extract( $instance, EXTR_SKIP );

        global $post;
        $query = [
            'posts_per_page'   => $pw_limit,
            'category__in'  => $pw_cats,
            'tag__in'       => $pw_tags
        ];
        $posts = get_posts( $query );

        echo $before_widget;
            include plugin_dir_path( __FILE__ ) . '/views/widget.php';
        echo $after_widget;
    }

    // Generates the administration form for the widget.
    public function form( $instance ) {
        $defaults = [
            'title' => '',
            'pw_cats' => '',
            'pw_tags' => '',
            'pw_limit' => '5',
            'pw_length' => '150',
            'pw_date' => '',
            'pw_image' => '',
            'pw_link' => ''
        ];
        $instance = wp_parse_args(
            (array) $instance,
            $defaults
        );
        extract( $instance, EXTR_SKIP );
        include plugin_dir_path( __FILE__ ) . '/views/admin.php';
    }

    // Processes the widget's options to be saved.
    public function update( $new_instance, $old_instance ) {
        extract( $new_instance, EXTR_SKIP );
        $instance = $old_instance;
        $instance['title'] = strip_tags( $title );
        $instance['pw_cats']  = $pw_cats;
        $instance['pw_tags']  = $pw_tags;
        $instance['pw_limit'] = intval( $pw_limit );
        $instance['pw_length'] = intval( $pw_length );
        $instance['pw_date']  = intval( $pw_date );
        $instance['pw_image'] = intval( $pw_image );
        $instance['pw_link'] = strip_tags( $pw_link );
        return $instance;
    }

    // Registers and enqueues admin-specific styles.
    public function register_admin_styles() {
        wp_enqueue_style( 'latest-posts-widget-admin-styles', plugin_dir_url( __FILE__ ) . '/assets/css/admin.css' );
    }

}

// Register Latest Posts Widget.
add_action( 'widgets_init', function() {
    register_widget( 'Mild\PostsWidget\Init' );
});
