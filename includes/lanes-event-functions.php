<?php

function lanes_register_events()
{
    /**
     * Post Type: Events.
     */

    $labels = [
        "name" => __("Events"),
        "singular_name" => __("Event"),
        "menu_name" => __("Events"),
        "all_items" => __("All Events"),
        "add_new" => __("Add New Event"),
        "add_new_item" => __("Add New Event"),
        "edit_item" => __("Edit Event"),
        "new_item" => __("New Event"),
        "view_item" => __("View Event"),
        "view_items" => __("View Events"),
        "search_items" => __("Search Events"),
        "not_found" => __("No Events found"),
        "not_found_in_trash" => __("No Events found in trash"),
        "parent" => __("Parent Event:"),
        "featured_image" => __("Featured image for this Event"),
        "set_featured_image" => __("Set featured image for this Event"),
        "remove_featured_image" => __("Remove featured image for this Event"),
        "use_featured_image" => __("Use as featured image for this Event"),
        "archives" => __("Event archives"),
        "insert_into_item" => __("Insert into Event"),
        "uploaded_to_this_item" => __("Upload to this Event"),
        "filter_items_list" => __("Filter Events list"),
        "items_list_navigation" => __("Events list navigation"),
        "items_list" => __("Events list"),
        "attributes" => __("Events attributes"),
        "name_admin_bar" => __("Event"),
        "item_published" => __("Event published"),
        "item_published_privately" => __("Event published privately."),
        "item_reverted_to_draft" => __("Event reverted to draft."),
        "item_scheduled" => __("Event scheduled"),
        "item_updated" => __("Event updated."),
        "parent_item_colon" => __("Parent Event:"),
    ];

    $args = [
        "label" => __("Events"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => ["slug" => "events", "with_front" => true],
        "query_var" => true,
        "menu_position" => 25,
        "menu_icon" => "dashicons-calendar-alt",
        "supports" => ["title", "editor", "thumbnail"],
        "taxonomies" => ["event_categories", "event_tags"],
    ];

    register_post_type("events", $args);
}



function lanes_register_event_categories() {

    /**
     * Taxonomy: Event Categories.
     */

    $labels = [
        "name" => __( "Event Categories" ),
        "singular_name" => __( "Event Category" ),
        "menu_name" => __( "Event Categories" ),
        "all_items" => __( "All Event Categories" ),
        "edit_item" => __( "Edit Event Category" ),
        "view_item" => __( "View Event Category" ),
        "update_item" => __( "Update Event Category name" ),
        "add_new_item" => __( "Add new Event Category" ),
        "new_item_name" => __( "New Event Category name" ),
        "parent_item" => __( "Parent Event Category" ),
        "parent_item_colon" => __( "Parent Event Category:" ),
        "search_items" => __( "Search Event Categories" ),
        "popular_items" => __( "Popular Event Categories" ),
        "separate_items_with_commas" => __( "Separate Event Categories with commas" ),
        "add_or_remove_items" => __( "Add or remove Event Categories" ),
        "choose_from_most_used" => __( "Choose from the most used Event Categories" ),
        "not_found" => __( "No Event Categories found" ),
        "no_terms" => __( "No Event Categories" ),
        "items_list_navigation" => __( "Event Categories list navigation" ),
        "items_list" => __( "Event Categories list" ),
    ];

    $args = [
        "label" => __( "Event Categories" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [ 'slug' => 'event_categories', 'with_front' => true,  'hierarchical' => true, ],
        "show_admin_column" => true,
        "show_in_rest" => true,
        "rest_base" => "event_categories",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => true,
    ];
    register_taxonomy( "event_categories", [ "events" ], $args );
}


function lanes_register_event_tags() {

    /**
     * Taxonomy: Event Tags.
     */

    $labels = [
        "name" => __( "Event Tags" ),
        "singular_name" => __( "Event Tag" ),
        "menu_name" => __( "Event Tags" ),
        "all_items" => __( "All Event Tags" ),
        "edit_item" => __( "Edit Event Tag" ),
        "view_item" => __( "View Event Tag" ),
        "update_item" => __( "Update Event Tag name" ),
        "add_new_item" => __( "Add new Event Tag" ),
        "new_item_name" => __( "New Event Tag name" ),
        "parent_item" => __( "Parent Event Tag" ),
        "parent_item_colon" => __( "Parent Event Tag:" ),
        "search_items" => __( "Search Event Tags" ),
        "popular_items" => __( "Popular Event Tags" ),
        "separate_items_with_commas" => __( "Separate Event Tags with commas" ),
        "add_or_remove_items" => __( "Add or remove Event Tags" ),
        "choose_from_most_used" => __( "Choose from the most used Event Tags" ),
        "not_found" => __( "No Event Tags found" ),
        "no_terms" => __( "No Event Tags" ),
        "items_list_navigation" => __( "Event Tags list navigation" ),
        "items_list" => __( "Event Tags list" ),
    ];

    $args = [
        "label" => __( "Event Tags" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [ 'slug' => 'event_tags', 'with_front' => true, ],
        "show_admin_column" => true,
        "show_in_rest" => true,
        "rest_base" => "event_tags",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => true,
    ];
    register_taxonomy( "event_tags", [ "events" ], $args );
}