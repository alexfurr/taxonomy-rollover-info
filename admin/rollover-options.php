<?php
echo '<h1>Rollover Academic Year</h1>';
$help_text = '';
$help_text.='This will update all content type with a specified academic year with the new academic year<br/>';
$help_text.='This cannot be undone so use with caution!';

echo '<div class="notice notice-error"><p>'.$help_text.'</p></div>';

// Check for rollover
if(isset($_GET['rollover']) )
{
    if(isset($_POST['cpt_type']) )
    {
        $args = array(
            "cpt_type" => $_POST['cpt_type'],
            "target_tax" => $_POST['target_tax'],
            "new_tax" => $_POST['new_tax'],
        );
        \taxonomy_rollover\actions::rollover_content($args);
    }

}




// Ge tthe CPTs as a sselection
$post_types = get_post_types();
// Remove post types we don't wan in the selectt
$removed_types = array(
    "revision",
    "custom_css",
    "attachment",
    "nav_menu_item",
    "customize_changeset",
    "oembed_cache",
    "user_request",
    "wp_block",
);
foreach ($removed_types as $this_type)
{
    unset($post_types[$this_type]);
}

$cpt_select_dropdown = '';
$cpt_select_dropdown.= '<select name="cpt_type">';
foreach ($post_types as $type_id => $type_name)
{

    $cpt_select_dropdown.= '<option value="'.$type_id.'">'.ucfirst($type_name).'</option>';
}
$cpt_select_dropdown.= '</select>';



$academic_years     = get_academic_years();
// Create the academic year drop downs
$target_tax_dropdown = $new_tax_dropdown = '';
$target_tax_dropdown.= '<select name="target_tax">';
$new_tax_dropdown.= '<select name="new_tax">';
foreach ($academic_years as $term_meta)
{
    $option_html = '<option value="'.$term_meta->term_id.'">'.$term_meta->name.'</option>';
    $target_tax_dropdown.= $option_html;
    $new_tax_dropdown.=$option_html;
}
$target_tax_dropdown.= '</select>';
$new_tax_dropdown.= '</select>';


echo '<form method="post" action="tools.php?page=taxonomy-rollover-admin&rollover=true">';
echo '<table>';
echo '<tr><td>Target Academic Year</td><td>'.$target_tax_dropdown.'</td></tr>';
echo '<tr><td>New academic year</td><td>'.$new_tax_dropdown.'</td></tr>';
echo '<tr><td>Target Post Type</td><td>'.$cpt_select_dropdown.'</td></tr>';

echo '</table>';


echo '<input type="submit" value="Submit" class="button-primary"/>';
echo '</form>';



?>
