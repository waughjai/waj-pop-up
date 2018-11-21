( function()
{
	var ID = 'thanksgiving-pop-up';
	$( '#' + ID + '-close' ).click
	(
		function()
		{
			$( '#' + ID ).fadeOut();
		}
	);
})();
