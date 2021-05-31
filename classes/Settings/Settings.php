<?php

namespace Resume\classes\Settings;


class Settings
{
    public static function registerSettings()
    {
        register_setting('portfolio_options', 'portfolio_options', '\Resume\classes\Settings\Settings::validatePortfolioOptions');
        register_setting('portfolio_contacts_options', 'portfolio_contacts_options', '\Resume\classes\Settings\Settings::validatePortfolioContactsOptions');
    }

    public static function validatePortfolioOptions($options)
    {
        // If we have options lets sanitize them
        if ( $options ) {

            $optionKeys = array_keys(settingsDefaultOptions());

            unset($optionKeys['portfolio_cv_file_home'], $optionKeys['portfolio_about_image']);

            foreach ($optionKeys as $optionKey) {
                if (!empty($options[$optionKey])) {
                    $options[$optionKey] = sanitize_text_field($options[$optionKey]);
                } else {
                    unset($options[$optionKey]);
                }
            }

            if (!empty($options['portfolio_cv_file_home'])) {
                $options['portfolio_cv_file_home'] = esc_url_raw( $options['portfolio_cv_file_home'] );
            } else {
                unset($options['portfolio_cv_file_home']);
            }

            if (!empty($options['portfolio_about_image'])) {
                $options['portfolio_about_image'] = esc_url_raw( $options['portfolio_about_image'] );
            } else {
                unset($options['portfolio_about_image']);
            }

        }

        return $options;
    }

    public static function validatePortfolioContactsOptions($options)
    {
        if ( $options ) {
            $optionKeys = array_keys(settingsDefaultContactsOptions());
            foreach ($optionKeys as $optionKey) {
                var_dump(empty($options[$optionKey]));
                if (!empty($options[$optionKey])) {
                    foreach ($options[$optionKey] as $key => $val) {
                        $options[$optionKey][$key] = sanitize_text_field($val);
                    }
                } else {
                    unset($options[$optionKey]);
                }
            }
        }

        return $options;
    }
}