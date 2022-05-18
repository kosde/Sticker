<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
     include "css.php";
    ?>
    <script src="https://kit.fontawesome.com/a38c16a07e.js"></script>

    <script type=text/javascript>
        var cant60=.12,
            cant100=.39, 
            cant200=.60, 
            cant300=.68, 
            cant500=.78, 
            cant1000=.85, 
            cant2000=.87, 
            cant3000=.88, 
            cant5000=.89, 
            cant10000=.92;
        var scant100=cant100*100,
            scant200=cant200*100,
            scant300=cant300*100,
            scant500=cant500*100,
            scant1000=cant1000*100, 
            scant2000=cant2000*100,
            scant3000=cant3000*100,
            scant5000=cant5000*100,
            scant10000=cant10000*100;
        var descB=43;
        function Custom(price) 
        {
            var remember = document.getElementById('quantity_custom');
            document.getElementById('spancustomprice').innerText="";
            document.getElementById('spancustomsavings').innerText="";
            if (remember.checked)
            {
                document.getElementById("price_custom").checked = 1;
                var h = document.getElementById("custom");
                var list = document.getElementById("spancustom");
                list.remove();
                h.insertAdjacentHTML("beforeend", "<span class='custom-quantity-wrapper' id='customspanquantity'><div aria-live='assertive' class='inputWrapper'role='alert' id='warnning'><input pattern='[0-9]*' id='valorcustom' style='width: 100px;' placeholder='Quantity' type='number' class='' value='' onkeyup='custom()'></div></span>"); 
            } 
            else
            {
                var element =  document.getElementById('customspanquantity');
                document.getElementById("price_custom").checked = 0;
                if (typeof(element) != 'undefined' && element != null)
                {
                    element.remove();
                    var insert = document.getElementById("custom");
                    insert.insertAdjacentHTML("beforeend","<span class='custom-quantity-wrapper' id='spancustom'>Custom quantity</span>");
                }
                var valorspan = document.getElementById("price_50_id").innerText;
                if(price==valorspan.replace('$',''))
                {
                    document.getElementById("price_50").checked = 1;
                    document.getElementById("price_100").checked = 0;
                    document.getElementById("price_200").checked = 0;
                    document.getElementById("price_300").checked = 0;
                    document.getElementById("price_500").checked = 0;
                    document.getElementById("price_1000").checked = 0;
                    document.getElementById("price_2000").checked = 0;
                    document.getElementById("price_3000").checked = 0;
                    document.getElementById("price_5000").checked = 0;
                    document.getElementById("price_10000").checked = 0;
                    document.getElementById("price_50").style = "";
                    document.getElementById("price_100").style = "display:none;";
                    document.getElementById("price_200").style = "display:none;";
                    document.getElementById("price_300").style = "display:none;";
                    document.getElementById("price_500").style = "display:none;";
                    document.getElementById("price_1000").style = "display:none;";
                    document.getElementById("price_2000").style = "display:none;";
                    document.getElementById("price_3000").style = "display:none;";
                    document.getElementById("price_5000").style = "display:none;";
                    document.getElementById("price_10000").style = "display:none;";
                    document.getElementById("price_50").type = "hidden";
                    document.getElementById("price_100").type = "radio";
                    document.getElementById("price_200").type = "radio";
                    document.getElementById("price_300").type = "radio";
                    document.getElementById("price_500").type = "radio";
                    document.getElementById("price_1000").type = "radio";
                    document.getElementById("price_2000").type = "radio";
                    document.getElementById("price_3000").type = "radio";
                    document.getElementById("price_5000").type = "radio";
                    document.getElementById("price_10000").type = "radio";
                }
                var valorspan = document.getElementById("price_100_id").innerText;
                if(price== valorspan.replace('$',''))
                {
                    document.getElementById("price_50").checked = 0;
                    document.getElementById("price_100").checked = 1;
                    document.getElementById("price_200").checked = 0;
                    document.getElementById("price_300").checked = 0;
                    document.getElementById("price_500").checked = 0;
                    document.getElementById("price_1000").checked = 0;
                    document.getElementById("price_2000").checked = 0;
                    document.getElementById("price_3000").checked = 0;
                    document.getElementById("price_5000").checked = 0;
                    document.getElementById("price_10000").checked = 0;
                    document.getElementById("price_50").style = "display:none;";
                    document.getElementById("price_100").style = "";
                    document.getElementById("price_200").style = "display:none;";
                    document.getElementById("price_300").style = "display:none;";
                    document.getElementById("price_500").style = "display:none;";
                    document.getElementById("price_1000").style = "display:none;";
                    document.getElementById("price_2000").style = "display:none;";
                    document.getElementById("price_3000").style = "display:none;";
                    document.getElementById("price_5000").style = "display:none;";
                    document.getElementById("price_10000").style = "display:none;";
                    document.getElementById("price_50").type = "radio";
                    document.getElementById("price_100").type = "hidden";
                    document.getElementById("price_200").type = "radio";
                    document.getElementById("price_300").type = "radio";
                    document.getElementById("price_500").type = "radio";
                    document.getElementById("price_1000").type = "radio";
                    document.getElementById("price_2000").type = "radio";
                    document.getElementById("price_3000").type = "radio";
                    document.getElementById("price_5000").type = "radio";
                    document.getElementById("price_10000").type = "radio";
                }
                var valorspan = document.getElementById("price_200_id").innerText;
                if(price == valorspan.replace('$',''))
                {
                    document.getElementById("price_50").checked = 0;
                    document.getElementById("price_100").checked = 0;
                    document.getElementById("price_200").checked = 1;
                    document.getElementById("price_300").checked = 0;
                    document.getElementById("price_500").checked = 0;
                    document.getElementById("price_1000").checked = 0;
                    document.getElementById("price_2000").checked = 0;
                    document.getElementById("price_3000").checked = 0;
                    document.getElementById("price_5000").checked = 0;
                    document.getElementById("price_10000").checked = 0;
                    document.getElementById("price_50").style = "display:none;";
                    document.getElementById("price_100").style = "display:none;";
                    document.getElementById("price_200").style = "";
                    document.getElementById("price_300").style = "display:none;";
                    document.getElementById("price_500").style = "display:none;";
                    document.getElementById("price_1000").style = "display:none;";
                    document.getElementById("price_2000").style = "display:none;";
                    document.getElementById("price_3000").style = "display:none;";
                    document.getElementById("price_5000").style = "display:none;";
                    document.getElementById("price_10000").style = "display:none;";
                    document.getElementById("price_50").type = "radio";
                    document.getElementById("price_100").type = "radio";
                    document.getElementById("price_200").type = "hidden";
                    document.getElementById("price_300").type = "radio";
                    document.getElementById("price_500").type = "radio";
                    document.getElementById("price_1000").type = "radio";
                    document.getElementById("price_2000").type = "radio";
                    document.getElementById("price_3000").type = "radio";
                    document.getElementById("price_5000").type = "radio";
                    document.getElementById("price_10000").type = "radio";
                }
                var valorspan = document.getElementById("price_300_id").innerText;
                if(price== valorspan.replace('$',''))
                {
                    document.getElementById("price_50").checked = 0;
                    document.getElementById("price_100").checked = 0;
                    document.getElementById("price_200").checked = 0;
                    document.getElementById("price_300").checked = 1;
                    document.getElementById("price_500").checked = 0;
                    document.getElementById("price_1000").checked = 0;
                    document.getElementById("price_2000").checked = 0;
                    document.getElementById("price_3000").checked = 0;
                    document.getElementById("price_5000").checked = 0;
                    document.getElementById("price_10000").checked = 0;
                    document.getElementById("price_50").style = "display:none;";
                    document.getElementById("price_100").style = "display:none;";
                    document.getElementById("price_200").style = "display:none;";
                    document.getElementById("price_300").style = "";
                    document.getElementById("price_500").style = "display:none;";
                    document.getElementById("price_1000").style = "display:none;";
                    document.getElementById("price_2000").style = "display:none;";
                    document.getElementById("price_3000").style = "display:none;";
                    document.getElementById("price_5000").style = "display:none;";
                    document.getElementById("price_10000").style = "display:none;";
                    document.getElementById("price_50").type = "radio";
                    document.getElementById("price_100").type = "radio";
                    document.getElementById("price_200").type = "radio";
                    document.getElementById("price_300").type = "hidden";
                    document.getElementById("price_500").type = "radio";
                    document.getElementById("price_1000").type = "radio";
                    document.getElementById("price_2000").type = "radio";
                    document.getElementById("price_3000").type = "radio";
                    document.getElementById("price_5000").type = "radio";
                    document.getElementById("price_10000").type = "radio";
                }
                var valorspan = document.getElementById("price_500_id").innerText;
                if(price== valorspan.replace('$',''))
                {
                    document.getElementById("price_50").checked = 0;
                    document.getElementById("price_100").checked = 0;
                    document.getElementById("price_200").checked = 0;
                    document.getElementById("price_300").checked = 0;
                    document.getElementById("price_500").checked = 1;
                    document.getElementById("price_1000").checked = 0;
                    document.getElementById("price_2000").checked = 0;
                    document.getElementById("price_3000").checked = 0;
                    document.getElementById("price_5000").checked = 0;
                    document.getElementById("price_10000").checked = 0;
                    document.getElementById("price_50").style = "display:none;";
                    document.getElementById("price_100").style = "display:none;";
                    document.getElementById("price_200").style = "display:none;";
                    document.getElementById("price_300").style = "display:none;";
                    document.getElementById("price_500").style = "";
                    document.getElementById("price_1000").style = "display:none;";
                    document.getElementById("price_2000").style = "display:none;";
                    document.getElementById("price_3000").style = "display:none;";
                    document.getElementById("price_5000").style = "display:none;";
                    document.getElementById("price_10000").style = "display:none;";
                    document.getElementById("price_50").type = "radio";
                    document.getElementById("price_100").type = "radio";
                    document.getElementById("price_200").type = "radio";
                    document.getElementById("price_300").type = "radio";
                    document.getElementById("price_500").type = "hidden";
                    document.getElementById("price_1000").type = "radio";
                    document.getElementById("price_2000").type = "radio";
                    document.getElementById("price_3000").type = "radio";
                    document.getElementById("price_5000").type = "radio";
                    document.getElementById("price_10000").type = "radio";
                }
                var valorspan = document.getElementById("price_1000_id").innerText;
                if(price== valorspan.replace('$',''))
                {
                    document.getElementById("price_50").checked = 0;
                    document.getElementById("price_100").checked = 0;
                    document.getElementById("price_200").checked = 0;
                    document.getElementById("price_300").checked = 0;
                    document.getElementById("price_500").checked = 0;
                    document.getElementById("price_1000").checked = 1;
                    document.getElementById("price_2000").checked = 0;
                    document.getElementById("price_3000").checked = 0;
                    document.getElementById("price_5000").checked = 0;
                    document.getElementById("price_10000").checked = 0;
                    document.getElementById("price_50").style = "display:none;";
                    document.getElementById("price_100").style = "display:none;";
                    document.getElementById("price_200").style = "display:none;";
                    document.getElementById("price_300").style = "display:none;";
                    document.getElementById("price_500").style = "display:none;";
                    document.getElementById("price_1000").style = "";
                    document.getElementById("price_2000").style = "display:none;";
                    document.getElementById("price_3000").style = "display:none;";
                    document.getElementById("price_5000").style = "display:none;";
                    document.getElementById("price_10000").style = "display:none;";
                    document.getElementById("price_50").type = "radio";
                    document.getElementById("price_100").type = "radio";
                    document.getElementById("price_200").type = "radio";
                    document.getElementById("price_300").type = "radio";
                    document.getElementById("price_500").type = "radio";
                    document.getElementById("price_1000").type = "hidden";
                    document.getElementById("price_2000").type = "radio";
                    document.getElementById("price_3000").type = "radio";
                    document.getElementById("price_5000").type = "radio";
                    document.getElementById("price_10000").type = "radio";
                }
                var valorspan = document.getElementById("price_2000_id").innerText;
                if(price== valorspan.replace('$',''))
                {
                    document.getElementById("price_50").checked = 0;
                    document.getElementById("price_100").checked = 0;
                    document.getElementById("price_200").checked = 0;
                    document.getElementById("price_300").checked = 0;
                    document.getElementById("price_500").checked = 0;
                    document.getElementById("price_1000").checked = 0;
                    document.getElementById("price_2000").checked = 1;
                    document.getElementById("price_3000").checked = 0;
                    document.getElementById("price_5000").checked = 0;
                    document.getElementById("price_10000").checked = 0;
                    document.getElementById("price_50").style = "display:none;";
                    document.getElementById("price_100").style = "display:none;";
                    document.getElementById("price_200").style = "display:none;";
                    document.getElementById("price_300").style = "display:none;";
                    document.getElementById("price_500").style = "display:none;";
                    document.getElementById("price_1000").style = "display:none;";
                    document.getElementById("price_2000").style = "";
                    document.getElementById("price_3000").style = "display:none;";
                    document.getElementById("price_5000").style = "display:none;";
                    document.getElementById("price_10000").style = "display:none;";
                    document.getElementById("price_50").type = "radio";
                    document.getElementById("price_100").type = "radio";
                    document.getElementById("price_200").type = "radio";
                    document.getElementById("price_300").type = "radio";
                    document.getElementById("price_500").type = "radio";
                    document.getElementById("price_1000").type = "radio";
                    document.getElementById("price_2000").type = "hidden";
                    document.getElementById("price_3000").type = "radio";
                    document.getElementById("price_5000").type = "radio";
                    document.getElementById("price_10000").type = "radio";
                }
                var valorspan = document.getElementById("price_3000_id").innerText;
                if(price== valorspan.replace('$',''))
                {
                    document.getElementById("price_50").checked = 0;
                    document.getElementById("price_100").checked = 0;
                    document.getElementById("price_200").checked = 0;
                    document.getElementById("price_300").checked = 0;
                    document.getElementById("price_500").checked = 0;
                    document.getElementById("price_1000").checked = 0;
                    document.getElementById("price_2000").checked = 0;
                    document.getElementById("price_3000").checked = 1;
                    document.getElementById("price_5000").checked = 0;
                    document.getElementById("price_10000").checked = 0;
                    document.getElementById("price_50").style = "display:none;";
                    document.getElementById("price_100").style = "display:none;";
                    document.getElementById("price_200").style = "display:none;";
                    document.getElementById("price_300").style = "display:none;";
                    document.getElementById("price_500").style = "display:none;";
                    document.getElementById("price_1000").style = "display:none;";
                    document.getElementById("price_2000").style = "display:none;";
                    document.getElementById("price_3000").style = "";
                    document.getElementById("price_5000").style = "display:none;";
                    document.getElementById("price_10000").style = "display:none;";
                    document.getElementById("price_50").type = "radio";
                    document.getElementById("price_100").type = "radio";
                    document.getElementById("price_200").type = "radio";
                    document.getElementById("price_300").type = "radio";
                    document.getElementById("price_500").type = "radio";
                    document.getElementById("price_1000").type = "radio";
                    document.getElementById("price_2000").type = "radio";
                    document.getElementById("price_3000").type = "hidden";
                    document.getElementById("price_5000").type = "radio";
                    document.getElementById("price_10000").type = "radio";
                }
                var valorspan = document.getElementById("price_5000_id").innerText;
                if(price== valorspan.replace('$',''))
                {
                    document.getElementById("price_50").checked = 0;
                    document.getElementById("price_100").checked = 0;
                    document.getElementById("price_200").checked = 0;
                    document.getElementById("price_300").checked = 0;
                    document.getElementById("price_500").checked = 0;
                    document.getElementById("price_1000").checked = 0;
                    document.getElementById("price_2000").checked = 0;
                    document.getElementById("price_3000").checked = 0;
                    document.getElementById("price_5000").checked = 1;
                    document.getElementById("price_10000").checked = 0;
                    document.getElementById("price_50").style = "display:none;";
                    document.getElementById("price_100").style = "display:none;";
                    document.getElementById("price_200").style = "display:none;";
                    document.getElementById("price_300").style = "display:none;";
                    document.getElementById("price_500").style = "display:none;";
                    document.getElementById("price_1000").style = "display:none;";
                    document.getElementById("price_2000").style = "display:none;";
                    document.getElementById("price_3000").style = "display:none;";
                    document.getElementById("price_5000").style = "";
                    document.getElementById("price_10000").style = "display:none;";
                    document.getElementById("price_50").type = "radio";
                    document.getElementById("price_100").type = "radio";
                    document.getElementById("price_200").type = "radio";
                    document.getElementById("price_300").type = "radio";
                    document.getElementById("price_500").type = "radio";
                    document.getElementById("price_1000").type = "radio";
                    document.getElementById("price_2000").type = "radio";
                    document.getElementById("price_3000").type = "radio";
                    document.getElementById("price_5000").type = "hidden";
                    document.getElementById("price_10000").type = "radio";
                }
                var valorspan = document.getElementById("price_10000_id").innerText;
                if(price== valorspan.replace('$',''))
                {
                    document.getElementById("price_50").checked = 0;
                    document.getElementById("price_100").checked = 0;
                    document.getElementById("price_200").checked = 0;
                    document.getElementById("price_300").checked = 0;
                    document.getElementById("price_500").checked = 0;
                    document.getElementById("price_1000").checked = 0;
                    document.getElementById("price_2000").checked = 0;
                    document.getElementById("price_3000").checked = 0;
                    document.getElementById("price_5000").checked = 0;
                    document.getElementById("price_10000").checked = 1;
                    document.getElementById("price_50").style = "display:none;";
                    document.getElementById("price_100").style = "display:none;";
                    document.getElementById("price_200").style = "display:none;";
                    document.getElementById("price_300").style = "display:none;";
                    document.getElementById("price_500").style = "display:none;";
                    document.getElementById("price_1000").style = "display:none;";
                    document.getElementById("price_2000").style = "display:none;";
                    document.getElementById("price_3000").style = "display:none;";
                    document.getElementById("price_5000").style = "display:none;";
                    document.getElementById("price_10000").style = "";
                    document.getElementById("price_50").type = "radio";
                    document.getElementById("price_100").type = "radio";
                    document.getElementById("price_200").type = "radio";
                    document.getElementById("price_300").type = "radio";
                    document.getElementById("price_500").type = "radio";
                    document.getElementById("price_1000").type = "radio";
                    document.getElementById("price_2000").type = "radio";
                    document.getElementById("price_3000").type = "radio";
                    document.getElementById("price_5000").type = "radio";
                    document.getElementById("price_10000").type = "hidden";
                }
            }
        }
        function custom()
        {
            var num = document.getElementById('valorcustom'); 
            if(num.value<10) //diverrormore
            {
                var element =  document.getElementById('diverrordiv');
                if (typeof(element) != 'undefined' && element != null)
                {
                    element.remove();
                }
                var element =  document.getElementById('diverrormore');
                if (typeof(element) != 'undefined' && element != null)
                {
                    element.remove();
                }
                var msgalertt = document.getElementById("warnning");
                msgalertt.insertAdjacentHTML("beforeend", "<div id='diverrorless' class='tooltiperror error'><span class='arrow'></span><span class='text'>Can't be less than 10</span></div>");
            }
            if(num.value>=10)
            {
                if(num.value%10==0)
                {
                    var element =  document.getElementById('diverrordiv');
                    if (typeof(element) != 'undefined' && element != null)
                    {
                        element.remove();
                        document.getElementById('spancustomprice').innerText="";
                    }
                    var element =  document.getElementById('diverrorless');
                    if (typeof(element) != 'undefined' && element != null)
                    {
                        element.remove();
                        document.getElementById('spancustomprice').innerText="";
                    }
                    var element =  document.getElementById('diverrormore');
                    if (typeof(element) != 'undefined' && element != null)
                    {
                        element.remove();
                    }
                    var cantidad = document.getElementById('valorcustom').value;
                    // spancustomprice
                    // spancustomsavings
                    if(cantidad!=0)
                    {
                        var var1 = document.getElementById('variant_78');
                        var var2 = document.getElementById('variant_79');
                        var var3 = document.getElementById('variant_80');
                        var var4 = document.getElementById('variant_81');
                        var var5 = document.getElementById('variant_77');
                        var size1,size2;
                        if (var1.checked)
                        {
                            size1=2;
                            size2=2;
                        }
                        if (var2.checked)
                        {
                            size1=3;
                            size2=3;
                        }
                        if (var3.checked)
                        {
                            size1=4;
                            size2=4;
                        }
                        if (var4.checked)
                        {
                            size1=5;
                            size2=5;
                        }
                        if (var5.checked)
                        {
                            size1 = document.getElementById('width').value;
                            size2 = document.getElementById('height').value;
                        }
                        
                       // var precioxunidadW = .44+(size1*0.06); //.06
                        //var precioxunidadH = .44+(size2*0.06); //.06 54 48 12
                        if(size1==1)
                            {
                                var precioxunidadW = size1*0.47; //.06
                            }
                            if(size2==1)
                            {
                                var precioxunidadH = size2*0.47; //.06 54 48 12
                            }
                            if(size1>1)
                            {
                                var precioxunidadW = size1*0.255; //.06
                            }
                            if(size2>1)
                            {
                                var precioxunidadH = size2*0.255; //.06 54 48 12
                            }
                            if(size1>2)
                            {
                                var precioxunidadW = size1*0.23; //.06
                            }
                            if(size2>2)
                            {
                                var precioxunidadH = size2*0.23; //.06 54 48 12
                            }
                            if(size1>25)
                            {
                                var precioxunidadW = size1*0.2055; //.06
                            }
                            if(size2>15)
                            {
                                var precioxunidadH = size2*0.2055; //.06 54 48 12
                            }
                            if(size1>30)
                            {
                                var precioxunidadW = size1*0.3055; //.06
                            }
                            if(size2>20)
                            {
                                var precioxunidadH = size2*0.3055; //.06 54 48 12
                            }
                        var precioxunidad = precioxunidadW + precioxunidadH;
                        if(cantidad < 60)
                        {
                            
                            var price=precioxunidad*cantidad;
                            document.getElementById('quantity_custom').value = cantidad;
                            document.getElementById('spancustomprice').innerText="$"+ price.toFixed();
                            document.getElementById('price_custom').value=price.toFixed();
                            return;
                        }
                        if(cantidad > 50)
                        {
                            document.getElementById('quantity_custom').value = cantidad;
                            
                            var descuento=0,iter=0,desctotal=0,inicio=0;
                            

                            //var precioxunidad = precioxunidadW + precioxunidadH;
                            //alert(precioxunidadH);
                            var price=precioxunidad*50;
                            cant60=11-((.59*size1)+(.59*size2));
                            cant100=44-((1.5*size1)+(1.5*size2));
                            cant200=66-((1.8*size1)+(1.8*size2)); 
                            cant300=76-((1.8*size1)+(1.8*size2)); 
                            cant500=83-((2.4*size1)+(2.4*size2)); 
                            cant1000=92-((2.4*size1)+(2.4*size2)); 
                            cant2000=93-((2.4*size1)+(2.4*size2)); 
                            cant3000=95-((2.4*size1)+(2.4*size2)); 
                            cant5000=97-((2.1*size1)+(2.1*size2)); 
                            cant10000=98-((2.1*size1)+(2.1*size2));
                            scant100=cant100;
                            scant200=cant200;
                            scant300=cant300;
                            scant500=cant500;
                            scant1000=cant1000; 
                            scant2000=cant2000;
                            scant3000=cant3000;
                            scant5000=cant5000;
                            scant10000=cant10000;
                            
                            if(scant1000 < 24)
                            {
                                scant1000 = 24;
                            } 
                            if(scant2000 < 24 )
                            {
                                scant2000 = 24;
                            } 
                            if(scant3000 < 24 )
                            {
                                scant3000 = 24;
                            } 
                            if( scant5000 < 24 )
                            {
                                scant5000 = 24;
                            } 
                            if( scant10000 < 24)
                            {
                                scant10000 = 24;
                            }
                            if(scant200 < 23 )
                            {
                                scant200 = 23;
                            } 
                            if( scant300 < 23 )
                            {
                                scant300 = 23;
                            } 
                            if( scant500 < 23)
                            {
                                scant500 = 23;
                            }
                            if(cant100 < 13)
                            {
                                scant100 = 13;
                            }
                            if(cant60 < 4)
                            {
                                scant60 = 4;
                            }

                            if(cantidad>=60 && cantidad<100)
                            {
                                descuento = (cant100-cant60)/40;
                                desctotal = cant60;
                                inicio=60;
                            }
                            if(cantidad>=100 && cantidad<200)
                            {
                                descuento = (cant200-cant100)/100;
                                desctotal = cant100;
                                inicio=100;
                            }
                            if(cantidad>=200 && cantidad<300)
                            {
                                descuento = (cant300-cant200)/100;
                                desctotal = cant200;
                                inicio=200;
                            }
                            if(cantidad>=300 && cantidad<500)
                            {   
                                descuento = (cant500-cant300)/200;
                                desctotal = cant300;
                                inicio=300;
                            }
                            if(cantidad>=500 && cantidad<1000)
                            {
                                descuento = (cant1000-cant500)/500;
                                desctotal = cant500;
                                inicio=500;
                            }
                            if(cantidad>=1000 && cantidad<2000)
                            {
                                descuento = (cant2000-cant1000)/1000;
                                desctotal = cant1000;
                                inicio=1000;
                            }
                            if(cantidad>=2000 && cantidad<3000)
                            {
                                descuento = (cant3000-cant2000)/1000;
                                desctotal = cant2000;
                                inicio=2000;
                            }
                            if(cantidad>=3000 && cantidad<5000)
                            {
                                descuento = (cant5000-cant3000)/2000;
                                desctotal = cant3000;
                                inicio=3000;
                            }
                            if(cantidad>=5000 && cantidad<10000)
                            {
                                descuento = (cant10000-cant5000)/5000;
                                desctotal = cant5000;
                                inicio=5000;
                            }
                            if(cantidad>=10000 && cantidad<200000)
                            {
                                descuento = 0;
                                desctotal = cant10000;
                                inicio=10000;
                            }
                            for(i=inicio;i<cantidad;i++)
                            {
                                iter += descuento;
                            }
                           
                            descuento =  desctotal + iter;
                            //alert(precioxunidad*cantidad);
                            var price=(precioxunidad*cantidad)-(((precioxunidad*cantidad)/100)*descuento);
                            //var price=precioxunidad*cantidad-precioxunidad*cantidad*descuento;
                            document.getElementById('spancustomprice').innerText="$"+ price.toFixed();
                            document.getElementById('price_custom').value=price.toFixed();
                            //descuento = descuento * 100;
                            document.getElementById('spancustomsavings').innerText="Save " + descuento.toFixed()+"%";
                            if(cantidad>200000)
                            {
                                
                                var msgalertt = document.getElementById("warnning");
                                msgalertt.insertAdjacentHTML("beforeend", "<div id='diverrormore' class='tooltiperror error'><span class='arrow'></span><span class='text'>Can't be more than 200000</span></div>");
                            
                            }
                        }
                    } 
                }
                else
                {
                    var element =  document.getElementById('diverrorless');
                    if (typeof(element) != 'undefined' && element != null)
                    {
                        element.remove();
                    }
                    var element =  document.getElementById('diverrormore');
                    if (typeof(element) != 'undefined' && element != null)
                    {
                        element.remove();
                    }
                    var msgaler = document.getElementById("warnning");
                    msgaler.insertAdjacentHTML("beforeend", "<div id='diverrordiv' class='tooltiperror error'><span class='arrow'></span><span class='text'>Must be a multiple of 10</span></div>");
                }
            }
            if(num.value==0 || num.value=="")
            {
                document.getElementById('spancustomprice').innerText="";
                document.getElementById('price_custom').value="";
                document.getElementById('spancustomsavings').innerText="";
            }
        }
        function CustomsizeWandH()
        {
            var remember = document.getElementById('variant_77');
            if (remember.checked)
            {
                if (document.getElementById('custom_dimensions_field') !=null) 
                   document.getElementById("custom_dimensions_field").remove();

                var element =  document.getElementById('variant_77_L');
               
                element.insertAdjacentHTML("afterend", "<span id='custom_dimensions_field' class='custom_dimensions'>&nbsp;<span class='inputWrapper' id='customwidth'><input id='width' name='width' placeholder='Width' size='4' step='0.01' type='number' onkeyup='CheckcustomH()'></span><span> × </span><span class='inputWrapper' id='customheight'><input id='height' name='height' placeholder='Height' size='4' step='0.01' type='number' onkeyup='CheckcustomH()'></span></span>"); 
                var elemento = document.getElementById("variant-quantities");
                elemento.className += " disabled";
                var price = document.getElementById('price_10000_id').innerText;
                
                
            } 
            else
            {
                var element =  document.getElementById('custom_dimensions_field');
                if (typeof(element) != 'undefined' && element != null)
                {
                    element.remove();
                }
                if(document.getElementById('valorcustom'))
                {
                    document.getElementById('valorcustom').value="";//
                    document.getElementById('spancustomprice').innerText="";//
                    document.getElementById('spancustomsavings').innerText="";//
                }
                var var1 = document.getElementById('variant_78');
                var var2 = document.getElementById('variant_79');
                var var3 = document.getElementById('variant_80');
                var var4 = document.getElementById('variant_81');
                var var5 = document.getElementById('variant_77');
                var size1=0,size2=0;
                if(var1.checked)
                {
                    var elemento = document.getElementById("variant-quantities");
                    elemento.className = " options radio";
                    size1=2;
                    size2=2;
                    var precioxunidadW = .44+(2*0.06); //.06
                    var precioxunidadH = .44+(2*0.06); //.06 54 48 12
                    var precioxunidad = precioxunidadW + precioxunidadH;
                    //var precioxunidad = 1.08;
                    var price=precioxunidad*50;
                    
                }
                if(var2.checked)
                {
                    var elemento = document.getElementById("variant-quantities");
                    elemento.className = " options radio";
                    size1=3;
                    size2=3;
                    var precioxunidadW = .44+(3*0.06); //.06
                    var precioxunidadH = .44+(3*0.06); //.06 54 48 12
                    var precioxunidad = precioxunidadW + precioxunidadH;
                    //var precioxunidad = 1.2;
                    var price=precioxunidad*50;
                }
                if(var3.checked)
                {
                    var elemento = document.getElementById("variant-quantities");
                    elemento.className = " options radio";
                    size1=4;
                    size2=4;
                    var precioxunidadW = .44+(4*0.06); //.06
                    var precioxunidadH = .44+(4*0.06); //.06 54 48 12
                    var precioxunidad = precioxunidadW + precioxunidadH;
                    //var precioxunidad = 1.3199999999999998;
                    var price=precioxunidad*50;
                }
                if(var4.checked)
                {
                    var elemento = document.getElementById("variant-quantities");
                    elemento.className = " options radio";
                    size1=5;
                    size2=5;
                    var precioxunidadW = .44+(5*0.06); //.06
                    var precioxunidadH = .44+(5*0.06); //.06 54 48 12
                    var precioxunidad = precioxunidadW + precioxunidadH;
                    //var precioxunidad = 1.44;
                    var price=precioxunidad*50;            
                }
                            if(size1==1)
                            {
                                var precioxunidadW = size1*0.47; //.06
                            }
                            if(size2==1)
                            {
                                var precioxunidadH = size2*0.47; //.06 54 48 12
                            }
                            if(size1>1)
                            {
                                var precioxunidadW = size1*0.255; //.06
                            }
                            if(size2>1)
                            {
                                var precioxunidadH = size2*0.255; //.06 54 48 12
                            }
                            if(size1>2)
                            {
                                var precioxunidadW = size1*0.23; //.06
                            }
                            if(size2>2)
                            {
                                var precioxunidadH = size2*0.23; //.06 54 48 12
                            }
                            if(size1>25)
                            {
                                var precioxunidadW = size1*0.2055; //.06
                            }
                            if(size2>15)
                            {
                                var precioxunidadH = size2*0.2055; //.06 54 48 12
                            }
                            if(size1>30)
                            {
                                var precioxunidadW = size1*0.3055; //.06
                            }
                            if(size2>20)
                            {
                                var precioxunidadH = size2*0.3055; //.06 54 48 12
                            }
                            var precioxunidad = precioxunidadW + precioxunidadH;
                            //alert(precioxunidadH);
                            var price=precioxunidad*50;
                            cant60=11-((.59*size1)+(.59*size2));
                            cant100=44-((1.5*size1)+(1.5*size2));
                            cant200=66-((1.8*size1)+(1.8*size2)); 
                            cant300=76-((1.8*size1)+(1.8*size2)); 
                            cant500=83-((2.4*size1)+(2.4*size2)); 
                            cant1000=92-((2.4*size1)+(2.4*size2)); 
                            cant2000=93-((2.4*size1)+(2.4*size2)); 
                            cant3000=95-((2.4*size1)+(2.4*size2)); 
                            cant5000=97-((2.1*size1)+(2.1*size2)); 
                            cant10000=98-((2.1*size1)+(2.1*size2));
                            scant100=cant100;
                            scant200=cant200;
                            scant300=cant300;
                            scant500=cant500;
                            scant1000=cant1000; 
                            scant2000=cant2000;
                            scant3000=cant3000;
                            scant5000=cant5000;
                            scant10000=cant10000;
                            
                            if(scant1000 < 24)
                            {
                                scant1000 = 24;
                            } 
                            if(scant2000 < 24 )
                            {
                                scant2000 = 24;
                            } 
                            if(scant3000 < 24 )
                            {
                                scant3000 = 24;
                            } 
                            if( scant5000 < 24 )
                            {
                                scant5000 = 24;
                            } 
                            if( scant10000 < 24)
                            {
                                scant10000 = 24;
                            }
                            if(scant200 < 23 )
                            {
                                scant200 = 23;
                            } 
                            if( scant300 < 23 )
                            {
                                scant300 = 23;
                            } 
                            if( scant500 < 23)
                            {
                                scant500 = 23;
                            }
                            if(cant100 < 13)
                            {
                                scant100 = 13;
                            }
                            if(cant60 < 4)
                            {
                                scant60 = 4;
                            }

                    document.getElementById('saving_1').innerText="Save " + scant100.toFixed()+"%";
                    document.getElementById('saving_2').innerText="Save " + scant200.toFixed()+"%";
                    document.getElementById('saving_3').innerText="Save " + scant300.toFixed()+"%";
                    document.getElementById('saving_4').innerText="Save " + scant500.toFixed()+"%";
                    document.getElementById('saving_5').innerText="Save " + scant1000.toFixed()+"%";
                    document.getElementById('saving_6').innerText="Save " + scant2000.toFixed()+"%";
                    document.getElementById('saving_7').innerText="Save " + scant3000.toFixed()+"%";
                    document.getElementById('saving_8').innerText="Save " + scant5000.toFixed()+"%";
                    document.getElementById('saving_9').innerText="Save " + scant10000.toFixed()+"%";

                    document.getElementById('price_50_id').innerText="$"+ price.toFixed();
                    document.getElementById("price_50").value = price.toFixed();
                    document.getElementById("quantity_50").setAttribute("onclick", "Custom("+price.toFixed()+");");
                    var price=(precioxunidad*100)-((precioxunidad*100)/100*scant100);
                    document.getElementById('price_100_id').innerText="$"+ price.toFixed();
                    document.getElementById("price_100").value = price.toFixed();
                    document.getElementById("quantity_100").setAttribute("onclick", "Custom("+price.toFixed()+");");
                    var price=(precioxunidad*200)-((precioxunidad*200)/100*scant200);
                    document.getElementById('price_200_id').innerText="$"+ price.toFixed();
                    document.getElementById("price_200").value = price.toFixed();
                    document.getElementById("quantity_200").setAttribute("onclick", "Custom("+price.toFixed()+");");
                    var price=(precioxunidad*300)-((precioxunidad*300)/100*scant300);
                    document.getElementById('price_300_id').innerText="$"+ price.toFixed();
                    document.getElementById("price_300").value = price.toFixed();
                    document.getElementById("quantity_300").setAttribute("onclick", "Custom("+price.toFixed()+");");
                    var price=(precioxunidad*500)-((precioxunidad*500)/100*scant500);
                    document.getElementById('price_500_id').innerText="$"+ price.toFixed();
                    document.getElementById("price_500").value = price.toFixed();
                    document.getElementById("quantity_500").setAttribute("onclick", "Custom("+price.toFixed()+");");
                    var price=(precioxunidad*1000)-((precioxunidad*1000)/100*scant1000);
                    document.getElementById('price_1000_id').innerText="$"+ price.toFixed();
                    document.getElementById("price_1000").value = price.toFixed();
                    document.getElementById("quantity_1000").setAttribute("onclick", "Custom("+price.toFixed()+");");
                    var price=(precioxunidad*2000)-((precioxunidad*2000)/100*scant2000);
                    document.getElementById('price_2000_id').innerText="$"+ price.toFixed();
                    document.getElementById("price_2000").value = price.toFixed();
                    document.getElementById("quantity_2000").setAttribute("onclick", "Custom("+price.toFixed()+");");
                    var price=(precioxunidad*3000)-((precioxunidad*3000)/100*scant3000);
                    document.getElementById('price_3000_id').innerText="$"+ price.toFixed();
                    document.getElementById("price_3000").value = price.toFixed();
                    document.getElementById("quantity_3000").setAttribute("onclick", "Custom("+price.toFixed()+");");
                    var price=(precioxunidad*5000)-((precioxunidad*5000)/100*scant5000);
                    document.getElementById('price_5000_id').innerText="$"+ price.toFixed();
                    document.getElementById("price_5000").value = price.toFixed();
                    document.getElementById("quantity_5000").setAttribute("onclick", "Custom("+price.toFixed()+");");
                    var price=(precioxunidad*10000)-((precioxunidad*10000)/100*scant10000);
                    document.getElementById('price_10000_id').innerText="$"+ price.toFixed();
                    document.getElementById("price_10000").value = price.toFixed();
                    document.getElementById("quantity_10000").setAttribute("onclick", "Custom("+price.toFixed()+");");
            }
        }
        function CheckcustomH()
        {
            var num = document.getElementById('height');
            var num2 = document.getElementById('width');
            if(num.value>24)
            {
                var msgalertt = document.getElementById("customheight");
                msgalertt.insertAdjacentHTML("afterbegin", "<div class='tooltiperror' id='tooltiperrorH'><span class='arrow'></span><span class='text'>Max size is 24 inches</span></div>");
            }if(num2.value>24)
            {
                var msgalertt = document.getElementById("customwidth");
                msgalertt.insertAdjacentHTML("afterbegin", "<div class='tooltiperror' id='tooltiperrorW'><span class='arrow'></span><span class='text'>Max size is 24 inches</span></div>");
            }
            if(num2.value<=24 && num.value<=24)
            {
                var element =  document.getElementById('tooltiperrorH');
                if (typeof(element) != 'undefined' && element != null)
                {
                    element.remove();
                }
                
                var element2 =  document.getElementById('tooltiperrorW');
                if (typeof(element2) != 'undefined' && element2 != null)
                {
                    element2.remove();
                }
                if(num.value<1)
                {
                    var msgalertt = document.getElementById("customheight");
                    msgalertt.insertAdjacentHTML("afterbegin", "<div class='tooltiperror' id='tooltiperrorH'><span class='arrow'></span><span class='text'>Min size is 1 inches</span></div>");
                    var elemento = document.getElementById("variant-quantities");
                    var elemento2 = document.getElementById("continue");
                    elemento.className += " disabled";
                    elemento2.className += " disabled";
                }else if(num2.value<1)
                {
                    var msgalertt = document.getElementById("customwidth");
                    msgalertt.insertAdjacentHTML("afterbegin", "<div class='tooltiperror' id='tooltiperrorW'><span class='arrow'></span><span class='text'>Min size is 1 inches</span></div>");
                    var elemento = document.getElementById("variant-quantities");
                    var elemento2 = document.getElementById("continue");
                    elemento.className += " disabled";//continue
                    elemento2.className += " disabled";
                }else if(num.value!=0 && num2.value!=0)
                {
                    var elemento = document.getElementById("variant-quantities");
                    elemento.className = " options radio";
                    var elemento2 = document.getElementById("continue");
                    elemento2.className = " continue";
                    pricescustomWandH1(num2.value,num.value);
                }
                else
                {
                    var elemento = document.getElementById("variant-quantities");
                    elemento.className += " disabled";
                }
            }
        }
        function pricescustomWandH1(widthC,heightC)
        {
           //alert("custom");
            if(widthC==1)
            {
                var precioxunidadW = widthC*0.47; //.06
            }
            if(heightC==1)
            {
                var precioxunidadH = heightC*0.47; //.06 54 48 12
            }
            if(widthC>1)
            {
                var precioxunidadW = widthC*0.255; //.06
            }
            if(heightC>1)
            {
                var precioxunidadH = heightC*0.255; //.06 54 48 12
            }
            if(widthC>2)
            {
                var precioxunidadW = widthC*0.23; //.06
            }
            if(heightC>2)
            {
                var precioxunidadH = heightC*0.23; //.06 54 48 12
            }
            if(widthC>25)
            {
                var precioxunidadW = widthC*0.2055; //.06
            }
            if(heightC>15)
            {
                var precioxunidadH = heightC*0.2055; //.06 54 48 12
            }
            if(widthC>30)
            {
                var precioxunidadW = widthC*0.3055; //.06
            }
            if(heightC>20)
            {
                var precioxunidadH = heightC*0.3055; //.06 54 48 12
            }
            var precioxunidad = precioxunidadW + precioxunidadH;
            //alert(precioxunidadH);
            var price=precioxunidad*50;
            cant60=11-((.59*widthC)+(.59*heightC));
            cant100=44-((1.5*widthC)+(1.5*heightC));
            cant200=66-((1.8*widthC)+(1.8*heightC)); 
            cant300=76-((1.8*widthC)+(1.8*heightC)); 
            cant500=83-((2.4*widthC)+(2.4*heightC)); 
            cant1000=92-((2.4*widthC)+(2.4*heightC)); 
            cant2000=93-((2.4*widthC)+(2.4*heightC)); 
            cant3000=95-((2.4*widthC)+(2.4*heightC)); 
            cant5000=97-((2.1*widthC)+(2.1*heightC)); 
            cant10000=98-((2.1*widthC)+(2.1*heightC));
            scant100=cant100;
            scant200=cant200;
            scant300=cant300;
            scant500=cant500;
            scant1000=cant1000; 
            scant2000=cant2000;
            scant3000=cant3000;
            scant5000=cant5000;
            scant10000=cant10000;
            
            if(scant1000 < 24)
            {
                scant1000 = 24;
            } 
            if(scant2000 < 24 )
            {
                scant2000 = 24;
            } 
            if(scant3000 < 24 )
            {
                scant3000 = 24;
            } 
            if( scant5000 < 24 )
            {
                scant5000 = 24;
            } 
            if( scant10000 < 24)
            {
                scant10000 = 24;
            }
            if(scant200 < 23 )
            {
                scant200 = 23;
            } 
            if( scant300 < 23 )
            {
                scant300 = 23;
            } 
            if( scant500 < 23)
            {
                scant500 = 23;
            }
            if(cant100 < 13)
            {
                scant100 = 13;
            }
            if(cant60 < 4)
            {
                scant60 = 4;
            }
            document.getElementById('saving_1').innerText="Save " + scant100.toFixed()+"%";
            document.getElementById('saving_2').innerText="Save " + scant200.toFixed()+"%";
            document.getElementById('saving_3').innerText="Save " + scant300.toFixed()+"%";
            document.getElementById('saving_4').innerText="Save " + scant500.toFixed()+"%";
            document.getElementById('saving_5').innerText="Save " + scant1000.toFixed()+"%";
            document.getElementById('saving_6').innerText="Save " + scant2000.toFixed()+"%";
            document.getElementById('saving_7').innerText="Save " + scant3000.toFixed()+"%";
            document.getElementById('saving_8').innerText="Save " + scant5000.toFixed()+"%";
            document.getElementById('saving_9').innerText="Save " + scant10000.toFixed()+"%";

            document.getElementById('price_50_id').innerText="$"+ price.toFixed();
            document.getElementById("price_50").value = price.toFixed();
            document.getElementById("quantity_50").setAttribute("onclick", "Custom("+price.toFixed()+");");
            var price=(precioxunidad*100)-((precioxunidad*100)/100*scant100);
            document.getElementById('price_100_id').innerText="$"+ price.toFixed();
            document.getElementById("price_100").value = price.toFixed();
            document.getElementById("quantity_100").setAttribute("onclick", "Custom("+price.toFixed()+");");
            var price=(precioxunidad*200)-((precioxunidad*200)/100*scant200);
            document.getElementById('price_200_id').innerText="$"+ price.toFixed();
            document.getElementById("price_200").value = price.toFixed();
            document.getElementById("quantity_200").setAttribute("onclick", "Custom("+price.toFixed()+");");
            var price=(precioxunidad*300)-((precioxunidad*300)/100*scant300);
            document.getElementById('price_300_id').innerText="$"+ price.toFixed();
            document.getElementById("price_300").value = price.toFixed();
            document.getElementById("quantity_300").setAttribute("onclick", "Custom("+price.toFixed()+");");
            var price=(precioxunidad*500)-((precioxunidad*500)/100*scant500);
            document.getElementById('price_500_id').innerText="$"+ price.toFixed();
            document.getElementById("price_500").value = price.toFixed();
            document.getElementById("quantity_500").setAttribute("onclick", "Custom("+price.toFixed()+");");
            var price=(precioxunidad*1000)-((precioxunidad*1000)/100*scant1000);
            document.getElementById('price_1000_id').innerText="$"+ price.toFixed();
            document.getElementById("price_1000").value = price.toFixed();
            document.getElementById("quantity_1000").setAttribute("onclick", "Custom("+price.toFixed()+");");
            var price=(precioxunidad*2000)-((precioxunidad*2000)/100*scant2000);
            document.getElementById('price_2000_id').innerText="$"+ price.toFixed();
            document.getElementById("price_2000").value = price.toFixed();
            document.getElementById("quantity_2000").setAttribute("onclick", "Custom("+price.toFixed()+");");
            var price=(precioxunidad*3000)-((precioxunidad*3000)/100*scant3000);
            document.getElementById('price_3000_id').innerText="$"+ price.toFixed();
            document.getElementById("price_3000").value = price.toFixed();
            document.getElementById("quantity_3000").setAttribute("onclick", "Custom("+price.toFixed()+");");
            var price=(precioxunidad*5000)-((precioxunidad*5000)/100*scant5000);
            document.getElementById('price_5000_id').innerText="$"+ price.toFixed();
            document.getElementById("price_5000").value = price.toFixed();
            document.getElementById("quantity_5000").setAttribute("onclick", "Custom("+price.toFixed()+");");
            var price=(precioxunidad*10000)-((precioxunidad*10000)/100*scant10000);
            document.getElementById('price_10000_id').innerText="$"+ price.toFixed();
            document.getElementById("price_10000").value = price.toFixed();
            document.getElementById("quantity_10000").setAttribute("onclick", "Custom("+price.toFixed()+");");
            return;
        }
        function CloseHelpSize()
        {
            var modal = document.getElementById("size-help");
            modal.style.display = "none";
        }
        function HelpSize()
        {
            var modal = document.getElementById("size-help");
            modal.style.display = "flex";
        }
    </script>
    <style>
         #variant-options li:hover, #variant-quantities  li:hover{
            background-color: lightgray !important;
        }
    </style>
