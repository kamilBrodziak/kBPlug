<?php
/**
 * @package popUpThat
 */

namespace Inc\Api\Callbacks;


use Inc\Base\BaseController;

class AdminCallbacks extends BaseController {
	public function adminDashboard() {
		return require_once("$this->pluginPath/templates/adminDashboard.php");
	}

	public function adminPopUp() {
		return require_once("$this->pluginPath/templates/adminPopUp.php");
	}
//	public function adminSettings() {
//		return require_once("$this->pluginPath/templates/adminPopUp.php");
//	}
//	public function adminOther() {
//		return require_once("$this->pluginPath/templates/adminOther.php");
//	}

//	public function sanitizeInput($input) {
//		$output = [];
//		foreach ($this->fieldManager as $fieldID => $fieldType) {
//			if($fieldType == 'checkbox') {
//				$output[$fieldID] = isset($input[$fieldID]) ? true : false;
//			} else if($fieldType == 'text' || $fieldType == 'textarea' || $fieldType == 'image') {
//				$output[$fieldID] = isset($input[$fieldID]) ? sanitize_text_field($input[$fieldID]) : '';
//			}
//		}
//		return $output;
//	}
//
//
//	public function checkboxField($args) {
//		$name = $args['labelFor'];
////		$classes = $args['class'];
//		$optionName = $args['optionName'];
//		$checkbox = get_option($optionName);
//		$checked = (isset($checkbox[$name])) ? ($checkbox[$name] ? true : false) : false;
//		echo '<input type="checkbox" name="' . $optionName . '[' . $name . ']' . '" ' . ( $checked ? 'checked' : '') . ' >';
//	}
//
//	public function textField($args) {
//		$name = $args['labelFor'];
//		//		$classes = $args['class'];
//		$optionName = $args['optionName'];
//		$text = get_option($optionName);
//		$value = (isset($text[$name])) ? ($text[$name] ? $text[$name] : '') : '';
//		echo '<input type="text" name="' . $optionName . '[' . $name . ']' . '" value="' . $value . '" >';
//	}
//
//	public function textareaField($args) {
//		$name = $args['labelFor'];
//		//		$classes = $args['class'];
//		$optionName = $args['optionName'];
//		$text = get_option($optionName);
//		$value = (isset($text[$name])) ? ($text[$name] ? $text[$name] : '') : '';
//		echo '<textarea name="' . $optionName . '[' . $name . ']' . '" rows="5" cols="100">' . $value . '</textarea>';
//	}
//
//	public function imageField($args) {
//		$name = $args['labelFor'];
//		//		$classes = $args['class'];
//		$optionName = $args['optionName'];
//		$image = get_option($optionName);
//		$value = (isset($image[$name])) ? ($image[$name] ? $image[$name] : '') : '';
//		echo '<input type="button" id="uploadButtonFor' . $name . '" value="Upload image">' .
//		     '<img id="img' . $name .'" src="' . $value .'" width="100px">' .
//		     '<input id="' . $name . '" type="hidden" name="' . $optionName . '[' . $name . ']' . '" value="' . $value . '" >';
//	}
//
//	public function pUTMainSettingsSection() {
////		echo 'Main Options';
//	}
//
//	public function pUTHeaderSection() {}
//	public function pUTFeaturesSection() {}
//	public function pUTSubHeaderSection() {}
//	public function pUTDescriptionSection() {}
//	public function pUTImageSection() {}
}
