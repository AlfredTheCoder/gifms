$(function() {
	var lpo_id = $('#lpo_id').val()
	//Clear existing table
  	$('#lpo_terms_tbl').empty('')
  	//Create new table
    $('#lpo_terms_tbl').DataTable({
    	"destroy": true,
        "ajax": document.location.origin+'/gifms/lpo/get_lpo_term_data/'+lpo_id,
        columns: [
            {title: 'Terms'},
            {title: 'Delete'}
        ]
    });
});