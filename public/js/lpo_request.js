$(function() {
	//Load Suppliers
	loadSelect2Data('#supplier', 'lpo/get_suppliers')
	//Select event for Supplier
	$('#supplier').on('select2:select', function (evt) {
		$('#title').val('N/A')
		$('#attention').val(evt['params'].data.attention)
		//Add email tags
		$('#email_to').tagsinput('add', evt['params'].data.email);
	});
  //Get default lpo mailing list
  getMailingList('lpo/get_mailing_list')
	//Load Programs
	loadSelect2Data('#program', 'lpo/get_programs')
  //Exemption handler
  $('input:radio[name="exemption_choice"]').on('change', exemptionHandler)
  //Trigger handler
  $('input:radio[name="exemption_choice"]').trigger('change')
});

//Load select2 data 
function loadSelect2Data(selectClass, dataUrl){
  $(selectClass).select2({
  	theme: 'classic',
    ajax: {
      url: dataUrl,
      dataType: 'json',
      delay: 250,
      data: function (params) {
        return {
          q: params.term // search term
        };
      },
      processResults: function (data) {
        return {
          results: data
        };
      },
      cache: true
    },
    minimumInputLength: 2
  });
}

function exemptionHandler(e){
  if ($(this).is(':checked') && $(this).val() == 1) {
    //exempted
    $('#exempted_options').hide()
    $('#exempted_reason').show()
    $('.exempt').val('')
  }else{
    $('#exempted_options').show()
    $('#exempted_reason').hide()
    $('#reason_for_exemption').val('')
  }
}

function getMailingList(mailURL){
  $.getJSON(mailURL, function(data){
    $.each(data, function(category, emails){
      $.each(emails, function(i, email){
        $('#email_'+category).tagsinput('add', email);
      });
    });  
  });
}