$(function() {
	var lpo_id = $('#lpo_id').val()
	var quotation_id = $('#quotation_id').val()
	$('#unit_price').on('change', VATHandler)
	$('input:radio[name="vat_charge"]').on('change', VATHandler)
	//Clear existing table
  	$('#lpo_items_tbl').empty('')
  	//Create new table
    $('#lpo_items_tbl').DataTable({
    	"destroy": true,
        "ajax": document.location.origin+'/gifms/lpo/get_lpo_item_data/'+lpo_id+'/'+quotation_id,
        columns: [
            {title: 'Item'},
            {title: 'Quantity'},
            {title: 'UnitPrice'},
            {title: 'SubTotal'},
            {title: 'VAT'},
            {title: 'Total'},
            {title: 'Delete'}
        ]
    });
});


function VATHandler(e){
	var vat_charge = 0.16
	var unit_price = parseFloat($('#unit_price').val())
	var vat_selected = $('input[name=vat_charge]:checked').val()
	if (vat_selected == 0) {
		//add 16% VAT
		$('#unit_price').val(unit_price)
		$('#total').val(unit_price + (unit_price*vat_charge))
	}else if (vat_selected == 1) {
		//16% VAT included in price
		$('#unit_price').val(unit_price - (unit_price*0.16))
	 	$('#total').val(unit_price)
	}else{
		//zero rated
		$('#unit_price').val(unit_price)
		$('#total').val(unit_price)
	}
}