<?php
namespace taxonomy_rollover;

class init
{

/**
*   WP interactions.
*   ---
*/
    /**
    *	Hook up with WP.
    */
    public static function init ()
    {
        if ( is_admin() ) {

            add_action( 'admin_menu',  __NAMESPACE__.'\init::register_admin_menu_pages', 100 );
		}

    }



    /**
    *	Registers the admin-side menu pages and draw/scripts callbacks.
    */
    public static function register_admin_menu_pages ()
	{

		/* Create Settings Pages */
		$parent_slug = "tools.php";
		$page_title='Taxonomy Rollover';
		$menu_title='Taxonomy Rollover';
		$menu_slug=TAX_ROLLOVER_MENU_SLUG;
		$function=  __NAMESPACE__.'\init::draw_rollover_page';
		$capability = 'delete_pages';
		//$scripts_function	= 'f2_init::addscripts_dashboard_home';
		add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function);


    }


    /**
    *	Draws import page
    */
    public static function draw_rollover_page()
    {
        include_once(TAX_ROLLOVER_PLUGIN_DIR . '/admin/rollover-options.php' );
    }


}
?>
