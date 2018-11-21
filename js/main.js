( function()
{
	var ID = 'thanksgiving-pop-up';
	var div = document.createElement( 'div' );
	div.setAttribute( 'class', ID );
	div.setAttribute( 'id', ID );
	div.innerHTML = '<div id="' + ID + '-box" class="' + ID + '-box"><h2>Lincoln South Food Hall will be closed all day this Thanksgiving</h2>' +
		'<p>We wish you a Happy Thanksgiving!</p><button id="' + ID + '-close" class="' + ID + '-close">Close message</button>';
	document.body.appendChild( div );

	$( '#' + ID + '-close' ).click
	(
		function()
		{
			$( '#' + ID ).fadeOut();
		}
	);
})();
