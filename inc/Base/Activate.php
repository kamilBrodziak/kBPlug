<?php
/**
 * @package kBPlug
 */

namespace kbPlug\Inc\Base;


class Activate {
    public static function activate() {
        flush_rewrite_rules();
	    $default = [];

        if(!get_option('kBPlugin')) {
	        update_option('kBPlugin', $default);
        }

	    if(!get_option('kBPluginPopUp')) {
		    update_option('kBPPopUp', $default);
	    }

    }
}