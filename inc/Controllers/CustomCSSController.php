<?php


namespace kbPlug\Inc\Controllers;


use kbPlug\Inc\Api\Callbacks\AdminCallbacks;
use kbPlug\Inc\Api\SettingsApi;
use kbPlug\Inc\Base\BaseController;

class CustomCSSController extends BaseController {
    public $subPages;
    public $settings;
    public $callbacks;
    public $pageSlug;


    public function register() {
        if($this->isActivated('kBPCustomCSSEnable')) {
            $this->pageSlug = 'kBPluginCustomCSS';
            $this->settings = new SettingsApi();
            $this->callbacks = new AdminCallbacks();
            $this->setSubPages();
            //        $this->setSections();
            $this->settings->addSubpages($this->subPages)->register();
            add_action('init', array($this, 'activate'));
        }
    }

    public function activate() {}


    public function setSubPages() {
        $this->subPages = [
            [
                'parentSlug' => 'kBPlugin',
                'pageTitle' => 'kBPlugin Custom CSS',
                'menuTitle' => 'Custom CSS',
                'capability' => 'manage_options',
                'menuSlug' => 'kBPluginCustomCSS',
                'callback' => array($this->callbacks, 'adminCustomCSS')
            ]
        ];
    }

    public function setSections() {
        $sections = [
            [
                'id' => 'kBPPopUpStyleSection',
                'title' => 'Style pop up',
                'fields' => [
                    [
                        'id' => 'kBPCustomCSSEnable',
                        'title' => 'Enable custom css?:',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPCustomCSS',
                        'title' => 'Custom CSS:',
                        'fieldType' => 'customCSS',
                        'args' => [
                            'class' => 'example'
                        ]
                    ]
                ]
            ]
        ];

        $this->settings->setSections($sections, $this->pageSlug);
    }
}