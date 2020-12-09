<?php



function loadPopUpAjax() {
    $mode = $_POST['mode'];
    $args = [];
    $content = [];
    $option = get_option('kBPluginPopUp');
    $pluginOption = get_option('kBPlugin');
    $customCSSPath = plugin_dir_path(dirname(__FILE__, 1)) . 'assets/css/fcStyle.min.css';
    $customCSSEnable = (isset($pluginOption['kBPCustomCSSEnable'])) ? ($pluginOption['kBPCustomCSSEnable'] ? true : false) : false &&
            file_exists($customCSSPath);
    if($customCSSEnable) {
        $content['customCSS'] = $customCSSPath;
    }
    $optionFor = $mode == 'mobile' ? 'Mobile' : '';
    $args['delay'] = isset($option["kBPPopUpModeDelay"])
        ? $option["kBPPopUpModeDelay"] : 0;
    $args['repetition'] = (isset($option["kBPPopUpModeRepetitionEnable"]) ? $option["kBPPopUpModeRepetitionEnable"] : false)
        && isset($option["kBPPopUpModeRepetition"]) ? $option['kBPPopUpModeRepetition'] : null;
//    if($args['repetition'] !== "-1" && $args['repetition'] !== null) {
//        $args['repetition'] = explode(";", $args['repetition']);
//        for($i = 0; $i < count($args['repetition']); ++$i) {
//            $args['repetition'][$i] = intval($args['repetition'][$i]);
//        }
//    } elseif($args['repetition'] !== null) {
//        $args['repetition'] = intval($args['repetition']);
//    }
    if((isset($option["kBPPopUpHeaderEnable${optionFor}"]) ? $option["kBPPopUpHeaderEnable${optionFor}"] : false)
        && isset($option["kBPPopUpHeader${optionFor}"]) )
        $content['header'] = $option["kBPPopUpHeader${optionFor}"];
    if((isset($option["kBPPopUpSubheaderEnable${optionFor}"]) ? $option["kBPPopUpSubheaderEnable${optionFor}"] : false)
        && isset($option["kBPPopUpSubheader${optionFor}"]))
        $content['subheader'] = $option["kBPPopUpSubheader${optionFor}"];
    if((isset($option["kBPPopUpDescriptionEnable${optionFor}"]) ? $option["kBPPopUpDescriptionEnable${optionFor}"] : false)
        && isset($option["kBPPopUpDescription${optionFor}"]))
        $content['description'] = $option['kBPPopUpDescription'];
    if((isset($option["kBPPopUpImageEnable${optionFor}"]) ? $option["kBPPopUpImageEnable${optionFor}"] : false) &&
        isset($option["kBPPopUpImage${optionFor}"]))
        $content['image'] = $option["kBPPopUpImage${optionFor}"];
    if(isset($option["kBPPopUpFormEnable${optionFor}"]) ? $option["kBPPopUpFormEnable${optionFor}"] : false) {
        $form = [];
        $form['action'] = (isset($option["kBPPopUpFormAction${optionFor}"])) ? $option["kBPPopUpFormAction${optionFor}"] : '';
        if(isset($option["kBPPopUpFormNameEnable${optionFor}"]) ? $option["kBPPopUpFormNameEnable${optionFor}"] : false) {
            $form['name'] = [];
            $form['name']['label'] = (isset($option["kBPPopUpFormNameLabel${optionFor}"]))
                ? $option["kBPPopUpFormNameLabel${optionFor}"] : '';
            $form['name']['placeholder'] = (isset($option["kBPPopUpFormNamePlaceholder${optionFor}"]))
                ? $option['kBPPopUpFormNamePlaceholder'] : '';
        }
        if(isset($option["kBPPopUpFormEmailEnable${optionFor}"]) ? $option["kBPPopUpFormEmailEnable${optionFor}"] : false) {
            $form['email'] = [];
            $form['email']['label'] = (isset($option["kBPPopUpFormEmailLabel${optionFor}"]))
                ? $option["kBPPopUpFormEmailLabel${optionFor}"] : '';
            $form['email']['placeholder'] = (isset($option["kBPPopUpFormEmailPlaceholder${optionFor}"]))
                ? $option["kBPPopUpFormEmailPlaceholder${optionFor}"] : '';
        }
        if(isset($option["kBPPopUpFormPrivacyEnable${optionFor}"]) ? $option["kBPPopUpFormPrivacyEnable${optionFor}"] : false) {
            $form['privacy'] = [];
            $form['privacy']['label']['left'] = (isset($option["kBPPopUpFormPrivacyLeftText${optionFor}"]))
                ? $option["kBPPopUpFormPrivacyLeftText${optionFor}"] : '';
            $form['privacy']['label']['right'] = (isset($option["kBPPopUpFormPrivacyRightText${optionFor}"]))
                ? $option["kBPPopUpFormPrivacyRightText${optionFor}"] : '';
            $form['privacy']['link']['url'] = (isset($option["kBPPopUpFormAnchor${optionFor}"]))
                ? $option["kBPPopUpFormAction${optionFor}"] : '';
            $form['privacy']['link']['text'] = (isset($option["kBPPopUpFormPrivacyAnchorText${optionFor}"]))
                ? $option['kBPPopUpFormPrivacyAnchorText'] : '';
        }
        if(isset($option["kBPPopUpFormMarketingEnable${optionFor}"]) ? $option["kBPPopUpFormMarketingEnable${optionFor}"] : false) {
            $form['marketing'] = [];
            $form['marketing']['label'] = (isset($option["kBPPopUpFormMarketing${optionFor}"]))
                ? $option["kBPPopUpFormMarketing${optionFor}"] : '';
        }
        if(isset($option['kBPPopUpFormCaptchaEnable']) ? $option['kBPPopUpFormCaptchaEnable'] : false) {
            $form['captcha'] = (isset($option['kBPPopUpFormCaptchaSiteKey'])) ? $option['kBPPopUpFormCaptchaSiteKey'] : '';
        }
        $form['submit'] = (isset($option["kBPPopUpFormSubmit${optionFor}"]))
            ? $option["kBPPopUpFormSubmit${optionFor}"] : '';
        $content['form'] = $form;
    }
    $args['content'] = loadPopUp($content);
    $pluginUrl = plugin_dir_url(dirname(__FILE__, 1));
//    $args['js'] = "<script src='${pluginUrl}/assets/js/frontend/PopUpController.js'></script>";
    echo json_encode($args);
    die();
}

add_action('wp_ajax_nopriv_loadPopUpAjax', 'loadPopUpAjax');
add_action('wp_ajax_loadPopUpAjax', 'loadPopUpAjax');