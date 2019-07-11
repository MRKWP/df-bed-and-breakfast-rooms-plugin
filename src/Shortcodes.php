<?php

namespace DF_BNB_ROOM;

/**
 * Class to register WordPress shortcodes.
 */
class Shortcodes
{
    
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * Register shortcodes.
     */
    public function register()
    {
    }

    public function rooms_list_grid($attrs)
    {
        $defaults = [
            'per_row_lg' => 2,
            'per_row_md' => 2,
            'per_row_sm' => 1,
            'hover_overlay_color' => 'rgba(249,109,100,0.86)',
            'text_color' => 'white',
            'sort_by' => 'title',
            'sort_order' => 'ASC',
        ];

        $attrs = wp_parse_args($attrs, $defaults);

        // wp_die(var_dump($attrs));
        $args = [
            'post_type' => 'post_type_room',
            'post_status' => 'publish',
            'numberposts' => -1,
        ];

        switch ($attrs['sort_by']) {
        case 'weight':
            $args['meta_key'] = 'weight';
            $args['orderby'] = 'meta_value_num';
            break;

        case 'title':
        case 'date':
            $args['orderby'] = $attrs['sort_by'];
            break;

        default:
            break;
        }
        $args['order'] = $attrs['sort_order'];
        
        $rooms = get_posts($args);

        wp_enqueue_style('df-bnb-room-grid', $this->container['plugin_url'] . '/resources/css/grid.css');

        $styles = "
        #rooms-grid .room:hover .room-overlay {
        background-color: {$attrs['hover_overlay_color']};
        }

        #rooms-grid .text-container {
            color: {$attrs['text_color']};
        }
    ";

        wp_add_inline_style('df-bnb-room-grid', $styles);

        ob_start();
        include $this->container['plugin_dir'] . '/resources/views/shortcodes/rooms-list-grid.php';
        return ob_get_clean();
    }
}
