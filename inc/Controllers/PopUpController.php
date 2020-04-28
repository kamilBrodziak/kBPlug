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
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormActionMobile',
                        'title' => 'Form action (mobile)',
                        'fieldType' => 'text',
                        'args' => [
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
                        'id' => 'kBPPopUpFormNameLabel',
                        'title' => 'Name input label',
                        'fieldType' => 'text',
                        'args' => [
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormNamePlaceholder',
                        'title' => 'Name input placeholder',
                        'fieldType' => 'text',
                        'args' => [
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
                        'id' => 'kBPPopUpFormNameLabelMobile',
                        'title' => 'Name input label (mobile)',
                        'fieldType' => 'text',
                        'args' => [
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormNamePlaceholderMobile',
                        'title' => 'Name input placeholder (mobile)',
                        'fieldType' => 'text',
                        'args' => [
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
                        'id' => 'kBPPopUpFormEmailLabel',
                        'title' => 'Email input label',
                        'fieldType' => 'text',
                        'args' => [
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormEmailPlaceholder',
                        'title' => 'Email input placeholder',
                        'fieldType' => 'text',
                        'args' => [
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
                        'id' => 'kBPPopUpFormEmailLabelMobile',
                        'title' => 'Email input label (mobile)',
                        'fieldType' => 'text',
                        'args' => [
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormEmailPlaceholderMobile',
                        'title' => 'Email input placeholder (mobile)',
                        'fieldType' => 'text',
                        'args' => [
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
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormPrivacyLeftText',
                        'title' => 'Privacy policy text before anchor',
                        'fieldType' => 'textarea',
                        'args' => [
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormPrivacyAnchorText',
                        'title' => 'Privacy policy anchor text',
                        'fieldType' => 'text',
                        'args' => [
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormPrivacyRightText',
                        'title' => 'Privacy policy text after anchor',
                        'fieldType' => 'textarea',
                        'args' => [
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
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormPrivacyLeftTextMobile',
                        'title' => 'Privacy policy text before anchor (mobile)',
                        'fieldType' => 'textarea',
                        'args' => [
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormPrivacyAnchorTextMobile',
                        'title' => 'Privacy policy anchor text (mobile)',
                        'fieldType' => 'text',
                        'args' => [
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormPrivacyRightTextMobile',
                        'title' => 'Privacy policy text after anchor (mobile)',
                        'fieldType' => 'textarea',
                        'args' => [
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
                        'fieldType' => 'textarea',
                        'args' => [
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
                        'fieldType' => 'textarea',
                        'args' => [
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormSubmit',
                        'title' => 'Submit button text',
                        'fieldType' => 'text',
                        'args' => [
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpFormSubmitMobile',
                        'title' => 'Submit button text (mobile)',
                        'fieldType' => 'text',
                        'args' => [
                        ]
                    ]
                ]
            ],
            [
                'id' => 'kBPPopUpModeSection',
                'title' => 'Pop up mode',
                'fields' => [
                    [
                        'id' => 'kBPPopUpModeDelay',
                        'title' => 'Pop up delay(seconds)',
                        'fieldType' => 'number',
                        'args' => [
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpModeRepetitionEnable',
                        'title' => 'Enable custom repetition?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle',
                            'label' => 'Default is: always display once after user enter or refresh a page on domain'
                        ]
                    ],
                    [
                        'id' => 'kBPPopUpModeRepetition',
                        'title' => 'Pop up repetition after closing(minutes)',
                        'fieldType' => 'numbersSeparated',
                        'args' => [
                            'label' => 'If you want many times display pop up, for example second time after 2 minutes, third time after 5 minutes, write 2;5.' .
                                ' If you want display only one time - write 525600(minutes in one year)). '
                        ]
                    ]
                ]
            ]
        ];

        $this->settings->setSections($sections, $this->pageSlug);
    }

}