<?php
/**
 * Plugin Name: Latost
 * Plugin URI: https://github.com/lambry/latost
 * Description: Display the latest posts with optional title, date and image.
 * Version: 0.1.0
 * Author: Lambry
 * Author URI: http://lambry.com
 * Text Domain: latost
 * Domain Path: /languages
 */

namespace Lambry\Latost;

defined( 'ABSPATH' ) || exit;

/* Init Class */
class Init extends \WP_Widget {

    /*
     * Construct
     */
    public function __construct() {

        // Load text domain.
        load_plugin_textdomain( 'latost', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

        // Widget details
        parent::__construct(
            'latost',
            __( 'Latost', 'latost' ),
            [
                'classname'   => 'latost',
                'description' => __( 'Display the latest posts with optional title, date and image.', 'latost' )
            ]
        );

        // Add assets
        add_action( 'admin_enqueue_scripts', [ $this, 'admin_assets' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'public_assets' ] );

    }

    /*
     * Widget
     *
     * Display the widget output.
     *
     * @access private
     * @return null
     */
    public function widget( $args, $instance ) {

        extract( $args, EXTR_SKIP );
        extract( $instance, EXTR_SKIP );

        global $post;
        $query = [
            'posts_per_page'   => $limit,
            'category__in'  => $cats,
            'tag__in'       => $tags
        ];
        $posts = get_posts( $query );

        echo $before_widget;
            include plugin_dir_path( __FILE__ ) . '/views/widget.php';
        echo $after_widget;

    }

    /*
     * Form
     *
     * Display the admin form.
     *
     * @access public
     * @return null
     */
    public function form( $instance ) {

        $defaults = [
            'title' => '',
            'cats' => '',
            'tags' => '',
            'limit' => '5',
            'length' => '150',
            'date' => '',
            'image' => '',
            'link' => ''
        ];

        $instance = wp_parse_args( $instance, $defaults );

        $tax_tags = get_terms( 'post_tag' );
        $tax_cats = get_terms( 'category' );

        extract( $instance, EXTR_SKIP );

        require plugin_dir_path( __FILE__ ) . '/views/admin.php';

    }

    /*
     * Update
     *
     * Update all the fields.
     *
     * @access public
     * @return null
     */
    public function update( $new_instance, $old_instance ) {

        extract( $new_instance, EXTR_SKIP );

        $instance = $old_instance;
        $instance['title'] = strip_tags( $title );
        $instance['cats']  = $cats;
        $instance['tags']  = $tags;
        $instance['limit'] = intval( $limit );
        $instance['length'] = intval( $length );
        $instance['date']  = intval( $date );
        $instance['image'] = intval( $image );
        $instance['link'] = strip_tags( $link );

        return $instance;

    }

    /*
     * Admin Assets
     *
     * Include admin assets.
     *
     * @access public
     * @return null
     */
    public function admin_assets() {

        wp_enqueue_style( 'latost-admin-styles', plugin_dir_url( __FILE__ ) . 'assets/styles/admin.css', [], '0.2.0' );

    }

    /*
     * Public Assets
     *
     * Include public assets.
     *
     * @access public
     * @return null
     */
    public function public_assets() {

        wp_enqueue_style( 'latost-public-styles', plugin_dir_url( __FILE__ ) . 'assets/styles/public.css', [], '0.2.0' );

    }

}

/*
 * Register widget.
 */
add_action( 'widgets_init', function() {

    register_widget( 'Lambry\Latost\Init' );

});
