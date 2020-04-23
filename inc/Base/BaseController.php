<?php
/**
 * @package popUpThat
 */

namespace Inc\Base;


class BaseController {
    public $pluginPath;
    public $pluginUrl;
    public $plugin;

    public function __construct() {
        $this->pluginPath = plugin_dir_path(dirname(__FILE__, 2));
        $this->pluginUrl = plugin_dir_url(dirname(__FILE__, 2));
        $this->plugin = plugin_basename(dirname(__FILE__, 3)) . '/' . plugin_basename(dirname(__FILE__, 3)) . '.php';
    }
}