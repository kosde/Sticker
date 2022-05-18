<?php
    session_start();
    $id_user = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="text/html, charset=utf-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
     include "css.php";
    ?>
    <script src="https://kit.fontawesome.com/a38c16a07e.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="js/googleAddressAutocomplete.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDp4cqzgdJybkHzRWxUNHfDfOVl3SvlfnU&callback=initAutocomplete&libraries=places&v=weekly" defer></script>
    <script>
        let placeSearch;
        let autocomplete; 
        const componentForm = {
            street_number: "short_name",
            route: "long_name",
            locality: "long_name",
            administrative_area_level_1: "short_name",
            country: "short_name",
            postal_code: "short_name",
        };
        function save_discount()
        {
            var code = document.getElementById("discount_code").value;
            var usr_id = document.getElementById("usr_id").value;
            var form_data = new FormData();    
            form_data.append('code', code);//
            form_data.append('usr_id', usr_id);//
            $.ajax({
                type: 'POST',
                url: 'php/discount_code.php',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(response) {
                       document.getElementById("button_apply").innerText = "Done!";
                },
                onFailure: function(response){
                    alert("fail");
                }
            });
        }
        function convertProvince(province, country) 
        {
            $.getJSON('ups/provinces.json', function(provinces) {
            //var provinces = require("ups/provinces.json");
            // Loop through all the available provinces
            for (var i = provinces.length - 1; i >= 0; i--) {
            // Check if the name is an array (e.g. alternative names)
            
            if (Array.isArray(provinces[i].name)) {
                // If the province name 1st item matches the given one, return the abbreviation
                if (provinces[i].name.toUpperCase() == province.toUpperCase() && provinces[i].country.toUpperCase() == country.toUpperCase()) {
                    return provinces[i].short;
                }
            }
            else {
                // If the province abbreviation matches the current one, return the full province name
                if (provinces[i].short.toUpperCase() == province.toUpperCase() && provinces[i].country.toUpperCase() == country.toUpperCase()){
                    return provinces[i].name;
                }
                // If the province name matches the given one, return the abbreviation
                if (provinces[i].name.toUpperCase() == province.toUpperCase() && provinces[i].country.toUpperCase() == country.toUpperCase()) {
                    return provinces[i].short;
                }
            }
            }
            });
            // Default return if no province found
            return "";
        }
        function initAutocomplete() 
        {
            autocomplete = new google.maps.places.Autocomplete(
            document.getElementById("street_number"),
            { types: ["geocode"] }
            );
            // Avoid paying for data that you don't need by restricting the set of
            // place fields that are returned to just the address components.
            autocomplete.setFields(["address_component"]);
            // When the user selects an address from the drop-down, populate the
            // address fields in the form.
            autocomplete.addListener("place_changed", fillInAddress);
        }
        function fillInAddress() 
        {
            const place = autocomplete.getPlace();
            for (const component in componentForm) {
            document.getElementById(component).value = "";
            document.getElementById(component).disabled = false;
            }
            for (const component of place.address_components) {
            const addressType = component.types[0];
            if (componentForm[addressType]) {
                const val = component[componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
            }
            var pricetotalU = document.getElementById("totalpriceG").innerText;
            var number = document.getElementById("street_number").value;
            var route = document.getElementById("route").value;
            document.getElementById("street_number").value = number + " " + route; 
            document.getElementById("route").value = "";
            //totalprice  //street_number route
            var tax = (parseFloat(pricetotalU)/100)*7;
            tax = tax.toFixed(2);
            var totalp = parseFloat(pricetotalU)+parseFloat(tax);
            var state = document.getElementById("administrative_area_level_1").value;
            var country = document.getElementById("country").value;
            var sel = document.getElementById('shipping_country_id');
            var Pcode = document.getElementById('postal_code').value;
            document.getElementById('lishipping').style.visibility = "visible";
            document.getElementById('lishipping').style.display = "block";
            var opts = sel.options;
            //const diaEntrega = calculaEntrega(diaPedido, 10, festivos);
            //alert(diaEntrega.toString());
            for (j = 0; j<sel.length; j++) 
            { 
                if (opts[j].value == country) 
                {
                    sel.selectedIndex = j;
                    break;
                }
            }
            if(country=="US")
            {
                SendupsUS(Pcode);
                document.getElementById('state_id').style.visibility = "visible";
                document.getElementById('state_id').style.display = "block"; 
                document.getElementById('administrative_area_level_1').style.visibility = "hidden";
                document.getElementById('administrative_area_level_1').style.display = "none"; 
                document.getElementById('deliveryW').style.visibility = "hidden";
                document.getElementById('deliveryW').style.display = "none";
                document.getElementById('deliveryUS').style.visibility = "visible";
                document.getElementById('deliveryUS').style.display = "block"; 
                document.getElementById("normalUS").style.background = "#ebf3fe";
                if(state=="TX")
                {
                    document.getElementById('litax').style.visibility = "visible";
                    document.getElementById('litax').style.display = "block";
                    document.getElementById('taxesvalue').innerText ="$ "+tax;
                    totalp = totalp.toFixed(2);
                    document.getElementById('totalprice').innerText ="$ "+ totalp;
                }else
                    {
                        document.getElementById('totalprice').innerText ="$ "+ pricetotalU;
                    }
                var sel = document.getElementById('state_id');
                var opts = sel.options;
                for (j = 0; j<sel.length; j++) 
                { 
                    if (opts[j].value == state) 
                    {
                        sel.selectedIndex = j;
                        break;
                    }
                }
            }else
            {
                Sendups(Pcode);
                document.getElementById('administrative_area_level_1').style.visibility = "visible";
                document.getElementById('administrative_area_level_1').style.display = "block"; 
                document.getElementById('state_id').style.visibility = "hidden";
                document.getElementById('state_id').style.display = "none"; 
                document.getElementById('deliveryW').style.visibility = "visible";
                document.getElementById('deliveryW').style.display = "block";
                document.getElementById('deliveryUS').style.visibility = "hidden";
                document.getElementById('deliveryUS').style.display = "none";
                document.getElementById('litax').style.visibility = "hidden";
                document.getElementById('litax').style.display = "none";
                document.getElementById("normal").style.background = "#ebf3fe";
                document.getElementById('totalprice').innerText ="$ "+ pricetotalU;
            }
        }
        function fill() 
        {
            var pricetotalU = document.getElementById("totalpriceG").innerText;//totalprice
            var tax = (parseFloat(pricetotalU)/100)*7;
            tax = tax.toFixed(2);
            var totalp = parseFloat(pricetotalU)+parseFloat(tax);
            var state = document.getElementById("administrative_area_level_1").value;
            var country = document.getElementById("shipping_country_id").value;
            var sel = document.getElementById('shipping_country_id');
            var Pcode = document.getElementById('postal_code').value;
            document.getElementById('lishipping').style.visibility = "visible";
            document.getElementById('lishipping').style.display = "block";
            var opts = sel.options;
            //const diaEntrega = calculaEntrega(diaPedido, 10, festivos);
            //alert(diaEntrega.toString());
            for (j = 0; j<sel.length; j++) 
            { 
                if (opts[j].value == country) 
                {
                    sel.selectedIndex = j;
                    break;
                }
            }
            if(country=="US")
            {
                SendupsUS(Pcode);
                //document.getElementById('state_id').style.visibility = "visible";
                //document.getElementById('state_id').style.display = "block"; 
                document.getElementById('administrative_area_level_1').style.visibility = "hidden";
                document.getElementById('administrative_area_level_1').style.display = "none"; 
                document.getElementById('deliveryW').style.visibility = "hidden";
                document.getElementById('deliveryW').style.display = "none";
                document.getElementById('deliveryUS').style.visibility = "visible";
                document.getElementById('deliveryUS').style.display = "block"; 
                document.getElementById("normalUS").style.background = "#ebf3fe";
                if(state=="TX")
                {
                    document.getElementById('litax').style.visibility = "visible";
                    document.getElementById('litax').style.display = "block";
                    document.getElementById('taxesvalue').innerText ="$ "+tax;
                    totalp = totalp.toFixed(2);
                    document.getElementById('totalprice').innerText ="$ "+ totalp;
                }else
                    {
                        document.getElementById('totalprice').innerText ="$ "+ pricetotalU;
                    }
            }else
            {
                Sendups(Pcode);
                document.getElementById('administrative_area_level_1').style.visibility = "visible";
                document.getElementById('administrative_area_level_1').style.display = "block"; 
                document.getElementById('state_id').style.visibility = "hidden";
                document.getElementById('state_id').style.display = "none"; 
                document.getElementById('deliveryW').style.visibility = "visible";
                document.getElementById('deliveryW').style.display = "block";
                document.getElementById('deliveryUS').style.visibility = "hidden";
                document.getElementById('deliveryUS').style.display = "none";
                document.getElementById('litax').style.visibility = "hidden";
                document.getElementById('litax').style.display = "none";
                document.getElementById("normal").style.background = "#ebf3fe";
                document.getElementById('totalprice').innerText ="$ "+ pricetotalU;
            }
        }
        function Sendups(Pcode)
        {
                var street_numberv   = document.getElementById('street_number').value;
                var routev           = document.getElementById('route').value;
                var localityv        = document.getElementById('locality').value;
                var state_idv        = document.getElementById('administrative_area_level_1').value;
                var countryv         = document.getElementById('country').value;
                var parametros = 'street_number='+ street_numberv+ '&route='+ routev + '&locality='+ 
                                    localityv+ '&administrative_area_level_1='+ state_idv + '&country='+ countryv + '&postal_code='+ Pcode;
                
                var saveme =$.ajax({
                            type: 'POST',
                            url: "ups/UPS_Standard.php",
                            data: parametros,
                            success: function(result){
                                $.ajax({
                                    type: "GET",
                                    url: "ups/UPS_Standard.xml",
                                    dataType: "xml",
                                    success: function(xml){
                                        var cont=1;
                                        $(xml).find('TotalCharges').each(function(){
                                        if(cont == 1 )
                                        {
                                            var UPS_StandardP = $(this).find('MonetaryValue').text();
                                            $("#standard_price").text("$ "+ UPS_StandardP);
                                            $("#price_shipping").text("$ "+ UPS_StandardP);
                                            var total = $("#totalprice").text();
                                            total = total.replace(/[$]/g,'');
                                            $("#totalprice").text("$ " + (parseFloat(total)+parseFloat(UPS_StandardP)).toFixed(2));
                                        }
                                        cont++;
                                        });
                                        $(xml).find('Response').each(function(){
                                            var code = $(this).find('ResponseStatusCode').text();
                                            if(code == 0)
                                            {
                                                document.getElementById('normal').style.visibility = "hidden";
                                                document.getElementById('normal').style.display = "none"; 
                                            }
                                        });
                                },
                                error: function() {
                                }
                                });
                            }
                        })
                var saveme2 =$.ajax({
                    type: 'POST',
                    url: "ups/UPS_Worldwide_Express.php",
                    data: parametros,
                    success: function(result){
                        $.ajax({
                            type: "GET",
                            url: "ups/UPS_Worldwide_Express.xml",
                            dataType: "xml",
                            success: function(xml){
                                var cont=1;
                                $(xml).find('TotalCharges').each(function(){
                                    if(cont == 1 )
                                    {
                                        var UPS_StandardP = $(this).find('MonetaryValue').text();
                                        $("#express_price").text("$ "+ UPS_StandardP);
                                        $("#price_shipping").text("$ "+ UPS_StandardP);
                                        var total = $("#totalprice").text();
                                        total = total.replace(/[$]/g,'');
                                        $("#price_shipping").text("$ " + (parseFloat(total)+parseFloat(UPS_StandardP)).toFixed(2));
                                    }
                                    cont++;
                                });
                                $(xml).find('Response').each(function()
                                {
                                    var code = $(this).find('ResponseStatusCode').text();
                                    if(code == 0)
                                    {
                                        document.getElementById('medium').style.visibility = "hidden";
                                        document.getElementById('medium').style.display = "none"; 
                                    }
                                });
                        },
                        error: function() {
                        }
                        });
                    }
                })
                var saveme2 =$.ajax({
                    type: 'POST',
                    url: "ups/UPS_Worldwide_Express_Plus.php",
                    data: parametros,
                    success: function(result){
                        $.ajax({
                            type: "GET",
                            url: "ups/UPS_Worldwide_Express_Plus.xml",
                            dataType: "xml",
                            success: function(xml){
                                $(xml).find('TotalCharges').each(function(){
                                var UPS_StandardP = $(this).find('MonetaryValue').text();
                                $("#plus_price").text("$ "+ UPS_StandardP);
                                document.getElementById('plus_price').textContent(UPS_StandardP);
                                });
                                $(xml).find('Response').each(function(){
                                            var code = $(this).find('ResponseStatusCode').text();
                                            if(code == 0)
                                            {
                                                document.getElementById('fast').style.visibility = "hidden";
                                                document.getElementById('fast').style.display = "none"; 
                                            }
                                        });
                        },
                        error: function() {
                        }
                        });
                    }
                })
        }
        function SendupsUS(Pcode)
        {
                var street_numberv   = document.getElementById('street_number').value;
                var routev           = document.getElementById('route').value;
                var localityv        = document.getElementById('locality').value;
                var state_idv        = document.getElementById('administrative_area_level_1').value;
                var countryv         = document.getElementById('country').value;
                var parametros = 'street_number='+ street_numberv+ '&route='+ routev + '&locality='+ 
                                    localityv+ '&administrative_area_level_1='+ state_idv + '&country='+ countryv + '&postal_code='+ Pcode;
                var saveme  =$.ajax({
                            type: 'POST',
                            url: "ups/UPS_Ground.php",
                            data: parametros,
                            success: function(result){
                                $.ajax({
                                    type: "GET",
                                    url: "ups/UPS_Ground.xml",
                                    dataType: "xml",
                                    success: function(xml){
                                        var cont=1;
                                        $(xml).find('TotalCharges').each(function(){
                                        if(cont == 1 )
                                        {
                                            var UPS_StandardP = 0.00;
                                            $("#standard_priceUS").text("Free");
                                            $("#price_shipping").text("$ 0.00");
                                            var total = $("#totalprice").text();
                                            total = total.replace(/[$]/g,'');
                                            //$("#totalprice").text("$ 0.00");   
                                            $("#totalprice").text("$ " + (parseFloat(total)+parseFloat(UPS_StandardP)).toFixed(2));  
                                            const diaEntrega = calculaEntrega(diaPedido, 5, festivos);
                                            $("#standard_priceUS_days").text(months[diaEntrega.getMonth()]+" "+diaEntrega.getDate()+" ("+ days[diaEntrega.getDay()] +")");                                        
                                            $("#shipping-rate12").val(months[diaEntrega.getMonth()]+" "+diaEntrega.getDate()+" "+ days[diaEntrega.getDay()]);
                                        }
                                        cont++;
                                        });
                                       /* $(xml).find('GuaranteedDaysToDelivery').each(function(){
                                            var days = $(this).text();
                                            //
                                            if(days)
                                            {
                                                 const diaEntrega = calculaEntrega(diaPedido, 5, festivos);
                                            $("#standard_priceUS_days").text(months[diaEntrega.getMonth()]+" "+diaEntrega.getDate()+" ("+ days[diaEntrega.getDay()] +")");
                                                
                                            }
                                        });*/
                                        $(xml).find('Response').each(function(){
                                            var code = $(this).find('ResponseStatusCode').text();
                                            if(code == 0)
                                            {
                                                document.getElementById('normalUS').style.visibility = "hidden";
                                                document.getElementById('normalUS').style.display = "none"; 
                                            }
                                        });
                                },
                                error: function() {
                                }
                                });
                            }
                        })
                var saveme2 =$.ajax({
                            type: 'POST',
                            url: "ups/UPS_3_Day_Select.php",
                            data: parametros,
                            success: function(result){
                                $.ajax({
                                    type: "GET",
                                    url: "ups/UPS_3_Day_Select.xml",
                                    dataType: "xml",
                                    success: function(xml){
                                        $(xml).find('TotalCharges').each(function(){
                                        var UPS_StandardP = $(this).find('MonetaryValue').text();
                                        $("#express_priceUS").text("$ "+ UPS_StandardP);
                                        const diaEntrega = calculaEntrega(diaPedido, 3, festivos);
                                        $("#express_priceUS_days").text(months[diaEntrega.getMonth()]+" "+diaEntrega.getDate()+" ("+ days[diaEntrega.getDay()] +")");
                                        $("#shipping-rate22").val(months[diaEntrega.getMonth()]+" "+diaEntrega.getDate()+" "+ days[diaEntrega.getDay()]);
                                        document.getElementById('express_priceUS').textContent(UPS_StandardP);                                       
                                        });
                                        /*$(xml).find('RatingServiceSelectionResponse').each(function(){
                                            var days = $(this).find('GuaranteedDaysToDelivery').text();
                                            alert(days);
                                            if(days)
                                            {
                                                const diaEntrega = calculaEntrega(diaPedido, days, festivos);
                                                $("#express_priceUS_days").text(months[diaEntrega.getMonth()]+" "+diaEntrega.getDate()+" ("+ days[diaEntrega.getDay()] +")");
                                            }
                                        });*/
                                        $(xml).find('Response').each(function(){
                                                    var code = $(this).find('ResponseStatusCode').text();
                                                    if(code == 0)
                                                    {
                                                        document.getElementById('mediumUS').style.visibility = "hidden";
                                                        document.getElementById('mediumUS').style.display = "none"; 
                                                    }
                                                });
                                },
                                error: function() {
                                }
                                });
                            }
                        })
                var saveme3 =$.ajax({
                            type: 'POST',
                            url: "ups/UPS_2nd_Day_Air.php",
                            data: parametros,
                            success: function(result){
                                $.ajax({
                                    type: "GET",
                                    url: "ups/UPS_2nd_Day_Air.xml",
                                    dataType: "xml",
                                    success: function(xml){
                                        $(xml).find('TotalCharges').each(function(){
                                        var UPS_StandardP = $(this).find('MonetaryValue').text();
                                        $("#plus_priceUS").text("$ "+ UPS_StandardP);
                                        const diaEntrega = calculaEntrega(diaPedido, 2, festivos);
                                        $("#plus_priceUS_days").text(months[diaEntrega.getMonth()]+" "+diaEntrega.getDate()+" ("+ days[diaEntrega.getDay()] +")");
                                        $("#shipping-rate32").val(months[diaEntrega.getMonth()]+" "+diaEntrega.getDate()+" "+ days[diaEntrega.getDay()]);
                                        document.getElementById('plus_priceUS').textContent(UPS_StandardP);    
                                        });
                                        $(xml).find('Response').each(function(){
                                                    var code = $(this).find('ResponseStatusCode').text();
                                                    if(code == 0)
                                                    {
                                                        document.getElementById('fastUS').style.visibility = "hidden";
                                                        document.getElementById('fastUS').style.display = "none"; 
                                                    }
                                                });
                                },
                                error: function() {
                                }
                                });
                            }
                        })
        }
        function digits_count(n) 
        {
            var count = 0;
            if (n >= 1) ++count;

            while (n / 10 >= 1) {
                n /= 10;
                ++count;
            }

            return count;
        }
        function geolocate() 
        {
            if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition((position) => {
                const geolocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
                };
                const circle = new google.maps.Circle({
                center: geolocation,
                radius: position.coords.accuracy,
                });
                autocomplete.setBounds(circle.getBounds());
            });
            }
        }
        function checkU(num)
        {
            if (num==1)
            {
                document.getElementById("shipping-rate22").checked = 0;
                document.getElementById("shipping-rate32").checked = 0;
                document.getElementById("normalUS").style.background = "#ebf3fe";
                document.getElementById("mediumUS").style.background = "#fff";
                document.getElementById("fastUS").style.background = "#fff";
                var standard_price = document.getElementById("standard_priceUS").innerText;
                standard_price = 0.00
                var total_price = document.getElementById("totalpriceG").innerText;
                total_price = total_price.replace(/[$]/g,'');
                var tax = (parseFloat(total_price)/100)*7;
                tax = tax.toFixed(2);
                $("#totalprice").text("$ " + (parseFloat(tax)+ parseFloat(total_price) + parseFloat(standard_price)).toFixed(2));
                $("#price_shipping").text("$ 0.00");
            }
            if (num==2)
            {
                document.getElementById("shipping-rate12").checked = 0;
                document.getElementById("shipping-rate32").checked = 0;
                document.getElementById("normalUS").style.background = "#fff";
                document.getElementById("mediumUS").style.background = "#ebf3fe";
                document.getElementById("fastUS").style.background = "#fff";
                var standard_price = document.getElementById("express_priceUS").innerText;
                standard_price = standard_price.replace(/[$]/g,'');
                var total_price = document.getElementById("totalpriceG").innerText;
                total_price = total_price.replace(/[$]/g,'');
                var tax = (parseFloat(total_price)/100)*7;
                tax = tax.toFixed(2);
                $("#totalprice").text("$ " + (parseFloat(tax)+ parseFloat(total_price) + parseFloat(standard_price)).toFixed(2));
                $("#price_shipping").text("$ "+ standard_price);
            }
            if (num==3)
            {
                document.getElementById("shipping-rate22").checked = 0;
                document.getElementById("shipping-rate12").checked = 0;
                document.getElementById("normalUS").style.background = "#fff";
                document.getElementById("mediumUS").style.background = "#fff";
                document.getElementById("fastUS").style.background = "#ebf3fe";
                var standard_price = document.getElementById("plus_priceUS").innerText;
                standard_price = standard_price.replace(/[$]/g,'');
                var total_price = document.getElementById("totalpriceG").innerText;
                total_price = total_price.replace(/[$]/g,'');
                var tax = (parseFloat(total_price)/100)*7;
                tax = tax.toFixed(2);
                $("#totalprice").text("$ " + (parseFloat(tax)+ parseFloat(total_price) + parseFloat(standard_price)).toFixed(2));
                $("#price_shipping").text("$ "+ standard_price);
            }
        }
        function check(num)
        {
            if (num==1)
            {
                document.getElementById("shipping-rate2").checked = 0;
                document.getElementById("shipping-rate3").checked = 0;
                document.getElementById("normal").style.background = "#ebf3fe";
                document.getElementById("medium").style.background = "#fff";
                document.getElementById("fast").style.background = "#fff";
                var standard_price = document.getElementById("standard_price").innerText;
                standard_price = standard_price.replace(/[$]/g,'');
                var total_price = document.getElementById("totalpriceG").innerText;
                total_price = total_price.replace(/[$]/g,'');
                $("#totalprice").text("$ " + (parseFloat(total_price)+parseFloat(standard_price)).toFixed(2));
                $("#price_shipping").text("$ "+ standard_price);
            }
            if (num==2)
            {
                document.getElementById("shipping-rate1").checked = 0;
                document.getElementById("shipping-rate3").checked = 0;
                document.getElementById("normal").style.background = "#fff";
                document.getElementById("medium").style.background = "#ebf3fe";
                document.getElementById("fast").style.background = "#fff";
                var standard_price = document.getElementById("express_price").innerText;
                standard_price = standard_price.replace(/[$]/g,'');
                var total_price = document.getElementById("totalpriceG").innerText;
                total_price = total_price.replace(/[$]/g,'');
                $("#totalprice").text("$ " + (parseFloat(total_price)+parseFloat(standard_price)).toFixed(2));
                $("#price_shipping").text("$ "+ standard_price);
            }
            if (num==3)
            {
                document.getElementById("shipping-rate2").checked = 0;
                document.getElementById("shipping-rate1").checked = 0;
                document.getElementById("normal").style.background = "#fff";
                document.getElementById("medium").style.background = "#fff";
                document.getElementById("fast").style.background = "#ebf3fe";
                var standard_price = document.getElementById("plus_price").innerText;
                standard_price = standard_price.replace(/[$]/g,'');
                var total_price = document.getElementById("totalpriceG").innerText;
                total_price = total_price.replace(/[$]/g,'');
                $("#totalprice").text("$ " + (parseFloat(total_price)+parseFloat(standard_price)).toFixed(2));
                $("#price_shipping").text("$ "+ standard_price);
            }
        }
        function billing(num)
        {
            if (num==1)
            {
                document.getElementById("credit").checked = 0;
                document.getElementById("lipay").style.background = "#ebf3fe";
                document.getElementById("licredit").style.background = "#fff";
                document.getElementById('paypal-button-container').style.visibility = "visible";
                document.getElementById('paypal-button-container').style.display = "block"; 
                document.getElementById('credit-button-container').style.visibility = "hidden";
                document.getElementById('credit-button-container').style.display = "none"; 
            }
            if (num==2)
            {
                document.getElementById("pay").checked = 0;
                document.getElementById("licredit").style.background = "#ebf3fe";
                document.getElementById("lipay").style.background = "#fff";
                document.getElementById('paypal-button-container').style.visibility = "hidden";
                document.getElementById('paypal-button-container').style.display = "none"; 
                document.getElementById('credit-button-container').style.visibility = "visible";
                document.getElementById('credit-button-container').style.display = "block"; 
            }
        }
        function billingAddress()
        {
            var remember = document.getElementById('billing_address');
            if (remember.checked)
            {
                document.getElementById('billing_details').style.visibility = "hidden";
                document.getElementById('billing_details').style.display = "none"; 
                document.getElementById('billing_details').value = "1";
                var state = document.getElementById("administrative_area_level_1").value;
                var country = document.getElementById("country").value;
                if(country=="US")
                {
                    if(state=="TX")
                    {
                        var pricetotalU = document.getElementById("totalpriceG").innerText;//totalprice
                        var tax = (parseFloat(pricetotalU)/100)*7;
                        tax = tax.toFixed(2);
                        var totalp = parseFloat(pricetotalU)+parseFloat(tax);
                        document.getElementById('litax').style.visibility = "visible";
                        document.getElementById('litax').style.display = "block";
                        document.getElementById('taxesvalue').innerText ="$ "+tax;
                        totalp = totalp.toFixed(2);
                        document.getElementById('totalprice').innerText ="$ "+ totalp;
                    }
                }
            } 
            else
            {
                document.getElementById('billing_details').style.visibility = "visible";
                document.getElementById('billing_details').style.display = "block"; 
                document.getElementById('billing_details').value = "0";
                var pricetotalU = document.getElementById("totalpriceG").innerText;
                document.getElementById('totalprice').innerText ="$ "+ pricetotalU;
                document.getElementById('litax').style.visibility = "hidden";
                document.getElementById('litax').style.display = "none";
            }
        }
        const festivos = [[1, 7, 8],[27, 28],[1],[6, 9],[1],[15],[9],[17, 18, 19],[10],[12, 23],[],[25]];
        const diaPedido = new Date(Date.now());
        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        function calculaEntrega(diaPedido, diasPactados, festivos) 
        {
            let diaPropuesto = new Date(diaPedido.getFullYear(), diaPedido.getMonth(), diaPedido.getDate());
            let i = 1;
            while (diasPactados > 0 ) {
                let festivo = false;
                diaPropuesto = new Date(diaPedido.getFullYear(), diaPedido.getMonth(), diaPedido.getDate() + i);
                if (diaPropuesto.getDay() > 0 && diaPropuesto.getDay() < 6) 
                {
                    let m = diaPropuesto.getMonth();
                    let dia = diaPropuesto.getDate();
                    for (let d in festivos[m]) 
                    {
                        if (dia === festivos[m][d]) 
                        {
                            festivo = true;
                            break;
                        }
                    }
                    if (!festivo) 
                    {
                        diasPactados--;
                    }
                }
                i++;
            }
            return diaPropuesto;
        }
        function rellena()
        {
            var zipcode = document.getElementById('postal_code').value;
            var street_number = document.getElementById('street_number').value;
            var route = document.getElementById('route').value;
            var locality = document.getElementById('locality').value;
            var country = document.getElementById('shipping_country_id').value;
            var state1 = document.getElementById('state_id').value;
            var state2 = document.getElementById('administrative_area_level_1').value;
            var dir = street_number + " " + route  + " " + locality + " " + zipcode + " " + country;

            //autocomplete = new google.maps.places.AutocompleteService(zipcode,{ types: ["geocode"] });
            let sessionToken = new google.maps.places.AutocompleteSessionToken();
            let autocompleteService = new google.maps.places.AutocompleteService();
            var cont = 0;
            autocompleteService.getPlacePredictions(
                    {
                            input: dir,
                            type: ["address"],
                            sessionToken: sessionToken
                    },
                    function (predictions, status) {
                            for(let prediction of predictions){
                                console.log(prediction);
                                console.log(prediction.description);
                                if(cont==0)
                                {
                                    fill();
                                }
                                cont++;
                            }
                    }
            );
        }
        function Update_state_address()
        {
            var country = document.getElementById('shipping_country_id').value;
            if(country == "US")
            {
                document.getElementById('state_id').style.visibility = "visible";
                document.getElementById('state_id').style.display = "block"; 
                document.getElementById('administrative_area_level_1').style.visibility = "hidden";
                document.getElementById('administrative_area_level_1').style.display = "none"; 
            }else
                {
                    document.getElementById('administrative_area_level_1').style.visibility = "visible";
                    document.getElementById('administrative_area_level_1').style.display = "block"; 
                    document.getElementById('state_id').style.visibility = "hidden";
                    document.getElementById('state_id').style.display = "none"; 
                }
        }
        function fillwithlist(id_num)
        {
            var pricetotalU = document.getElementById("totalpriceG").innerText;//totalprice
            var tax = (parseFloat(pricetotalU)/100)*7;
            tax = tax.toFixed(2);
            var totalp = parseFloat(pricetotalU)+parseFloat(tax);

            var country = document.getElementById("ups_ul_country"+id_num).value;
            var Pcode = document.getElementById('ups_ul_postal'+id_num).value;
            if(document.getElementById('if_tax_state'))
                var state = document.getElementById('if_tax_state').value;
            document.getElementById('lishipping').style.visibility = "visible";
            document.getElementById('lishipping').style.display = "block";
            //const diaEntrega = calculaEntrega(diaPedido, 10, festivos);
            //alert(diaEntrega.toString());
            if(country=="US")
            {
                SendupsUS(Pcode);
                document.getElementById('deliveryUS').style.visibility = "visible";
                document.getElementById('deliveryUS').style.display = "block"; 
                document.getElementById('administrative_area_level_1').style.visibility = "hidden";
                document.getElementById('administrative_area_level_1').style.display = "none"; 
                document.getElementById('deliveryW').style.visibility = "hidden";
                document.getElementById('deliveryW').style.display = "none";
                
                document.getElementById("normalUS").style.background = "#ebf3fe";
                if(state=="TX")
                {
                    document.getElementById('litax').style.visibility = "visible";
                    document.getElementById('litax').style.display = "block";
                    document.getElementById('taxesvalue').innerText ="$ "+tax;
                    totalp = totalp.toFixed(2);
                    document.getElementById('totalprice').innerText ="$ "+ totalp;
                }else
                    {
                        document.getElementById('totalprice').innerText ="$ "+ pricetotalU;
                    }
            }else
            {
                Sendups(Pcode);
                document.getElementById('administrative_area_level_1').style.visibility = "visible";
                document.getElementById('administrative_area_level_1').style.display = "block"; 
                document.getElementById('state_id').style.visibility = "hidden";
                document.getElementById('state_id').style.display = "none"; 
                document.getElementById('deliveryW').style.visibility = "visible";
                document.getElementById('deliveryW').style.display = "block";
                document.getElementById('deliveryUS').style.visibility = "hidden";
                document.getElementById('deliveryUS').style.display = "none";
                document.getElementById('litax').style.visibility = "hidden";
                document.getElementById('litax').style.display = "none";
                document.getElementById("normal").style.background = "#ebf3fe";
                document.getElementById('totalprice').innerText ="$ "+ pricetotalU;
            }
        }  
        function shipping(id_num,num_elemnt)
        {
            var children = document.getElementById("shipping_address_list").children;
            var element = num_elemnt;
            for (var i = 0; i < children.length; i++) 
            {
                if(i == num_elemnt)
                {
                    children[i].style.background = "#ebf3fe";
                }
                else{
                    children[i].style.background = "#fff";
                }
            }
            var pricetotalU = document.getElementById("totalpriceG").innerText;      
            //alert("si");
            if(id_num.checked == 1)
            {
                document.getElementById('totalprice').innerText ="$ "+ pricetotalU;
                show_form_shipping();
                //alert("aqui");
            }
            else
            {
                //alert("otro aqui");
                document.getElementById('shipping_address_fields').style.visibility = "hidden";
                document.getElementById('shipping_address_fields').style.display = "none"; 
                document.getElementById('idparaconsulta').value = id_num;
                fillwithlist(id_num);
                
            }
        }
        function show_form_shipping()
        {
            document.getElementById('shipping_address_fields').style.visibility = "visible";
            document.getElementById('shipping_address_fields').style.display = "block"; 
            document.getElementById('litax').style.visibility = "hidden";
            document.getElementById('litax').style.display = "none";
        }
        function sleep(delay) {
        var start = new Date().getTime();
        while (new Date().getTime() < start + delay);
        }
        function validateContact() 
        {
            var valid = true;	
            $("#shipping_name").removeClass("invalid");
            $("#shipping_company").removeClass("invalid");
            $("#input_email").removeClass("invalid");
            $("#street_number").removeClass("invalid");
            //$("#route").removeClass("invalid");
            $("#locality").removeClass("invalid");
            $("#postal_code").removeClass("invalid");
            $("#state_id").removeClass("invalid");            
            if ($('#shipping_address_fields').is(':visible'))
            {
                if(!$("#shipping_name").val()) {
                    $("#shipping_name").addClass("invalid"); 
                    valid = false;
                }
                /*
                     if(!$("#shipping_company").val()) {
                    $("#shipping_company").addClass("invalid");
                    valid = false;
                }*/
                if ($('#input_email').is(':visible'))
                {
                    if(!$("#input_email").val()) {
                        $("#input_email").addClass("invalid"); 
                        valid = false;
                    }
                }
                
                if(!$("#street_number").val()) {
                    $("#street_number").addClass("invalid"); 
                    valid = false;
                }
                /*
                    if(!$("#route").val()) {
                    $("#route").addClass("invalid");
                    valid = false;
                }*/
                if(!$("#locality").val()) {
                    $("#locality").addClass("invalid");
                    valid = false;
                }
                if(!$("#postal_code").val()) {
                    $("#postal_code").addClass("invalid");
                    valid = false;
                }
                if ($('#administrative_area_level_1').is(':visible'))
                {
                    if(!$("#administrative_area_level_1").val()) {
                        $("#administrative_area_level_1").addClass("invalid"); 
                        valid = false;
                    }
                }
                /*
                if(!$("#state_id").val() || !$("#administrative_area_level_1").val()) { //administrative_area_level_1
                    $("#state_id").addClass("invalid");
                    valid = false;
                }*/
                if ($('#state_id').is(':visible'))
                {
                    if(!$("#state_id").val()) {
                        $("#state_id").addClass("invalid"); 
                        valid = false;
                    }
                }
            }
            if(valid==false)
                $("html, body").animate({ scrollTop: 0 }, 600);
            return valid;

        }
        function update_state_bill()
        {
            var country = document.getElementById('bill_country_id').value;
            if(country == "US")
            {
                document.getElementById('state_id_billing').style.visibility = "visible";
                document.getElementById('state_id_billing').style.display = "block"; 
                document.getElementById('administrative_area_level_1_bill').style.visibility = "hidden";
                document.getElementById('administrative_area_level_1_bill').style.display = "none"; 
            }else
                {
                    document.getElementById('administrative_area_level_1_bill').style.visibility = "visible";
                    document.getElementById('administrative_area_level_1_bill').style.display = "block"; 
                    document.getElementById('state_id_billing').style.visibility = "hidden";
                    document.getElementById('state_id_billing').style.display = "none"; 
                }
        
        }
        function state_billing_not_same()
        {
            var state = document.getElementById('state_id_billing').value;
            var pricetotalU = document.getElementById("totalpriceG").innerText;
            var tax = (parseFloat(pricetotalU)/100)*7;
            tax = tax.toFixed(2);
            var totalp = parseFloat(pricetotalU)+parseFloat(tax);
            if(document.getElementById("state_id_billing").style.visibility == "visible")
            {
                if(state=="TX")
                {
                    alert("tx");
                    document.getElementById('litax').style.visibility = "visible";
                    document.getElementById('litax').style.display = "block";
                    document.getElementById('taxesvalue').innerText ="$ "+tax;
                    totalp = totalp.toFixed(2);
                    document.getElementById('totalprice').innerText ="$ "+ totalp;
                }else
                    {
                        document.getElementById('totalprice').innerText ="$ "+ pricetotalU;
                    }
            }
            else
                    {
                        document.getElementById('totalprice').innerText ="$ "+ pricetotalU;
                    }
        }
        function validateContact_bill() 
        {
            var valid = true;	
            $("#billing_name").removeClass("invalid");
            $("#billing_company").removeClass("invalid");
            $("#billing_street_number").removeClass("invalid");
            //$("#route").removeClass("invalid");
            $("#billing_locality").removeClass("invalid");
            $("#billing_postal_code").removeClass("invalid");
            $("#state_id_billing").removeClass("invalid");            
            if ($('#billing_name').is(':visible'))
            {
                if(!$("#billing_name").val()) {
                    $("#billing_name").addClass("invalid"); 
                    valid = false;
                }
                /*
                if(!$("#billing_company").val()) {
                    $("#billing_company").addClass("invalid"); 
                    valid = false;
                }*/
                if(!$("#billing_street_number").val()) {
                    $("#billing_street_number").addClass("invalid"); 
                    valid = false;
                }
                if(!$("#billing_locality").val()) {
                    $("#billing_locality").addClass("invalid");
                    valid = false;
                }
                if(!$("#billing_postal_code").val()) {
                    $("#billing_postal_code").addClass("invalid");
                    valid = false;
                }
                if ($('#administrative_area_level_1_bill').is(':visible'))
                {
                    if(!$("#administrative_area_level_1_bill").val()) {
                        $("#administrative_area_level_1_bill").addClass("invalid"); 
                        valid = false;
                    }
                }
                if ($('#state_id_billing').is(':visible'))
                {
                    if(!$("#state_id_billing").val()) {
                        $("#state_id_billing").addClass("invalid"); 
                        valid = false;
                    }
                }
            }
            if(valid==false)
                $("html, body").animate({ scrollTop: 0 }, 600);
            return valid;

        }
    </script>
    <style>    
    .invalid {
        background: #fbf2f2;
        border: #e8e0e0 1px solid;
    }
    li:hover {
    background-color: #f9f9f9 !important;
    }
