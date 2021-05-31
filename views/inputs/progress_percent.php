<?php $value = get_post_meta( $args->ID, '_progress_percent_field', true ); ?>
<?php wp_nonce_field('progress_percent', 'progress_percent_nonce') ?>
<select name="progress_percent" id="progress_percent_field" class="postbox" style="width: 100%">
    <?php for ($i=0; $i <= 100; $i=$i+5) : ?>
        <option value="<?php echo esc_attr($i) ?>" <?php selected($value, $i) ?>><?php echo $i . '%' ?></option>
    <?php endfor; ?>
</select>