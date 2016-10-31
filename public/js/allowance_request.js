$(function() {
	//Load Regions
	loadSelect2Data('#region', 'allowance/get_regions')
  //Load Counties
  loadSelect2Data('#county', 'allowance/get_counties')
  //Load Programs
  loadSelect2Data('#program', 'allowance/get_programs')
  //Load Accounts
  loadSelect2Data('#account', 'allowance/get_accounts')
  //Load Brevity
  loadSelect2Data('#brevity', 'allowance/get_brevities')
  //Program handler
  $('#program').on('change', programHandler)
  //Program Manager Default
  $('#program_manager').select2({
        theme: 'classic'
  })
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

function programHandler(){
  var program_id = $('#program').val()
  $.get('allowance/get_program_managers/'+program_id, function(data) {
    //Load Program Managers
    $('#program_manager').select2({
        theme: 'classic',
        data: jQuery.parseJSON(data)
    });
  });
}