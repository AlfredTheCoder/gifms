$(function() {
	$('#side-menu ul li a').on('click', function(e){
		e.preventDefault()
		var targetURL = $(this).attr('href')
		loadDatatable('#admin_tbl', targetURL)
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
	        "data": response.data,
	        "columns": response.columns
	    });
	});
}	