$(function() {
    loadSuppliers('All', '0')    
    //filter event
    $('.supplier_name_filter').on('click', function(e){
        var filter = $(this).attr("filter_value")
        loadSuppliers(filter, 'All')
    });
    //status event
    $('.supplier_status_filter').on('click', function(){
        var status = $(this).attr("supplierstatus")
        loadSuppliers('All', status)
        $('.nav li').removeClass('active');
        $(this).parent().addClass('active');
    });
});


function loadSuppliers(filter, status){
    $('#supplier_table').DataTable({
        "order": [[ 0, "asc" ]],
        "destroy": true,
        "ajax": 'supplier/get_suppliers/'+filter+'/'+status,
        columns: [
            {title: 'Supplier'},
            {title: 'Contact'},
            {title: 'Telephone'},
            {title: 'Email'},
            {title: 'LPO'},
            {title: 'Invoice'},
            {title: 'Profile'},
        ]
    });
}
