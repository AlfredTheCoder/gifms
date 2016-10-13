$(function() {
	//Show accordion content
	$('.lpo_accordion h4 a').bind('click', function (e) {
	  	//Load lpo data
	  	var tableID = '#'+$(this).attr('table_id')
	  	var lpoStatus = $(this).attr('lpo_status')
	  	//Clear existing table
	  	$(tableID).empty('')
	  	//Create new table
	    $(tableID).DataTable({
	    	"destroy": true,
	        "ajax": 'lpo/get_lpo_data/'+lpoStatus,
	        columns: [
	            {title: 'RequestDate'},
	            {title: 'Title'},
	            {title: 'RequestedBy'},
	            {title: 'Supplier'},
	            {title: 'Quotation'},
	            {title: 'Amount'}
	        ]
	    });
	});
});