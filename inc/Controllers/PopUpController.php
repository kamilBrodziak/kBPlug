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
		$option = get_option('kBPlugin');
		$activated = (isset($option['kBPPopUpEnable'])) ? ($option['kBPPopUpEnable'] ? true : false) : false;
		if($activated) {
			$this->pageSlug = 'kBPluginPopUp';
			$this->settings = new SettingsApi();
			$this->callbacks = new AdminCallbacks();
			$this->setSubPages();
			$this->setSections();
			$this->settings->addSubpages($this->subPages)->register();
			add_action('init', array($this, 'activate'));
		}
	}

	public function activate() {}

	public function setSubPages() {
		$this->subPages = [
			[
				'parentSlug' => 'kBPlugin',
				'pageTitle' => 'Pop Up',
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
                'id' => 'kBPHeaderSection',
                'title' => 'Pop up header',
                'fields' => [
                    [
                        'id' => 'kBPHeaderEnable',
                        'title' => 'Enable header?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPHeaderContent',
                        'title' => 'Header content',
                        'fieldType' => 'textarea',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPHeaderDiffForMobile',
                        'title' => 'Different for mobile?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPHeaderMobileContent',
                        'title' => 'Header content (mobile)',
                        'fieldType' => 'textarea',
                        'args' => [
                            'class' => 'example'
                        ]
                    ]
                ]
            ],
            [
                'id' => 'kBPSubHeaderSection',
                'title' => 'Pop up subheader',
                'fields' => [
                    [
                        'id' => 'kBPSubHeaderEnable',
                        'title' => 'Enable subheader?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPSubHeaderContent',
                        'title' => 'Subheader content',
                        'fieldType' => 'textarea',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPSubHeaderDiffForMobile',
                        'title' => 'Different for mobile?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPSubHeaderMobileContent',
                        'title' => 'Subheader content (mobile)',
                        'fieldType' => 'textarea',
                        'args' => [
                            'class' => 'example'
                        ]
                    ]
                ]
            ],
            [
                'id' => 'kBPDescriptionSection',
                'title' => 'Pop up description',
                'fields' => [
                    [
                        'id' => 'kBPDescriptionEnable',
                        'title' => 'Enable description?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPDescriptionContent',
                        'title' => 'Description content',
                        'fieldType' => 'textarea',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPDescriptionDiffForMobile',
                        'title' => 'Different for mobile?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPDescriptionMobileContent',
                        'title' => 'Description content (mobile)',
                        'fieldType' => 'textarea',
                        'args' => [
                            'class' => 'example'
                        ]
                    ]
                ]
            ],
            [
                'id' => 'kBPImageSection',
                'title' => 'Pop up image',
                'fields' => [
                    [
                        'id' => 'kBPImageEnable',
                        'title' => 'Enable image?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPImageMobileEnable',
                        'title' => 'Enable image for mobile?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPImageContent',
                        'title' => 'Image',
                        'fieldType' => 'image',
                        'args' => [
                            'class' => 'example'
                        ]
                    ],
                    [
                        'id' => 'kBPImageDiffForMobile',
                        'title' => 'Different for mobile?',
                        'fieldType' => 'checkbox',
                        'args' => [
                            'class' => 'uiToggle'
                        ]
                    ],
                    [
                        'id' => 'kBPImageMobileContent',
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