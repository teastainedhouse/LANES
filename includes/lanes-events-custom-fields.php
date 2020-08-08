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

function lanes_add_event_metaboxes ($post)
{
    add_meta_box('lanes-event-details', 'Event Details', 'lanes_metabox_event_fields', 'events', 'normal', 'high');
}

function lanes_metabox_event_fields()
{
    global $post;
    $post_id = $post->ID;

    $event_title = get_post_meta($post_id, 'lanes-event-title', true);
    $event_desc = get_post_meta($post_id,'lanes-event-desc', true);
    $event_start_date = get_post_meta($post_id,'lanes-event-start-date', false);
    $event_end_date = get_post_meta($post_id,'lanes-event-end-date', false);
    ?>
    <div class="lanes-field-row">
        <div class="lanes-field-container">
            <label>Event Title</label>
            <input type="text" name="lanes-event-title" required="required" class="widefat" value="<?php echo $event_title ?>">
        </div>
        <div class="lanes-field-container">
            <label>Event Description</label><br/>
            <textarea name="lanes-event-desc" required="required" rows="10" cols="70" class="widefat" value="<?php echo $event_desc ?>"></textarea>
        <div class="lanes-field-container">
            <label>Event Start</label>
            <input type="date" name="lanes-event-start-date" required="required" value="<?php echo $event_start_date ?>">
        </div>
        <div class="lanes-field-container">
            <label>Event End</label>
            <input type="date" name="lanes-event-end-date" required="required" value="<?php echo $event_end_date ?>">
        </div>

    </div>


    <?php
}

add_action('add_meta_boxes_events', 'lanes_add_event_metaboxes');

function save_lanes_event_meta ($post_id, $post)
{
    $post_type = get_post_type_object($post->post_type);

    if(!current_user_can($post_type->cap->edit_post, $post_id))
    {
        return $post_id;
    }

    $event_title = ($_POST['lanes-event-title']);
    $event_desc = ($_POST['lanes-event-desc']);
    $event_start_date = ($_POST['lanes-event-start-date']);
    $event_end_date = ($_POST['lanes-event-end-date']);

    update_post_meta($post_id, 'lanes-event-title', $event_title);
    update_post_meta($post_id, 'lanes-event-desc', $event_desc);
    update_post_meta($post_id, 'lanes-event-start-date', $event_start_date);
    update_post_meta($post_id, 'lanes-event-end-date', $event_end_date);

}

add_action('save_post', 'save_lanes_event_meta', 10, 2);



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