<?php
/**
 * @package popUpThat
 */

namespace Inc\Base;


class BaseController {
    public $pluginPath;
    public $pluginUrl;
    public $plugin;
    public $sectionsPerPage = array();
    public $dbOptionName = '';
    public $sectionManager = [];
    public $fieldManager = [];
    public $managers = [];

    public function __construct() {
        $this->pluginPath = plugin_dir_path(dirname(__FILE__, 2));
        $this->pluginUrl = plugin_dir_url(dirname(__FILE__, 2));
        $this->plugin = plugin_basename(dirname(__FILE__, 3)) . '/' . plugin_basename(dirname(__FILE__, 3)) . '.php';

        $this->dbOptionName = 'pUTpopUpGroup';

        /* pageSlug => [section []]*/
        $this->sectionManager = [
	        'popUpThatPlugin' => [
		        [
			        'id' => 'pUTFeaturesSection',
			        'title' => 'Plugin features enable',
			        'fields' => [
				        [
					        'id' => 'pUTPopUpEnable',
					        'title' => 'Enable pop up feature?',
					        'fieldType' => 'checkbox',
					        'args' => [
						        'class' => 'example'
					        ]
				        ]
			        ]
		        ]
	        ],
        	'popUpThatPluginPopUp' => [
		        [
			        'id' => 'pUTHeaderSection',
			        'title' => 'Pop up header',
			        'fields' => [
				        [
					        'id' => 'pUTHeaderEnable',
					        'title' => 'Enable header?',
					        'fieldType' => 'checkbox',
					        'args' => [
						        'class' => 'example'
					        ]
				        ],
				        [
					        'id' => 'pUTHeaderContent',
					        'title' => 'Header content',
					        'fieldType' => 'textarea',
					        'args' => [
						        'class' => 'example'
					        ]
				        ],
				        [
					        'id' => 'pUTHeaderDiffForMobile',
					        'title' => 'Different for mobile?',
					        'fieldType' => 'checkbox',
					        'args' => [
						        'class' => 'example'
					        ]
				        ],
				        [
					        'id' => 'pUTHeaderMobileContent',
					        'title' => 'Header content (mobile)',
					        'fieldType' => 'textarea',
					        'args' => [
						        'class' => 'example'
					        ]
				        ]
			        ]
		        ],
		        [
			        'id' => 'pUTSubHeaderSection',
			        'title' => 'Pop up subheader',
			        'fields' => [
				        [
					        'id' => 'pUtSubHeaderEnable',
					        'title' => 'Enable subheader?',
					        'fieldType' => 'checkbox',
					        'args' => [
						        'class' => 'example'
					        ]
				        ],
				        [
					        'id' => 'pUtSubHeaderContent',
					        'title' => 'Subheader content',
					        'fieldType' => 'textarea',
					        'args' => [
						        'class' => 'example'
					        ]
				        ],
				        [
					        'id' => 'pUtSubHeaderDiffForMobile',
					        'title' => 'Different for mobile?',
					        'fieldType' => 'checkbox',
					        'args' => [
						        'class' => 'example'
					        ]
				        ],
				        [
					        'id' => 'pUtSubHeaderMobileContent',
					        'title' => 'Subheader content (mobile)',
					        'fieldType' => 'textarea',
					        'args' => [
						        'class' => 'example'
					        ]
				        ]
			        ]
		        ],
		        [
			        'id' => 'pUTDescriptionSection',
			        'title' => 'Pop up description',
			        'fields' => [
				        [
					        'id' => 'pUTDescriptionEnable',
					        'title' => 'Enable description?',
					        'fieldType' => 'checkbox',
					        'args' => [
						        'class' => 'example'
					        ]
				        ],
				        [
					        'id' => 'pUTDescriptionContent',
					        'title' => 'Description content',
					        'fieldType' => 'textarea',
					        'args' => [
						        'class' => 'example'
					        ]
				        ],
				        [
					        'id' => 'pUTDescriptionDiffForMobile',
					        'title' => 'Different for mobile?',
					        'fieldType' => 'checkbox',
					        'args' => [
						        'class' => 'example'
					        ]
				        ],
				        [
					        'id' => 'pUTDescriptionMobileContent',
					        'title' => 'Description content (mobile)',
					        'fieldType' => 'textarea',
					        'args' => [
						        'class' => 'example'
					        ]
				        ]
			        ]
		        ],
		        [
			        'id' => 'pUTImageSection',
			        'title' => 'Pop up image',
			        'fields' => [
				        [
					        'id' => 'pUTImageEnable',
					        'title' => 'Enable image?',
					        'fieldType' => 'checkbox',
					        'args' => [
						        'class' => 'example'
					        ]
				        ],
				        [
					        'id' => 'pUTImageMobileEnable',
					        'title' => 'Enable image for mobile?',
					        'fieldType' => 'checkbox',
					        'args' => [
						        'class' => 'example'
					        ]
				        ],
				        [
					        'id' => 'pUTImageContent',
					        'title' => 'Image',
					        'fieldType' => 'image',
					        'args' => [
						        'class' => 'example'
					        ]
				        ],
				        [
					        'id' => 'pUTImageDiffForMobile',
					        'title' => 'Different for mobile?',
					        'fieldType' => 'checkbox',
					        'args' => [
						        'class' => 'example'
					        ]
				        ],
				        [
					        'id' => 'pUTImageMobileContent',
					        'title' => 'Image (mobile)',
					        'fieldType' => 'image',
					        'args' => [
						        'class' => 'example'
					        ]
				        ]
			        ]
		        ]
	        ]
        ];
//	    foreach ($this->sectionManager as $sections) {
//		    foreach ($sections as $section) {
//			    foreach ($section['fields'] as $field) {
////				    array_push($this->fieldManager, $field['id'] => $field['fieldType']);
//				    $this->fieldManager[$field['id']] = $field['fieldType'];
//			    }
//		    }
//	    }
    }
}