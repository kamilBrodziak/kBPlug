<div class="wrap">
	<h1>Pop up settings</h1>
	<?php settings_errors(); ?>

	<form method="post" action="options.php">
        <div id="kBPluginPopUpSettings" class="kBPluginSettingsWithMenu">
            <ul id="popUpSettingsList" class="kBPluginMenu">
                <li id="popUpSettingsListItemHeader" class="active">Header</li>
                <li id="popUpSettingsListItemSubHeader" class="">SubHeader</li>
                <li id="popUpSettingsListItemDescription" class="">Description</li>
                <li id="popUpSettingsListItemImage" class="">Image</li>
            </ul>
            <?php
                settings_fields('popUpThatPluginPopUp');
                do_settings_sections('popUpThatPluginPopUp');
                submit_button();
            ?>
        </div>
	</form>
</div>