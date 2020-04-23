<?php
/**
 * @package popUpThat
 */

namespace Inc\Base;


class Enqueue extends BaseController {
    public function register() {
        add_action('admin_enqueue_scripts', array($this, 'enqueueAdmin'));
    }

    function enqueueAdmin() {
        wp_deregister_script('jquery');
        wp_enqueue_media();
        wp_enqueue_style('aStyle', $this->pluginUrl. 'assets/css//aStyle.css');
        wp_enqueue_script('jquery', includes_url('/js/jquery/jquery.min.js'), NULL, NULL, false);
        wp_enqueue_script('aScript', $this->pluginUrl . 'assets/aScript.js', array('jquery'), null, true);
    }
}