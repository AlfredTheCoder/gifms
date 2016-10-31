$(function() {
	//Show accordion content
	$('.claim_accordion h4 a').bind('click', function (e) {
	  	//Load claim data
	  	var tableID = '#'+$(this).attr('table_id')
	  	var claimStatus = $(this).attr('claim_status')
	  	//Clear existing table
	  	$(tableID).empty('')
	  	//Create new table
	    $(tableID).DataTable({
	    	"order": [[ 0, "desc" ]],
	    	"destroy": true,
	        "ajax": 'claim/get_expense_data/'+claimStatus,
	        columns: [
	            {title: 'Claim Date'},
	            {title: 'Title'},
	            {title: 'Requested By'},
	            {title: 'Program'},
	            {title: 'Status'},
	            {title: 'Amount'},
	            {title: 'Payees'},
	            {title: 'Instruction'}
	        ]
	    });
	});
});