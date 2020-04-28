<div class="wrap">
	<h1>Pop up settings</h1>
	<?php settings_errors(); ?>

	<form method="post" action="options.php">
        <div id="kBPluginPopUpSettings" class="kBPluginSettingsWithMenu">
            <ul id="popUpSettingsList" class="kBPluginMenu">
                <li id="popUpSettingsListItemHeader" class="active">Header</li>
                <li id="popUpSettingsListItemSubHeader" class="">Subheader</li>
                <li id="popUpSettingsListItemDescription" class="">Description</li>
                <li id="popUpSettingsListItemImage" class="">Image</li>
                <li id="popUpSettingsListItemPopUp" class="">Form</li>
                <li id="popUpSettingsListItemMode" class="">Mode</li>
            </ul>
            <?php
                settings_fields('kBPluginPopUp');
                do_settings_sections('kBPluginPopUp');
                submit_button();
            ?>
        </div>
	</form>
</div>