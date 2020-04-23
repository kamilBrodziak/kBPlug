<?php
/**
 * @package popUpThat
 */

namespace Inc\Controllers;


use Inc\Base\BaseController;
use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;

class DashboardController extends BaseController {
	public $settings;
	public $pages;
	public $subPages;
	public $callbacks;
	public $pageSlug = '';
	public function register() {
		$this->pageSlug = 'kBPlugin';
		$this->settings = new SettingsApi();
		$this->callbacks = new AdminCallbacks();
		$this->setPages();
		$this->setSections();
		$this->settings->addPages($this->pages)->withSubPage('Dashboard')->register();
    }

    public function setPages() {
	    $this->pages = [
		    [
			    'pageTitle' => 'kBPlugin Dashboard',
			    'menuTitle' => 'kBPlugin',
			    'capability' => 'manage_options',
			    'menuSlug' => $this->pageSlug,
			    'callback' => array($this->callbacks, 'adminDashboard'),
			    'iconUrl' => 'dashicons-chart-area',
			    'position' => 110
		    ]
	    ];
    }

    public function setSections() {
	    $sections = [
            [
                'id' => 'kBPFeaturesSection',
                'title' => 'Plugin features enable',
                'fields' => [
                    [
                        'id' => 'kBPPopUpEnable',
                        'title' => 'Enable pop up feature?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ]
                ]
            ]
        ];

        $this->settings->setSections($sections, $this->pageSlug);
    }
}