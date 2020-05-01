<?php

/**
 * Statically_Settings
 *
 * @since 0.0.1
 */

class Statically_Settings
{

    /**
     * register settings
     *
     * @since 0.0.1
     */
    public static function register_settings() {
        register_setting(
            'statically',
            'statically',
            [
                __CLASS__,
                'validate_settings',
            ]
        );
    }

    /**
     * validation of settings
     *
     * @since 0.0.1
     *
     * @param array $data array with form data
     * @return array array with validated values
     */
    public static function validate_settings( $data ) {
        if ( ! isset( $data['quality'] ) ) {
            $data['quality'] = 0;
        }
        if ( ! isset( $data['width'] ) ) {
            $data['width'] = 0;
        }
        if ( ! isset( $data['height'] ) ) {
            $data['height'] = 0;
        }
        if ( ! isset( $data['smartresize'] ) ) {
            $data['smartresize'] = 0;
        }
        if ( ! isset( $data['webp'] ) ) {
            $data['webp'] = 0;
        }
        if ( ! isset( $data['emoji'] ) ) {
            $data['emoji'] = 0;
        }
        if ( ! isset( $data['favicon'] ) ) {
            $data['favicon'] = 0;
        }
        if ( ! isset( $data['favicon_shape'] ) ) {
            $data['favicon_shape'] = 'rounded';
        }
        if ( ! isset( $data['favicon_bg'] ) ) {
            $data['favicon_bg'] = '#000000';
        }
        if ( ! isset( $data['favicon_color'] ) ) {
            $data['favicon_color'] = '#ffffff';
        }
        if ( ! isset( $data['og'] ) ) {
            $data['og'] = 0;
        }
        if ( ! isset( $data['og_theme'] ) ) {
            $data['og_theme'] = 'light';
        }
        if ( ! isset( $data['og_theme'] ) ) {
            $data['og_fontsize'] = 'medium';
        }
        if ( ! isset( $data['og_type'] ) ) {
            $data['og_type'] = 'jpeg';
        }
        if ( ! isset( $data['wpadmin'] ) ) {
            $data['wpadmin'] = 0;
        }
        if ( ! isset( $data['relative'] ) ) {
            $data['relative'] = 0;
        }
        if ( ! isset( $data['https'] ) ) {
            $data['https'] = 0;
        }
        if ( ! isset( $data['query_strings'] ) ) {
            $data['query_strings'] = 0;
        }
        if ( ! isset( $data['wpcdn'] ) ) {
            $data['wpcdn'] = 0;
        }
        if ( ! isset( $data['private'] ) ) {
            $data['private'] = 0;
        }
        if ( ! isset( $data['statically_api_key'] ) ) {
            $data['statically_api_key'] = '';
        }

        return [
            'url'             => esc_url( $data['url'] ),
            'dirs'            => esc_attr( $data['dirs'] ),
            'excludes'        => esc_attr( $data['excludes'] ),
            'qs_excludes'     => esc_attr( $data['qs_excludes'] ),
            'quality'         => (int)( $data['quality'] ),
            'width'           => (int)( $data['width'] ),
            'height'          => (int)( $data['height'] ),
            'smartresize'     => (int)( $data['smartresize'] ),
            'webp'            => (int)( $data['webp'] ),
            'external_images' => esc_attr( $data['external_images'] ),
            'emoji'           => (int)( $data['emoji'] ),
            'favicon'         => (int)( $data['favicon'] ),
            'favicon_shape'   => esc_attr( $data['favicon_shape'] ),
            'favicon_bg'      => esc_attr( $data['favicon_bg'] ),
            'favicon_color'   => esc_attr( $data['favicon_color'] ),
            'og'              => (int)( $data['og'] ),
            'og_theme'        => esc_attr( $data['og_theme'] ),
            'og_fontsize'     => esc_attr( $data['og_fontsize'] ),
            'og_type'         => esc_attr( $data['og_type'] ),
            'pagebooster'     => (int)( $data['pagebooster'] ),
            'pagebooster_content' => esc_attr( $data['pagebooster_content'] ),
            'pagebooster_custom_js' => $data['pagebooster_custom_js'],
            'pagebooster_custom_js_enabled' => (int)( $data['pagebooster_custom_js_enabled'] ),
            'wpadmin'         => (int)( $data['wpadmin'] ),
            'relative'        => (int)( $data['relative'] ),
            'https'           => (int)( $data['https'] ),
            'query_strings'   => (int)( $data['query_strings'] ),
            'wpcdn'           => (int)( $data['wpcdn'] ),
            'private'         => (int)( $data['private'] ),
            'dev'             => (int)( $data['dev'] ),
            'statically_api_key'  => esc_attr( $data['statically_api_key'] ),
        ];
    }

    /**
     * add menu page
     *
     * @since 0.0.1
     */
    public static function add_settings_page() {
        $page = add_menu_page(
            'Statically',
            'Statically',
            'manage_options',
            'statically',
            [
                __CLASS__,
                'settings_page',
            ],
            plugin_dir_url( STATICALLY_FILE ) . 'static/statically-mark-sm.png'
        );
    }

    /**
     * settings page
     *
     * @since 0.0.1
     *
     * @return void
     */
    public static function settings_page() {
        $options = Statically::get_options();

        include STATICALLY_DIR . '/views/header.php';
        include STATICALLY_DIR . '/views/options.php';
        include STATICALLY_DIR . '/views/footer.php';
    }
}
