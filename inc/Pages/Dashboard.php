<?php
/**
 * @package popUpThat
 */

namespace Inc\Pages;


use Inc\Base\BaseController;
use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;

class Dashboard extends BaseController {
	public $settings;
	public $pages;
	public $subPages;
	public $callbacks;
	public $pageSlug = '';
	public function register() {
		$this->pageSlug = 'popUpThatPlugin';
		$this->settings = new SettingsApi();
		$this->callbacks = new AdminCallbacks();
		$this->setPages();
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
}