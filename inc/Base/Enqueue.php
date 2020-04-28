<?php
/**
 * @package popUpThat
 */

namespace Inc\Base;


class Enqueue extends BaseController {
    public function register() {
        add_action('admin_enqueue_scripts', array($this, 'enqueueAdmin'));
        if($this->isActivated('kBPPopUpEnable')) {
            add_action('wp_enqueue_scripts', array($this, 'enqueuePopUp'));
            add_filter('script_loader_tag', array($this, 'addAsyncOrDefer'), 10, 2);
        }
    }

    function addAsyncOrDefer($tag, $handle) {
        if(!is_admin()) {
            if (strpos($handle, 'async') !== false) {
                return str_replace('<script ', '<script async ', $tag);
            } else if (strpos($handle, 'defer') !== false) {
                return str_replace('<script ', '<script defer ', $tag);
            } else {
                return $tag;
            }
        } else {
            return $tag;
        }
    }

    function enqueueAdmin($hook) {
        if('toplevel_page_kBPlugin' == $hook || 'kbplugin_page_kBPluginPopUp' == $hook || 'kbplugin_page_kBPluginCustomCSS' == $hook) {
            wp_enqueue_media();
            wp_enqueue_style('kBPaStyle', $this->pluginUrl. 'assets/css/aStyle.css');
            wp_enqueue_script('jqueryMin', 'https://code.jquery.com/jquery-3.5.0.min.js', NULL, NULL, false);
            wp_enqueue_script('aScript', $this->pluginUrl . 'assets/aScript.js', array('jqueryMin'), null, true);
        }

        if('kbplugin_page_kBPluginCustomCSS' == $hook) {
            wp_enqueue_script('ace', $this->pluginUrl . 'assets/js/ace/ace.js', array('jquery'), null, true);
            wp_enqueue_script('customCSS', $this->pluginUrl . 'assets/js/admin/customCSS.js', array('jqueryMin'), null, true);
        }
    }

    function enqueuePopUp() {
        if($this->isActivated('kBPCustomCSSEnable') && file_exists($this->pluginPath . 'assets/css/fcStyle.min.css')) {
            wp_enqueue_style('kBPfStyle', $this->pluginUrl . 'assets/css/fcStyle.min.css');
        } else {
            wp_enqueue_style('kBPfStyle', $this->pluginUrl . 'assets/css/fStyle.min.css');
        }

        wp_enqueue_script('fScript-defer', $this->pluginUrl . 'assets/fScript.min.js', array('jquery'), "1.0", true);
    }
}