</style>
</head>
<body>
    
    <?php 
        include "nav.php";
    ?>
    <input type="text" id="usr_id" value="<?php echo $id_user?>" style="display:none;visibility:hidde;">
    <main style="position: relative;width: 100% !important;display: inline-block;background-color: white;" >
        <div class="clear container" id="checkout" style="padding-top: 30px; max-width: 800px;">
            <div class="content-left" style="min-height: 1020px;">
                <?php
                if($_SESSION['ghost'] == 0)
                {
                    ?>
                        <form class="alt-form" id="payment-form" method="get" action="processing.php">
                    <?php
                }
                else
                {
                    ?>
                        <form class="alt-form" id="payment-form" method="get" action="processing2.php">
                    <?php
                }
                ?>
                    <div >
                        <h4 style="font-weight: 900;font-size: 1.4rem;">Shipping info</h4>
                    
                        <div class="field-group clear" id="shipping_details">
                            
                            <?php
                                include 'php/conexion_be.php';
                                

                                $query    = "SELECT * FROM address_t WHERE id_user='$id_user'";
                                $result = mysqli_query($conexion,$query);
                                $default_id=-1;
                                if(mysqli_num_rows($result)>0)
                                {
                                    ?>
                                        <ul class="input-group mb-20" id="shipping_address_list" style="padding: 0;">
                                    <?php
                                    $cont=0;
                                    while ($extraido= mysqli_fetch_array($result))
                                    {
                                        //id	id_user	country	full_name	company	street_address1	street_address2	city	zip_code	statedir
                                        $id             = $extraido['id'];
                                        //$id_user        = $extraido['id_user'];
                                        $country        = $extraido['country'];
                                        $full_name      = $extraido['full_name'];
                                        $company        = $extraido['company'];
                                        $street_address1= $extraido['street_address1'];
                                        $street_address2= $extraido['street_address2'];
                                        $city           = $extraido['city'];
                                        $statedir       = $extraido['statedir'];
                                        $zip_code       = $extraido['zip_code'];
                                        $default_address= $extraido['default_address'];
                                        ?>
                                                <?php
                                                if($default_address==1)
                                                {
                                                    $default_id=$id;
                                                ?>
                                                    <li class="none" id="shipping_address_id<?php echo $id;?>" style="padding: 10px 0 10px 0;width: 100%;background:#ebf3fe">
                                                        <input style="left: 2%;top: -2%;width: auto;margin-right: 7px;display: inline-block;position: relative;" id="shipping_id" name="shipping_id" type="radio" value="<?php echo $id;?>" checked="" onclick="shipping(<?php echo $id;?>,<?php echo $cont;?>)">
                                                <?php
                                                }
                                                else{
                                                    ?>
                                                    <li class="none" id="shipping_address_id<?php echo $id;?>" style="padding: 10px 0 10px 0;width: 100%;">
                                                        <input style="left: 2%;top: -2%;width: auto;margin-right: 7px;display: inline-block;position: relative;" id="shipping_id" name="shipping_id" type="radio" value="<?php echo $id;?>" onclick="shipping(<?php echo $id;?>,<?php echo $cont;?>)">
                                                <?php
                                                }
                                                ?>
                                                    
                                                    <label style="width: 90%;">
                                                        <strong class="title" id=""><?php echo $full_name;?></strong>
                                                        <input type="radio" style="visibility:hidden;display:none;" value="<?php echo $id;?>" id="click_<?php echo $id;?>" onclick="shipping(<?php echo $id;?>,<?php echo $cont;?>)">
                                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $street_address1." ".$street_address2;?>" id="ups_ul_dir<?php echo $id;?>">
                                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $city;?>" id="ups_ul_city<?php echo $id;?>">
                                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $zip_code;?>" id="ups_ul_postal<?php echo $id;?>">
                                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $country;?>" id="ups_ul_country<?php echo $id;?>">
                                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $statedir;?>" id="ups_ul_state<?php echo $id;?>">
                                                        <span class="push-left price"  id=""><?php echo $street_address1." ".$street_address2;?></span>
                                                        <span class="push-left price"  id="" style="width: 100%;"><?php echo $city.", ".$statedir." ".$zip_code;?></span>
                                                        <?php
                                                        if($country=="US")
                                                        {
                                                        ?>
                                                            <span class="push-left price"  id="">United States</span>
                                                        <?php
                                                        }
                                                        if($country=="MX")
                                                        {
                                                        ?>
                                                            <span class="push-left price"  id="">Mexico</span>
                                                        <?php
                                                        }
                                                        if($country!="MX" && $country!="US")
                                                        {
                                                            ?>
                                                            <span class="push-left price"  id=""><?php echo $country;?></span>
                                                        <?php
                                                        }
                                                        ?>
                                                    </label>
                                                </li>
                                                <?php
                                                
                                        $cont++;
                                    }
                                    ?>
                                    <li class="none" id="shipping_address_id<?php echo $id;?>"style="padding: 10px 0 10px 0;width: 100%;">
                                        <input style="left: 2%;top: -8%;width: auto;margin-right: 7px;display: inline-block;position: relative;" id="shipping_id" name="shipping_id" type="radio" value="-10" onclick="shipping(this,<?php echo $cont;?>)">
                                        <label style="width: 90%;">
                                            <!--<strong class="title" id="standard_priceUS_days"><?php // echo $full_name;?></strong>-->
                                            <span class="title"  id="">Ship to another address</span>
                                        </label>
                                    </li>
                                    </ul>
                                    <?php
                                        $query_bill    = "SELECT * FROM billing_address WHERE id_user='$id_user' AND default_address='1'";
                                        $result_bill = mysqli_query($conexion,$query_bill);
                                        if(mysqli_num_rows($result_bill)>0)
                                        {
                                            $extraido_bill  = mysqli_fetch_array($result_bill);
                                            $country        = $extraido_bill['country'];
                                            $statedir      = $extraido_bill['statedir'];
                                            ?>
                                                <input style="visibility:hidden;display:none;" id="if_tax">
                                                <input style="visibility:hidden;display:none;" id="if_tax_country" value="<?php echo $country;?>">
                                                <input style="visibility:hidden;display:none;" id="if_tax_state" value="<?php echo $statedir;?>">
                                            <?php
                                        }
                                    ?>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function(event) { 
                                            
                                            var id = <?php echo $default_id; ?>;
                                            var segundo = id;
                                            document.getElementById('click_'+ segundo).dispatchEvent(new MouseEvent("click",{bubbles: true, cancellable: true}));
                                            //b1();
                                            //b2();
                                            var iftax =  document.getElementById("if_tax").value;
                                            if(iftax != null)
                                            {
                                                var country = document.getElementById("if_tax_country").value;
                                                var state = document.getElementById("if_tax_state").value;
                                                if(country == "US" && state == "TX")
                                                {
                                                    document.getElementById('litax').style.visibility = "visible";
                                                    document.getElementById('litax').style.display = "block"; 
                                                    /*document.getElementById('lisuptotal').style.visibility = "visible";
                                                    document.getElementById('lisuptotal').style.display = "block"; */
                                                    var totalp = parseFloat(pricetotalU)+parseFloat(tax);
                                                    var pricetotalU = document.getElementById("totalpriceG").innerText;
                                                    var tax = (parseFloat(pricetotalU)/100)*7;
                                                    tax = tax.toFixed(2);
                                                    var totalp = parseFloat(pricetotalU)+parseFloat(tax);
                                                    document.getElementById('taxesvalue').innerText ="$ "+tax;
                                                    totalp = totalp.toFixed(2);
                                                    document.getElementById('totalprice').innerText ="$ "+ totalp;
                                                }
                                                else{
                                                    document.getElementById('litax').style.visibility = "hidden";
                                                    document.getElementById('litax').style.display = "nonde"; 
                                                    document.getElementById('lisuptotal').style.visibility = "hidden";
                                                    document.getElementById('lisuptotal').style.display = "none"; 
                                                }
                                            }
                                            });
                                    </script>
                                    <?php
                                }
                            ?>
                            <div class="mt-15" id="shipping_address_fields" style="visibility:hidden;display:none;">
                                <div class="field select ">
                                    <span class="  label" style="display: inline-block;">
                                        <label for="message" class="labelfiel font-light" style="font-weight: bold;">Country</label>
                                    </span>
                                    <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">Required</small>
                                    
                                        <div style="width: 100%;" aria-live="assertive" class="inputWrapper " role="alert">
                                            <input class="inputcheckout"id="country"style="display:none;" required/>
                                            <select autocomplete="country" id="shipping_country_id" label="Country" name="country_id" type="select" class="" onchange="Update_state_address()">
                                                <option value="US">United States</option>
                                                <option value="MX">Mexico</option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AX">Aland Islands</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AS">American Samoa</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                                <option value="AI">Anguilla</option>
                                                <option value="AG">Antigua and Barbuda</option>
                                                <option value="AR">Argentina</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AW">Aruba</option>
                                                <option value="AU">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="AZ">Azerbaijan</option>
                                                <option value="BS">Bahamas</option>
                                                <option value="BH">Bahrain</option>
                                                <option value="BD">Bangladesh</option>
                                                <option value="BB">Barbados</option>
                                                <option value="BY">Belarus</option>
                                                <option value="BE">Belgium</option>
                                                <option value="BZ">Belize</option>
                                                <option value="BJ">Benin</option>
                                                <option value="BM">Bermuda</option>
                                                <option value="BT">Bhutan</option>
                                                <option value="BO">Bolivia</option>
                                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                <option value="BA">Bosnia and Herzegovina</option>
                                                <option value="BW">Botswana</option>
                                                <option value="BR">Brazil</option>
                                                <option value="BN">Brunei Darussalam</option>
                                                <option value="BG">Bulgaria</option>
                                                <option value="BF">Burkina Faso</option>
                                                <option value="BI">Burundi</option>
                                                <option value="KH">Cambodia</option>
                                                <option value="CM">Cameroon</option>
                                                <option value="CA">Canada</option>
                                                <option value="CV">Cape Verde</option>
                                                <option value="KY">Cayman Islands</option>
                                                <option value="CF">Central African Republic</option>
                                                <option value="TD">Chad</option>
                                                <option value="CL">Chile</option>
                                                <option value="CN">China</option>
                                                <option value="CO">Colombia</option>
                                                <option value="KM">Comoros</option>
                                                <option value="CG">Congo</option>
                                                <option value="CD">Congo, the Democratic Republic of the</option>
                                                <option value="CK">Cook Islands</option>
                                                <option value="CR">Costa Rica</option>
                                                <option value="HR">Croatia</option>
                                                <option value="CW">Curacao</option>
                                                <option value="CY">Cyprus</option>
                                                <option value="CZ">Czech Republic</option>
                                                <option value="DK">Denmark</option>
                                                <option value="DJ">Djibouti</option>
                                                <option value="DM">Dominica</option>
                                                <option value="DO">Dominican Republic</option>
                                                <option value="EC">Ecuador</option>
                                                <option value="EG">Egypt</option>
                                                <option value="SV">El Salvador</option>
                                                <option value="ER">Eritrea</option>
                                                <option value="EE">Estonia</option>
                                                <option value="ET">Ethiopia</option>
                                                <option value="FO">Faroe Islands</option>
                                                <option value="FJ">Fiji</option>
                                                <option value="FI">Finland</option>
                                                <option value="FR">France</option>
                                                <option value="GF">French Guiana</option>
                                                <option value="PF">French Polynesia</option>
                                                <option value="GA">Gabon</option>
                                                <option value="GM">Gambia</option>
                                                <option value="GE">Georgia</option>
                                                <option value="DE">Germany</option>
                                                <option value="GH">Ghana</option>
                                                <option value="GI">Gibraltar</option>
                                                <option value="GR">Greece</option>
                                                <option value="GL">Greenland</option>
                                                <option value="GD">Grenada</option>
                                                <option value="GP">Guadeloupe</option>
                                                <option value="GU">Guam</option>
                                                <option value="GT">Guatemala</option>
                                                <option value="GG">Guernsey</option>
                                                <option value="GN">Guinea</option>
                                                <option value="GW">Guinea-Bissau</option>
                                                <option value="GY">Guyana</option>
                                                <option value="HT">Haiti</option>
                                                <option value="VA">Holy See (Vatican City State)</option>
                                                <option value="HN">Honduras</option>
                                                <option value="HK">Hong Kong</option>
                                                <option value="HU">Hungary</option>
                                                <option value="IS">Iceland</option>
                                                <option value="IN">India</option>
                                                <option value="ID">Indonesia</option>
                                                <option value="IQ">Iraq</option>
                                                <option value="IE">Ireland</option>
                                                <option value="IL">Israel</option>
                                                <option value="IT">Italy</option>
                                                <option value="CI">Ivory Coast</option>
                                                <option value="JM">Jamaica</option>
                                                <option value="JP">Japan</option>
                                                <option value="JE">Jersey</option>
                                                <option value="JO">Jordan</option>
                                                <option value="KZ">Kazakhstan</option>
                                                <option value="KE">Kenya</option>
                                                <option value="KI">Kiribati</option>
                                                <option value="KW">Kuwait</option>
                                                <option value="KG">Kyrgyzstan</option>
                                                <option value="LA">Lao People's Democratic Republic</option>
                                                <option value="LV">Latvia</option>
                                                <option value="LB">Lebanon</option>
                                                <option value="LS">Lesotho</option>
                                                <option value="LR">Liberia</option>
                                                <option value="LY">Libyan Arab Jamahiriya</option>
                                                <option value="LI">Liechtenstein</option>
                                                <option value="LT">Lithuania</option>
                                                <option value="LU">Luxembourg</option>
                                                <option value="MO">Macao</option>
                                                <option value="MK">Macedonia</option>
                                                <option value="MG">Madagascar</option>
                                                <option value="MW">Malawi</option>
                                                <option value="MY">Malaysia</option>
                                                <option value="MV">Maldives</option>
                                                <option value="ML">Mali</option>
                                                <option value="MT">Malta</option>
                                                <option value="MH">Marshall Islands</option>
                                                <option value="MQ">Martinique</option>
                                                <option value="MR">Mauritania</option>
                                                <option value="MU">Mauritius</option>
                                                <option value="YT">Mayotte</option>
                                                <option value="FM">Micronesia, Federated States of</option>
                                                <option value="MD">Moldova, Republic of</option>
                                                <option value="MC">Monaco</option>
                                                <option value="MN">Mongolia</option>
                                                <option value="ME">Montenegro</option>
                                                <option value="MS">Montserrat</option>
                                                <option value="MA">Morocco</option>
                                                <option value="MZ">Mozambique</option>
                                                <option value="MM">Myanmar</option>
                                                <option value="NA">Namibia</option>
                                                <option value="NP">Nepal</option>
                                                <option value="NL">Netherlands</option>
                                                <option value="AN">Netherlands Antilles</option>
                                                <option value="NC">New Caledonia</option>
                                                <option value="NZ">New Zealand</option>
                                                <option value="NI">Nicaragua</option>
                                                <option value="NE">Niger</option>
                                                <option value="NG">Nigeria</option>
                                                <option value="NF">Norfolk Island</option>
                                                <option value="MP">Northern Mariana Islands</option>
                                                <option value="NO">Norway</option>
                                                <option value="OM">Oman</option>
                                                <option value="PK">Pakistan</option>
                                                <option value="PW">Palau</option>
                                                <option value="PA">Panama</option>
                                                <option value="PG">Papua New Guinea</option>
                                                <option value="PY">Paraguay</option>
                                                <option value="PE">Peru</option>
                                                <option value="PH">Philippines</option>
                                                <option value="PL">Poland</option>
                                                <option value="PT">Portugal</option>
                                                <option value="PR">Puerto Rico</option>
                                                <option value="QA">Qatar</option>
                                                <option value="RE">Reunion</option>
                                                <option value="RO">Romania</option>
                                                <option value="RU">Russian Federation</option>
                                                <option value="RW">Rwanda</option>
                                                <option value="BL">Saint Barthélemy</option>
                                                <option value="KN">Saint Kitts and Nevis</option>
                                                <option value="LC">Saint Lucia</option>
                                                <option value="MF">Saint Martin (French part)</option>
                                                <option value="VC">Saint Vincent and the Grenadines</option>
                                                <option value="WS">Samoa</option>
                                                <option value="SM">San Marino</option>
                                                <option value="SA">Saudi Arabia</option>
                                                <option value="SN">Senegal</option>
                                                <option value="RS">Serbia</option>
                                                <option value="SC">Seychelles</option>
                                                <option value="SL">Sierra Leone</option>
                                                <option value="SG">Singapore</option>
                                                <option value="SX">Sint Maarten</option>
                                                <option value="SK">Slovakia</option>
                                                <option value="SI">Slovenia</option>
                                                <option value="SB">Solomon Islands</option>
                                                <option value="ZA">South Africa</option>
                                                <option value="KR">South Korea</option>
                                                <option value="ES">Spain</option>
                                                <option value="LK">Sri Lanka</option>
                                                <option value="PS">State of Palestine</option>
                                                <option value="SR">Suriname</option>
                                                <option value="SJ">Svalbard and Jan Mayen</option>
                                                <option value="SZ">Swaziland</option>
                                                <option value="SE">Sweden</option>
                                                <option value="CH">Switzerland</option>
                                                <option value="TW">Taiwan</option>
                                                <option value="TJ">Tajikistan</option>
                                                <option value="TZ">Tanzania, United Republic of</option>
                                                <option value="TH">Thailand</option>
                                                <option value="TL">Timor-Leste</option>
                                                <option value="TG">Togo</option>
                                                <option value="TO">Tonga</option>
                                                <option value="TT">Trinidad and Tobago</option>
                                                <option value="TN">Tunisia</option>
                                                <option value="TR">Turkey</option>
                                                <option value="TC">Turks and Caicos Islands</option>
                                                <option value="TV">Tuvalu</option>
                                                <option value="UG">Uganda</option>
                                                <option value="UA">Ukraine</option>
                                                <option value="AE">United Arab Emirates</option>
                                                <option value="GB">United Kingdom</option>
                                                <option value="UY">Uruguay</option>
                                                <option value="UZ">Uzbekistan</option>
                                                <option value="VU">Vanuatu</option>
                                                <option value="VE">Venezuela</option>
                                                <option value="VN">Viet Nam</option>
                                                <option value="VG">Virgin Islands, British</option>
                                                <option value="VI">Virgin Islands, U.S.</option>
                                                <option value="WF">Wallis and Futuna</option>
                                                <option value="YE">Yemen</option>
                                                <option value="ZM">Zambia</option>
                                                <option value="ZW">Zimbabwe</option>
                                            </select>   
                                        </div>
                                    </div>
                                    <div class="field text ">
                                        <span class="  label" style="display: inline-block;">
                                            <label for="message" class="labelfiel font-light" style="font-weight: bold;">Full Name</label>
                                        </span>
                                        <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">Required</small>
                                    <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                            <input style="border: 1px solid #c8c8c8;" autocomplete="name" autocorrect="off" id="shipping_name" label="Full name" name="name" type="text" class="inputcheckout" value="" aria-invalid="true">
                                        </div>
                                    </div>
                                    <?php
                                    if(!isset( $_SESSION['email']))
                                    {
                                    ?>
                                    <div class="field text ">
                                        <span class="  label" style="display: inline-block;">
                                            <label for="message" class="labelfiel font-light" style="font-weight: bold;">Email</label>
                                        </span>
                                        <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">Required</small>
                                    
                                        <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                            <input style="border: 1px solid #c8c8c8;" autocomplete="name" required autocorrect="off" id="input_email" label="Full name" name="email" type="email" class="inputcheckout" value="" aria-invalid="true">
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    
                                    <input id="taxes"style="display:none;" name="taxes"/>
                                    <input id="shipping_price" style="display:none;" name="shipping_price"/>
                                    <input id="total"style="display:none;" name="total"/>
                                    <div class="field text ">
                                        <span class="  label" style="display: inline-block;">
                                            <label for="message" class="labelfiel font-light" style="font-weight: bold;">Company</label>
                                        </span>
                                        <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">Optional</small>
                                    
                                        <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                            <input style="border: 1px solid #c8c8c8;" autocomplete="company" required autocorrect="off" id="shipping_company" label="Company" name="company" type="text" class="inputcheckout" value="" aria-invalid="true">
                                        </div>
                                    </div>
                                    <div class="field group-input-wrappers text">
                                        <span class="  label" style="display: inline-block;">
                                            <label for="message" class="labelfiel font-light" style="font-weight: bold;">Street Address</label>
                                        </span>
                                        <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">Required</small>
                                    
                                        <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                            <input style="border: 1px solid #c8c8c8;" required aria-label="Street address 1" onFocus="" autocomplete="off" autocorrect="off" id="street_number" name="address1" placeholder="" type="text" class="inputcheckout pac-target-input" value="" aria-invalid="true">
                                        </div>
                                        <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                            <input style="border: 1px solid #c8c8c8;" required aria-label="Street address 2" autocomplete="off" autocorrect="off" id="route" name="address2" type="text" class="inputcheckout" value="">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="field text " style="display: inline-block;width: 50%;position: relative;">
                                            <span class="  label" style="display: inline-block;">
                                                <label for="message" class="labelfiel font-light" style="font-weight: bold;">City</label>
                                            </span>
                                            <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">Required</small>
                                    
                                            <div aria-live="assertive" class="inputWrapper inputcheckout" style="width:90%;display: inline-block;" role="alert">
                                                <input style="border: 1px solid #c8c8c8;" required id="locality" label="City"type="text" class="inputcheckout field" name="locality">
                                            </div>
                                        </div>
                                        <div class="field tel half" style="display: inline-block;width: 50%;position: absolute;">
                                            <span class="  label" style="display: inline-block;">
                                                <label for="message" class="labelfiel font-light" style="font-weight: bold;">ZIP Code</label>
                                            </span>
                                            <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">Required</small>
                                    
                                            <div aria-live="assertive" class="inputWrapper inputcheckout" style="width:100%;display: inline-block;" role="alert">
                                                <input  style="border: 1px solid #c8c8c8;" id="postal_code" label="ZIP code" type="tel" class="inputcheckout field" name="zipcode" onchange="rellena()">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="field select half right">
                                            <span class="  label" style="display: inline-block;">
                                                <label for="message" class="labelfiel font-light" style="font-weight: bold;">State</label>
                                            </span>
                                            <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">required</small>
                                    
                                            <div aria-live="assertive" style="width:100%;"class="inputWrapper " role="alert">
                                                <input style="visibility:hidden;display:none;border: 1px solid #c8c8c8;" class="field" name="state" style="" id="administrative_area_level_1" onchange="rellena()"/>
                                                <select style="border: 1px solid #c8c8c8;" autocomplete="address-level1" id="state_id" label="State" type="select" class="inputcheckout field" name="stateUS" onchange="rellena()">
                                                    <option value=""></option>
                                                    <option value="AL">Alabama</option>
                                                    <option value="AK">Alaska</option>
                                                    <option value="AZ">Arizona</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="CA">California</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="DC">District of Columbia</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="HI">Hawaii</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MI">Michigan</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="RI">Rhode Island</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WA">Washington</option>
                                                    <option value="WV">West Virginia</option>
                                                    <option value="WI">Wisconsin</option>
                                                    <option value="WY">Wyoming</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-container" id="address-picker-modal" tabindex="-1">
                                    <div aria-label="Modal" aria-modal="true" class="modal-content-wrapper" role="dialog">
                                        <div class="modal-content">
                                            <h2>Saved shipping addresses</h2>
                                            <ul class="address-items"></ul>
                                            <button class="modal-close-x" type="button">×</button>
                                        </div>
                                        <div class="modal-bg-close" role="presentation"></div>
                                    </div>
                                    <div class="modal-bg-close" role="presentation"></div>
                                </div>
                            </div>
                            <?php
                                if(mysqli_num_rows($result)==0)
                                {
                                    ?>
                                    <script language="javascript">
                            
                                        document.getElementById("shipping_address_fields").style.visibility = "visible";
                                        document.getElementById("shipping_address_fields").style.display = "block";
                                    </script>
                                    <?
                                }
                            ?>
                            <div class="field-group clear" id="delivery_details" style="margin-bottom: 30px;"><div>
                                <h2 style="font-weight: 900;font-size: 1.4rem;">Delivery date</h2>
                                <div>
                                    <!--<p class="font-light" style="font-size: 14px;">Delivery dates assume approval within 24 hours</p>-->
                                    <label style="width: 100%;padding-bottom: 10px;">
                                        Delivery dates assume approval within 24 hours
                                    </label>
                                </div>
                                <div id="deliveryW" style="visibility:hidden;display:none;">
                                    <ul class="input-group mb-20" id="payment-method-selector" style="height: 183px;padding: 0;">
                                        <li class="none" id="normal"style="padding: 10px 0 10px 0;width: 100%;">
                                            <input style="left: 2%;top: 0%;width: auto;margin-right: 7px;display: inline-block;position: relative;" id="shipping-rate1" type="radio" value="" checked="" onclick="check(1)">
                                            <label style="width: 90%;">
                                                <strong class="title"></strong><span class="push-right price"  id="standard_price"></span><small>UPS Standard</small>
                                            </label>
                                        </li>
                                        <li class="none " id="medium" style="padding: 10px 0 10px 0;width: 100%;">
                                            <input style="left: 2%;top: 0%;width: auto;margin-right: 7px;display: inline-block;position: relative;" id="shipping-rate2" type="radio" value="" onclick="check(2)">
                                            <label style="width: 90%;">
                                                <strong class="title"></strong><span class="push-right price" id="express_price"></span><small>UPS Worldwide Express</small>
                                            </label>
                                        </li>
                                        <li class="none " id="fast" style="padding: 10px 0 10px 0;width: 100%;">
                                            <input style="left: 2%;top: 0%;width: auto;margin-right: 7px;display: inline-block;position: relative;" id="shipping-rate3" type="radio" value="" onclick="check(3)">
                                            <label style="width: 90%;">
                                                <strong class="title"></strong><span class="push-right price" id="plus_price"></span><small>UPS Worldwide Expedited</small>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <div id="deliveryUS" style="visibility:hidden;display:none;">
                                    <ul class="input-group mb-20" id="payment-method-selector" style="height: 183px;padding: 0;">
                                        <li class="none" id="normalUS"style="padding: 10px 0 10px 0;width: 100%;">
                                            <input style="left: 2%;top: -50%;width: auto;margin-right: 7px;display: inline-block;position: relative;" id="shipping-rate12" name="deliverytime" type="radio" value="" checked="" onclick="checkU(1)">
                                            <label style="width: 90%;">
                                                <strong class="title" id="standard_priceUS_days"></strong><span class="push-right price"  id="standard_priceUS"></span><small>UPS Ground</small>
                                            </label>
                                        </li>
                                        <li class="none " id="mediumUS" style="padding: 10px 0 10px 0;width: 100%;">
                                            <input style="left: 2%;top: -50%;width: auto;margin-right: 7px;display: inline-block;position: relative;" id="shipping-rate22" name="deliverytime" type="radio" value="" onclick="checkU(2)">
                                            <label style="width: 90%;">
                                                <strong class="title" id="express_priceUS_days"></strong><span class="push-right price" id="express_priceUS"></span><small>UPS 3 Day Select</small>
                                            </label>
                                        </li>
                                        <li class="none " id="fastUS" style="padding: 10px 0 10px 0;width: 100%;">
                                            <input style="left: 2%;top: -50%;width: auto;margin-right: 7px;display: inline-block;position: relative;" id="shipping-rate32" name="deliverytime" type="radio" value="" onclick="checkU(3)">
                                            <label style="width: 90%;">
                                                <strong class="title" id="plus_priceUS_days"></strong><span class="push-right price" id="plus_priceUS"></span><small>UPS 2nd Day Air</small>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="field-group clear" id="Discount" style="margin-top: 30px;"><div>
                                <h2 style="font-weight: 900;font-size: 1.4rem;">Discount code</h2>
                                <div aria-live="assertive" class="inputWrapper inputcheckout" style="width:100%;display: inline-block;" role="alert">
                                    <input  style="border: 1px solid #c8c8c8;display: inline-block;width: auto !important;" id="discount_code" class="inputcheckout field" name="discount_code">
                                    <button type="button" class="button tiny primary" style="display: inline-block;" onclick="save_discount()" id="button_apply">Apply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field-group last clear" id="payment_billing_details">
                        <h2 style="font-weight: 900;font-size: 1.4rem;">Billing info</h2>
                        <p class="font-light" style="display:none">You will not be charged until proof approval.</p>
                        <label style="width: 100%;padding-bottom: 10px;">
                            You will not be charged until proof approval
                        </label>
                        <ul class="input-group mb-20" id="payment-method-selector" style="height: 130px;padding: 0;">
                            <li id="lipay" class="none" style="width: 100%;height: 61px;">
                                <input id="pay"style="left: 2%;top: 23%;width: auto;margin-right: 7px;display: inline-block;position: relative;" value="paypal" type="radio" onclick="billing(1)">
                                <label style="top: 20%;display: inline-block;position: relative;width: 100px;" class="title payment-paypal"><strong class="font-medium">PayPal</strong></label>
                                <img src="assets/paypal.png" alt="credit" style="width: 12%;display: inline-block;position: relative;float: right;padding: 19px 1px 19px 0;">
                                <!--<i style="font-size: 3.73em;color: #0566b4;display: inline-block;position: relative;float: right;"class="fab fa-cc-paypal"></i>-->
                            </li>
                            <li id="licredit" class="none" style="width: 100%;height: 61px;">
                                <input id="credit"style="left: 2%;top: 23%;width: auto;margin-right: 7px;display: inline-block;position: relative;" name="paymentMethod" type="radio" value="" onclick="billing(2)">
                                <label style="top: 20%;display: inline-block;position: relative;width: 100px;" class="title payment-new"><strong class="font-medium"><span class="only-lg">Credit card</span></strong></label>
                                <img src="assets/Paycredit.png" alt="credit" style="width: 40%;display: inline-block;position: relative;float: right;padding: 19px 0 19px 0;">
                            </li>
                        </ul>
                        <div style="display:none;" id="new-card"><div>
                            <div class="field">
                                <label for="card_number_v3">Card number<small class="field-help-message">Required</small></label>
                                <div id="card_number_v3" class="input-faux StripeElement--empty">
                                    <div class="__PrivateStripeElement" style="margin: 0px !important; padding: 0px !important; border: medium none !important; display: block !important; background: transparent none repeat scroll 0% 0% !important; position: relative !important; opacity: 1 !important;">
                                    <iframe allowtransparency="true" scrolling="no" name="__privateStripeFrame21113" allowpaymentrequest="true" src="https://js.stripe.com/v3/elements-inner-card-391d24303a402ccdad4ebc7b8d1beca5.html#locale=en&amp;wait=false&amp;showIcon=true&amp;style[base][color]=%23404040&amp;style[base][fontFamily]=%22Helvetica+Neue%22%2C+Helvetica%2C+Arial%2C+sans-serif&amp;style[base][fontSize]=16.8px&amp;style[base][fontSmoothing]=antialiased&amp;rtl=false&amp;componentName=cardNumber&amp;keyMode=live&amp;apiKey=pk_live_NtxGSOPbShyS6sRwD1tMaofa&amp;origin=https%3A%2F%2Fwww.stickermule.com&amp;referrer=https%3A%2F%2Fwww.stickermule.com%2Fcheckout&amp;controllerId=__privateStripeController2111" title="Secure card number input frame" style="border: medium none !important; margin: 0px !important; padding: 0px !important; width: 1px !important; min-width: 100% !important; overflow: hidden !important; display: block !important; user-select: none !important; transform: translateZ(0px) !important; height: 20.16px;" frameborder="0"></iframe>
                                        <input class="__PrivateStripeElement-input" aria-hidden="true" aria-label=" " autocomplete="false" maxlength="1" style="border: medium none !important; display: block !important; position: absolute !important; height: 1px !important; top: 0px !important; left: 0px !important; padding: 0px !important; margin: 0px !important; width: 100% !important; opacity: 0 !important; background: transparent none repeat scroll 0% 0% !important; pointer-events: none !important; font-size: 16px !important;">
                                    </div>
                                </div>
                            </div>
                            <div class="fieldgroup clear">
                                <div class="field half" id="card_expiry_field">
                                    <label for="expiry_v3">Expires<small class="field-help-message">Required</small></label>
                                    <div id="expiry_v3" class="input-faux StripeElement--empty">
                                        <div class="__PrivateStripeElement" style="margin: 0px !important; padding: 0px !important; border: medium none !important; display: block !important; background: transparent none repeat scroll 0% 0% !important; position: relative !important; opacity: 1 !important;">
                                            <iframe allowtransparency="true" scrolling="no" name="__privateStripeFrame21114" allowpaymentrequest="true" src="https://js.stripe.com/v3/elements-inner-card-391d24303a402ccdad4ebc7b8d1beca5.html#locale=en&amp;wait=false&amp;style[base][color]=%23404040&amp;style[base][fontFamily]=%22Helvetica+Neue%22%2C+Helvetica%2C+Arial%2C+sans-serif&amp;style[base][fontSize]=16.8px&amp;style[base][fontSmoothing]=antialiased&amp;rtl=false&amp;componentName=cardExpiry&amp;keyMode=live&amp;apiKey=pk_live_NtxGSOPbShyS6sRwD1tMaofa&amp;origin=https%3A%2F%2Fwww.stickermule.com&amp;referrer=https%3A%2F%2Fwww.stickermule.com%2Fcheckout&amp;controllerId=__privateStripeController2111" title="Secure expiration date input frame" style="border: medium none !important; margin: 0px !important; padding: 0px !important; width: 1px !important; min-width: 100% !important; overflow: hidden !important; display: block !important; user-select: none !important; transform: translateZ(0px) !important; height: 20.16px;" frameborder="0"></iframe>
                                                <input class="__PrivateStripeElement-input" aria-hidden="true" aria-label=" " autocomplete="false" maxlength="1" style="border: medium none !important; display: block !important; position: absolute !important; height: 1px !important; top: 0px !important; left: 0px !important; padding: 0px !important; margin: 0px !important; width: 100% !important; opacity: 0 !important; background: transparent none repeat scroll 0% 0% !important; pointer-events: none !important; font-size: 16px !important;">
                                        </div>
                                    </div>
                                </div>
                                <div class="field half right" id="card_security_code_field">
                                    <label for="cvc_v3">CVC<small class="field-help-message">Required</small></label>
                                    <div id="cvc" class="cvc-input input-faux StripeElement--empty">
                                        <div class="__PrivateStripeElement" style="margin: 0px !important; padding: 0px !important; border: medium none !important; display: block !important; background: transparent none repeat scroll 0% 0% !important; position: relative !important; opacity: 1 !important;">
                                            <iframe allowtransparency="true" scrolling="no" name="__privateStripeFrame21115" allowpaymentrequest="true" src="https://js.stripe.com/v3/elements-inner-card-391d24303a402ccdad4ebc7b8d1beca5.html#locale=en&amp;wait=false&amp;style[base][color]=%23404040&amp;style[base][fontFamily]=%22Helvetica+Neue%22%2C+Helvetica%2C+Arial%2C+sans-serif&amp;style[base][fontSize]=16.8px&amp;style[base][fontSmoothing]=antialiased&amp;rtl=false&amp;componentName=cardCvc&amp;keyMode=live&amp;apiKey=pk_live_NtxGSOPbShyS6sRwD1tMaofa&amp;origin=https%3A%2F%2Fwww.stickermule.com&amp;referrer=https%3A%2F%2Fwww.stickermule.com%2Fcheckout&amp;controllerId=__privateStripeController2111" title="Secure CVC input frame" style="border: medium none !important; margin: 0px !important; padding: 0px !important; width: 1px !important; min-width: 100% !important; overflow: hidden !important; display: block !important; user-select: none !important; transform: translateZ(0px) !important; height: 20.16px;" frameborder="0"></iframe>
                                                <input class="__PrivateStripeElement-input" aria-hidden="true" aria-label=" " autocomplete="false" maxlength="1" style="border: medium none !important; display: block !important; position: absolute !important; height: 1px !important; top: 0px !important; left: 0px !important; padding: 0px !important; margin: 0px !important; width: 100% !important; opacity: 0 !important; background: transparent none repeat scroll 0% 0% !important; pointer-events: none !important; font-size: 16px !important;">
                                        </div>
                                    </div>
                                    <button type="button" class="link" id="cvv_help" tabindex="1">?</button>
                                </div>
                            </div>
                        </div>
                        <div class="field checkbox ">
                            <label>
                                <div aria-live="assertive" class="inputWrapper " role="alert">
                                    <input label="Save payment method" name="save" type="checkbox" class="">
                                </div>
                                Save payment method</label>
                            </div>
                        </div>
                        <div class="clear">
                            <div class="field checkbox ">
                                <label style="width: 100%;">
                                    <div aria-live="assertive" class="inputWrapper " role="alert" style="width: 5%;">
                                        <input label="Billing address same as shipping" name="billing_address" id="billing_address" type="checkbox" class="" value="1" checked="" onclick="billingAddress()">
                                    </div>
                                    Billing address same as shipping
                                </label>
                            </div>
                        </div>
                        <div class="modal-container" id="delete-payment-method-modal" tabindex="-1">
                            <div aria-label="Modal" aria-modal="true" class="modal-content-wrapper" role="dialog">
                                <div class="modal-content">
                                    <button class="modal-close-x" type="button">×</button>
                                </div>
                                <div class="modal-bg-close" role="presentation"></div>
                            </div>
                            <div class="modal-bg-close" role="presentation"></div>
                        </div>
                    </div>
                    
                    <!--<div id="paypal-buttons-container" style="display:block;"></div>
                    <script src="https://www.paypal.com/sdk/js?client-id=Af5ty7de9nHTyS3-zqQ9kk-k2jcHhqwkvm1PFESTN-s4yeQf5cb6F8jCG-0SIsh-NbZdtkViB-EGAeXX"> 
                    </script>
                    <script>
                        var price = document.getElementById("totalprice").innerText;
                        paypal.Buttons({
                            style: {
                                layout:  'vertical',
                                color:   'blue',
                                shape:   'rect',
                                label:   'paypal'
                            },
                            createOrder: function(data, actions) {
                            return actions.order.create({
                                purchase_units: [{
                                amount: {
                                    value: price
                                }
                                }]
                            });
                            
                            },
                            onApprove: function(data, actions) {
                                var theForm = document.forms['payment-form'];
                                theForm.submit();
                            return actions.order.capture().then(function(details) {
                                alert('Transaction completed by ' + details.payer.name.given_name);
                                
                            });
                            }
                        }).render('#paypal-buttons-container'); // Display payment options on your web page
                        var h = document.getElementById("paypal-buttons-container");
                         h.insertAdjacentHTML("beforeend", "<img src='https://www.paypalobjects.com/marketing/web/mx/logos-buttons/compradores.png' style='width: 100%;' alt='Check out with PayPal'/>"); 
            
                    </script>-->
                    <div>
                        <div class="field-group clear" id="billing_details" style="visibility:hidden;display:none;">
                            <div class="mt-15" id="shipping_address_fields">
                                <div class="field select ">
                                    <span class="  label" style="display: inline-block;">
                                        <label for="message" class="labelfiel font-light" style="font-weight: bold;">Country</label>
                                    </span>
                                    <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">Required</small>
                                
                                        <div style="width: 100%;" aria-live="assertive" class="inputWrapper " role="alert">
                                            <input class="inputcheckout"id="country"style="display:none;"/>
                                            <select autocomplete="country" id="bill_country_id" label="Country" name="country_id_billing" type="select" class="" onchange="update_state_bill()">
                                                <option value="US">United States</option>
                                                <option value="MX">Mexico</option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AX">Aland Islands</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AS">American Samoa</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                                <option value="AI">Anguilla</option>
                                                <option value="AG">Antigua and Barbuda</option>
                                                <option value="AR">Argentina</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AW">Aruba</option>
                                                <option value="AU">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="AZ">Azerbaijan</option>
                                                <option value="BS">Bahamas</option>
                                                <option value="BH">Bahrain</option>
                                                <option value="BD">Bangladesh</option>
                                                <option value="BB">Barbados</option>
                                                <option value="BY">Belarus</option>
                                                <option value="BE">Belgium</option>
                                                <option value="BZ">Belize</option>
                                                <option value="BJ">Benin</option>
                                                <option value="BM">Bermuda</option>
                                                <option value="BT">Bhutan</option>
                                                <option value="BO">Bolivia</option>
                                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                <option value="BA">Bosnia and Herzegovina</option>
                                                <option value="BW">Botswana</option>
                                                <option value="BR">Brazil</option>
                                                <option value="BN">Brunei Darussalam</option>
                                                <option value="BG">Bulgaria</option>
                                                <option value="BF">Burkina Faso</option>
                                                <option value="BI">Burundi</option>
                                                <option value="KH">Cambodia</option>
                                                <option value="CM">Cameroon</option>
                                                <option value="CA">Canada</option>
                                                <option value="CV">Cape Verde</option>
                                                <option value="KY">Cayman Islands</option>
                                                <option value="CF">Central African Republic</option>
                                                <option value="TD">Chad</option>
                                                <option value="CL">Chile</option>
                                                <option value="CN">China</option>
                                                <option value="CO">Colombia</option>
                                                <option value="KM">Comoros</option>
                                                <option value="CG">Congo</option>
                                                <option value="CD">Congo, the Democratic Republic of the</option>
                                                <option value="CK">Cook Islands</option>
                                                <option value="CR">Costa Rica</option>
                                                <option value="HR">Croatia</option>
                                                <option value="CW">Curacao</option>
                                                <option value="CY">Cyprus</option>
                                                <option value="CZ">Czech Republic</option>
                                                <option value="DK">Denmark</option>
                                                <option value="DJ">Djibouti</option>
                                                <option value="DM">Dominica</option>
                                                <option value="DO">Dominican Republic</option>
                                                <option value="EC">Ecuador</option>
                                                <option value="EG">Egypt</option>
                                                <option value="SV">El Salvador</option>
                                                <option value="ER">Eritrea</option>
                                                <option value="EE">Estonia</option>
                                                <option value="ET">Ethiopia</option>
                                                <option value="FO">Faroe Islands</option>
                                                <option value="FJ">Fiji</option>
                                                <option value="FI">Finland</option>
                                                <option value="FR">France</option>
                                                <option value="GF">French Guiana</option>
                                                <option value="PF">French Polynesia</option>
                                                <option value="GA">Gabon</option>
                                                <option value="GM">Gambia</option>
                                                <option value="GE">Georgia</option>
                                                <option value="DE">Germany</option>
                                                <option value="GH">Ghana</option>
                                                <option value="GI">Gibraltar</option>
                                                <option value="GR">Greece</option>
                                                <option value="GL">Greenland</option>
                                                <option value="GD">Grenada</option>
                                                <option value="GP">Guadeloupe</option>
                                                <option value="GU">Guam</option>
                                                <option value="GT">Guatemala</option>
                                                <option value="GG">Guernsey</option>
                                                <option value="GN">Guinea</option>
                                                <option value="GW">Guinea-Bissau</option>
                                                <option value="GY">Guyana</option>
                                                <option value="HT">Haiti</option>
                                                <option value="VA">Holy See (Vatican City State)</option>
                                                <option value="HN">Honduras</option>
                                                <option value="HK">Hong Kong</option>
                                                <option value="HU">Hungary</option>
                                                <option value="IS">Iceland</option>
                                                <option value="IN">India</option>
                                                <option value="ID">Indonesia</option>
                                                <option value="IQ">Iraq</option>
                                                <option value="IE">Ireland</option>
                                                <option value="IL">Israel</option>
                                                <option value="IT">Italy</option>
                                                <option value="CI">Ivory Coast</option>
                                                <option value="JM">Jamaica</option>
                                                <option value="JP">Japan</option>
                                                <option value="JE">Jersey</option>
                                                <option value="JO">Jordan</option>
                                                <option value="KZ">Kazakhstan</option>
                                                <option value="KE">Kenya</option>
                                                <option value="KI">Kiribati</option>
                                                <option value="KW">Kuwait</option>
                                                <option value="KG">Kyrgyzstan</option>
                                                <option value="LA">Lao People's Democratic Republic</option>
                                                <option value="LV">Latvia</option>
                                                <option value="LB">Lebanon</option>
                                                <option value="LS">Lesotho</option>
                                                <option value="LR">Liberia</option>
                                                <option value="LY">Libyan Arab Jamahiriya</option>
                                                <option value="LI">Liechtenstein</option>
                                                <option value="LT">Lithuania</option>
                                                <option value="LU">Luxembourg</option>
                                                <option value="MO">Macao</option>
                                                <option value="MK">Macedonia</option>
                                                <option value="MG">Madagascar</option>
                                                <option value="MW">Malawi</option>
                                                <option value="MY">Malaysia</option>
                                                <option value="MV">Maldives</option>
                                                <option value="ML">Mali</option>
                                                <option value="MT">Malta</option>
                                                <option value="MH">Marshall Islands</option>
                                                <option value="MQ">Martinique</option>
                                                <option value="MR">Mauritania</option>
                                                <option value="MU">Mauritius</option>
                                                <option value="YT">Mayotte</option>
                                                <option value="FM">Micronesia, Federated States of</option>
                                                <option value="MD">Moldova, Republic of</option>
                                                <option value="MC">Monaco</option>
                                                <option value="MN">Mongolia</option>
                                                <option value="ME">Montenegro</option>
                                                <option value="MS">Montserrat</option>
                                                <option value="MA">Morocco</option>
                                                <option value="MZ">Mozambique</option>
                                                <option value="MM">Myanmar</option>
                                                <option value="NA">Namibia</option>
                                                <option value="NP">Nepal</option>
                                                <option value="NL">Netherlands</option>
                                                <option value="AN">Netherlands Antilles</option>
                                                <option value="NC">New Caledonia</option>
                                                <option value="NZ">New Zealand</option>
                                                <option value="NI">Nicaragua</option>
                                                <option value="NE">Niger</option>
                                                <option value="NG">Nigeria</option>
                                                <option value="NF">Norfolk Island</option>
                                                <option value="MP">Northern Mariana Islands</option>
                                                <option value="NO">Norway</option>
                                                <option value="OM">Oman</option>
                                                <option value="PK">Pakistan</option>
                                                <option value="PW">Palau</option>
                                                <option value="PA">Panama</option>
                                                <option value="PG">Papua New Guinea</option>
                                                <option value="PY">Paraguay</option>
                                                <option value="PE">Peru</option>
                                                <option value="PH">Philippines</option>
                                                <option value="PL">Poland</option>
                                                <option value="PT">Portugal</option>
                                                <option value="PR">Puerto Rico</option>
                                                <option value="QA">Qatar</option>
                                                <option value="RE">Reunion</option>
                                                <option value="RO">Romania</option>
                                                <option value="RU">Russian Federation</option>
                                                <option value="RW">Rwanda</option>
                                                <option value="BL">Saint Barthélemy</option>
                                                <option value="KN">Saint Kitts and Nevis</option>
                                                <option value="LC">Saint Lucia</option>
                                                <option value="MF">Saint Martin (French part)</option>
                                                <option value="VC">Saint Vincent and the Grenadines</option>
                                                <option value="WS">Samoa</option>
                                                <option value="SM">San Marino</option>
                                                <option value="SA">Saudi Arabia</option>
                                                <option value="SN">Senegal</option>
                                                <option value="RS">Serbia</option>
                                                <option value="SC">Seychelles</option>
                                                <option value="SL">Sierra Leone</option>
                                                <option value="SG">Singapore</option>
                                                <option value="SX">Sint Maarten</option>
                                                <option value="SK">Slovakia</option>
                                                <option value="SI">Slovenia</option>
                                                <option value="SB">Solomon Islands</option>
                                                <option value="ZA">South Africa</option>
                                                <option value="KR">South Korea</option>
                                                <option value="ES">Spain</option>
                                                <option value="LK">Sri Lanka</option>
                                                <option value="PS">State of Palestine</option>
                                                <option value="SR">Suriname</option>
                                                <option value="SJ">Svalbard and Jan Mayen</option>
                                                <option value="SZ">Swaziland</option>
                                                <option value="SE">Sweden</option>
                                                <option value="CH">Switzerland</option>
                                                <option value="TW">Taiwan</option>
                                                <option value="TJ">Tajikistan</option>
                                                <option value="TZ">Tanzania, United Republic of</option>
                                                <option value="TH">Thailand</option>
                                                <option value="TL">Timor-Leste</option>
                                                <option value="TG">Togo</option>
                                                <option value="TO">Tonga</option>
                                                <option value="TT">Trinidad and Tobago</option>
                                                <option value="TN">Tunisia</option>
                                                <option value="TR">Turkey</option>
                                                <option value="TC">Turks and Caicos Islands</option>
                                                <option value="TV">Tuvalu</option>
                                                <option value="UG">Uganda</option>
                                                <option value="UA">Ukraine</option>
                                                <option value="AE">United Arab Emirates</option>
                                                <option value="GB">United Kingdom</option>
                                                <option value="UY">Uruguay</option>
                                                <option value="UZ">Uzbekistan</option>
                                                <option value="VU">Vanuatu</option>
                                                <option value="VE">Venezuela</option>
                                                <option value="VN">Viet Nam</option>
                                                <option value="VG">Virgin Islands, British</option>
                                                <option value="VI">Virgin Islands, U.S.</option>
                                                <option value="WF">Wallis and Futuna</option>
                                                <option value="YE">Yemen</option>
                                                <option value="ZM">Zambia</option>
                                                <option value="ZW">Zimbabwe</option>
                                            </select>   
                                        </div>
                                    </div>
                                    <div class="field text ">
                                        <span class="  label" style="display: inline-block;">
                                            <label for="message" class="labelfiel font-light" style="font-weight: bold;">Full Name</label>
                                        </span>
                                        <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">Required</small>
                                    
                                        <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                            <input style="border: 1px solid #c8c8c8;" autocomplete="name" autocorrect="off" id="billing_name" label="Full name" name="name_billing" type="text" class="inputcheckout" value="" aria-invalid="true">
                                        </div>
                                    </div>
                                    <div class="field text ">
                                        <span class="  label" style="display: inline-block;">
                                            <label for="message" class="labelfiel font-light" style="font-weight: bold;">Company</label>
                                        </span>
                                        <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">Optional</small>
                                    
                                        <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                            <input style="border: 1px solid #c8c8c8;" autocomplete="company" autocorrect="off" id="billing_company" label="Company" name="company_billing" type="text" class="inputcheckout" value="">
                                        </div>
                                    </div>
                                    <div class="field group-input-wrappers text">
                                        <span class="  label" style="display: inline-block;">
                                            <label for="message" class="labelfiel font-light" style="font-weight: bold;">Street Address</label>
                                        </span>
                                        <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">Required</small>
                                    
                                    
                                        <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                            <input style="border: 1px solid #c8c8c8;" aria-label="Street address 1" onFocus="" autocomplete="off" autocorrect="off" id="billing_street_number" name="address1_billing" placeholder="" type="text" class="inputcheckout pac-target-input" value="" aria-invalid="true">
                                        </div>
                                        <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                            <input style="border: 1px solid #c8c8c8;" aria-label="Street address 2" autocomplete="off" autocorrect="off" id="billing_route" name="address2_billing" type="text" class="inputcheckout" value="">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="field text " style="display: inline-block;width: 50%;position: relative;">
                                            <span class="  label" style="display: inline-block;">
                                                <label for="message" class="labelfiel font-light" style="font-weight: bold;">City</label>
                                            </span>
                                            <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">Required</small>
                                        
                                            <div aria-live="assertive" class="inputWrapper inputcheckout" style="width:90%;display: inline-block;" role="alert">
                                                <input style="border: 1px solid #c8c8c8;" id="billing_locality" label="City"type="text" class="inputcheckout field" name="locality_billing">
                                            </div>
                                        </div>
                                        <div class="field tel half" style="display: inline-block;width: 50%;position: absolute;">
                                            <span class="  label" style="display: inline-block;">
                                                <label for="message" class="labelfiel font-light" style="font-weight: bold;">ZIP Code</label>
                                            </span>
                                            <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">Required</small>
                                        
                                            <div aria-live="assertive" class="inputWrapper inputcheckout" style="width:100%;display: inline-block;" role="alert">
                                                <input style="border: 1px solid #c8c8c8;"  id="billing_postal_code" label="ZIP code" type="tel" class="inputcheckout field" name="zipcode_billing">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="field select half right">
                                            <span class="  label" style="display: inline-block;">
                                                <label for="message" class="labelfiel font-light" style="font-weight: bold;">State</label>
                                            </span>
                                            <small style="margin: 0 0 0 5px;font-style: italic;color: #999;display: inline-block;font-weight: 400;font-size: .9rem;font-family: 'Gotham-Light';">Required</small>
                                        
                                            <div aria-live="assertive" style="width:100%;"class="inputWrapper " role="alert">
                                                <input  style="border: 1px solid #c8c8c8;visibility:hidden;display:none;" class="field inputcheckout" style="" name="state_billing" id="administrative_area_level_1_bill"/>
                                                <select style="visibility:visible;display:block;" autocomplete="address-level1" id="state_id_billing" label="State" name="" type="select" class="inputcheckout field" onchange="state_billing_not_same()">
                                                    <option value=""></option>
                                                    <option value="AL">Alabama</option>
                                                    <option value="AK">Alaska</option>
                                                    <option value="AZ">Arizona</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="CA">California</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="DC">District of Columbia</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="HI">Hawaii</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MI">Michigan</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="RI">Rhode Island</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WA">Washington</option>
                                                    <option value="WV">West Virginia</option>
                                                    <option value="WI">Wisconsin</option>
                                                    <option value="WY">Wyoming</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="paypal-button-container" style="visibility:hidden;display:none;"></div>
                        <div id="credit-button-container" style="visibility:hidden;display:none;"></div>
                    </div>
                    <div class="form-buttons" style="display:none">
                        <button class="stripe-button button large blue" type="submit" id="pay-button" style="width: 100%;background-color:#5ea0dc;">Place your order</button>
                    </div>
                </form>
            </div>
            <div class="content-right sticky-wrapper" style="padding-bottom: 100px;">
                <div class="sticky">
                    <div class="summary-box" id="checkout-summary">
                        <div id="checkout-summary-header">
                            <input type="text" id="idparaconsulta" name="idparaconsulta" value="" style="visibility:hidden;display:none;">
                            <h3><span class="fit-text only-lg">Order summary</span></h3>
                            <img alt="Secured by Comodo SSL." id="ssl-secured" name="seal" src="https://ssl.comodo.com/images/trusted-site-seal.png">
                        </div>
                        <ul id="checkout-summary-line-items" style="padding-left: 0px;">
                                    <?php
                                        $price = 0;
                                        $count = 0;
                                        $cart  = mysqli_query($conexion,"SELECT * FROM cart WHERE id_user ='$id_user'"); //email='$email_u'
                                        if(isset($_SESSION['id']))
                                        {
                                            if(mysqli_num_rows($cart)>0)
                                            {
                                                while ($extraido= mysqli_fetch_array($cart))
                                                {
                                                    $id            = $extraido['id'];
                                                    $id_user       = $extraido ['id_user'];
                                                    $width_inches  = $extraido['width_inches'];
                                                    $height_inches = $extraido ['height_inches'];
                                                    $price         = $extraido['price'];
                                                    $total        += $price; 
                                                    $_SESSION['total'] = $total;
                                                    $tipe          = $extraido ['tipe'];
                                                    $quantity      = $extraido['quantity'];
                                                    $id_images     = $extraido ['id_images'];
                                                    $txt_details   = $extraido['txt_details'];	
                                                    $cupon         = $extraido['cupon']; 	
                                                    if($cupon == "COCO" && $tipe=="Circle stickers" &&
                                                    $width_inches=="3"&& $height_inches=="3" && $quantity=="50")
                                                    {
                                                        echo "
                                                        <li class=' item none' > 
                                                            <span class=' amount fontlight'>&nbsp;&nbsp;&nbsp;$20.00</span>
                                                            <span class=' amount fontlight' style='text-decoration:line-through;'>$$price.00</span>
                                                           
                                                            <span class=' title font-medium' >$tipe</span>
                                                            <div class=' quantity fontlight' >Qty: $quantity</div>
                                                        </li>";
                                                        $price = 20;
                                                        $_SESSION['total'] = $_SESSION['total'] -49;
                                                        $total = $total -49;
                                                    }
                                                    else{
                                                        echo "
                                                        <li class=' item none' >
                                                            <span class=' amount fontlight' >$$price.00</span>
                                                            <span class=' title font-medium' >$tipe</span>
                                                            <div class=' quantity fontlight' >Qty: $quantity</div>
                                                            <span class=' description fontlight' >$txt_details</span>
                                                        </li>";
                                                    }                                                    
                                                    $count++;
                                                }
                                                if($count>1)
                                                {
                                                    $discount = ($total/100)*20;
                                                    $subtotal = $total - $discount;
                                                    echo "
                                                    <li class='discount fontlight'>
                                                        <span class='label'>Quantity discount</span>
                                                        <span class='amount'>-$$discount</span>
                                                    </li>";
                                                }
                                                if($count<=1)
                                                {
                                                    $subtotal = $total;
                                                }
                                                echo "
                                                    <li class='shipping fontlight' style='visibility:hidden;display:none;' id='lishipping'>
                                                        <span class='label'>Shipping</span>
                                                        <span class='amount' id='price_shipping'></span>
                                                    </li>
                                                    <li class='subtotal fontlight' style='visibility:hidden;display:none;' id='lisuptotal'>
                                                        <span class='label'>Subtotal</span>
                                                        <span class='amount' id='subtotalvalue'></span>
                                                    </li>
                                                    <li class='sales-tax fontlight' style='visibility:hidden;display:none;' id='litax'>
                                                        <span class='label'>Sales tax</span>
                                                        <span class='amount' id='taxesvalue'></span>
                                                    </li>
                                                    <li class=' total none fontlight' >
                                                        <span class=' label font-medium' style='float: left;'>Total</span>
                                                        <span class='amount font-medium' id='totalprice'>$". sprintf('%.2f',$subtotal, 2)."</span>
                                                        <span class='amount' style='visibility:hidden;display:none;' id='totalpriceG'>$subtotal</span>
                                                    </li>";
                                                mysqli_close($conexion);
                                            }
                                        }
                                    ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-container" id="confirm-address-modal" tabindex="-1">
                    <div aria-label="Modal" aria-modal="true" class="modal-content-wrapper" role="dialog">
                        <div class="modal-content">
                            <h2>Confirm your address</h2>
                            <div class="confirm-address-content"><div>
                                <p id="no_match">We couldn't verify your address. Do you want to continue with this address or make changes?</p>
                                <div class="address" id="supplied_address">
                                    <input id="use_recommended_false" name="use_recommended" type="radio" value="false" checked="">
                                    <label for="use_recommended_false"><strong>You entered:</strong>United States</label>
                                </div>
                                <div class="form-buttons" id="form_buttons_no_match">
                                    <button class="medium grey cancel close">Make changes</button>
                                    <button class="medium blue submit" id="use_this_address">Use this address</button>
                                </div>
                            </div>
                        </div>
                        <button class="modal-close-x" type="button">×</button>
                    </div>
                    <div class="modal-bg-close" role="presentation"></div>
                </div>
                <div class="modal-bg-close" role="presentation"></div>
            </div>
            <script src="https://www.paypal.com/sdk/js?client-id=AUCR7KR5dEAZn3k9Gmivmlb4UggR2gG5zRHNtjH_AGoZCEmAOW7rnikXRHgE8LnyGyfMEF1p9UEof5wH"></script>
                    <script src="https://www.paypal.com/sdk/js?client-id=&components=buttons,marks"></script>
                    <script>
                            var FUNDING_SOURCES_PAYPAL = [
                                paypal.FUNDING.PAYPAL
                            ];
                            var price = document.getElementById("totalprice").innerText;
                            price= price.replace(/ /g,""); 
                            var montoFormat = price.replace(/[$]/g,"");
                            FUNDING_SOURCES_PAYPAL.forEach(function(fundingSource) {
                            var buttonpaypal = paypal.Buttons({
                                fundingSource: fundingSource,
                                style: {
                                    layout:  'vertical',
                                    color:   'blue',
                                    shape:   'rect',
                                    label:   'paypal'
                                },
                                createOrder: function(data, actions) {
                                    var theForm = document.forms['payment-form'];
                                    var valid;	
                                    valid = validateContact();
                                    valid2 = validateContact_bill();
                                    if(valid && valid2)
                                    {
                                        document.getElementById("taxes").value            = document.getElementById("taxesvalue").innerText;
                                        document.getElementById("total").value            = document.getElementById("totalprice").innerText;
                                        document.getElementById("shipping_price").value   = document.getElementById("price_shipping").innerText;
                                        <?php
                                        if($_SESSION['ghost'] == 1)
                                        {
                                            ?>
                                                theForm.submit();
                                            <?php
                                        }
                                        ?>
                                        return actions.order.create({
                                                purchase_units: [{
                                                amount: {
                                                    value: montoFormat
                                                }
                                                }]
                                            });
                                    }
                                },
                                onApprove: function(data, actions) {
                                    var theForm = document.forms['payment-form'];
                                    theForm.submit();
                                    return actions.order.capture().then(function(details) {
                                        //alert('Transaction completed by ' + details.payer.name.given_name);
                                        
                                    });
                                }
                            });
                            buttonpaypal.render('#paypal-button-container');        
                            });
                    
                    </script>
                    <script>
                            var FUNDING_SOURCES_CREDIT = [
                                paypal.FUNDING.CARD
                            ];
                            var price = document.getElementById("totalprice").innerText;
                            price= price.replace(/ /g,""); 
                            var montoFormat = price.replace(/[$]/g,"");
                            FUNDING_SOURCES_CREDIT.forEach(function(fundingSource) {
                            var buttonCREDIT = paypal.Buttons({
                                fundingSource: fundingSource,
                                
                                createOrder: function(data, actions) {
                                    
                                    var valid;	
                                    valid = validateContact();
                                    if(valid)
                                    {
                                    return actions.order.create({
                                            purchase_units: [{
                                            amount: {
                                                value: montoFormat
                                            }
                                            }]
                                        });
                                    }
                                },
                                onApprove: function(data, actions) {
                                    var theForm = document.forms['payment-form'];
                                    theForm.submit();
                                return actions.order.capture().then(function(details) {
                                    //alert('Transaction completed by ' + details.payer.name.given_name);
                                    
                                });
                                }
                            });
                            buttonCREDIT.render('#credit-button-container');        
                            });
                    </script>
        </div>
    </main>
<?php include "footer.php"; ?>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="js/bootsnav/bootsnav.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
