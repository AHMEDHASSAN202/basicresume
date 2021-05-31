<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()) ?></h1>
    <form action="options.php" method="POST">
        <?php settings_fields('portfolio_options'); ?>
<!--        --><?php //do_settings_sections('portfolio'); ?>
        <?php $options = get_option('portfolio_options', settingsDefaultOptions()) ?>

        <h2 class="title">Portfolio Home Section</h2>
        <table class="form-table wpex-custom-admin-login-table">
            <tr valign="top">
                <th scope="row"><label for="portfolio_title_home">Title</label></th>
                <td>
                    <?php $value = sanitize_text_field($options['portfolio_title_home']); ?>
                    <input type="text" name="portfolio_options[portfolio_title_home]" value="<?php echo esc_attr( $value ); ?>" style="width: 100%" id="portfolio_title_home">
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="portfolio_cv_file_home">CV File</label></th>
                <td>
                    <?php $value = esc_url($options['portfolio_cv_file_home']); ?>
                    <input type="hidden" name="portfolio_options[portfolio_cv_file_home]" id="portfolio_cv_file_home" value="<?php echo $value ?>">
                    <a href="javascript:void(0)" id="upload-cv">Upload CV</a>
                    <a href="javascript:void(0)" id="download-cv" style="margin: auto 40px" data-download-link="<?php echo $value ?>">Current CV</a>
                </td>
            </tr>
        </table>

        <h2 class="title">Portfolio About Section</h2>
        <table class="form-table wpex-custom-admin-login-table">
            <tr valign="top">
                <th scope="row"><label for="portfolio_about_more_title">Title</label></th>
                <td>
                    <?php $value = sanitize_text_field($options['portfolio_about_more_title']); ?>
                    <input type="text" name="portfolio_options[portfolio_about_more_title]" value="<?php echo esc_attr( $value ); ?>" style="width: 100%" id="portfolio_about_more_title">
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="portfolio_about_image">Picture</label></th>
                <td style="display: flex">
                    <?php $value = esc_url($options['portfolio_about_image']); ?>
                    <img id="showAboutImage" width="100px" height="100px" src="<?php echo $value ?>" style="border-radius: 50%">
                    <input hidden type="text" id="portfolio_about_image" name="portfolio_options[portfolio_about_image]" value="<?php echo $value ?>">
                    <button type="button" id="open-media-upload" style="position: absolute; width: 30px; height: 30px; display: flex; justify-content: center; align-items: center; cursor: pointer; border-radius: 50%">
                        <span class="dashicons dashicons-edit-large" style="font-size: 15px; color: #565656;"></span>
                    </button>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="portfolio_about_text">Text</label></th>
                <td>
                    <?php $value = sanitize_text_field($options['portfolio_about_text']); ?>
                    <textarea type="text" name="portfolio_options[portfolio_about_text]" style="width: 100%" rows="4" id="portfolio_about_text"><?php echo esc_textarea($value) ?></textarea>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="portfolio_skills_text">Skills Text</label></th>
                <td>
                    <?php $value = sanitize_text_field($options['portfolio_skills_text']); ?>
                    <textarea type="text" name="portfolio_options[portfolio_skills_text]" style="width: 100%" rows="4" id="portfolio_skills_text"><?php echo esc_textarea($value) ?></textarea>
                </td>
            </tr>
        </table>

        <h2 class="title">Portfolio Work Section</h2>
        <table class="form-table wpex-custom-admin-login-table">
            <tr valign="top">
                <th scope="row"><label for="portfolio_works_title">Title</label></th>
                <td>
                    <?php $value = sanitize_text_field($options['portfolio_works_title']); ?>
                    <input type="text" name="portfolio_options[portfolio_works_title]" value="<?php echo esc_attr( $value ); ?>" style="width: 100%" id="portfolio_works_title">
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="portfolio_works_text">Text</label></th>
                <td>
                    <?php $value = sanitize_text_field($options['portfolio_works_text']); ?>
                    <textarea type="text" name="portfolio_options[portfolio_works_text]" style="width: 100%" rows="4" id="portfolio_works_text"><?php echo esc_textarea($value) ?></textarea>
                </td>
            </tr>
        </table>

        <h2 class="title">Portfolio Contacts Section</h2>
        <table class="form-table wpex-custom-admin-login-table">
            <tr valign="top">
                <th scope="row"><label for="portfolio_contact_title">Title</label></th>
                <td>
                    <?php $value = sanitize_text_field($options['portfolio_contact_title']); ?>
                    <input type="text" name="portfolio_options[portfolio_contact_title]" value="<?php echo esc_attr( $value ); ?>" style="width: 100%" id="portfolio_contact_title">
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="portfolio_contact_text">Text</label></th>
                <td>
                    <?php $value = sanitize_text_field($options['portfolio_contact_text']); ?>
                    <textarea type="text" name="portfolio_options[portfolio_contact_text]" style="width: 100%" rows="4" id="portfolio_contact_text"><?php echo esc_textarea($value) ?></textarea>
                </td>
            </tr>
        </table>

        <?php submit_button(); ?>
    </form>
</div>
<script>
  jQuery(document).ready(function($) {
    let mediaOpenInput = '';
    $('#open-media-upload').click(function() {
      mediaOpenInput = 'about_image';
      tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
      return false;
    });
    $('#upload-cv').click(function() {
      mediaOpenInput = 'upload_cv';
      tb_show('', 'media-upload.php?type=file&amp;TB_iframe=true');
      return false;
    });

    window.send_to_editor = function(html) {
      switch (mediaOpenInput) {
        case "about_image":
          $('#portfolio_about_image').attr('value', html);
          $('#showAboutImage').attr('src', html);
          break;
        case "upload_cv":
          $('#portfolio_cv_file_home').attr('value', html);
          break;
      }
      tb_remove();
    }

    $('#download-cv').on('click', function (e) {
      e.preventDefault();
      window.location = $('#download-cv').data('download-link')
    })
  });
</script>