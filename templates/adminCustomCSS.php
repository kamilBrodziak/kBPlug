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
        file_put_contents(plugin_dir_path(dirname(__FILE__, 1)) . 'assets/css/fcStyle.min.css', minify_css($cssContent));
    }

function minify_css( $string = '' ) {
    $comments = <<<'EOS'
    (?sx)
        # don't change anything inside of quotes
        ( "(?:[^"\\]++|\\.)*+" | '(?:[^'\\]++|\\.)*+' )
    |
        # comments
        /\* (?> .*? \*/ )
    EOS;

        $everything_else = <<<'EOS'
    (?six)
        # don't change anything inside of quotes
        ( "(?:[^"\\]++|\\.)*+" | '(?:[^'\\]++|\\.)*+' )
    |
        # spaces before and after ; and }
        \s*+ ; \s*+ ( } ) \s*+
    |
        # all spaces around meta chars/operators (excluding + and -)
        \s*+ ( [*$~^|]?+= | [{};,>~] | !important\b ) \s*+
    |
        # all spaces around + and - (in selectors only!)
        \s*([+-])\s*(?=[^}]*{)
    |
        # spaces right of ( [ :
        ( [[(:] ) \s++
    |
        # spaces left of ) ]
        \s++ ( [])] )
    |
        # spaces left (and right) of : (but not in selectors)!
        \s+(:)(?![^\}]*\{)
    |
        # spaces at beginning/end of string
        ^ \s++ | \s++ \z
    |
        # double spaces to single
        (\s)\s+
    EOS;

    $search_patterns  = array( "%{$comments}%", "%{$everything_else}%" );
    $replace_patterns = array( '$1', '$1$2$3$4$5$6$7$8' );

    return preg_replace( $search_patterns, $replace_patterns, $string );
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
        <div id="kBPCustomCSSEditor" style="max-width: 1000px; min-width: 300px; width: 100%; height: 70vh"><?php
            if(file_exists(plugin_dir_path(dirname(__FILE__, 1)) . 'assets/css/fcStyle.css')) {
                echo file_get_contents(plugin_dir_url(dirname(__FILE__, 1)) . 'assets/css/fcStyle.css');
            } else {
                echo file_get_contents(plugin_dir_url(dirname(__FILE__, 1)) . 'assets/css/fcStyleDefault.css');
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