<?php
    if(isset($_POST['resetCSS'])) {
        if(file_exists(plugin_dir_path(dirname(__FILE__, 1)) . 'assets/css/fcStyle.css')) {
            unlink(plugin_dir_path(dirname(__FILE__, 1)) . 'assets/css/fcStyle.css');
        }
        if(file_exists(plugin_dir_path(dirname(__FILE__, 1)) . 'assets/css/fcStyle.css')) {
            unlink(plugin_dir_path(dirname(__FILE__, 1)) . 'assets/css/fcStyle.min.css');
        }
        echo 'Successful CSS reset to default';
    } else if(isset($_POST['kBPCustomCSS'])) {
        $cssContent = esc_textarea($_POST['kBPCustomCSS']);
        file_put_contents(plugin_dir_path(dirname(__FILE__, 1)) . 'assets/css/fcStyle.css', $cssContent);
        $cssContentWithoutComments = preg_replace('#/\*(?:.(?!/)|[^\*](?=/)|(?<!\*)/)*\*/#s', '', $cssContent);
        $cssContentMinify = str_replace(array("\r", "\n", " "), '', $cssContentWithoutComments);
        file_put_contents(plugin_dir_path(dirname(__FILE__, 1)) . 'assets/css/fcStyle.min.css', $cssContentMinify);
    }
?>

<div class="wrap">
    <h1>Custom CSS</h1>
    <?php settings_errors(); ?>

    <form method="post" action="">
        <input type="submit" name="resetCSS" id="resetCSS" class="button button-primary" value="Reset CSS to default"/>
    </form>

    <form id="kBPCustomCSSForm" method="post" action="">
        <label for="kBPCustomCSS">
            Customize CSS on your responsibility, CSS won't be fully optimized as default is:
            <textarea id="kBPCustomCSS" name="kBPCustomCSS" rows="20" cols="100"><?php
                    if(file_exists(plugin_dir_path(dirname(__FILE__, 1)) . 'assets/css/fcStyle.css')) {
                        echo file_get_contents(plugin_dir_url(dirname(__FILE__, 1)) . 'assets/css/fcStyle.css');
                    } else {
                        echo file_get_contents(plugin_dir_url(dirname(__FILE__, 1)) . 'assets/css/fStyle.css');
                    }
                ?>
            </textarea>
        </label>
        <div id="kBPCustomCSSEditor"><?php
            if(file_exists(plugin_dir_path(dirname(__FILE__, 1)) . 'assets/css/fcStyle.css')) {
                echo file_get_contents(plugin_dir_url(dirname(__FILE__, 1)) . 'assets/css/fcStyle.css');
            } else {
                echo file_get_contents(plugin_dir_url(dirname(__FILE__, 1)) . 'assets/css/fStyle.css');
            }
            ?>
        </div>

        <input type="submit" class="button button-primary"/>
    </form>
<!--    <form method="post" action="options.php">-->
<!--            --><?php
//            settings_fields('kBPluginCustomCSS');
//            do_settings_sections('kBPluginCustomCSS');
//            submit_button();
//            ?>
<!--    </form>-->
</div>