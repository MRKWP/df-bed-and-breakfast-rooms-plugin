<?php

namespace DF_BNB_ROOM;

/**
 * Activation class.
 */
class Activation
{

    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * Plugin activation.
     */
    public function install()
    {
        //Custom Post Types
        $this->container['custom_posts']->register();
        flush_rewrite_rules();
    }
}
