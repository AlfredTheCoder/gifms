$(function() {
	//Load Expense Types
	loadSelect2Data('#expense_type', 'claim/get_expense_types')
	//Load Programs
	loadSelect2Data('#program', 'claim/get_programs')
  //Load Accounts
  loadSelect2Data('#account', 'claim/get_accounts')
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