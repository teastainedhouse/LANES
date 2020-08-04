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

/*
 * Done:
 *
 *
 * To do:
 * VERSION 1.0
 * -Accept Event input
 * -Display Events in date order in a list
 * -Display Events in a pretty grid
 * -Display Events in a calendar
 * ---also printable version
 * -Recurring Events options
 * ---custom date picker (somehow connect recurring events so that they can be bulk edited OR separately edited - I have NO IDEA how to do this!)
 * -Shortcode creator to display events wherever
 *
 * VERSION 2.0
 * -Sign up to request reminder emails
 * -Send reminder emails
 * -System for site admin to set up automated "newsletter" Event emails
 * ---Admin can pick daily, weekly, biweekly, or monthly "newsletters" that are all the upcoming events in a admin-defined range
 *
 * VERSON 3.0
 * -Prepare for Beta release
 * ---Create a settings page
 * ---First install optional walkthrough
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
require_once plugin_dir_path(__FILE__) . 'includes/lanes_events_custom_fields.php';