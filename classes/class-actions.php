<?php
namespace taxonomy_rollover;

class actions
{
    public static function rollover_content($args)
    {



        $cpt_type = $args['cpt_type'];
        $target_tax = $args['target_tax'];
        $new_tax = $args['new_tax'];

        // get the tax name by id
        $term_meta = get_term($new_tax);
        $term_slug = $term_meta->slug;

        // First of all get all posts of that type with that tax
        $pages = get_posts(array(
        'post_type' => $cpt_type,
        'numberposts' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'academic_year',
                'field' => 'term_id',
                'terms' => $target_tax, /// Where term_id of Term 1 is "1".
                'include_children' => false
            )
        ),
        ));

        $page_count = count($pages);
        echo '<div class="notice notice-success is-dismissible"><p>Updating '.$page_count.' items</p></div>';
        foreach ($pages as $page_meta)
        {
            $page_id = $page_meta->ID;
            wp_set_object_terms($page_id, $term_slug, TAX_ROLLOVER_ACADEMIC_YEARS_ID, true); // True means append the term IT don't delete
        }


    }

}
?>
