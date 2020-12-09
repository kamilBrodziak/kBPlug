<?php
/**
 * @package kBPlug
 */

namespace kbPlug\Inc\Base;

class Deactivate {
    public static function deactivate() {
        flush_rewrite_rules();
    }
}