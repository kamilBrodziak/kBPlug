<?php
/**
 * @package popUpThat
 */

namespace Inc\Pages;


use Inc\Api\Callbacks\SettingsCallbacks;
use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use \Inc\Api\Callbacks\AdminCallbacks;

class Dashboard extends BaseController {
	public $settings;
	public $pages;
	public $subPages;
	public $callbacks;
	public $settingsCallbacks;
	public $pageSlug = '';
	public function register() {
		$this->pageSlug = 'popUpThatPlugin';
		$this->settings = new SettingsApi();
		$this->settingsCallbacks = new SettingsCallbacks($this->pageSlug);
		$this->callbacks = new AdminCallbacks();
		$this->setPages();
//		$this->setSubPages();
		$this->settings->setSections($this->sectionManager[$this->pageSlug], $this->pageSlug);
		$this->settings->addPages($this->pages)->withSubPage('Dashboard')->register();
    }

    public function setPages() {
	    $this->pages = [
		    [
			    'pageTitle' => 'Pop Up That plugin',
			    'menuTitle' => 'PopUpThat',
			    'capability' => 'manage_options',
			    'menuSlug' => $this->pageSlug,
			    'callback' => array($this->callbacks, 'adminDashboard'),
			    'iconUrl' => 'dashicons-chart-area',
			    'position' => 110
		    ]
	    ];
    }

//    public function setSubPages() {
//	    $adminPage = $this->pages[0];
//	    $this->subPages = [
//		    [
//			    'parentSlug' => $adminPage['menuSlug'],
//			    'pageTitle' => $adminPage['pageTitle'],
//			    'menuTitle' => 'Settings',
//			    'capability' => $adminPage['capability'],
//			    'menuSlug' => 'popUpThatPluginSettings',
//			    'callback' => array($this->callbacks, 'adminSettings')
//		    ],
//		    [
//			    'parentSlug' => $adminPage['menuSlug'],
//			    'pageTitle' => $adminPage['pageTitle'],
//			    'menuTitle' => 'Content',
//			    'capability' => $adminPage['capability'],
//			    'menuSlug' => 'popUpThatPluginContent',
//			    'callback' => array($this->callbacks, 'adminContent')
//		    ],
//		    [
//			    'parentSlug' => $adminPage['menuSlug'],
//			    'pageTitle' => $adminPage['pageTitle'],
//			    'menuTitle' => 'Other',
//			    'capability' => $adminPage['capability'],
//			    'menuSlug' => 'popUpThatPluginOther',
//			    'callback' => array($this->callbacks, 'adminOther')
//		    ]
//	    ];
//    }
}