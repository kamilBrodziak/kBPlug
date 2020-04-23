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
    	wp_enqueue_media();
        wp_enqueue_style('aStyle', $this->pluginUrl. 'assets/aStyle.css');
        wp_enqueue_script('aScript', $this->pluginUrl . 'assets/aScript.js');
    }
}