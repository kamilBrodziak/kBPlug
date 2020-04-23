<div class="wrap">
	<h1>Pop up settings</h1>
	<?php settings_errors(); ?>

	<form method="post" action="options.php">
		<?php
			settings_fields('popUpThatPluginPopUp');
			do_settings_sections('popUpThatPluginPopUp');
			submit_button();
		?>
	</form>
</div>