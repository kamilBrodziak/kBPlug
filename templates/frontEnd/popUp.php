<?php
    $option = get_option('kBPluginPopUp');
    $header = (isset($option['kBPPopUpHeaderContent']) &&
        isset($option['kBPPopUpHeaderEnable']) ? $option['kBPPopUpHeaderEnable'] : false )
            ? $option['kBPPopUpHeaderContent'] : null;
    $mobileHeader = (isset($option['kBPPopUpHeaderMobileContent']) &&
        isset($option['kBPPopUpHeaderMobileEnable']) ? $option['kBPPopUpHeaderMobileEnable'] : false )
            ? $option['kBPPopUpHeaderMobileContent'] : null;
    $subHeader = (isset($option['kBPPopUpSubHeaderContent']) &&
        isset($option['kBPPopUpSubHeaderEnable']) ? $option['kBPPopUpSubHeaderEnable'] : false )
            ? $option['kBPPopUpSubHeaderContent'] : null;
    $mobileSubHeader = (isset($option['kBPPopUpSubHeaderMobileContent']) &&
        isset($option['kBPPopUpSubHeaderMobileEnable']) ? $option['kBPPopUpSubHeaderMobileEnable'] : false )
            ? $option['kBPPopUpSubHeaderMobileContent'] : null;
    $description = (isset($option['kBPPopUpDescriptionContent']) &&
        isset($option['kBPPopUpDescriptionEnable']) ? $option['kBPPopUpDescriptionEnable'] : false )
            ? $option['kBPPopUpDescriptionContent'] : null;
    $mobileDescription = (isset($option['kBPPopUpDescriptionMobileContent']) &&
        isset($option['kBPPopUpDescriptionMobileEnable']) ? $option['kBPPopUpDescriptionMobileEnable'] : false )
            ? $option['kBPPopUpDescriptionMobileContent'] : null;
    $imageSRC = (isset($option['kBPPopUpImageContent']) &&
        isset($option['kBPPopUpImageEnable']) ? $option['kBPPopUpImageEnable'] : false )
            ? $option['kBPPopUpImageContent'] : null;
    $mobileImageSRC = (isset($option['kBPPopUpImageMobileContent']) &&
        isset($option['kBPPopUpImageMobileEnable']) ? $option['kBPPopUpImageMobileEnable'] : false )
            ? $option['kBPPopUpImageMobileContent'] : null;
?>

<aside id="kBPPopUp">
    <header id="kBPPopUpHeader">
        <h2 id="kBPPopUpTitle"><?php echo $header; ?></h2>
    </header>
    <section id="kBPPopUpContent">
        <h3 id="kBPPopUpSubHeader"><?php echo $subHeader; ?></h3>
        <div id="kBPPopUpDescription"><?php echo $description; ?>
        </div>
        <?php if(isset($imageSRC)) : ?>
        <figure id="kBPPopUpImgContainer">
            <img src="<?php echo $imageSRC; ?>" alt="Newsletter image" id="kBPPopUpImg"/>
        </figure>
        <?php endif ?>
        <form id="kBPPopUpForm"></form>
    </section>
    <footer id="kBPPopUpFooter">

    </footer>
</aside>

