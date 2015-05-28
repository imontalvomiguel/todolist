$(document).ready(function() {
	// confirm all destroys
	$('form').submit(function() {
		
		var method = $(this).children(':hidden[name=_method]').val();

		if (method && method == 'DELETE') {
			if ( !confirm('Are You Sure?') ) {
				return false;
			}
		}
	});
});