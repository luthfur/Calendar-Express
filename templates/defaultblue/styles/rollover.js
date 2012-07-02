

	/***************************** INSTRUCTIONS *********************************
				
		This is the javascript file that lets you implement 
		the mini-calendar rollover effect and the event details
		window. 
		To customize the colours for your rollover, edit the 
		variables below.
			
	****************************************************************************/
	
	
	
	
	/************************** Edit the Following Only *****************************/
	
	// the color all cells change to when the mouse rolls over it
	var on='#FFFFFF';
	
	// the color the date cell changes to when the mouse rolls off 
	var dateoff='#EFF0F0';
	
	// the color the today date cell changes to when the mouse rolls off 
	var todayoff = 'B2D4F4';
	
	// the color the event highlighted cell changes to when the mouse rolls off 
	var eventoff = 'C0CFE8';
	
	/***************************** Edit the Above Only ********************************/
	
	
	
	
	/****************************** Open a new window ********************************/
		
	function open_window(url) {
		var NEW_WIN = null;
		NEW_WIN = window.open ("", "EventViewer","toolbar=no,width=500,height=450,directories=no,status=no,scrollbars=yes,resize=no,menubar=no");
		NEW_WIN.location.href = url;
	}
	
	/****************************** Open a new window ********************************/
	
