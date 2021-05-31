<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()) ?></h1>
    <form action="options.php" method="POST">
        <?php settings_fields('portfolio_contacts_options'); ?>
        <?php $options = get_option('portfolio_contacts_options', settingsDefaultContactsOptions()) ?>
        <h2 class="title">Contacts</h2>
        <table class="form-table wpex-custom-admin-login-table">
            <tr valign="top">
                <th scope="row"><label>Mobile</label></th>
                <?php $phoneValue = $options['portfolio_mobile'] ?? ['']; ?>
                <td x-data='{rows: <?php echo json_encode($phoneValue) ?>}'>
                    <template x-for="(row, index) in rows" :key="index">
                        <div style="position: relative">
                            <input type="text" name="portfolio_contacts_options[portfolio_mobile][]" x-model="rows[index]" style="width: 100%; margin-bottom: 2px">
                            <button @click="rows.splice(index, 1)" style="position:absolute;z-index: 10;top: 2px;bottom: 4px;right: 1px; cursor: pointer;" type="button"><span class="dashicons dashicons-no-alt"></span></button>
                        </div>
                    </template>
                    <button x-on:click="rows.push('')" id="portfolio_mobile" type="button" style="width: 100%; margin: 2px auto 15px; cursor: pointer"><span class="dashicons dashicons-plus-alt2"></span>add mobile</button>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label>Email</label></th>
                <?php $emailValue = $options['portfolio_email'] ?? ['']; ?>
                <td x-data='{rows: <?php echo json_encode($emailValue) ?>}'>
                    <template x-for="(row, index) in rows" :key="index">
                        <div style="position: relative">
                            <input type="email" name="portfolio_contacts_options[portfolio_email][]" x-model="rows[index]" style="width: 100%; margin-bottom: 2px">
                            <button @click="rows.splice(index, 1)" style="position:absolute;z-index: 10;top: 2px;bottom: 4px;right: 1px; cursor: pointer;" type="button"><span class="dashicons dashicons-no-alt"></span></button>
                        </div>
                    </template>
                    <button x-on:click="rows.push('')" id="portfolio_email" type="button" style="width: 100%; margin: 2px auto 15px; cursor: pointer"><span class="dashicons dashicons-plus-alt2"></span>add email</button>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><label>Address</label></th>
                <?php $addressValue = $options['portfolio_address'] ?? ['']; ?>
                <td x-data='{rows: <?php echo json_encode($addressValue) ?>}'>
                    <template x-for="(row, index) in rows" :key="index">
                        <div style="position: relative">
                            <input type="text" name="portfolio_contacts_options[portfolio_address][]" x-model="rows[index]" style="width: 100%; margin-bottom: 2px">
                            <button @click="rows.splice(index, 1)" style="position:absolute;z-index: 10;top: 2px;bottom: 4px;right: 1px; cursor: pointer;" type="button"><span class="dashicons dashicons-no-alt"></span></button>
                        </div>
                    </template>
                    <button x-on:click="rows.push('')" id="portfolio_address" type="button" style="width: 100%; margin: 2px auto 15px; cursor: pointer"><span class="dashicons dashicons-plus-alt2"></span>add address</button>
                </td>
            </tr>
        </table>

        <?php submit_button(); ?>
    </form>
</div>