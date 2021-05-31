<div style="clear: both;">
    <span class="icon">Icon</span>
    <br />
    <small>You Can Choose Icon From <a href="https://iconmonstr.com/iconicfont/" target="_blank">iconmonstr.com</a></small>
    <br />
    <input type="hidden" class="nav-menu-id" value="<?php echo $args['item_id'] ;?>" />
    <div class="logged-input-holder">
        <input type="text" name="_menu_item_icon[<?php echo $args['item_id'] ;?>]" id="_menu_item_icon-<?php echo $args['item_id'] ;?>" value="<?php echo esc_attr( $args['menu_item_logo'] ); ?>" style="width: 100%"/>
    </div>
</div>