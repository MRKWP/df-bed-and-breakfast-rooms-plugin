<?php
namespace DF_BNB_ROOM;

/**
 * Plugins Helper class.
 */
class Plugins
{

    //container.
    protected $container;

    /**
     * Constructor.
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    //
    public function register_required_plugins()
    {
        $plugins = array(
            // array(
            //  'name' => 'CMB2',
            //  'slug' => 'cmb2',
            //  'required' => true,
            // ),
        );

        /**
         * Array of configuration settings. Amend each line as needed.
         *
         * TGMPA will start providing localized text strings soon. If you already have translations of our standard
         * strings available, please help us make TGMPA even better by giving us access to these translations or by
         * sending in a pull-request with .po file(s) with the translations.
         *
         * Only uncomment the strings in the config array if you want to customize the strings.
         **/
        $config = array(
            'id' => $this->container['plugin_slug'], // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '', // Default absolute path to bundled plugins.
            'menu' => 'tgmpa-install-plugins', // Menu slug.
            'parent_slug' => 'plugins.php', // Parent menu slug.
            'capability' => 'manage_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
            'has_notices' => true, // Show admin notices or not.
            'dismissable' => false, // If false, a user cannot dismiss the nag message.
            'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => true, // Automatically activate plugins after installation or not.
            'message' => '', // Message to output right before the plugins table.

            'strings' => array(
                'page_title' => __('Install Required Plugins', 'df-wp-testimonials'),
                'menu_title' => __('Install Plugins', 'df-wp-testimonials'),
                /* translators: %s: plugin name. */
                'installing' => __('Installing Plugin: %s', 'df-wp-testimonials'),
                /* translators: %s: plugin name. */
                'updating' => __('Updating Plugin: %s', 'df-wp-testimonials'),
                'oops' => __('Something went wrong with the plugin API.', 'df-wp-testimonials'),
                'notice_can_install_required' => _n_noop(
                    /* translators: 1: plugin name(s). */
                    'This diviframework plugin requires the following plugin: %1$s.',
                    'This diviframework plugin requires the following plugins: %1$s.',
                    'df-wp-testimonials'
                ),
                'notice_can_install_recommended' => _n_noop(
                    /* translators: 1: plugin name(s). */
                    'This diviframework plugin recommends the following plugin: %1$s.',
                    'This diviframework plugin recommends the following plugins: %1$s.',
                    'df-wp-testimonials'
                ),
                'notice_ask_to_update' => _n_noop(
                    /* translators: 1: plugin name(s). */
                    'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this diviframework plugin: %1$s.',
                    'The following plugins need to be updated to their latest version to ensure maximum compatibility with this diviframework plugin: %1$s.',
                    'df-wp-testimonials'
                ),
                'notice_ask_to_update_maybe' => _n_noop(
                    /* translators: 1: plugin name(s). */
                    'There is an update available for: %1$s.',
                    'There are updates available for the following plugins: %1$s.',
                    'df-wp-testimonials'
                ),
                'notice_can_activate_required' => _n_noop(
                    /* translators: 1: plugin name(s). */
                    'The following required plugin is currently inactive: %1$s.',
                    'The following required plugins are currently inactive: %1$s.',
                    'df-wp-testimonials'
                ),
                'notice_can_activate_recommended' => _n_noop(
                    /* translators: 1: plugin name(s). */
                    'The following recommended plugin is currently inactive: %1$s.',
                    'The following recommended plugins are currently inactive: %1$s.',
                    'df-wp-testimonials'
                ),
                'install_link' => _n_noop(
                    'Begin installing plugin',
                    'Begin installing plugins',
                    'df-wp-testimonials'
                ),
                'update_link' => _n_noop(
                    'Begin updating plugin',
                    'Begin updating plugins',
                    'df-wp-testimonials'
                ),
                'activate_link' => _n_noop(
                    'Begin activating plugin',
                    'Begin activating plugins',
                    'df-wp-testimonials'
                ),
                'return' => __('Return to Required Plugins Installer', 'df-wp-testimonials'),
                'plugin_activated' => __('Plugin activated successfully.', 'df-wp-testimonials'),
                'activated_successfully' => __('The following plugin was activated successfully:', 'df-wp-testimonials'),
                /* translators: 1: plugin name. */
                'plugin_already_active' => __('No action taken. Plugin %1$s was already active.', 'df-wp-testimonials'),
                /* translators: 1: plugin name. */
                'plugin_needs_higher_version' => __('Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'df-wp-testimonials'),
                /* translators: 1: dashboard link. */
                'complete' => __('All plugins installed and activated successfully. %1$s', 'df-wp-testimonials'),
                'dismiss' => __('Dismiss this notice', 'df-wp-testimonials'),
                'notice_cannot_install_activate' => __('There are one or more required or recommended plugins to install, update or activate.', 'df-wp-testimonials'),
                'contact_admin' => __('Please contact the administrator of this site for help.', 'df-wp-testimonials'),

                'nag_type' => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
            ),

        );

        tgmpa($plugins, $config);
    }
}
