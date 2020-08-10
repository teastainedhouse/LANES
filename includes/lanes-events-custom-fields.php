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

function all_add_custom_box()
{
    add_meta_box('wporg-box-id', 'blah blah blah', 'wporg_custom_box_html', 'events');
    add_meta_box('lanes_event_metabox_id', 'Event Details', 'lanes_event_custom_box_html', 'events');
}
add_action('add_meta_boxes', 'all_add_custom_box');

function wporg_custom_box_html($post)
{
    $wpvalue = get_post_meta($post->ID, '_wporg_meta_key', true);
    ?>
    <label for="wporg_field">Description for this field</label>
    <select name="wporg_field" id="wporg_field" class="postbox">
        <option value="">Select something...</option>
        <option value="something" <?php selected($wpvalue, 'something'); ?>>Something</option>
        <option value="else" <?php selected($wpvalue, 'else'); ?>>Else</option>
    </select>
    <?php
}

function lanes_event_custom_box_html($post)
{
    $start_date = get_post_meta($post->ID, '_lanes_start_date_meta_key', true);
    $end_date = get_post_meta($post->ID, '_lanes_end_date_meta_key', true);
    ?>
    <label for="lanes_event_start_date">Start Date</label>
    <input type="date" name="lanes_event_start_date" id="lanes_event_start_date" class="postbox" value="<?php echo $start_date; ?>">

    <label for="lanes_event_end_date">End Date</label>
    <input type="date" name="lanes_event_end_date" id="lanes_event_end_date" class="postbox" value="<?php echo $end_date; ?>">
    <?php
}

function wporg_save_postdata($post_id)
{
    if (array_key_exists('wporg_field', $_POST)) {
        update_post_meta(
            $post_id,
            '_wporg_meta_key',
            $_POST['wporg_field']
        );
    }
}
add_action('save_post', 'wporg_save_postdata');

function lanes_events_save_postdata($post_id)
{
    update_post_meta($post_id,'_lanes_start_date_meta_key', $_POST['lanes_event_start_date']);
    update_post_meta($post_id,'_lanes_end_date_meta_key', $_POST['lanes_event_end_date']);
}
add_action('save_post', 'lanes_events_save_postdata');




/*
 * OOP example from wporg - can't figure out how to add another field
abstract class lanes_event_meta_box
{
    public static function add()
    {
        add_meta_box('lanes_event_meta_box', 'Event Details', [self::class, 'html'], 'events');
    }

    public static function save($post_id)
    {
        if (array_key_exists('lanes-event-field', $_POST)) {
            update_post_meta(
                $post_id,
                '_lanes_meta_key',
                $_POST['lanes-event-field']
            );
        }
    }

    public static function html($post)
    {
        $value = get_post_meta($post->ID, '_lanes_meta_key', true);
        ?>
            <label for="lanes-event-field">Start Date</label>
        <input type="text" name="lanes-event-start-date-field" id="lanes-event-start-date-field" class="postbox"><?php echo $value;?><br/>
        <label for="lanes-event-field">Description for this field</label>
        <select name="lanes-event-field" id="lanes-event-field" class="postbox">
            <option value="">Date...</option>
            <option value="today" <?php selected($value, 'something'); ?>>Something</option>
            <option value="tomorrow" <?php selected($value, 'else'); ?>>Else</option>
            <option value="who knows" <?php selected($value, 'who knows'); ?>>Who Knows</option>
        </select>
        <?php
    }
}

add_action('add_meta_boxes', ['lanes_event_meta_box', 'add']);
add_action('save_post', ['lanes_event_meta_box', 'save']);
*/

