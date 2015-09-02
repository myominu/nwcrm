<?php 
    if($data == 'sales'){
    $this->Html->scriptStart(['block' => 'scriptBottom']); 
    $url = $this->Url->build([
            "controller" => "Ajax",
            "action" => "sales_list",
        ]);
    ?>
    //ajax
    //client select box
    $("#client-id").change(function() {
        //get the selected value
        var selectedValue = this.value;
        //alert(selectedValue);
        //make the ajax call
        $.ajax({
            url: '<?= $url; ?>/'+selectedValue,
            type: 'POST',
            //data: {option : selectedValue},
            success: function(result) {
                //console.log("Data sent!");
                $("#sales_list_box").html(result);
            }
        });
    });
    <?php
    $this->Html->scriptEnd();

    }else if($data == 'items'){
        $this->Html->scriptStart(['block' => 'scriptBottom']); 
        $url = $this->Url->build([
            "controller" => "Ajax",
            "action" => "item_pricing",
        ]);
    ?>
    //item select box
    $("#item-id").change(function() {
        //get the selected value
        var selectedValue = this.value;
        //alert(selectedValue);
        //make the ajax call
        $.ajax({
            url: '<?= $url; ?>/'+selectedValue,
            type: 'POST',
            //data: {option : selectedValue},
            success: function(result) {
                //console.log("Data sent!");
                $("#item_pricing_box").html(result);
            }
        });
    });
    <?php
    $this->Html->scriptEnd();
    }
?>