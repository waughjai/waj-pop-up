( function()
{
	var ID = 'thanksgiving-pop-up';

	if ( sessionStorage.getItem( "thanksgiving-already-seen-msg" ) === "true" )
	{
		$( '#' + ID ).hide();
	}

	$( '#' + ID ).click
	(
		function()
		{
			$( this ).fadeOut();
			sessionStorage.setItem( "thanksgiving-already-seen-msg", "true" )
		}
	);
})();
