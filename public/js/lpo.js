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
	    	"order": [[ 0, "desc" ]],
	    	"destroy": true,
	        "ajax": 'lpo/get_lpo_data/'+lpoStatus,
	        columns: [
	            {title: 'Request Date'},
	            {title: 'Title'},
	            {title: 'Requested By'},
	            {title: 'Supplier'},
	            {title: 'Quotation'},
	            {title: 'Line Items'},
	            {title: 'Terms'},
	            {title: 'Amount'},
	            {title: 'Preview'},
	            {title: 'Action'}
	        ]
	    });
	});
});