<?php
/**
 * @package popUpThat
 */

namespace Inc\Controllers;

use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Base\BaseController;


class PopUpController extends BaseController {
	public $subPages;
	public $settings;
	public $callbacks;
	public $pageSlug;


	public function register() {
		if($this->isActivated('kBPPopUpEnable')) {
			$this->pageSlug = 'kBPluginPopUp';
			$this->settings = new SettingsApi();
			$this->callbacks = new AdminCallbacks();
			$this->setSubPages();
			$this->setSections();
			$this->settings->addSubpages($this->subPages)->register();
			add_action('init', array($this, 'activate'));
		}
	}

	public function activate() {
        add_shortcode('kBPPopUp', array($this, 'setShortcode'));
    }

	public function setShortcode() {
//	    return
//            '<aside id="kBPPopUp">
//                <header id="kBPPopUpHeader">
//                    <h2 id="kBPPopUpTitle">title</h2>
//                </header>
//                <section id="kBPPopUpContent">
//                    <h3 id="kBPPopUpSubHeader">sub</h3>
//                    <div id="kBPPopUpDescription">desc</div>
//                    <figure id="kBPPopUpImgContainer">
//                        <img id="kBPPopUpImg"/>
//                    </figure>
//                    <form id="kBPPopUpForm"></form>
//                </section>
//                <footer id="kBPPopUpFooter">
//                    <a id="kBPPopUpClose">X</a>
//                </footer>
//            </aside>';
        return require_once("$this->pluginPath/templates/frontEnd/popUp.php");
    }

	public function setSubPages() {
		$this->subPages = [
			[
				'parentSlug' => 'kBPlugin',
				'pageTitle' => 'kBPlugin Pop up',
				'menuTitle' => 'Pop up',
				'capability' => 'manage_options',
				'menuSlug' => 'kBPluginPopUp',
				'callback' => array($this->callbacks, 'adminPopUp')
			]
		];
	}

    public function setSections() {
        $sections = [
            [
                'id' => 'kBPPopUpHeaderSection',
                'title' => 'Pop up header',
                'fields' => [
                    [
                        'id' => 'kBPPopUpHeaderEnable',
                        'title' => 'Enable header?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpHeaderContent',
                        'title' => 'Header content',
                        'fieldType' => 'textarea',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpHeaderMobileEnable',
                        'title' => 'Enable header for mobile?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpHeaderMobileContent',
                        'title' => 'Header content (mobile)',
                        'fieldType' => 'textarea',
                        'args' => [
                            'class' => 'example'
                        ]
                    ]
                ]
            ],
            [
                'id' => 'kBPPopUpSubHeaderSection',
                'title' => 'Pop up subheader',
                'fields' => [
                    [
                        'id' => 'kBPPopUpSubHeaderEnable',
                        'title' => 'Enable subheader?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpSubHeaderContent',
                        'title' => 'Subheader content',
                        'fieldType' => 'textarea',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpSubHeaderMobileEnable',
                        'title' => 'Enable subheader for mobile?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpSubHeaderMobileContent',
                        'title' => 'Subheader content (mobile)',
                        'fieldType' => 'textarea',
                        'args' => [
                            'class' => 'example'
                        ]
                    ]
                ]
            ],
            [
                'id' => 'kBPPopUpDescriptionSection',
                'title' => 'Pop up description',
                'fields' => [
                    [
                        'id' => 'kBPPopUpDescriptionEnable',
                        'title' => 'Enable description?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpDescriptionContent',
                        'title' => 'Description content',
                        'fieldType' => 'textarea',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpDescriptionMobileEnable',
                        'title' => 'Enable description for mobile?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpDescriptionMobileContent',
                        'title' => 'Description content (mobile)',
                        'fieldType' => 'textarea',
                        'args' => [
                            'class' => 'example'
                        ]
                    ]
                ]
            ],
            [
                'id' => 'kBPPopUpImageSection',
                'title' => 'Pop up image',
                'fields' => [
                    [
                        'id' => 'kBPPopUpImageEnable',
                        'title' => 'Enable image?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpImageContent',
                        'title' => 'Image',
                        'fieldType' => 'image',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpImageMobileEnable',
                        'title' => 'Enable image for mobile?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpImageMobileContent',
                        'title' => 'Image (mobile)',
                        'fieldType' => 'image',
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