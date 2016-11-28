$(function() {
    //Get Cities
    getRemoteJsonData('supplier/get_cities', '#city')
    getRemoteJsonData('supplier/get_payment_modes', '#paymentmode')
    getRemoteJsonData('supplier/get_banks', '#bank')
    getRemoteJsonData('supplier/get_supply_categories', '#supplycategory')
    getRemoteJsonData('supplier/get_staff', '#staff')

    $('#bank').on('change', function(){
        var branch_id = $(this).val()
        getRemoteJsonData('supplier/get_bank_branch/'+branch_id, '#bankbranch')
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