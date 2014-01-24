jQuery(document).ready(function() {
	jQuery('input[placeholder], textarea[placeholder]').placeholder();
	jQuery('#form1').submit(function(){
		setTimeout(function(){
			jQuery('#form1 #FormsUser').val('USER NAME');
			jQuery('#form1 #FormsPassword').val('');
			jQuery('#form1 #pass_label').html('PASSWORD');
		}, 3600);
	});
});