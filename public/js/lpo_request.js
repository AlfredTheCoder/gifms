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
	//Load Programs
	loadSelect2Data('#program', 'lpo/get_programs')
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