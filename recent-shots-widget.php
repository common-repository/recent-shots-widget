<?php
/*
Plugin Name: Recent Shots Widget
Plugin URI:  http://wordpress.org/plugins/recent-shots-widget/
Description: Displays user's recent shots from Dribbble.
Version:     1.0.0
Author:      OUTLANE
Author URI:  https://outlane.co
License:     GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/


class Recent_Shots_Widget extends WP_Widget
{

    public function __construct() {
        $widget_ops = array(
            'classname' => 'recent_shots_widget',
            'description' => esc_html__("Your shots from Dribbble", 'outlane'),
        );
        parent::__construct('recent_shots_widget', esc_html__('Recent Shots Widget', 'outlane'), $widget_ops);

        add_action( 'wp_enqueue_scripts', array( $this, 'recent_shots_widget_styles') );
    }


    public function recent_shots_widget_styles()
    {

        wp_enqueue_style( 'recent-shots-widget-style', plugin_dir_url( __FILE__ )."assets/style.css",array(), '1.0.0', 'all' );

    }

    /**
     * Outputs the content for the current Recent Shots widget instance.
     */
    public function widget($args, $instance) {
        if (!isset($args['widget_id'])) {
            $args['widget_id'] = $this->id;
        }

        $title = (!empty($instance['title'])) ? $instance['title'] : esc_html__('Recent Shots', 'outlane');
        $api_key = (!empty($instance['api_key'])) ? $instance['api_key'] : '';
        $username = (!empty($instance['username'])) ? $instance['username'] : '';
        $is_team = isset($instance['is_team']) ? $instance['is_team'] : false;
        $number = (!empty($instance['number'])) ? absint($instance['number']) : 4;
        $show_stats = isset($instance['show_stats']) ? $instance['show_stats'] : false;
        $show_follow_btn = isset($instance['show_follow_btn']) ? $instance['show_follow_btn'] : false;
        $follow_btn_text = (!empty($instance['follow_btn_text'])) ? $instance['follow_btn_text'] : esc_html__('Follow me on Dribbble', 'outlane');
        $show_followers_count = isset($instance['show_followers_count']) ? $instance['show_followers_count'] : false;


        $title = apply_filters('widget_title', $title, $instance, $this->id_base);
        if (!$number) $number = 4;


        echo $args['before_widget'];
        if ($title) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        $img_path = plugin_dir_url( __FILE__ ).'assets/img/';

        //Widget Output
        if ($api_key && $username) {
            include 'includes/widget-output.php';
        }

        echo $args['after_widget'];
    }

    /**
     * Handles updating the settings for the current Recent Shots widget instance.
     */
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['api_key'] = sanitize_text_field($new_instance['api_key']);
        $instance['username'] = sanitize_text_field($new_instance['username']);
        $instance['is_team'] = isset($new_instance['is_team']) ? (bool)$new_instance['is_team'] : false;
        $instance['number'] = (int)$new_instance['number'];
        $instance['show_stats'] = isset($new_instance['show_stats']) ? (bool)$new_instance['show_stats'] : false;
        $instance['show_follow_btn'] = isset($new_instance['show_follow_btn']) ? (bool)$new_instance['show_follow_btn'] : false;
        $instance['follow_btn_text'] = sanitize_text_field($new_instance['follow_btn_text']);
        $instance['show_followers_count'] = isset($new_instance['show_followers_count']) ? (bool)$new_instance['show_followers_count'] : false;


        return $instance;
    }

    /**
     * Outputs the settings form for the Recent Shots widget.
     */
    public function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $api_key = isset($instance['api_key']) ? esc_attr($instance['api_key']) : '';
        $username = isset($instance['username']) ? esc_attr($instance['username']) : 'outlane';
        $is_team = isset($instance['is_team']) ? (bool)$instance['is_team'] : false;
        $number = isset($instance['number']) ? absint($instance['number']) : 4;
        $show_stats = isset($instance['show_stats']) ? (bool)$instance['show_stats'] : false;
        $show_follow_btn = isset($instance['show_follow_btn']) ? (bool)$instance['show_follow_btn'] : false;
        $follow_btn_text = isset($instance['follow_btn_text']) ? esc_attr($instance['follow_btn_text']) : esc_html__('Follow me on Dribbble', 'outlane');
        $show_followers_count = isset($instance['show_followers_count']) ? (bool)$instance['show_followers_count'] : false;

        include 'includes/form.php';

    }
}

function recent_shots_widget_init() {
    register_widget('Recent_Shots_Widget');
}

add_action('widgets_init', 'recent_shots_widget_init');