$(function() {
	var allowance_id = $('#allowance_id').val()
	//Clear existing table
  	$('#allowance_payee_tbl').empty('')
  	//Create new table
    $('#allowance_payee_tbl').DataTable({
    	"destroy": true,
        "ajax": document.location.origin+'/gifms/allowance/get_allowance_payee_data/'+allowance_id,
        columns: [
            {title: 'Name'},
            {title: 'Mobile #'},
            {title: 'Amount'},
            {title: 'MPESA'},
            {title: 'Total'}
        ]
    });
});