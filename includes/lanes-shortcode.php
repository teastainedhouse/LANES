<?php

//list events


function lanes_shortcode()
{
    $args = array(
        'post_type'=> 'events',
        'publish_status'=> 'published'
    );

    $query = new WP_Query($args);

    if($query->have_posts()) :
        while($query->have_posts()) :
            $query->the_post();
            $result = '';
            $result .= get_the_title();
            $result .= get_the_content();
        endwhile;

        wp_reset_postdata();
        endif;

        return $result;

        //https://diveinwp.com/how-to-create-shortcode-for-custom-post-type-to-display-posts/


    //below is the code from Udemy course
    /*
    //create attributes with defaults
    $atts = shortcode_atts(array(
       'title' => 'Event Title',
        'count' =>10,
    ), $atts);

    //check category attribute
    if($atts['category'] == 'all')
    {
        $terms = '';
    }
    else
    {
        $terms = array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $atts['category']
        );
    }

    //query arguments
    $args = array(
        'post_type' => 'events',
        'post_status' => 'published',
        'orderby' => 'lanes_event_start_date',
        'order' => 'ASC',
        'posts_per_page' => $atts['count'],
        'tax_query' => $terms
    );

    $event_list = new WP_Query($args);

    if($event_list->have_posts()) {
        $category = str_replace('-', ' ', $atts['category']);
        $category = strtolower($category);

        $output = '';

        $output .= '<div class="event-list>';

        while ($event_list->have_posts()) {
            $event_list->the_post();

            $start_date = get_post_meta($post->ID, '_lanes_start_date_meta_key', true);

            $output .= get_the_title();

            $output .= $start_date;

        }

        $output .= '</div>';
        $output .= '<p>testing</p>';

        wp_reset_postdata();

        return $output;
    }
    else
        {
            return '<p>No Events Found</p>';
        }

    */
}
