<?php
/**
 * @package popUpThat
 */
/*
Plugin Name: Pop Up That
Plugin URI:
Description: Pop up plugin from Kamil Brodziak
Version: 1.0
Author: Kamil Brodziak
Author URI:
License: MIT
Text Domain: popUpThat
*/

defined('ABSPATH') or die( 'Hey, you can\t access this file!' );

if(file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

function activatePlugin() {
    Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activatePlugin');

function deactivatePlugin() {
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivatePlugin');

if(class_exists('Inc\\Init')) {
    Inc\Init::registerServices();
}



//function html_form_code() {
//    echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
//    echo '<p>';
//    echo 'Your Name (required) <br/>';
//    echo '<input type="text" name="cf-name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-name"] ) ? esc_attr( $_POST["cf-name"] ) : '' ) . '" size="40" />';
//    echo '</p>';
//    echo '<p>';
//    echo 'Your Email (required) <br/>';
//    echo '<input type="email" name="cf-email" value="' . ( isset( $_POST["cf-email"] ) ? esc_attr( $_POST["cf-email"] ) : '' ) . '" size="40" />';
//    echo '</p>';
//    echo '<p>';
//    echo 'Subject (required) <br/>';
//    echo '<input type="text" name="cf-subject" pattern="[a-zA-Z ]+" value="' . ( isset( $_POST["cf-subject"] ) ? esc_attr( $_POST["cf-subject"] ) : '' ) . '" size="40" />';
//    echo '</p>';
//    echo '<p>';
//    echo 'Your Message (required) <br/>';
//    echo '<textarea rows="10" cols="35" name="cf-message">' . ( isset( $_POST["cf-message"] ) ? esc_attr( $_POST["cf-message"] ) : '' ) . '</textarea>';
//    echo '</p>';
//    echo '<p><input type="submit" name="cf-submitted" value="Send"></p>';
//    echo '</form>';
//}
//
//function deliver_mail() {
//
//    if ( isset( $_POST['contactFormSubmit'] ) ) {
//
//        // sanitize form values
//        $name    = sanitize_text_field( $_POST["contactFormFirstName"] );
//        $email   = sanitize_email( $_POST["contactFormAddress"] );
//        $subject = sanitize_text_field( $_POST["contactFormSubject"] );
//        $message = esc_textarea( $_POST["contactFormMessage"] );
//
//        // get the blog administrator's email address
//        $to = get_option( 'admin_email' );
//
//        $headers = "Od: $name Email: $email" . "\r\n";
//        echo wp_mail( $to, $subject, $message, $headers ) ;
//        // If email has been process for sending, display a success message
//        if ( wp_mail( $to, $subject, $message, $headers ) ) {
//            echo '<div>';
//            echo '<p>Thanks for contacting me, expect a response soon.</p>';
//            echo '</div>';
//        } else {
//            echo 'An unexpected error occurred';
//        }
//    }
//}
//
//function insertValueIntoInput($name) {
//    return isset( $_POST[$name] ) ? esc_attr( $_POST[$name] ) : '';
//}
//
//function cf_shortcode() {
//    ob_start();
//    deliver_mail();
////    html_form_code();
////    insertValueIntoInput();
//    return ob_get_clean();
//}
//
//add_shortcode( 'sitepoint_contact_form', 'cf_shortcode' );
