<?php 
		/*
		Plugin Name: Atomic Tickets
		Plugin URI: http://atomicinteractive.com
		Description: Create a tickets to Atomic Interactive for support.
		Author: Taj Virani
		Version: 1.0
		Author URI: http://atomicinteractive.com
		*/


class AtomicTickets 
{
	
	// Variables
	var $path	 	= '';  
	var $url		= '';
	
	var $id 		= false;
	var $meta 		= array();
	var $title 		= "Atomic Support";
	var $href 		= "";
	var $parents	= 'top-secondary';
	
	var $page_title = "Atomic Support";
	var $menu_title = "Atomic Support";
	var $capability = "administrator";
	var $menu_slug	= "atomic_support";
	var $position	= 0;
	
	
	
	// Call menu creation actions and plugin activation
	function AtomicTickets()
	{
			// Set some default values
			$this->path = realpath(dirname (__FILE__));
			$this->url = WP_PLUGIN_URL . '/AtomicTickets';
			
			// Menu Hooks
			add_action('admin_menu', array($this,"add_menu"));
			add_action('admin_bar_menu', array($this,"add_admin_menu"));
	}
	
	
	
	// Add ticket menu to admin sidebar
	function add_menu()
	{
		
		add_menu_page( $this->page_title, $this->menu_title, $this->capability, $this->menu_slug, array($this, "MainPage"));
		
	}
	
	
	// Add ticket menu to the admin toolbar
	function add_admin_menu()
	{
			global $wp_admin_bar;
			
			if( !is_super_admin() || !is_admin_bar_showing() )
			return;
			
			$wp_admin_bar->add_menu(array (
					'id'		=>	$this->id,
					'meta'		=>	$this->meta,
					'title'		=>	$this->title,
					'href'		=>	$this->href,
					'parent'	=>	$this->parents
			));
			
	}
	
	// Set off the main page
	function MainPage()
	{
		
		include_once('content/MainPage.php');
		$page = new MainPage();
		
	}
	
	
	
}


// Start the object
add_action( "init", "atomicmenuactivate", 9999 );
function atomicmenuactivate() 
{
    global $atomicTickets;
    $atomicTickets = new AtomicTickets();
}



?>