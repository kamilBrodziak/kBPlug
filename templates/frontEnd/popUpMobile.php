<?php

function loadPopUp($args) {
    $popup =  "<aside id='kBPPopUp'>";
    $popup .= "<header id='kBPPopUpHeader'>";
    $popup .= loadPopUpCloseButton();
    $popup .= '</header>';
    $popup .= "<section id='kBPPopUpContent' class='kBPFlexCentered'>";
    if(!empty($args['image'])) {
        $popup .= "<section id='kBPPopUpLeftContent'>";
        $popup .= loadPopUpImage($args['image']);
        $popup .= "</section>";
    }

    $popup .= "<section id='kBPPopUpRightContent'>";
    if(!empty($args['header'])) {
        $popup .= loadPopUpHeader($args['header']);
    }
    if(!empty($args['subheader'])) {
        $popup .= loadPopUpSubheader($args['subheader']);
    }
    if(!empty($args['description'])) {
        $popup .= loadPopUpDescription($args['description']);
    }
    $captchaEnabled = !empty($args['form']['captcha']);
    if(!empty($args['form'])) {
        $popup .= loadPopUpForm($args['form'], $captchaEnabled);
    }
    $popup .= "</section>";
    $popup .= "</section>";
    $pluginUrl = plugin_dir_url(dirname(__FILE__, 2));
    $popup .= "<footer id='kBPPopUpFooter'>";
    $popup .= "</footer>";
    $popup .= "<link rel='stylesheet' href='${pluginUrl}assets/css/fStyle.css' type='text/css' />";
    if(!empty($args['customCSS'])) {
        $popup .= "<link rel='stylesheet' href='${pluginUrl}assets/css/fcStyle.min.css' type='text/css' />";
    }
    if($captchaEnabled) {
        $popup .= "<script src='https://www.google.com/recaptcha/api.js' async defer></script>";
    }
    $popup .= "</aside>";
    return $popup;
}

function loadPopUpCloseButton() {
    return "<button id='kBPPopUpCloseButton' class='kBPCloseButton'></button>";
}

function loadPopUpImage($imageSrc) {
    return "<figure id='kBPPopUpImgContainer' class='kBPFlexCentered'>
                <img src='${imageSrc}' alt='Newsletter image' id='kBPPopUpImg'/>
            </figure>";
}

function loadPopUpHeader($text){
    return "<h1 id='kBPPopUpTitle'>${text}</h1>";
}

function loadPopUpSubheader($text) {
    return "<h1 id='kBPPopUpSubTitle'>${text}</h1>";
}

function loadPopUpDescription($text) {
    return "<p id='kBPPopUpDescription'>${text}</p>";
}

function loadPopUpForm($form, $captchaEnabled) {
    $result = "<form id='kBPPopUpForm' action='${form['action']}' target='_blank'>";
    if(!empty($form['name'])) {
        $label = $form['name']['label'];
        $placeholder = $form['name']['placeholder'];
        $result .= "
            <label class='kBPVerticalLabel'>
                <span id='kBPPopUpFormNameLabelText'>${label}</span>
                <input type='text' name='name' pattern='[a-zA-Z ]+'
                        title='Imię może składać się tylko z liter' 
                        id='kBPopUpFormName' class='kBPGradientInput'
                        placeholder='${placeholder}' required>
            </label>";
    }
    if(!empty($form['email'])) {
        $label = $form['email']['label'];
        $placeholder = $form['email']['placeholder'];
        $result .= "
            <label class='kBPVerticalLabel'>
                <span id='kBPPopUpFormEmailLabelText'>${label}</span>
                <input type='text' name='email' pattern='[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$'
                        title='Email musi być w formacie: przyklad@przyklad.przyklad' 
                        id='kBPopUpFormEmail' class='kBPGradientInput'
                        placeholder='${placeholder}' required >
            </label>";
    }
    if(!empty($form['privacy'])) {
        $leftText = $form['privacy']['label']['left'];
        $rightText = $form['privacy']['label']['right'];
        $link = $form['privacy']['link']['url'];
        $linkText = $form['privacy']['link']['text'];
        $result .= "
            <label class='kBPHorizontalLabel'>
                <input type='checkbox' name='polityka' id='kBPPopUpFormPrivacy' class='kBPGradientCheckbox' required>
                <span id='kBPPopUpFormPrivacyLabelText'>
                    ${leftText}
                    <a href='${link}' target='_blank' class='kBPBlackLink'>
                        ${linkText}
                    </a>
                    ${rightText}
                </span>
            </label>";
    }
    if(!empty($form['marketing'])) {
        $label = $form['marketing']['label'];
        $result .= "
            <label class='kBPHorizontalLabel'>
                <input type='checkbox' name='marketing' id='kBPPopUpFormMarketing' class='kBPGradientCheckbox' required>
                <span id='kBPPopUpFormNameMarketingText'>${label}</span>
            </label>";
    }
    $submitText = $form['submit'];
    $buttonClass = "kBPButtonBlackAnimated kBPBorderRadiusTen";
    $buttonData = '';
    if($captchaEnabled) {
//        $buttonClass .= ' g-recaptcha';
        $captcha = $form['captcha'];
//        $buttonData .= " data-sitekey= '${captcha}' data-callback='onKBPPopUpSubmit' data-action='submit'";
        $result .= "<div class='g-recaptcha' data-sitekey='${captcha}' data-callback='onKBPPopUpSubmit' data-size='invisible'></div>";
    }
    $result .= "<button type='submit' id='kBPPopUpFormSubmit' class='${buttonClass}'${buttonData}>${submitText}</button>";
    $result .= "</form>";
    return $result;
}


