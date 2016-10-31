$(function() {
	//Show accordion content
	$('.allowance_accordion h4 a').bind('click', function (e) {
	  	//Load lpo data
	  	var tableID = '#'+$(this).attr('table_id')
	  	var allowanceStatus = $(this).attr('allowance_status')
	  	//Clear existing table
	  	$(tableID).empty('')
	  	//Create new table
	    $(tableID).DataTable({
	    	"order": [[ 0, "desc" ]],
	    	"destroy": true,
	        "ajax": 'allowance/get_allowance_data/'+allowanceStatus,
	        columns: [
	            {title: 'Date'},
	            {title: 'Title'},
	            {title: 'Requested By'},
	            {title: 'Program'},
	            {title: 'Status'},
	            {title: 'Amount'},
	            {title: 'Payees'},
	            {title: 'Instruction'},
	            {title: 'Copy'}
	        ]
	    });
	});
});