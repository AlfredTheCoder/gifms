$(function() {
    getRemoteJsonData('receiveinvoice/get_supplier', '#id')
    getRemoteJsonData('receiveinvoice/get_lpo', '#lpo')
    getRemoteJsonData('receiveinvoice/get_office_shared_cost', '#sharedcost')
    getRemoteJsonData('receiveinvoice/get_office_cost_account', '#account')
    getRemoteJsonData('receiveinvoice/get_recurring_invoice', '#recurringperiod')
    getRemoteJsonData('receiveinvoice/get_payment_modes', '#paymentmode')
    getRemoteJsonData('receiveinvoice/get_country', '#invoicecountry')
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
