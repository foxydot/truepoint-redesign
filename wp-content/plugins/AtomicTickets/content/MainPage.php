<?php

class MainPage extends AtomicTickets
{
	// Draw Main Page
	function __construct()
	{
	
		$this->loadmainpagehtml();
	
	}
	
	function loadmainpagehtml()
	{
	
		include( "html/MainPage.php");
	
	}
}

?>