</head>
<body>
<?php include "nav.php";
include "size/size2.php"; ?>
    <main>
        <section class="paper">
            <div class="wrapper_cut bg-image-container">
                <div class="text-dark">
                    <figure class="bg-image">
                        <img src="/assets/Fondo circle.jpg">
                    </figure>
                    <div class="front">
                        <div class="title_cut" style="width: 570px;">
                            <h1>Circle Stickers</h1>
                            <span style="display:none;" class="ratings-wrapper">
                                <span class="rating-stars">
                                    <i class="fa fa-star stars_14"></i>
                                    <i class="fa fa-star stars_14"></i>
                                    <i class="fa fa-star stars_14"></i>
                                    <i class="fa fa-star stars_14"></i>
                                    <i class="fa fa-star stars_14"></i>
                                </span>
                                <span class="reviews-count" style="width: 180px;">
                                    <a href="#reviews" style="color:#2b71b8;">81,765 reviews</a>
                                </span>
                            </span>
                        </div>
                        <p>Custom Circle Stickers are a fast and easy way to promote your business, brand or event.  Thick, durable vinyl protects your stickers from scratches, water &amp; sunlight.</p>
                        <form action="samples.php">
                            <button class="tiny light" data-reveal-id="order-samples-modal" type="submit">Order samples</button>
                        </form>
                    </div>
                    <div class="product">
                        <form action="upload.php?price=57" class="product-options" method="get" id="form_id">
                            <div style="margin: 0px; padding: 0px; display: inline;">
                                <input name="utf8" type="hidden" value="✓">
                            </div>
                            <input id="measurement_system" name="measurement_system" type="hidden" value="imperial">
                            <input id="width_inches" name="width_inches" type="hidden" value="2">
                            <input id="height_inches" name="height_inches" type="hidden" value="2">
                            <input id="units_per_roll" name="units_per_roll" type="hidden" value="0">
                            <div class="product-option-group" id="variants">
                                <legend>Select a size
                                    <a href="#" onclick="HelpSize()">
                                        <i  class="fas fa-info-circle"></i>
                                        </a>
                                </legend>
                                <ul class="options" id="variant-options">
                                    <li>
                                        <input id="variant_78" name="variant_id" readonly="" type="radio" value="78" checked="" onclick="CustomsizeWandH()">
                                        <label for="variant_78"> 2" x 2"</label>
                                    </li>
                                    <li>
                                        <input id="variant_79" name="variant_id" readonly="" type="radio" value="79" onclick="CustomsizeWandH()">
                                        <label for="variant_79"> 3" x 3"</label>
                                    </li>
                                    <li>
                                        <input id="variant_80" name="variant_id" readonly="" type="radio" value="80" onclick="CustomsizeWandH()">
                                        <label for="variant_80"> 4" x 4"</label>
                                    </li>
                                    <li>
                                        <input id="variant_81" name="variant_id" readonly="" type="radio" value="81" onclick="CustomsizeWandH()">
                                        <label for="variant_81"> 5" x 5"</label>
                                    </li>
                                    <li>
                                        <input id="variant_77" name="variant_id" readonly="" type="radio" value="77" onclick="CustomsizeWandH()"> 
                                        <label id="variant_77_L"> Custom size</label>
                                    </li>
                                </ul>
                            </div>
                            <script>
                                document.addEventListener("DOMContentLoaded", function(event) { 
                                    
                                        document.getElementById('saving_1').innerText="Save " + scant100.toFixed()+"%";
                                        document.getElementById('saving_2').innerText="Save " + scant200.toFixed()+"%";
                                        document.getElementById('saving_3').innerText="Save " + scant300.toFixed()+"%";
                                        document.getElementById('saving_4').innerText="Save " + scant500.toFixed()+"%";
                                        document.getElementById('saving_5').innerText="Save " + scant1000.toFixed()+"%";
                                        document.getElementById('saving_6').innerText="Save " + scant2000.toFixed()+"%";
                                        document.getElementById('saving_7').innerText="Save " + scant3000.toFixed()+"%";
                                        document.getElementById('saving_8').innerText="Save " + scant5000.toFixed()+"%";
                                        document.getElementById('saving_9').innerText="Save " + scant10000.toFixed()+"%";
                                        document.getElementById('variant_78').dispatchEvent(new MouseEvent("click",{bubbles: true, cancellable: true}));
                                        document.getElementById('quantity_50').dispatchEvent(new MouseEvent("click",{bubbles: true, cancellable: true}));
                                    });
                            </script>
                            <div class="product-option-group" id="quantities">
                                <legend>Select a quantity</legend>
                                <ul class=" options radio" id="variant-quantities">
                                    <li class="checked quantity-item">
                                        <span class="table-cell">
                                            <input id="quantity_50" name="quantity" readonly="" type="radio" value="50" onclick="Custom(54)">
                                            <input type="radio" style="display:none;" value="54" name="price" id="price_50" checked="">
                                            <label class="quantity" for="quantity_50"> 50</label>
                                        </span>
                                        <span class="table-cell price" id="price_50_id" name="price" value="54">$54</span>
                                        <span class="table-cell savings"></span>
                                    </li>
                                    
                                    <li class=" quantity-item">
                                        <span class="table-cell">
                                            <input id="quantity_100" name="quantity" readonly="" type="radio" value="100" onclick="Custom(76)">
                                            <input type="radio" style="display:none;" value="76" name="price" id="price_100" checked="">
                                            <label class=" quantity" for="quantity_100"> 100</label>
                                        </span>
                                        <span class="table-cell price" id="price_100_id" name="price" value="76">$76</span>
                                        <span class="table-cell savings" id="saving_1">Save 30%</span>
                                    </li>
                                    <li class=" quantity-item">
                                        <span class="table-cell">
                                            <input id="quantity_200" name="quantity" readonly="" type="radio" value="200" onclick="Custom(130)">
                                            <input type="radio" style="display:none;" value="130" name="price" id="price_200" checked="">
                                            <label class=" quantity" for="quantity_200"> 200</label>
                                        </span><span class="table-cell price" id="price_200_id" name="price" value="130">$130</span>
                                        <span class="table-cell savings" id="saving_2">Save 40%</span>
                                    </li>
                                    <li class=" quantity-item">
                                        <span class="table-cell">
                                            <input id="quantity_300" name="quantity" readonly="" type="radio" value="300" onclick="Custom(211)">
                                            <input type="radio" style="display:none;" value="178" name="price" id="price_300" checked="">
                                            <label class=" quantity" for="quantity_300"> 300</label>
                                        </span>
                                        <span class="table-cell price" id="price_300_id" name="price" value="211">$211</span>
                                        <span class="table-cell savings" id="saving_3">Save 45%</span>
                                    </li>
                                    <li class=" quantity-item">
                                        <span class="table-cell">
                                            <input id="quantity_500" name="quantity" readonly="" type="radio" value="500" onclick="Custom(270)">
                                            <input type="radio" style="display:none;" value="270" name="price" id="price_500" checked="">
                                            <label class=" quantity" for="quantity_500"> 500</label>
                                        </span>
                                        <span class="table-cell price" id="price_500_id" name="price" value="270">$270</span>
                                        <span class="table-cell savings" id="saving_4">Save 50%</span>
                                    </li>
                                    <li class=" quantity-item">
                                        <span class="table-cell">
                                            <input id="quantity_1000" name="quantity" readonly="" type="radio" value="1000" onclick="Custom(486)">
                                            <input type="radio" style="display:none;" value="486" name="price" id="price_1000" checked="">
                                            <label class=" quantity" for="quantity_1000"> 1,000</label>
                                        </span>
                                        <span class="table-cell price" id="price_1000_id" name="price" value="486">$486</span>
                                        <span class="table-cell savings" id="saving_5">Save 55%</span>
                                    </li>
                                    <li class=" quantity-item">
                                        <span class="table-cell">
                                            <input id="quantity_2000" name="quantity" readonly="" type="radio" value="2000" onclick="Custom(864)">
                                            <input type="radio" style="display:none;" value="864" name="price" id="price_2000" checked="">
                                            <label class=" quantity" for="quantity_2000"> 2,000</label>
                                        </span>
                                        <span class="table-cell price" id="price_2000_id" name="price" value="864">$864</span>
                                        <span class="table-cell savings" id="saving_6">Save 60%</span>
                                    </li>
                                    <li class=" quantity-item">
                                        <span class="table-cell">
                                            <input id="quantity_3000" name="quantity" readonly="" type="radio" value="3000" onclick="Custom(1231)">
                                            <input type="radio" style="display:none;" value="1231" name="price" id="price_3000" checked="">
                                            <label class=" quantity" for="quantity_3000"> 3,000</label>
                                        </span>
                                        <span class="table-cell price" id="price_3000_id" name="price" value="1231">$1231</span>
                                        <span class="table-cell savings" id="saving_7">Save 62%</span>
                                    </li>
                                    <li class=" quantity-item">
                                        <span class="table-cell">
                                            <input id="quantity_5000" name="quantity" readonly="" type="radio" value="5000" onclick="Custom(1728)">
                                            <input type="radio" style="display:none;" value="1728" name="price" id="price_5000" checked="">
                                            <label class=" quantity" for="quantity_5000"> 5,000</label>
                                        </span>
                                        <span class="table-cell price" id="price_5000_id" name="price" value="1728">$1728</span>
                                        <span class="table-cell savings" id="saving_8">Save 68%</span>
                                    </li>
                                    <li class=" quantity-item">
                                        <span class="table-cell">
                                            <input id="quantity_10000" name="quantity" readonly="" type="radio" value="10000" onclick="Custom(3240)">
                                            <input type="radio" style="display:none;" value="3240" name="price" id="price_10000" checked="">
                                            <label class=" quantity" for="quantity_10000"> 10,000</label>
                                        </span>
                                        <span class="table-cell price" id="price_10000_id" name="price" value="3240">$3240</span>
                                        <span class="table-cell savings" id="saving_9">Save 70%</span>
                                    </li>
                                    <li class="quantity-item" >
                                        <span class="table-cell">
                                            <input id="quantity_custom" name="quantity" readonly="" type="radio" value="" onclick="Custom(0)">
                                            <input type="radio" style="display:none;" value="" name="price" id="price_custom" checked="">
                                            <label class=" quantity" id="custom">
                                                <span class="custom-quantity-wrapper" id="spancustom">Custom quantity</span>
                                            </label>
                                        </span>
                                        <span class="table-cell" id="spancustomprice" name="spancustomprice"></span>
                                        <span class="table-cell savings" id="spancustomsavings"></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="continue" id="continue">
                                <button class="button large secondary block"  name="filename" value="Circle stickers">Continue</button>
                                <p>Next: upload artwork →</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="products" style="background-color: #ffffff;">
            <div class="container">
                <div class="wrapper">
                    <div class="grid3 grid_product">
                        <div class="wrapperproducts_sin text-dark" style="padding: 10px 0 10px 0;">
                            <div class="image_car">
                                <img src="/assets/4.png" srcset="" height="80">
                            </div>
                                <h3 style="text-align: center;">Shipping in 4 days</h3>
                                <p style="text-align: center;">Get your circle stickers fast with 4 day turnaround.</p>
                        </div>
                        <div class="wrapperproducts_sin text-dark" style="padding: 10px 0 10px 0;">
                            <div class="image_car">
                                <img src="/assets/online.png" srcset="" height="80">
                            </div>
                                <h3 style="text-align: center;">Get an online proof</h3>
                                <p style="text-align: center;">Review your proof shortly after checkout and request changes until you're happy.</p>
                        </div>
                        <div class="wrapperproducts_sin text-dark" style="padding: 10px 0 10px 0;">
                            <div class="image_car">
                                <img src="/assets/clima.png" srcset="" height="80">
                            </div>
                                <h3 style="text-align: center;">Durable & weatherproof</h3>
                                <p style="text-align: center;">Thick, durable vinyl protects your circle stickers from scratching, rain & sunlight.</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <section class="container_video" style="display: none;">
            <div class="container">
                <div class="videosize">
                    <div class="embed-responsive embed-responsive-16by9">
                        <img class="embed-responsive-item" src="/assets/poster.jpg" alt="">
                        <iframe class="embed-responsive-item" poster="/assets/poster.jpg" src="" allowfullscreen></iframe>
                      </div>
                </div>
           <div class="contentVideo">
               <h2 class="videoTitle">Free shipping, free online proofs, fast turnaround.</h2>
               <p class="VideoText">Acme Stickers is the fastest and easiest way to buy custom 
                    printed products. Order in 60 seconds and we'll turn your designs and illustrations into custom stickers, 
                    magnets, buttons, labels and packaging in days. We offer free online proofs, free worldwide shipping and super fast turnaround.
                </p>
            </div>
            </div>
        </section>
    </main>
<?php include "footer.php"; ?>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

