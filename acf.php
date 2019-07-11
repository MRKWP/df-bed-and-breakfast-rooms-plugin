<?php
if (function_exists('acf_add_local_field_group')) :
    acf_add_local_field_group(
        array(
        'key' => 'group_5ba22434409f1',
        'title' => 'Room',
        'fields' => array(
        array(
            'key' => 'field_5ba22440df46b',
            'label' => 'Sleeps',
            'name' => 'sleeps',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'maxlength' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
        ),
        array(
            'key' => 'field_5bb1d6d52ad7e',
            'label' => 'Weight',
            'name' => 'weight',
            'type' => 'number',
            'instructions' => 'Used to order the rooms when "sort_by" attribute is set to "weight"',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => 0,
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'min' => '',
            'max' => '',
            'step' => '',
        ),
        ),
        'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'post_type_room',
            ),
        ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
        )
    );
endif;
