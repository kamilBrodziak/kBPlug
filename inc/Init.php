<?php
/**
 * @package popUpThat
 */

namespace kbPlug\Inc;

use kbPlug\Inc\Base\Activate, kbPlug\Inc\Base\Deactivate;

final class Init {
    public static function registerServices() {
        foreach(self::getServices() as $class) {
            $service = self::instantiate($class);
            if(method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    public static function getServices() {
        return [
	        Controllers\DashboardController::class,
	        Base\Enqueue::class,
            Base\SettingLinks::class,
	        Controllers\PopUpController::class,
            Controllers\CustomCSSController::class
        ];
    }

    private static function instantiate($class) {
        return new $class();
    }
}


//        function registerFrontEnd() {
//            add_action('wp_enqueue_scripts', array($this, 'enqueueFrontEnd'));
//        }
//
//        function enqueueFrontEnd() {
//            wp_enqueue_style('fStyle', plugins_url('/assets/fStyle.css'), __FILE__);
//            wp_enqueue_script('fScript', plugins_url('/assets/fScript.js'), __FILE__);
//
//        }
//    }


