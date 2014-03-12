jQuery(function() {  	
  	jQuery( "input[name=blog_id]" ).attr('placeholder','start typing...');
  	jQuery( "input[name=blog_id]" ).after('<input disabled type=\"text\" id=\"domain_mapping_autofill\" size="40" /><br /><small>Type in the domain / folder name of the site to autocomplete the Site ID</small>');    
    jQuery( "input[name=blog_id]" ).autocomplete({
      source: availableTags,
      select: function( event, ui ) {
      	var itemlabel = ui.item.label;
        jQuery( "#domain_mapping_autofill" ).val( itemlabel );
        jQuery( "input[name=blog_id]" ).val( ui.item.value );
        return false;
      }
    });
  });