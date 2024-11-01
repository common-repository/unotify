<?php
defined('ABSPATH') or die("Restricted access!");
?>
<div class="wrap">
    <h2>Connect  Unotify to your website</h2>
    <hr />

    <form name="dofollow" action="options.php" method="post">
        <?php settings_errors(); ?>
        <?php settings_fields('unotify-site-key'); ?>
        <?php do_settings_sections('unotify-site-key'); ?>
        <div style="background-color: #e7f3fe; border-left: 3px solid #2196F3; margin-bottom: 10px;">
            <p style="padding: 10px;">Please add your <strong>site key</strong> to connect your website to  unotify</p>
        </div>
        <table class="form-table">
            
            <tr>
                <th>
                    <label for="unotify-site-key">Unotify Site Key</label>
                </th>
                <td>

                    <input id="unotify-site-key" class="regular-text code" name="unotify-site-key" type="text" value="<?php echo esc_html(get_option('unotify-site-key')); ?>" />

                    
                </td>
            </tr>
        </table>
        <p class="submit">
            <input class="button button-primary" type="submit" name="Submit" value="Save changes" />
        </p>
    </form>
</div>
