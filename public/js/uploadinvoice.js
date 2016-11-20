$(function() {
    //Get Cities
    getRemoteJsonData('uploadinvoice/get_supplier', '#supplier')
    getRemoteJsonData('uploadinvoice/get_lpo', '#lpostatus')
    //getRemoteJsonData('uploadinvoice/get_office_shared_cost', '#bank')
    //getRemoteJsonData('uploadinvoice/get_office_cost_account', '#supplycategory')
    //getRemoteJsonData('uploadinvoice/get_recurring_invoice', '#staff')
    getRemoteJsonData('uploadinvoice/get_payment_modes', '#paymentmode')
    getRemoteJsonData('uploadinvoice/get_country', '#country')

    $('#bank').on('change', function(){
        var branch_id = $(this).val()
        getRemoteJsonData('get_bank_branch/'+branch_id, '#bankbranch')
    });
});

function getRemoteJsonData(URL, elementID){
    $.getJSON(URL, function(data){
        addSelectOptions(elementID, data)
    });
}

function addSelectOptions(elementID, data){
    $(elementID).select2({
        data: data
    });
}