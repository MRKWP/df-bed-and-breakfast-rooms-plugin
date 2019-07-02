<?php

namespace DF_BNB_ROOM;

/**
 * Class defines custom post types.
 */
class CustomPosts
{
    protected $container;

    private $label;
    private $args;

    public function __construct($container)
    {
        $this->container = $container;
    }


    // register your custom post and taxonomy here.
    public function register()
    {
        add_action('init', array($this, 'register_room_post_type'), 0);
    }

    public function register_room_post_type()
    {
        $labels = array(
            'name'                  => _x('Rooms', 'Post Type General Name', 'text_domain'),
            'singular_name'         => _x('Room', 'Post Type Singular Name', 'text_domain'),
            'menu_name'             => __('Rooms', 'text_domain'),
            'name_admin_bar'        => __('Rooms', 'text_domain'),
            'archives'              => __('Room Archives', 'text_domain'),
            'attributes'            => __('Room Attributes', 'text_domain'),
            'parent_item_colon'     => __('Parent Room:', 'text_domain'),
            'all_items'             => __('All Rooms', 'text_domain'),
            'add_new_item'          => __('Add New Room', 'text_domain'),
            'add_new'               => __('Add New Room', 'text_domain'),
            'new_item'              => __('New Room', 'text_domain'),
            'edit_item'             => __('Edit Room', 'text_domain'),
            'update_item'           => __('Update Room', 'text_domain'),
            'view_item'             => __('View Room', 'text_domain'),
            'view_items'            => __('View Rooms', 'text_domain'),
            'search_items'          => __('Search Room', 'text_domain'),
            'not_found'             => __('Not found', 'text_domain'),
            'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
            'featured_image'        => __('Featured Image', 'text_domain'),
            'set_featured_image'    => __('Set featured image', 'text_domain'),
            'remove_featured_image' => __('Remove featured image', 'text_domain'),
            'use_featured_image'    => __('Use as featured image', 'text_domain'),
            'insert_into_item'      => __('Insert into Room', 'text_domain'),
            'uploaded_to_this_item' => __('Uploaded to this Room', 'text_domain'),
            'items_list'            => __('Rooms list', 'text_domain'),
            'items_list_navigation' => __('Rooms list navigation', 'text_domain'),
            'filter_items_list'     => __('Filter Rooms list', 'text_domain'),
        );
        $args = array(
            'label'                 => __('Room', 'text_domain'),
            'description'           => __('Rooms for the Bed and Breakfast', 'text_domain'),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-screenoptions',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'rewrite' => array(
                'slug' => 'room'
            )
        );
        register_post_type('post_type_room', $args);
    }
}
