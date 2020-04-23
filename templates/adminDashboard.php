<div class="wrap">
    <h1>Dashboard</h1>
	<?php settings_errors(); ?>

    <form method="post" action="options.php">
            <?php
            settings_fields('popUpThatPlugin');
            do_settings_sections('popUpThatPlugin');
            submit_button();
            ?>
    </form>
</div>