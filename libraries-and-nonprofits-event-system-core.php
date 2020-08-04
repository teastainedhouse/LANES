<?php
/*
Plugin Name: LANES - Libraries and Nonprofits Event System
Description: An all-inclusive event system built with Public Libraries and Nonprofits in mind. Create events to support your patrons, display them in widgets, enable your users to register for events, limit registrations, and generate media for physical or electronic publishing.
Plugin URI:  https://teastainedhouse.com/
Author:      Catelyn Johnson
Version:     0.1
License:     GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.txt

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version
3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
with this program. If not, visit: https://www.gnu.org/licenses/
*/

//preventing access to php files for security
if ( !defined('ABSPATH'))
{
    exit;
}

//creates the post type 'Events' with both its own separate 'Event' tag and category taxonomies.
require_once plugin_dir_path(__FILE__) . 'includes/lanes-event-functions.php';
add_action( 'init', 'lanes_register_events' );
add_action( 'init', 'lanes_register_event_categories' );
add_action( 'init', 'lanes_register_event_tags' );

//creates Custom Fields for Events
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