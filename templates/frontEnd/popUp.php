<?php
    $option = get_option('kBPluginPopUp');
    $headerEnable = isset($option['kBPPopUpHeaderEnable']) ? $option['kBPPopUpHeaderEnable'] : false;
    $header = (isset($option['kBPPopUpHeader']) && $headerEnable)
            ? $option['kBPPopUpHeader'] : '';
    $headerEnableMobile = isset($option['kBPPopUpHeaderEnableMobile']) ? $option['kBPPopUpHeaderEnableMobile'] : false;
    $headerMobile = (isset($option['kBPPopUpHeaderMobile']) && $headerEnableMobile)
            ? $option['kBPPopUpHeaderMobile'] : '';
    $subheaderEnable = isset($option['kBPPopUpSubheaderEnable']) ? $option['kBPPopUpSubheaderEnable'] : false;
    $subheader = (isset($option['kBPPopUpSubheader']) && $subheaderEnable)
            ? $option['kBPPopUpSubheader'] : '';
    $subheaderEnableMobile = isset($option['kBPPopUpSubheaderEnableMobile']) ? $option['kBPPopUpSubheaderEnableMobile'] : false;
    $subheaderMobile = (isset($option['kBPPopUpSubheaderMobile']) && $subheaderEnableMobile)
            ? $option['kBPPopUpSubheaderMobile'] : '';
    $descriptionEnable = isset($option['kBPPopUpDescriptionEnable']) ? $option['kBPPopUpDescriptionEnable'] : false;
    $description = (isset($option['kBPPopUpDescription']) && $descriptionEnable)
            ? $option['kBPPopUpDescription'] : '';
    $descriptionEnableMobile = isset($option['kBPPopUpDescriptionEnableMobile']) ? $option['kBPPopUpDescriptionEnableMobile'] : false;
    $descriptionMobile = (isset($option['kBPPopUpDescriptionMobile']) && $descriptionEnableMobile)
            ? $option['kBPPopUpDescriptionMobile'] : '';
    $imageEnable = isset($option['kBPPopUpImageEnable']) ? $option['kBPPopUpImageEnable'] : false;
    $imageSRC = (isset($option['kBPPopUpImage']) && $imageEnable)
            ? $option['kBPPopUpImage'] : '';
    $imageEnableMobile = isset($option['kBPPopUpImageEnableMobile']) ? $option['kBPPopUpImageEnableMobile'] : false;
    $imageSRCMobile = (isset($option['kBPPopUpImageMobile']) && $imageEnableMobile)
            ? $option['kBPPopUpImageMobile'] : '';
    $formEnable = isset($option['kBPPopUpFormEnable']) ? $option['kBPPopUpFormEnable'] : false;
    $formEnableMobile = isset($option['kBPPopUpFormEnableMobile']) ? $option['kBPPopUpFormEnableMobile'] : false;
    $formAction = (isset($option['kBPPopUpFormAction']) && $formEnable)
        ? $option['kBPPopUpFormAction'] : '';;
    $formActionMobile = (isset($option['kBPPopUpFormActionMobile']) && $formEnableMobile)
        ? $option['kBPPopUpFormActionMobile'] : '';
    $formNameEnable = isset($option['kBPPopUpFormNameEnable']) ? $option['kBPPopUpFormNameEnable'] : false;
    $formNameLabel = (isset($option['kBPPopUpFormNameLabel']) && $formNameEnable)
        ? $option['kBPPopUpFormNameLabel'] : '';
    $formNamePlaceholder = (isset($option['kBPPopUpFormNamePlaceholder']) && $formNameEnable)
        ? $option['kBPPopUpFormNamePlaceholder'] : '';
    $formNameEnableMobile = isset($option['kBPPopUpFormNameEnableMobile']) ? $option['kBPPopUpFormNameEnableMobile'] : false;
    $formNameLabelMobile = (isset($option['kBPPopUpFormNameLabelMobile']) && $formNameEnableMobile)
        ? $option['kBPPopUpFormNameLabelMobile'] : '';
    $formNamePlaceholderMobile = (isset($option['kBPPopUpFormNamePlaceholderMobile']) && $formNameEnableMobile)
        ? $option['kBPPopUpFormNamePlaceholderMobile'] : '';
    $formEmailEnable = isset($option['kBPPopUpFormEmailEnable']) ? $option['kBPPopUpFormEmailEnable'] : false;
    $formEmailLabel = (isset($option['kBPPopUpFormEmailLabel']) && $formEmailEnable)
        ? $option['kBPPopUpFormEmailLabel'] : '';
    $formEmailPlaceholder = (isset($option['kBPPopUpFormEmailPlaceholder']) && $formEmailEnable)
        ? $option['kBPPopUpFormEmailPlaceholder'] : '';
    $formEmailEnableMobile = isset($option['kBPPopUpFormEmailEnableMobile']) ? $option['kBPPopUpFormEmailEnableMobile'] : false;
    $formEmailLabelMobile = (isset($option['kBPPopUpFormEmailLabelMobile']) && $formEmailEnableMobile)
        ? $option['kBPPopUpFormEmailLabelMobile'] : '';
    $formEmailPlaceholderMobile = (isset($option['kBPPopUpFormEmailPlaceholderMobile']) && $formEmailEnableMobile)
        ? $option['kBPPopUpFormEmailPlaceholderMobile'] : '';
    $formPrivacyEnable = isset($option['kBPPopUpFormPrivacyEnable']) ? $option['kBPPopUpFormPrivacyEnable'] : false;
    $formPrivacyLeftText = (isset($option['kBPPopUpFormPrivacyLeftText']) && $formPrivacyEnable)
        ? $option['kBPPopUpFormPrivacyLeftText'] : '';
    $formPrivacyAnchorText = (isset($option['kBPPopUpFormPrivacyAnchorText']) && $formPrivacyEnable)
        ? $option['kBPPopUpFormPrivacyAnchorText'] : '';
    $formPrivacyRightText = (isset($option['kBPPopUpFormPrivacyRightText']) && $formPrivacyEnable)
        ? $option['kBPPopUpFormPrivacyRightText'] : '';
    $formPrivacyAnchor = (isset($option['kBPPopUpFormAnchor']) && $formPrivacyEnable)
        ? $option['kBPPopUpFormAction'] : '';;
    $formPrivacyEnableMobile = isset($option['kBPPopUpFormPrivacyEnableMobile']) ? $option['kBPPopUpFormPrivacyEnableMobile'] : false;
    $formPrivacyLeftTextMobile = (isset($option['kBPPopUpFormPrivacyLeftTextMobile']) && $formPrivacyEnable)
        ? $option['kBPPopUpFormPrivacyLeftTextMobile'] : '';
    $formPrivacyAnchorTextMobile = (isset($option['kBPPopUpFormPrivacyAnchorTextMobile']) && $formPrivacyEnable)
        ? $option['kBPPopUpFormPrivacyAnchorTextMobile'] : '';
    $formPrivacyRightTextMobile = (isset($option['kBPPopUpFormPrivacyRightTextMobile']) && $formPrivacyEnable)
        ? $option['kBPPopUpFormPrivacyRightTextMobile'] : '';
    $formPrivacyAnchorMobile = (isset($option['kBPPopUpFormPrivacyAnchorMobile']) && $formPrivacyEnableMobile)
        ? $option['kBPPopUpFormPrivacyAnchorMobile'] : '';;
    $formMarketingEnable = isset($option['kBPPopUpFormMarketingEnable']) ? $option['kBPPopUpFormMarketingEnable'] : false;
    $formMarketing = (isset($option['kBPPopUpFormMarketing']) && $formMarketingEnable)
        ? $option['kBPPopUpFormMarketing'] : '';
    $formMarketingEnableMobile = isset($option['kBPPopUpFormMarketingEnableMobile']) ? $option['kBPPopUpFormMarketingEnableMobile'] : false;
    $formMarketingMobile = (isset($option['kBPPopUpFormMarketingMobile']) && $formMarketingEnableMobile)
        ? $option['kBPPopUpFormMarketingMobile'] : '';
    $formSubmit = (isset($option['kBPPopUpFormSubmit']))
        ? $option['kBPPopUpFormSubmit'] : '';
    $formSubmitMobile = (isset($option['kBPPopUpFormSubmitMobile']))
        ? $option['kBPPopUpFormSubmitMobile'] : '';
    $kBPPopUpModeDelay = isset($option['kBPPopUpModeDelay'])
        ? $option['kBPPopUpModeDelay'] : 0;
    $customModeRepetitionEnable = isset($option['kBPPopUpModeRepetitionEnable']) ? $option['kBPPopUpModeRepetitionEnable'] : false;
    $kBPPopUpModeRepetition = (isset($option['kBPPopUpModeRepetition']) && $customModeRepetitionEnable)
        ? $option['kBPPopUpModeRepetition'] : '';
