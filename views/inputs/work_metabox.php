<?php
    $workPositionValue = get_post_meta( $args->ID, '_work_position_field', true );
    $fromDate = get_post_meta( $args->ID, '_work_from_field', true );
    $toDate = get_post_meta( $args->ID, '_work_to_field', true );
    $fromMonth = $fromDate ? (int)date('m', $fromDate) : '';
    $fromYear = $fromDate ? (int)date('Y', $fromDate) : '';
    $toMonth = $toDate ? (int)date('m', $toDate) : '';
    $toYear = $toDate ? (int)date('Y', $toDate) : '';
    $workIsPresent = get_post_meta($args->ID, '_work_present_field', true);
?>
<?php wp_nonce_field('update_work', 'work_nonce') ?>
<div style="display: flex; flex-direction: column">
    <label for="position">Position</label>
    <input id="position" type="text" name="_work_position_field" value="<?php echo esc_attr($workPositionValue); ?>">
</div>
<div style="display: flex; margin-top: 15px; align-items: center; justify-content: space-between">
    <div style="display: flex; flex-direction: column">
        <label for="from">From</label>
        <div style="display: flex">
            <select id="from" type="text" placeholder="month" name="_work_from_month_field" style="width: 80px">
                <option value="" disabled selected>Month</option>
                <?php for ($i=1; $i <= 12; $i++) : ?>
                    <option value="<?php echo $i ?>" <?php selected($i, $fromMonth) ?> ><?php echo date('F', mktime(0,0,0, $i)) ?></option>
                <?php endfor; ?>
            </select>
            <select type="text" placeholder="year" name="_work_from_year_field" style="width: 80px">
                <option value="" disabled selected>Year</option>
                <?php for ($ii=2010; $ii <= date('Y'); $ii++) : ?>
                    <option value="<?php echo $ii ?>" <?php selected($ii, $fromYear) ?>><?php echo $ii ?></option>
                <?php endfor; ?>
            </select>
        </div>
    </div>
    <div style="display: flex; flex-direction: column">
        <label for="to">To</label>
        <div style="display: flex">
            <select id="from" type="text" placeholder="month" name="_work_to_month_field" style="width: 80px">
                <option value="" disabled selected>Month</option>
                <?php for ($iii=1; $iii <= 12; $iii++) : ?>
                    <option value="<?php echo $iii ?>" <?php selected($iii, $toMonth) ?>><?php echo date('F', mktime(0,0,0, $iii)) ?></option>
                <?php endfor; ?>
            </select>
            <select type="text" placeholder="year" name="_work_to_year_field" style="width: 80px">
                <option value="" disabled selected>Year</option>
                <?php for ($iiii=2010; $iiii <= date('Y'); $iiii++) : ?>
                    <option value="<?php echo $iiii ?>" <?php selected($iiii, $toYear) ?>><?php echo $iiii ?></option>
                <?php endfor; ?>
            </select>
        </div>
    </div>
    <div style="display: flex; flex-direction: column">
        <label for="present">Is Present</label>
        <input id="present" type="checkbox" name="_work_present_field" value="1" <?php checked(1, $workIsPresent) ?> style="margin-top: 3px">
    </div>
</div>