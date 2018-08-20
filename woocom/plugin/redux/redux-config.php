<?php

define( 'WOO_THEME_OPTIONS', 'woo_option' );

if (!function_exists('woo_option')){
    /**
     * Function to get options in front-end
     * @param int $option The option we need from the DB
     * @param string $default If $option doesn't exist in DB return $default value
     * @return string
     */

    function woo_option( $option = false, $default = false ){
        if($option === false){
            return false;
        }
        $woocom_options = wp_cache_get( WOO_THEME_OPTIONS );
        if( ! $woocom_options ){
            $woocom_options = get_option( WOO_THEME_OPTIONS );
            wp_cache_delete( WOO_THEME_OPTIONS );
            wp_cache_add( WOO_THEME_OPTIONS, $woocom_options );
        }

        if(isset($woocom_options[$option]) && $woocom_options[$option] !== ''){
            return $woocom_options[$option];
        }else{
            return $default;
        }
    }
}

    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = WOO_THEME_OPTIONS;

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'woocom' ),
        'page_title'           => __( 'Theme Options', 'woocom' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );



    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '', 'woocom' ), $v );
    } else {
        $args['intro_text'] = __( '', 'woocom' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '', 'woocom' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */
    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'woocom' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'woocom' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'woocom' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'woocom' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'woocom' );
    Redux::setHelpSidebar( $opt_name, $content );
    /*
     * <--- END HELP TABS
     */
    /*
     *
     * ---> START SECTIONS
     *
     */
    /*
        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
     */
    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Global Options ', 'woocom' ),
        'id'               => 'global_option',
        'desc'             => __( 'Headers All Settings ', 'woocom' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home',
        'fields'           => array(
                array(
                    'id'   => 'info_first',
                    'type' => 'info',
                    'desc' => __('<h2 style="color:green;font-weight: 700;margin: 0;">Global setting  </h2>', 'woocom')
                ),
                array(
                    'id'       => 'woocom_logo',
                    'type'     => 'media', 
                    'url'      => true,
                    'title'    => __( 'Logo ', 'woocom' ),
                    'desc'     => __( 'Please insert Twitter profile  ', 'woocom' ),
                ),
                array(
                    'id'   => 'info_social_media',
                    'type' => 'info',
                    'desc' => __('<h4 style="color:green;font-weight: 700;margin: 0;">Social media Global setting  </h4>', 'woocom')
                ),
                array(
                    'id'       => 'facebook-link',
                    'type'     => 'text', 
                    'title'    => __( 'Facebook ', 'woocom' ),
                    'desc'     => __( 'Please insert facebook profile  Link', 'woocom' ),
                ),
                array(
                    'id'       => 'twitter-link',
                    'type'     => 'text', 
                    'title'    => __( 'Twitter ', 'woocom' ),
                    'desc'     => __( 'Please insert twitter profile  Link', 'woocom' ),
                ),
                array(
                    'id'       => 'google-plus-link',
                    'type'     => 'text', 
                    'title'    => __( 'Google plus ', 'woocom' ),
                    'desc'     => __( 'Please insert google plus profile  Link', 'woocom' ),
                ),
                array(
                    'id'       => 'pinterest-link',
                    'type'     => 'text', 
                    'title'    => __( 'Pinterest ', 'woocom' ),
                    'desc'     => __( 'Please insert pinterest profile  Link', 'woocom' ),
                ),
                array(
                    'id'       => 'instagram-link',
                    'type'     => 'text', 
                    'title'    => __( 'Instagram ', 'woocom' ),
                    'desc'     => __( 'Please insert instagram profile  Link', 'woocom' ),
                ),
                array(
                    'id'       => 'vimeo-link',
                    'type'     => 'text', 
                    'title'    => __( 'Vimeo ', 'woocom' ),
                    'desc'     => __( 'Please insert vimeo profile  Link', 'woocom' ),
                ),
                array(
                    'id'       => 'linkedin-link',
                    'type'     => 'text', 
                    'title'    => __( 'Linkedin ', 'woocom' ),
                    'desc'     => __( 'Please insert linkedin profile  Link', 'woocom' ),
                ),
                array(
                    'id'       => 'soundcloud-link',
                    'type'     => 'text', 
                    'title'    => __( 'Soundcloud ', 'woocom' ),
                    'desc'     => __( 'Please insert soundcloud profile  Link', 'woocom' ),
                ),
                array(
                    'id'       => 'youtube-link',
                    'type'     => 'text', 
                    'title'    => __( 'Youtube ', 'woocom' ),
                    'desc'     => __( 'Please insert youtube profile  Link', 'woocom' ),
                ),
                array(
                    'id'   => 'info_copyright',
                    'type' => 'info',
                    'desc' => __('<h4 style="color:green;font-weight: 700;margin: 0;">Copyright  </h4>', 'woocom')
                ),
                array(
                    'id'       => 'copyright-text',
                    'type' => 'textarea',
                    'title' => __('Textarea Option - HTML Validated Custom', 'woocom'), 
                    'subtitle' => __('Custom HTML Allowed (wp_kses)', 'woocom'),
                    'desc' => __('This is the description field, again good for additional info.', 'woocom'),
                    'validate' => 'html_custom',
                    'default' => __('<br />Some HTML is allowed in here.<br />', 'woocom'),
                    'allowed_html' => array(
                        'a' => array(
                            'href' => array(),
                            'title' => array()
                        ),
                        'br' => array(),
                        'em' => array(),
                        'strong' => array(),
                    ),
                 
                ),

            )
    ) );
    // home slider 
    Redux::setSection($opt_name, array(
        'title'            => __( 'Home  ', 'woocom' ),
        'icon'             => 'dashicons dashicons-admin-settings',
        'id'               => 'home-page',
        'fields'           => array(
                 array(
                    'id'          => 'homess-slides',
                    'type'        => 'slides',
                    'title'       => __('Slides Options', 'redux-framework-demo'),
                    'subtitle'    => __('Unlimited slides with drag and drop sortings.', 'redux-framework-demo'),
                    'desc'        => __('This field will store all slides values into a multidimensional array to use into a foreach loop.', 'redux-framework-demo'),
                    'placeholder' => array(
                        'title'           => __('This is a ', 'redux-framework-demo'),
                        'description'     => __('Description Here', 'redux-framework-demo'),
                        'url'             => __('Give us a link!', 'redux-framework-demo'),
                        'image'           => __('Upload Image','redux-framework-demo'),

                    ),
                ),
                array(
                    'id'          => 'homess-banners',
                    'type'        => 'slides',
                    'title'       => __('Banner Options', 'redux-framework-demo'),
                    'subtitle'    => __('Unlimited slides with drag and drop sortings.', 'redux-framework-demo'),
                    'desc'        => __('This field will store all slides values into a multidimensional array to use into a foreach loop.', 'redux-framework-demo'),
                    'placeholder' => array(
                        'title'           => __('This is a ', 'redux-framework-demo'),
                        'description'     => __('Description Here', 'redux-framework-demo'),
                        'url'             => __('Give us a link!', 'redux-framework-demo'),
                        'image'           => __('Upload Image','redux-framework-demo'),

                    ),
                ),
                array(
                    'id'   => 'info_cta',
                    'type' => 'info',
                    'desc' => __('<h2 style="color:green;font-weight: 700;margin: 0;">Call To action </h2>', 'woocom')
                ),
                array(
                    'id'       => 'cta-bg',
                    'type'     => 'media', 
                    'url'      => true,
                    'title'    => __( 'Cta Bg Image ', 'woocom' )
                ),
                array(
                    'id'       => 'cta_title',
                    'type'     => 'text', 
                    'title'    => __( 'Call To action (CTA)  ', 'woocom' ),
                    'desc'     => __( 'Insert CTA Title', 'woocom' ),
                ),
                array(
                    'id'       => 'cta_textarea',
                    'type'     => 'textarea', 
                    'title'    => __( 'CTA Content ', 'woocom' ),
                    'desc'     => __( 'Insert Cta Title', 'woocom' ),
                ),
                array(
                    'id'       => 'cta_link',
                    'type'     => 'text', 
                    'title'    => __( 'CTA Link ', 'woocom' ),
                    'desc'     => __( 'Insert CTA Link', 'woocom' ),
                ),
                array(
                    'id'   => 'DELIVERY',
                    'type' => 'info',
                    'desc' => __('<h2 style="color:green;font-weight: 700;margin: 0;">DELIVERY</h2>', 'woocom')
                ),
                array(
                    'id'          => 'homess-DELIVERY',
                    'type'        => 'slides',
                    'title'       => __('DELIVERY Options', 'redux-framework-demo'),
                    'subtitle'    => __('Unlimited slides with drag and drop sortings.', 'redux-framework-demo'),
                    'desc'        => __('This field will store all slides values into a multidimensional array to use into a foreach loop.', 'redux-framework-demo'),
                    'placeholder' => array(
                        'title'           => __('This is a ', 'redux-framework-demo'),
                        'description'     => __('Description Here', 'redux-framework-demo'),
                        'url'             => __('Give us a link!', 'redux-framework-demo'),
                        'image'           => __('Upload Image','redux-framework-demo'),

                    ),
                ),
                
        )
    ) );




    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'woocom' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'woocom' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

