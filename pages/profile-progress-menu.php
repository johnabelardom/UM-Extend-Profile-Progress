<?php
    // var_dump($saved_meta_keys);
        
    // echo "<pre>";
    // exit(var_dump($meta_keys));

 
?>
    <div class="wrap">
        <h2>Profile Progress Options</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <table class='wp-list-table fixed'>
                <!-- <tr>
                    <td><input type="text" name="picture_link" value="<?php echo $picture_link; ?>" class="ss-field-width" /></td>
                    <th class="ss-th-width">Name</th>
                </tr>
                <tr>
                    <td><input type="text" name="picture_link" value="<?php echo $picture_link; ?>" class="ss-field-width" /></td>
                    <th class="ss-th-width">Picture Link</th>
                </tr> -->
            <?php
                foreach ($meta_keys as $key => $v) {
                    $attr_check = array_key_exists($v->meta_key, $saved_meta_keys) ? "checked" : "";
            ?>
                <tr>
                    <td><input type="checkbox" name="<?= $v->meta_key ?>" <?= $attr_check ?> value="<?= $v->meta_key ?>" class="ss-field-width" /></td>
                    <th class="ss-th-width"><?= $v->meta_key ?></th>
                </tr>
            <?php } ?>
            </table>
                <input type='submit' name="insert" class='button' value="Save">
        </form>
    </div>