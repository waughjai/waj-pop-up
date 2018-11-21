( function()
{
	var ID = 'thanksgiving-pop-up';
	$( '#' + ID ).click
	(
		function()
		{
			$( this ).fadeOut();
		}
	);
	$( '#' + ID + '-close' ).click
	(
		function()
		{
			$( '#' + ID ).fadeOut();
		}
	);
})();
