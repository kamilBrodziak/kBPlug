<?php
/**
 * @package kBPlug
 */

namespace kbPlug\Inc\Base;


class Enqueue extends BaseController {
    public function register() {
        add_action('admin_enqueue_scripts', array($this, 'enqueueAdmin'));
        if($this->isActivated('kBPPopUpEnable')) {
            add_action('wp_enqueue_scripts', array($this, 'enqueuePopUp'));
        }
    }

    function enqueueAdmin($hook) {
        if('toplevel_page_kBPlugin' == $hook || 'kbplugin_page_kBPluginPopUp' == $hook || 'kbplugin_page_kBPluginCustomCSS' == $hook) {
            wp_enqueue_media();
            wp_enqueue_style('kBPaStyle', $this->pluginUrl. 'assets/css/aStyle.css');
            wp_enqueue_script('aScript', $this->pluginUrl . 'assets/aScript.js', array('jquery'), null, true);
        }

        if('kbplugin_page_kBPluginCustomCSS' == $hook) {
            wp_enqueue_script('ace', $this->pluginUrl . 'assets/js/ace/ace.js', array('jquery'), null, true);
            wp_enqueue_script('customCSS', $this->pluginUrl . 'assets/js/admin/customCSS.js', array('jquery'), null, true);
        }
    }

    function enqueuePopUp() {
//        if($this->isActivated('kBPCustomCSSEnable') && file_exists($this->pluginPath . 'assets/css/fcStyle.min.css')) {
//            wp_enqueue_style('kBPfStyle', $this->pluginUrl . 'assets/css/fcStyle.min.css', null, null,'all');
//        } else {
////            wp_enqueue_style('kBPfStyle', $this->pluginUrl . 'assets/css/fStyle.css', null, null,'all');
//        }
        wp_register_script('kBPlugJS', $this->pluginUrl . 'assets/fScript.min.js', ['jquery'], null, true);
        wp_localize_script('kBPlugJS', 'kBPlug', [
            'ajaxUrl' => admin_url('admin-ajax.php'),
        ]);
        wp_enqueue_script('kBPlugJS');
    }
}