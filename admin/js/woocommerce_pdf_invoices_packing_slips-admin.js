jQuery(document).ready(function($){
  var custom_uploader;
  $('#upload_image_button').click(function(e) {
    e.preventDefault();
    //If the uploader object has already been created, reopen the dialog
    
    //Extend the wp.media object
    custom_uploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
        text: 'Choose Image'
      },
      multiple: true
    });
    custom_uploader.on('select', function() {
      var selection = custom_uploader.state().get('selection');
      var ids=[],i=0;
      selection.map( function( attachment ) {
        attachment = attachment.toJSON();
        ids[i++]=attachment.id;
      });
      var id_string=ids.join()
      jQuery('#static_files').val(id_string);
    });
    custom_uploader.open();
  });


var custom_uploader;
  $('#upload_logo_button').click(function(e) {
    e.preventDefault();
    //If the uploader object has already been created, reopen the dialog
    
    //Extend the wp.media object
    custom_uploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
        text: 'Choose Image'
      },
      multiple: false
    });
    custom_uploader.on('select', function() {
      var selection = custom_uploader.state().get('selection').first().toJSON();
      jQuery('#logo_image').val(selection.url);
      jQuery('.logo_image_tag').attr('src', selection.url);
    });
    custom_uploader.open();
  });
  /* Date Picker */
  $( ".pipsfw_datepicker" ).datepicker({
      dateFormat : "yy-mm-dd",
      maxDate: 0 
  });

  /* description toggle */
  $('span.pipsfw_tooltip_tab_description').click(function (event) {
      event.preventDefault();
      $(this).next('p.description').toggle();
  });

});