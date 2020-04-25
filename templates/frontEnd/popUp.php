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
    $formName = (isset($option['kBPPopUpFormName']) && $formNameEnable)
        ? $option['kBPPopUpFormName'] : '';;
    $formNameEnableMobile = isset($option['kBPPopUpFormNameEnableMobile']) ? $option['kBPPopUpFormNameEnableMobile'] : false;
    $formNameMobile = (isset($option['kBPPopUpFormNameMobile']) && $formNameEnableMobile)
        ? $option['kBPPopUpFormNameMobile'] : '';;
    $formEmailEnable = isset($option['kBPPopUpFormEmailEnable']) ? $option['kBPPopUpFormEmailEnable'] : false;
    $formEmail = (isset($option['kBPPopUpFormEmail']) && $formEmailEnable)
        ? $option['kBPPopUpFormEmail'] : '';;
    $formEmailEnableMobile = isset($option['kBPPopUpFormEmailEnableMobile']) ? $option['kBPPopUpFormEmailEnableMobile'] : false;
    $formEmailMobile = (isset($option['kBPPopUpFormEmailMobile']) && $formEmailEnableMobile)
        ? $option['kBPPopUpFormEmailMobile'] : '';;
    $formPrivacyEnable = isset($option['kBPPopUpFormPrivacyEnable']) ? $option['kBPPopUpFormPrivacyEnable'] : false;
    $formPrivacy = (isset($option['kBPPopUpFormPrivacyText']) && $formPrivacyEnable)
        ? $option['kBPPopUpFormPrivacyText'] : '';;
    $formPrivacyAnchor = (isset($option['kBPPopUpFormAnchor']) && $formPrivacyEnable)
        ? $option['kBPPopUpFormAction'] : '';;
    $formPrivacyEnableMobile = isset($option['kBPPopUpFormPrivacyEnableMobile']) ? $option['kBPPopUpFormPrivacyEnableMobile'] : false;
    $formPrivacyMobile = (isset($option['kBPPopUpFormPrivacyTextMobile']) && $formPrivacyEnableMobile)
        ? $option['kBPPopUpFormPrivacyTextMobile'] : '';;
    $formPrivacyAnchorMobile = (isset($option['kBPPopUpFormPrivacyAnchorMobile']) && $formPrivacyEnableMobile)
        ? $option['kBPPopUpFormPrivacyAnchorMobile'] : '';;
    $formMarketingEnable = isset($option['kBPPopUpFormMarketingEnable']) ? $option['kBPPopUpFormMarketingEnable'] : false;
    $formMarketing = (isset($option['kBPPopUpFormMarketing']) && $formMarketingEnable)
        ? $option['kBPPopUpFormMarketing'] : '';;
    $formMarketingEnableMobile = isset($option['kBPPopUpFormMarketingEnableMobile']) ? $option['kBPPopUpFormMarketingEnableMobile'] : false;
    $formMarketingMobile = (isset($option['kBPPopUpFormMarketingMobile']) && $formMarketingEnableMobile)
        ? $option['kBPPopUpFormMarketingMobile'] : '';;
?>

<aside id="kBPPopUp">
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
        <?php if($headerEnable) : ?>
            <h2 id="kBPPopUpTitle" class="kBPPopUpContentDesktop"><?php echo $header; ?></h2>
        <?php endif ?>
        <?php if($headerEnableMobile) : ?>
            <h2 id="kBPPopUpTitleMobile" class="kBPPopUpContentMobile"><?php echo $headerMobile; ?></h2>
        <?php endif ?>
        <?php if($subheaderEnable) : ?>
            <h3 id="kBPPopUpSubHeader" class="kBPPopUpContentDesktop"><?php echo $subheader; ?></h3>
        <?php endif ?>
        <?php if($subheaderEnableMobile) : ?>
            <h3 id="kBPPopUpSubHeaderMobile" class="kBPPopUpContentMobile"><?php echo $subheaderMobile; ?></h3>
        <?php endif ?>
        <?php if($descriptionEnable) : ?>
            <div id="kBPPopUpDescription" class="kBPPopUpContentDesktop"><?php echo $description; ?></div>
        <?php endif ?>
        <?php if($descriptionEnableMobile) : ?>
            <div id="kBPPopUpDescriptionMobile" class="kBPPopUpContentMobile"><?php echo $descriptionMobile; ?></div>
        <?php endif ?>
        <?php if($formEnable) : ?>
            <form id="kBPPopUpForm" class="kBPPopUpContentDesktop" target="_blank" action="<?php echo $formAction ?>">
                <?php if($formNameEnable) : ?>
                    <label for="kBPopUpFormName">
                        Test:
                        <input type='text' name='name' id="kBPopUpFormName" required placeholder='<?php echo $formName; ?>'>
                    </label>
                <?php endif ?>
                <?php if($formEmailEnable) : ?>
                    <label for="kBPPopUpFormEmail">
                        <input type='email' id='kBPPopUpFormEmail' name='email' required placeholder='<?php echo $formEmail; ?>'>
                    </label>
                <?php endif ?>
                <?php if($formPrivacyEnable) : ?>
                    <label for="kBPPopUpFormPrivacyPolicy" class="kBPCheckboxLabel">
                        <input type='checkbox' name='polityka' required id='kBPPopUpFormPrivacy'>
                        <a href='<?php echo $formPrivacyAnchor; ?>' target='_blank'><?php echo $formPrivacy; ?></a>
                    </label>
                <?php endif ?>
                <?php if($formMarketingEnable) : ?>
                    <label for="kBPPopUpFormMarketing" class="kBPCheckboxLabel">
                        <input type='checkbox' name='marketing' required id='kBPPopUpFormMarketing'>
                        <span><?php echo $formMarketing;?></span>
                    </label>
                <?php endif ?>
                <input type="submit" value="Zapisz mnie"/>
            </form>
        <?php endif ?>
        <?php if($formEnableMobile) : ?>
            <form id="kBPPopUpFormMobile" class="kBPPopUpContentMobile" target="_blank" action="<?php echo $formActionMobile ?>">
                <?php if($formNameEnableMobile) : ?>
                    <label for="kBPopUpFormName">
                        <input type='text' name='name' id="kBPopUpFormNameMobile" required placeholder='<?php echo $formNameMobile; ?>'>
                    </label>
                <?php endif ?>
                <?php if($formEmailEnableMobile) : ?>
                    <label for="kBPPopUpFormEmail">
                        <input type='email' id='kBPPopUpFormEmailMobile' name='email' required placeholder='<?php echo $formEmailMobile; ?>'>
                    </label>
                <?php endif ?>
                <?php if($formPrivacyEnableMobile) : ?>
                    <label for="kBPPopUpFormPrivacyPolicy" class="kBPCheckboxLabel">
                        <input type='checkbox' name='polityka' required id='kBPPopUpFormPrivacyMobile'>
                        <a href='<?php echo $formPrivacyAnchorMobile; ?> target='_blank'><?php echo $formPrivacy; ?></a>
                    </label>
                <?php endif ?>
                <?php if($formMarketingEnableMobile) : ?>
                    <label for="kBPPopUpFormMarketing" class="kBPCheckboxLabel">
                        <input type='checkbox' name='marketing' required id='kBPPopUpFormMarketingMobile'>
                        <span><?php echo $formMarketingMobile;?></span>
                    </label>
                <?php endif ?>
                <input type="submit" value="Zapisz mnie"/>
            </form>
        <?php endif ?>
    </div>
</aside>

