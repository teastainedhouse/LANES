<?php

//custom fields for the custom post type "Events" for LANES
/*
* -Event Title
* -Description
* -Featured Image
* -Start & End Date
* -All day? y/n
*      -if n: Start & End Time
* -Repeats? y/n
*      -if y: date picker (how to do this??? copy the event to multiple days but also keep it so that they can all be edited at once or individually....)
* -Registration? y/n
*      -if y: Limit? y/n
*          -if y: how many?
*      -if y: What fields? options: first name, last name, phone, email, age, (custom?)
*/

add_action("admin_init", "lanes_add_custom_event_fields");

function lanes_add_custom_event_fields(){
    add_meta_box("lanes-event-title", "Event Title", "lanes_event_title", "event", "normal", "high");
}

function lanes_event_title(){
    global $post;
    $custom = get_post_custom($post->ID);
    $year_completed = $custom["year_completed"][0];
    ?>
    <label>Year:</label>
    <input name="year_completed" value="<?php echo $year_completed; ?>" />
    <?php
}




//junk from ACF, but the time picker doesn't work, blerg

/*acf_add_local_field_group(array(
        'key' => 'group_5f2871422cf15',
        'title' => 'Event Fields',
        'fields' => array(
            array(
                'key' => 'field_5f28714f39def',
                'label' => 'Event Title',
                'name' => 'lanes_event_title',
                'type' => 'text',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5f28724d39df0',
                'label' => 'Event Description',
                'name' => 'lanes_event_description',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
            array(
                'key' => 'field_5f2875b139df9',
                'label' => 'Event Start Date',
                'name' => 'lanes_event_start_date',
                'type' => 'date_picker',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'F j, Y',
                'return_format' => 'F j, Y',
                'first_day' => 0,
            ),
            array(
                'key' => 'field_5f299f30b35f0',
                'label' => 'Event End Date',
                'name' => 'lanes_event_end_date',
                'type' => 'date_picker',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'F j, Y',
                'return_format' => 'F j, Y',
                'first_day' => 0,
            ),
            array(
                'key' => 'field_5f2873c339df4',
                'label' => 'Is the event the whole day?',
                'name' => 'lanes_event_all_day_event',
                'type' => 'true_false',
                'instructions' => 'If checked the start and end time fields will be removed.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array(
                'key' => 'field_5f2875f039dfa',
                'label' => 'Event Start Time',
                'name' => 'lanes_event_start_time',
                'type' => 'time_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5f2873c339df4',
                            'operator' => '!=',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'g:i a',
                'return_format' => 'g:i a',
            ),
            array(
                'key' => 'field_5f28765839dfb',
                'label' => 'Event End Time',
                'name' => 'lanes_event_end_time',
                'type' => 'time_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5f2873c339df4',
                            'operator' => '!=',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'g:i a',
                'return_format' => 'g:i a',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'events',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
*/