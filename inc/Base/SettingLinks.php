<?php
/**
 * @package kBPlug
 */

namespace kbPlug\Inc\Base;


class SettingLinks extends BaseController {
    public function register() {
        add_filter("plugin_action_links_" . $this->plugin , array( $this, 'settingsPluginsLink'));
    }

    function settingsPluginsLink($links) {
        $settingsLink = '<a href="admin.php?page=kBPlugin">Settings</a>';
        array_push($links, $settingsLink);
        return $links;
    }

}