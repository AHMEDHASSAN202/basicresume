<?php
$projectToolsValue = get_post_meta( $args->ID, '_project_tools_field', true );
$projectLinkValue = get_post_meta( $args->ID, '_project_link_field', true );
?>
<?php wp_nonce_field('update_project', 'project_nonce') ?>
<div style="display: flex; flex-direction: column">
    <label for="tools">Tools Or Technologies</label>
    <input id="tools" type="text" name="_project_tools_field" value="<?php echo esc_attr($projectToolsValue); ?>">
</div>
<div style="display: flex; flex-direction: column; margin-top: 15px">
    <label for="link">Link</label>
    <input id="link" type="text" name="_project_link_field" value="<?php echo esc_url($projectLinkValue); ?>">
</div>
</div>