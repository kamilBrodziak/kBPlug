<?php
/**
 * @package popUpThat
 */

namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;


class PopUpController extends BaseController {
	public $subPages;
	public $settings;
	public $callbacks;
	public $pageSlug;


	public function register() {
		$option = get_option('popUpThatPlugin');
		$activated = (isset($option['pUTPopUpEnable'])) ? ($option['pUTPopUpEnable'] ? true : false) : false;
		if($activated) {
			$this->pageSlug = 'popUpThatPluginPopUp';
			$this->settings = new SettingsApi();
			$this->callbacks = new AdminCallbacks();
			$this->setSubPages();
			$this->settings->setSections($this->sectionManager[$this->pageSlug], $this->pageSlug);
			$this->settings->addSubpages($this->subPages)->register();
			add_action('init', array($this, 'activate'));
		}
	}

	public function activate() {}

	public function setSubPages() {
		$this->subPages = [
			[
				'parentSlug' => 'popUpThatPlugin',
				'pageTitle' => 'Pop Up That plugin',
				'menuTitle' => 'Pop up',
				'capability' => 'manage_options',
				'menuSlug' => 'popUpThatPluginPopUp',
				'callback' => array($this->callbacks, 'adminPopUp')
			]
		];
	}

}