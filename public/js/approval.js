$(function() {
	//Show accordion content
	$('.approval_accordion h4 a').bind('click', function (e) {
		//Load approval data
	  	var tableID = '#'+$(this).attr('table_id')
	  	var approvalTable = $(this).attr('approval_item')
	  	var targetURL = 'approval/get_approval_data/'+approvalTable
	  	//Load data onto dataTable
		loadDatatable(tableID, targetURL)
	});
});

function loadDatatable(tableID, targetURL){
	$.getJSON(targetURL, function(response){
		//Destroy existing DataTable
		if($.fn.DataTable.isDataTable(tableID)){
			$(tableID).DataTable().destroy();
		}
		//Clear existing table
  		$(tableID).empty('')
  		//Create new table
	    $(tableID).DataTable({
	    	"destroy": true,
	    	"order": [[ 0, "desc" ]],
	        "data": response.data,
	        "columns": response.columns
	    });
	});
}	