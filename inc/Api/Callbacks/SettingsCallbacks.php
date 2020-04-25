<?php
namespace Inc\Api\Callbacks;

class SettingsCallbacks {
	public $settingsSections;
	public function __construct($sections) {
		$this->settingsSections = $sections;
	}

	public function sanitizeInput($input) {
		$output = [];
		foreach($this->settingsSections as $section) {
			foreach ($section['fields'] as $field) {
				if($field['fieldType'] == 'checkbox') {
					$output[$field['id']] = isset($input[$field['id']]) ? true : false;
				} else if($field['fieldType'] == 'text' || $field['fieldType'] == 'textarea' || $field['fieldType'] == 'image') {
					$output[$field['id']] = isset($input[$field['id']]) ? sanitize_text_field($input[$field['id']]) : '';
				}
			}
		}
		return $output;
	}


	public function checkboxField($args) {
		$name = $args['labelFor'];
        $class = $args['class'];
		$optionName = $args['optionName'];
		$checkbox = get_option($optionName);
		$checked = (isset($checkbox[$name])) ? ($checkbox[$name] ? true : false) : false;
		echo '<div class="' . $class . '">' .
            '<input type="checkbox" id="' . $name . '" class="" name="' . $optionName . '[' . $name . ']' . '" ' . ( $checked ? 'checked' : '') . ' >' .
            '<label for="' . $name . '"><div></div></label>' .
            '</div>';
	}

	public function textField($args) {
		$name = $args['labelFor'];
		//		$classes = $args['class'];
		$optionName = $args['optionName'];
		$text = get_option($optionName);
		$value = (isset($text[$name])) ? ($text[$name] ? $text[$name] : '') : '';
		echo '<input type="text" name="' . $optionName . '[' . $name . ']' . '" value="' . $value . '" >';
	}

	public function textareaField($args) {
		$name = $args['labelFor'];
		//		$classes = $args['class'];
		$optionName = $args['optionName'];
		$text = get_option($optionName);
		$value = (isset($text[$name])) ? ($text[$name] ? $text[$name] : '') : '';
		echo '<textarea name="' . $optionName . '[' . $name . ']' . '" rows="5" cols="100">' . $value . '</textarea>';
	}

	public function imageField($args) {
		$name = $args['labelFor'];
		//		$classes = $args['class'];
		$optionName = $args['optionName'];
		$image = get_option($optionName);
		$value = (isset($image[$name])) ? ($image[$name] ? $image[$name] : '') : '';
		echo '<input type="button" id="uploadButtonFor' . $name . '" value="Upload image">' .
		     '<img id="img' . $name .'" src="' . $value .'" width="100px">' .
		     '<input id="' . $name . '" type="hidden" name="' . $optionName . '[' . $name . ']' . '" value="' . $value . '" >';
	}

//	public function kBPMainSettingsSection() {}
    public function kBPFeaturesSection() {}
	public function kBPPopUpHeaderSection() {
    }
	public function kBPPopUpSubHeaderSection() {
    }
	public function kBPPopUpDescriptionSection() {
    }
	public function kBPPopUpImageSection() {
    }

    public function kBPPopUpStyleSection() {
    }
}