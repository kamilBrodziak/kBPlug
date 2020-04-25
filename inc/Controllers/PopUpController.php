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
//        add_shortcode('kBPPopUp', array($this, 'setShortcode'));
        add_action('wp_footer', array($this, 'setShortcode'));
    }

	public function setShortcode() {
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
                        'id' => 'kBPPopUpHeader',
                        'title' => 'Header text',
                        'fieldType' => 'textarea',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpHeaderEnableMobile',
                        'title' => 'Enable header for mobile?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpHeaderMobile',
                        'title' => 'Header text (mobile)',
                        'fieldType' => 'textarea',
                        'args' => [
                            'class' => 'example'
                        ]
                    ]
                ]
            ],
            [
                'id' => 'kBPPopUpSubheaderSection',
                'title' => 'Pop up subheader',
                'fields' => [
                    [
                        'id' => 'kBPPopUpSubheaderEnable',
                        'title' => 'Enable subheader?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpSubheader',
                        'title' => 'Subheader text',
                        'fieldType' => 'textarea',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpSubheaderEnableMobile',
                        'title' => 'Enable subheader for mobile?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpSubheaderMobile',
                        'title' => 'Subheader text (mobile)',
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
                        'id' => 'kBPPopUpDescription',
                        'title' => 'Description text',
                        'fieldType' => 'textarea',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpDescriptionEnableMobile',
                        'title' => 'Enable description for mobile?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpDescriptionMobile',
                        'title' => 'Description text (mobile)',
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
                        'id' => 'kBPPopUpImage',
                        'title' => 'Image',
                        'fieldType' => 'image',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpImageEnableMobile',
                        'title' => 'Enable image for mobile?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpImageMobile',
                        'title' => 'Image (mobile)',
                        'fieldType' => 'image',
                        'args' => [
                            'class' => 'example'
                        ]
                    ]
                ]
            ],
            [
                'id' => 'kBPPopUpFormSection',
                'title' => 'Pop up form',
                'fields' => [
                    [
                        'id' => 'kBPPopUpFormEnable',
                        'title' => 'Enable form?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormEnableMobile',
                        'title' => 'Enable form for mobile?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormAction',
                        'title' => 'Form action',
                        'fieldType' => 'text',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormActionMobile',
                        'title' => 'Form action (mobile)',
                        'fieldType' => 'text',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormNameEnable',
                        'title' => 'Enable name input?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormName',
                        'title' => 'Name input placeholder',
                        'fieldType' => 'text',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormNameEnableMobile',
                        'title' => 'Enable name input for mobile?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormNameMobile',
                        'title' => 'Name input placeholder',
                        'fieldType' => 'text',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormEmailEnable',
                        'title' => 'Enable email input?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormEmail',
                        'title' => 'Email input placeholder',
                        'fieldType' => 'text',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormEmailEnableMobile',
                        'title' => 'Enable email input for mobile?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormEmailMobile',
                        'title' => 'Email input placeholder',
                        'fieldType' => 'text',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormPrivacyEnable',
                        'title' => 'Enable privacy policy checkbox?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormPrivacyAnchor',
                        'title' => 'Privacy policy site',
                        'fieldType' => 'text',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormPrivacyText',
                        'title' => 'Privacy policy text',
                        'fieldType' => 'text',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormPrivacyEnableMobile',
                        'title' => 'Enable privacy policy checkbox for mobile?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormPrivacyAnchorMobile',
                        'title' => 'Privacy policy site (mobile)',
                        'fieldType' => 'text',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormPrivacyTextMobile',
                        'title' => 'Privacy policy text (mobile)',
                        'fieldType' => 'text',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormMarketingEnable',
                        'title' => 'Enable marketing checkbox?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormMarketing',
                        'title' => 'Marketing text',
                        'fieldType' => 'text',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormMarketingEnableMobile',
                        'title' => 'Enable marketing checkbox for mobile?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormMarketingMobile',
                        'title' => 'Marketing text (mobile)',
                        'fieldType' => 'text',
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