?>

<aside id="kBPPopUp" data-delay="<?php echo $kBPPopUpModeDelay; ?>" data-repetition="<?php echo $kBPPopUpModeRepetition; ?>" >
<!--    <div id="kBPPopUpWrapper">-->
        <div id="kBPPopUpCloseButtonContainer">
            <a id='kBPPopUpCloseButton' href="#">
                <div class="kBPPopUpCloseButtonPart"></div>
                <div class="kBPPopUpCloseButtonPart"></div>
            </a>
        </div>
        <?php if($imageEnable) : ?>
            <figure id="kBPPopUpImgContainer" class="kBPPopUpContentDesktop">
                <img src="<?php echo $imageSRC; ?>" alt="Newsletter image" id="kBPPopUpImg"/>
            </figure>
        <?php endif ?>
        <?php if($imageEnableMobile) : ?>
            <figure id="kBPPopUpImgContainerMobile" class="kBPPopUpContentMobile">
                <img src="<?php echo $imageSRCMobile; ?>" alt="Newsletter image" id="kBPPopUpImgMobile"/>
            </figure>
        <?php endif ?>
        <div id="kBPPopUpContent">
            <h2 id="kBPPopUpTitle">
                <span class="kBPPopUpContentDesktop"><?php echo $header; ?></span>
                <span class="kBPPopUpContentMobile"><?php echo $headerMobile; ?></span>
            </h2>
            <h3 id="kBPPopUpSubHeader">
                <span class="kBPPopUpContentDesktop"><?php echo $subheader; ?></span>
                <span class="kBPPopUpContentMobile"><?php echo $subheaderMobile; ?></span>
            </h3>
            <div id="kBPPopUpDescription">
                <span class="kBPPopUpContentDesktop"><?php echo $description; ?></span>
                <span class="kBPPopUpContentMobile"><?php echo $descriptionMobile; ?></span>
            </div>
            <?php if($formEnable) : ?>
                <form id="kBPPopUpForm" class="kBPPopUpContentDesktop kBPPopUpForms" target="_blank" action="<?php echo $formAction ?>">
                    <?php if($formNameEnable) : ?>
                        <label for="kBPopUpFormName">
                            <?php echo $formNameLabel; ?>
                            <input type='text' name='name' pattern="[a-zA-Z ]+" title="Imię może składać się tylko z liter" id="kBPopUpFormName" required placeholder='<?php echo $formNamePlaceholder; ?>'>
                        </label>
                    <?php endif ?>
                    <?php if($formEmailEnable) : ?>
                        <label for="kBPPopUpFormEmail">
                            <?php echo $formEmailLabel; ?>
                            <input type='email' id='kBPPopUpFormEmail' name='email'
                                   pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" title="Email musi być w formacie: przyklad@przyklad.przyklad"
                                   required placeholder='<?php echo $formEmailPlaceholder; ?>'>
                        </label>
                    <?php endif ?>
                    <?php if($formPrivacyEnable) : ?>
                        <label for="kBPPopUpFormPrivacy" class="kBPCheckboxLabel">
                            <input type='checkbox' name='polityka' required id='kBPPopUpFormPrivacy'>
                            <span class="kBPPopUpFormCheckboxInfo">
                                <?php echo $formPrivacyLeftText; ?>
                                <a href='<?php echo $formPrivacyAnchor ; ?>' target='_blank'><?php echo "&nbsp;$formPrivacyAnchorText&nbsp;"; ?></a>
                                <?php echo $formPrivacyRightText; ?>
                            </span>
                        </label>
                    <?php endif ?>
                    <?php if($formMarketingEnable) : ?>
                        <label for="kBPPopUpFormMarketing" class="kBPCheckboxLabel">
                            <input type='checkbox' name='marketing' required id='kBPPopUpFormMarketing'>
                            <span class="kBPPopUpFormCheckboxInfo"><?php echo $formMarketing;?></span>
                        </label>
                    <?php endif ?>
                    <input type="submit" value="<?php echo $formSubmit; ?>"/>
                </form>
            <?php endif ?>
            <?php if($formEnableMobile) : ?>
                <form id="kBPPopUpFormMobile" class="kBPPopUpContentMobile kBPPopUpForms" target="_blank" action="<?php echo $formActionMobile ?>">
                    <?php if($formNameEnableMobile) : ?>
                        <label for="kBPopUpFormNameMobile">
                            <?php echo $formNameLabelMobile; ?>
                            <input type='text' name='name' pattern="[a-zA-Z ]+" title="Imię może składać się tylko z liter" id="kBPopUpFormNameMobile" required placeholder='<?php echo $formNamePlaceholderMobile; ?>'>
                        </label>
                    <?php endif ?>
                    <?php if($formEmailEnableMobile) : ?>
                        <label for="kBPPopUpFormEmailMobile">
                            <?php echo $formEmailLabelMobile; ?>
                            <input type='email' id='kBPPopUpFormEmailMobile' name='email'
                                   pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" title="Email musi być w formacie: przyklad@przyklad.przyklad"
                                   required placeholder='<?php echo $formEmailPlaceholderMobile; ?>'>
                        </label>
                    <?php endif ?>
                    <?php if($formPrivacyEnableMobile) : ?>
                        <label for="kBPPopUpFormPrivacyMobile" class="kBPCheckboxLabel">
                            <input type='checkbox' name='polityka' required id='kBPPopUpFormPrivacyMobile'>
                            <span class="kBPPopUpFormCheckboxInfo">
                                <?php echo $formPrivacyLeftTextMobile; ?>
                                <a href='<?php echo " " . $formPrivacyAnchorMobile . " "; ?>' target='_blank'><?php echo "&nbsp;$formPrivacyAnchorTextMobile&nbsp;"; ?></a>
                                <?php echo $formPrivacyRightTextMobile; ?>
                            </span>
                        </label>
                    <?php endif ?>
                    <?php if($formMarketingEnableMobile) : ?>
                        <label for="kBPPopUpFormMarketingMobile" class="kBPCheckboxLabel">
                            <input type='checkbox' name='marketing' required id='kBPPopUpFormMarketingMobile'>
                            <span class="kBPPopUpFormCheckboxInfo"><?php echo $formMarketingMobile;?></span>
                        </label>
                    <?php endif ?>
                    <input type="submit" value="<?php echo $formSubmitMobile; ?>"/>
                </form>
            <?php endif ?>
        </div>
<!--    </div>-->
</aside>

