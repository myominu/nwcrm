//ajax
//client select box
$("#client-id").change(function() {
    //get the selected value
    var selectedValue = this.value;
    //alert(selectedValue);
    //make the ajax call
    $.ajax({
        url: '/nw_crm/ajax/sales_list/'+selectedValue,
        type: 'POST',
        //data: {option : selectedValue},
        success: function(result) {
            //console.log("Data sent!");
            $("#sales_list_box").html(result);
        }
    });
});

//item select box
$("#item-id").change(function() {
    //get the selected value
    var selectedValue = this.value;
    //alert(selectedValue);
    //make the ajax call
    $.ajax({
        url: '/nw_crm/ajax/item_pricing/'+selectedValue,
        type: 'POST',
        //data: {option : selectedValue},
        success: function(result) {
            //console.log("Data sent!");
            $("#item_pricing_box").html(result);
        }
    });
});