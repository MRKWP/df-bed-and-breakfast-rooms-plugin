<?php
namespace DF_BNB_ROOM;

use Pimple\Container as PimpleContainer;

/**
 * DI Container.
 */
class Container extends PimpleContainer
{
    public static $instance;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->initObjects();
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Container;
        }

        return self::$instance;
    }

    /**
     * Define dependancies.
     */
    public function initObjects()
    {
        $this['custom_posts'] = function ($container) {
            return new CustomPosts($container);
        };

        $this['activation'] = function ($container) {
            return new Activation($container);
        };

        $this['shortcodes'] = function ($container) {
            return new Shortcodes($container);
        };

        $this['divi_modules'] = function ($container) {
            return new DiviModules($container);
        };

        $this['plugins'] = function ($container) {
            return new Plugins($container);
        };

        $this['themes'] = function ($container) {
            return new Themes($container);
        };
    }

    /**
     * Start the plugin
     */
    public function run()
    {
        include_once $this['plugin_dir'] . '/libraries/TGM-Plugin-Activation-2.6.1/class-tgm-plugin-activation.php';
        add_action('tgmpa_register', array($this['plugins'], 'register_required_plugins'));
        // register custom posts
        $this['custom_posts']->register();

         add_shortcode('rooms-list-grid', array($this['shortcodes'], 'rooms_list_grid'));

        // divi module register.
        // add_action('et_builder_ready', array($this['divi_modules'], 'register'), 1);

        // register your shortcodes.
        add_action('init', array($this['shortcodes'], 'register'));

        add_action('plugins_loaded', array($this['themes'], 'checkDependancies'));
    }
}
