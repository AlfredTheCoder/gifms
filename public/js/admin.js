$(function() {
	$('#side-menu ul li a').on('click', function(e){
		e.preventDefault()
		var targetURL = $(this).attr('href')
		loadDatatable('#admin_tbl', targetURL)
	});
});

function loadDatatable(tableID, targetURL){
	//Clear existing table
  	$(tableID).empty('')
  	//Create new table
    $(tableID).DataTable({
    	"destroy": true,
        "ajax": targetURL
    });
}	