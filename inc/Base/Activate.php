<?php
/**
 * @package popUpThat
 */

namespace Inc\Base;


class Activate {
    public static function activate() {
        flush_rewrite_rules();
	    $default = [];

        if(!get_option('popUpThatPlugin')) {
	        update_option('popUpThatPlugin', $default);
        }

	    if(!get_option('popUpThatPluginPopUp')) {
		    update_option('popUpThatPluginPopUp', $default);
	    }

    }
}