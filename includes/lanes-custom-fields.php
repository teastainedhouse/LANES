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
    add_meta_box('lanes_event_metabox_id', 'Event Details', 'lanes_event_custom_box_html', 'events');
}


function lanes_event_custom_box_html($post)
{
    $start_date = get_post_meta($post->ID, '_lanes_start_date_meta_key', true);
    $end_date = get_post_meta($post->ID, '_lanes_end_date_meta_key', true);
    ?>
        <div>
    <label for="lanes_event_start_date">Start Date</label>
    <input type="date" name="lanes_event_start_date" id="lanes_event_start_date" class="postbox" value="<?php echo $start_date; ?>">

    <label for="lanes_event_end_date">End Date</label>
    <input type="date" name="lanes_event_end_date" id="lanes_event_end_date" class="postbox" value="<?php echo $end_date; ?>">
        </div>
    <?php
}

function lanes_events_save_postdata($post_id)
{
    update_post_meta($post_id,'_lanes_start_date_meta_key', $_POST['lanes_event_start_date']);
    update_post_meta($post_id,'_lanes_end_date_meta_key', $_POST['lanes_event_end_date']);
}


function lanes_events_admin_column_headers($columns)
{
    $columns = array('cb'=>'<input type="checkbox" />', 'title'=>__('Event Title'), 'lanes_event_start_date'=>'Start Date');
    return $columns;
}
