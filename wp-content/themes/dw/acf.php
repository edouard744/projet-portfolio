<?php

if( function_exists('acf_add_local_field_group') ):
acf_add_local_field_group(array(
    'key' => 'group_622863ad501aa',
    'title' => 'Navigation links',
    'fields' => array(
        array(
            'key' => 'field_622863cfba894',
            'label' => 'Icone',
            'name' => 'icon',
            'type' => 'select',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            /*'choices' => array(
                'car' => 'Une voiture',
                'palmtree' => 'Un palmier',
                'envelope' => 'Une enveloppe',
                'house' => 'Une maison',
            ),*/
            'default_value' => false,
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'return_format' => 'value',
            'ajax' => 0,
            'placeholder' => '',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'nav_menu_item',
                'operator' => '==',
                'value' => 'location/primary',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
));
endif;