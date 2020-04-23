<?php
/**
 * @package popUpThat
 */

namespace Inc\Base;


class SettingLinks extends BaseController {
    public function register() {
        add_filter("plugin_action_links_" . $this->plugin , array( $this, 'settingsPluginsLink'));
    }

    function settingsPluginsLink($links) {
        $settingsLink = '<a href="admin.php?page=kamilBrodziakPlugin">Settings</a>';
        array_push($links, $settingsLink);
        return $links;
    }

}