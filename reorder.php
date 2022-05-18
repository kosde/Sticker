<?php
session_start();
if(isset($_SESSION['id']))
{
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
    <script>
        function openEdit(id)
        {
            document.getElementById('editname'+id).style.visibility = "visible";
            document.getElementById('editname'+id).style.display = "block"; 
        }
        function CloseEdit(id)
        {
            document.getElementById('editname'+id).style.visibility = "hidden";
            document.getElementById('editname'+id).style.display = "none"; 
        }
        function custom_die_cut_stickers(id,w,h)
        {
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
            var num = document.getElementById('quantity'+id); //quantity_input_   document.getElementById('boton').disabled=false;
            document.getElementById('quantity_input_'+id).value=num.value;
            if(num.value<10) //diverrormore
            {
                document.getElementById('diverrorless'+id).style.visibility = "visible";
                document.getElementById('diverrorless'+id).style.display = "block";
                document.getElementById('diverrormore'+id).style.visibility = "hidden";
                document.getElementById('diverrormore'+id).style.display = "none";
                document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                document.getElementById('diverrordiv'+id).style.display = "none";
            }
            if(num.value>10)
            {
                if(num.value%10==0)
                {
                    document.getElementById('diverrorless'+id).style.visibility = "hidden";
                    document.getElementById('diverrorless'+id).style.display = "none";
                    document.getElementById('diverrormore'+id).style.visibility = "hidden";
                    document.getElementById('diverrormore'+id).style.display = "none";
                    document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                    document.getElementById('diverrordiv'+id).style.display = "none";//contador
                    document.getElementById('add_to_cart'+id).disabled=false;
                    document.getElementById('add_to_cart'+id).className = "button secondary";
                    var cantidad = num.value;
                    if(cantidad>0)
                    {
                        var size1=w,size2=h;
                        //var precioxunidadW = .44+(size1*0.06); //.06
                        //var precioxunidadH = .44+(size2*0.06); //.06
                        //var precioxunidad = precioxunidadW + precioxunidadH;
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
                            var precioxunidadW = size1*0.285; //.06
                        }
                        if(size2>1)
                        {
                            var precioxunidadH = size2*0.285; //.06 54 48 12
                        }
                        if(size1>2)
                        {
                            var precioxunidadW = size1*0.205; //.06
                        }
                        if(size2>2)
                        {
                            var precioxunidadH = size2*0.205; //.06 54 48 12
                        }
                        if(size1>25)
                        {
                            var precioxunidadW = size1*0.2455; //.06
                        }
                        if(size2>15)
                        {
                            var precioxunidadH = size2*0.2455; //.06 54 48 12
                        }
                        if(size1>30)
                        {
                            var precioxunidadW = size1*0.3055; //.06
                        }
                        if(size2>20)
                        {
                            var precioxunidadH = size2*0.3055; //.06 54 48 12
                        }
                        if(cantidad < 60)
                        {
                            var price=precioxunidad*cantidad;
                            document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                            document.getElementById('input_custom_price'+id).value=price.toFixed();
                            return;
                        }
                        if(cantidad > 50)
                        {
                            //document.getElementById('quantity_custom').value = cantidad;
                            
                            var descuento=0,iter=0,desctotal=0,inicio=0;
                            var price;
                            cant60=12-((.59*size1)+(.59*size2));
                            cant100=45-((1.5*size1)+(1.5*size2));
                            cant200=67-((1.8*size1)+(1.8*size2)); 
                            cant300=77-((1.8*size1)+(1.8*size2)); 
                            cant500=84-((2.4*size1)+(2.4*size2)); 
                            cant1000=93-((2.4*size1)+(2.4*size2)); 
                            cant2000=94-((2.4*size1)+(2.4*size2)); 
                            cant3000=96-((2.4*size1)+(2.4*size2)); 
                            cant5000=98-((2.1*size1)+(2.1*size2)); 
                            cant10000=99-((2.1*size1)+(2.1*size2));
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
                            //alert(cantidad+" "+descuento+" "+iter);
                            var price=(precioxunidad*cantidad)-(((precioxunidad*cantidad)/100)*descuento);
                            //var price=precioxunidad*cantidad-precioxunidad*cantidad*descuento;
                            //document.getElementById('spancustomprice').innerText="$"+ price.toFixed();
                            document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                            document.getElementById('input_custom_price'+id).value=price.toFixed();
                            //descuento = descuento * 100;
                            //document.getElementById('spancustomsavings').innerText="Save " + descuento.toFixed()+"%";
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
                    document.getElementById('diverrorless'+id).style.visibility = "hidden";
                    document.getElementById('diverrorless'+id).style.display = "none";
                    document.getElementById('diverrormore'+id).style.visibility = "hidden";
                    document.getElementById('diverrormore'+id).style.display = "none";
                    document.getElementById('diverrordiv'+id).style.visibility = "visible";
                    document.getElementById('diverrordiv'+id).style.display = "block";
                }
            }
            if(num.value==0 || num.value=="")
            {
                document.getElementById('diverrorless'+id).style.visibility = "hidden";
                document.getElementById('diverrorless'+id).style.display = "none";
                document.getElementById('diverrormore'+id).style.visibility = "hidden";
                document.getElementById('diverrormore'+id).style.display = "none";
                document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                document.getElementById('diverrordiv'+id).style.display = "none";
                document.getElementById('custom_price'+id).innerText="$0";
                document.getElementById('input_custom_price'+id).value=0;
                document.getElementById('add_to_cart'+id).disabled=true;
                document.getElementById('add_to_cart'+id).className = "button primary";
            }
        }
        function custom_circle_stickers(id,w,h)
        {
            var cant60=.13,
                cant100=.44, 
                cant200=.68, 
                cant300=.75, 
                cant500=.83, 
                cant1000=.88, 
                cant2000=.91, 
                cant3000=.93, 
                cant5000=.94, 
                cant10000=.95;
            var scant100=cant100*100,
                scant200=cant200*100,
                scant300=cant300*100,
                scant500=cant500*100,
                scant1000=cant1000*100, 
                scant2000=cant2000*100,
                scant3000=cant3000*100,
                scant5000=cant5000*100,
                scant10000=cant10000*100;
            var num = document.getElementById('quantity'+id); 
            document.getElementById('quantity_input_'+id).value=num.value;
            if(num.value<10) //diverrormore
            {
                document.getElementById('diverrorless'+id).style.visibility = "visible";
                document.getElementById('diverrorless'+id).style.display = "block";
                document.getElementById('diverrormore'+id).style.visibility = "hidden";
                document.getElementById('diverrormore'+id).style.display = "none";
                document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                document.getElementById('diverrordiv'+id).style.display = "none";
            }
            if(num.value>10)
            {
                if(num.value%10==0)
                {
                    document.getElementById('diverrorless'+id).style.visibility = "hidden";
                    document.getElementById('diverrorless'+id).style.display = "none";
                    document.getElementById('diverrormore'+id).style.visibility = "hidden";
                    document.getElementById('diverrormore'+id).style.display = "none";
                    document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                    document.getElementById('diverrordiv'+id).style.display = "none";//contador
                    document.getElementById('add_to_cart'+id).disabled=false;
                    document.getElementById('add_to_cart'+id).className = "button secondary";
                    var cantidad = num.value;
                    if(cantidad>0)
                    {
                        var size1=w,size2=h;
                        //var precioxunidadW = .33999+(size1*0.06); //.06
                        //var precioxunidadH = .33999+(size2*0.06); //.06
                        //var precioxunidad = precioxunidadW + precioxunidadH;
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
                                var precioxunidadW = size1*0.185; //.06
                            }
                            if(size2>2)
                            {
                                var precioxunidadH = size2*0.185; //.06 54 48 12
                            }
                            if(size1>25)
                            {
                                var precioxunidadW = size1*0.2455; //.06
                            }
                            if(size2>15)
                            {
                                var precioxunidadH = size2*0.2455; //.06 54 48 12
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
                            document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                            document.getElementById('input_custom_price'+id).value=price.toFixed();
                            return;
                        }
                        if(cantidad > 50)
                        {
                            //document.getElementById('quantity_custom').value = cantidad;
                            
                            var descuento=0,iter=0,desctotal=0,inicio=0;
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
                            //alert(cantidad+" "+descuento+" "+iter);
                            var price=(precioxunidad*cantidad)-(((precioxunidad*cantidad)/100)*descuento);
                            //var price=precioxunidad*cantidad-precioxunidad*cantidad*descuento;
                            //document.getElementById('spancustomprice').innerText="$"+ price.toFixed();
                            document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                            document.getElementById('input_custom_price'+id).value=price.toFixed();
                            //descuento = descuento * 100;
                            //document.getElementById('spancustomsavings').innerText="Save " + descuento.toFixed()+"%";
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
                    document.getElementById('diverrorless'+id).style.visibility = "hidden";
                    document.getElementById('diverrorless'+id).style.display = "none";
                    document.getElementById('diverrormore'+id).style.visibility = "hidden";
                    document.getElementById('diverrormore'+id).style.display = "none";
                    document.getElementById('diverrordiv'+id).style.visibility = "visible";
                    document.getElementById('diverrordiv'+id).style.display = "block";
                }
            }
            if(num.value==0 || num.value=="")
            {
                document.getElementById('diverrorless'+id).style.visibility = "hidden";
                document.getElementById('diverrorless'+id).style.display = "none";
                document.getElementById('diverrormore'+id).style.visibility = "hidden";
                document.getElementById('diverrormore'+id).style.display = "none";
                document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                document.getElementById('diverrordiv'+id).style.display = "none";
                document.getElementById('custom_price'+id).innerText="$0";
                document.getElementById('input_custom_price'+id).value=0;
                document.getElementById('add_to_cart'+id).disabled=true;
                document.getElementById('add_to_cart'+id).className = "button primary";
            }
        }
        function custom_rectangle_stickers(id,w,h)
        {
            var cant60=.12,
                cant100=.39, 
                cant200=.60, 
                cant300=.68, 
                cant500=.78, 
                cant1000=.80, 
                cant2000=.87, 
                cant3000=.88, 
                cant5000=.89, 
                cant10000=.92;
            let dcant60=12,
                dcant100=49, 
                dcant200=70, 
                dcant300=78, 
                dcant500=86, 
                dcant1000=93, 
                dcant2000=97, 
                dcant3000=98, 
                dcant5000=99, 
                dcant10000=100;
            var scant100=cant100*100,
                scant200=cant200*100,
                scant300=cant300*100,
                scant500=cant500*100,
                scant1000=cant1000*100, 
                scant2000=cant2000*100,
                scant3000=cant3000*100,
                scant5000=cant5000*100,
                scant10000=cant10000*100;
            let price1=0.325,
                price2=0.325,
                price3=0.165,
                price4=0.215,
                price5=0.275;
            var num = document.getElementById('quantity'+id); 
            document.getElementById('quantity_input_'+id).value=num.value;
            if(num.value<10) //diverrormore
            {
                document.getElementById('diverrorless'+id).style.visibility = "visible";
                document.getElementById('diverrorless'+id).style.display = "block";
                document.getElementById('diverrormore'+id).style.visibility = "hidden";
                document.getElementById('diverrormore'+id).style.display = "none";
                document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                document.getElementById('diverrordiv'+id).style.display = "none";
            }
            if(num.value>10)
            {
                if(num.value%10==0)
                {
                    document.getElementById('diverrorless'+id).style.visibility = "hidden";
                    document.getElementById('diverrorless'+id).style.display = "none";
                    document.getElementById('diverrormore'+id).style.visibility = "hidden";
                    document.getElementById('diverrormore'+id).style.display = "none";
                    document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                    document.getElementById('diverrordiv'+id).style.display = "none";//contador
                    document.getElementById('add_to_cart'+id).disabled=false;
                    document.getElementById('add_to_cart'+id).className = "button secondary";
                    var cantidad = num.value;
                    if(cantidad>0)
                    {
                        var size1=w,size2=h;
                        //var precioxunidadW = .42+(size1*0.06); //.06
                        //var precioxunidadH = .42+(size2*0.06); //.06
                        //var precioxunidad = precioxunidadW + precioxunidadH;
                        if(size1==1)
                            {
                                var precioxunidadW = size1*price1; //.06
                            }
                            if(size2==1)
                            {
                                var precioxunidadH = size2*price1; //.06 54 48 12
                            }
                            if(size1>1)
                            {
                                var precioxunidadW = size1*price2; //.06
                            }
                            if(size2>1)
                            {
                                var precioxunidadH = size2*price2; //.06 54 48 12
                            }
                            if(size1>2)
                            {
                                var precioxunidadW = size1*price3; //.06
                            }
                            if(size2>2)
                            {
                                var precioxunidadH = size2*price3; //.06 54 48 12
                            }
                            if(size1>25)
                            {
                                var precioxunidadW = size1*price4; //.06
                            }
                            if(size2>15)
                            {
                                var precioxunidadH = size2*price4; //.06 54 48 12
                            }
                            if(size1>30)
                            {
                                var precioxunidadW = size1*price5; //.06
                            }
                            if(size2>20)
                            {
                                var precioxunidadH = size2*price5; //.06 54 48 12
                            }
                        var precioxunidad = precioxunidadW + precioxunidadH;
                        if(cantidad < 60)
                        {
                            var price=precioxunidad*cantidad;
                            document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                            document.getElementById('input_custom_price'+id).value=price.toFixed();
                            return;
                        }
                        if(cantidad > 50)
                        {
                            //document.getElementById('quantity_custom').value = cantidad;
                            
                            var descuento=0,iter=0,desctotal=0,inicio=0;
                            var price=precioxunidad*50;
                            cant60=dcant60-((.59*size1)+(.59*size2));
                            cant100=dcant100-((1.5*size1)+(1.5*size2));
                            cant200=dcant200-((1.8*size1)+(1.8*size2)); 
                            cant300=dcant300-((1.8*size1)+(1.8*size2)); 
                            cant500=dcant500-((2.4*size1)+(2.4*size2)); 
                            cant1000=dcant1000-((2.4*size1)+(2.4*size2)); 
                            cant2000=dcant2000-((2.4*size1)+(2.4*size2)); 
                            cant3000=dcant3000-((2.4*size1)+(2.4*size2)); 
                            cant5000=dcant5000-((2.1*size1)+(2.1*size2)); 
                            cant10000=dcant10000-((2.1*size1)+(2.1*size2));
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
                            //alert(cantidad+" "+descuento+" "+iter);
                            var price=(precioxunidad*cantidad)-(((precioxunidad*cantidad)/100)*descuento);
                            //var price=precioxunidad*cantidad-precioxunidad*cantidad*descuento;
                            //document.getElementById('spancustomprice').innerText="$"+ price.toFixed();
                            document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                            document.getElementById('input_custom_price'+id).value=price.toFixed();
                            //descuento = descuento * 100;
                            //document.getElementById('spancustomsavings').innerText="Save " + descuento.toFixed()+"%";
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
                    document.getElementById('diverrorless'+id).style.visibility = "hidden";
                    document.getElementById('diverrorless'+id).style.display = "none";
                    document.getElementById('diverrormore'+id).style.visibility = "hidden";
                    document.getElementById('diverrormore'+id).style.display = "none";
                    document.getElementById('diverrordiv'+id).style.visibility = "visible";
                    document.getElementById('diverrordiv'+id).style.display = "block";
                }
            }
            if(num.value==0 || num.value=="")
            {
                document.getElementById('diverrorless'+id).style.visibility = "hidden";
                document.getElementById('diverrorless'+id).style.display = "none";
                document.getElementById('diverrormore'+id).style.visibility = "hidden";
                document.getElementById('diverrormore'+id).style.display = "none";
                document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                document.getElementById('diverrordiv'+id).style.display = "none";
                document.getElementById('custom_price'+id).innerText="$0";
                document.getElementById('input_custom_price'+id).value=0;
                document.getElementById('add_to_cart'+id).disabled=true;
                document.getElementById('add_to_cart'+id).className = "button primary";
            }
        }
        function custom_square_stickers(id,w,h)
        {
            var cant60=.12,
                cant100=.39, 
                cant200=.60, 
                cant300=.68, 
                cant500=.78, 
                cant1000=.80, 
                cant2000=.87, 
                cant3000=.88, 
                cant5000=.89, 
                cant10000=.92;
            let dcant60=12,
                dcant100=51, 
                dcant200=72, 
                dcant300=80, 
                dcant500=88, 
                dcant1000=94, 
                dcant2000=95, 
                dcant3000=96, 
                dcant5000=97, 
                dcant10000=98;
            var scant100=cant100*100,
                scant200=cant200*100,
                scant300=cant300*100,
                scant500=cant500*100,
                scant1000=cant1000*100, 
                scant2000=cant2000*100,
                scant3000=cant3000*100,
                scant5000=cant5000*100,
                scant10000=cant10000*100;
            let price1=0.325,
                price2=0.292,
                price3=0.165,
                price4=0.215,
                price5=0.275;
            var num = document.getElementById('quantity'+id); 
            document.getElementById('quantity_input_'+id).value=num.value;
            if(num.value<10) //diverrormore
            {
                document.getElementById('diverrorless'+id).style.visibility = "visible";
                document.getElementById('diverrorless'+id).style.display = "block";
                document.getElementById('diverrormore'+id).style.visibility = "hidden";
                document.getElementById('diverrormore'+id).style.display = "none";
                document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                document.getElementById('diverrordiv'+id).style.display = "none";
            }
            if(num.value>10)
            {
                if(num.value%10==0)
                {
                    document.getElementById('diverrorless'+id).style.visibility = "hidden";
                    document.getElementById('diverrorless'+id).style.display = "none";
                    document.getElementById('diverrormore'+id).style.visibility = "hidden";
                    document.getElementById('diverrormore'+id).style.display = "none";
                    document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                    document.getElementById('diverrordiv'+id).style.display = "none";//contador
                    document.getElementById('add_to_cart'+id).disabled=false;
                    document.getElementById('add_to_cart'+id).className = "button secondary";
                    var cantidad = num.value;
                    if(cantidad>0)
                    {
                        var size1=w,size2=h;
                        //var precioxunidadW = .42+(size1*0.06); //.06
                        //var precioxunidadH = .42+(size2*0.06); //.06
                        if(size1==1)
                            {
                                var precioxunidadW = size1*price1; //.06
                            }
                            if(size2==1)
                            {
                                var precioxunidadH = size2*price1; //.06 54 48 12
                            }
                            if(size1>1)
                            {
                                var precioxunidadW = size1*price2; //.06
                            }
                            if(size2>1)
                            {
                                var precioxunidadH = size2*price2; //.06 54 48 12
                            }
                            if(size1>2)
                            {
                                var precioxunidadW = size1*price3; //.06
                            }
                            if(size2>2)
                            {
                                var precioxunidadH = size2*price3; //.06 54 48 12
                            }
                            if(size1>25)
                            {
                                var precioxunidadW = size1*price4; //.06
                            }
                            if(size2>15)
                            {
                                var precioxunidadH = size2*price4; //.06 54 48 12
                            }
                            if(size1>30)
                            {
                                var precioxunidadW = size1*price5; //.06
                            }
                            if(size2>20)
                            {
                                var precioxunidadH = size2*price5; //.06 54 48 12
                            }
                        var precioxunidad = precioxunidadW + precioxunidadH;
                        
                        if(cantidad < 60)
                        {
                            var price=precioxunidad*cantidad;
                            document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                            document.getElementById('input_custom_price'+id).value=price.toFixed();
                            return;
                        }
                        if(cantidad > 50)
                        {
                            //document.getElementById('quantity_custom').value = cantidad;
                            
                            var descuento=0,iter=0,desctotal=0,inicio=0;
                            var price=precioxunidad*50;
                            cant60=dcant60-((.59*size1)+(.59*size2));
                            cant100=dcant100-((1.5*size1)+(1.5*size2));
                            cant200=dcant200-((1.8*size1)+(1.8*size2)); 
                            cant300=dcant300-((1.8*size1)+(1.8*size2)); 
                            cant500=dcant500-((2.4*size1)+(2.4*size2)); 
                            cant1000=dcant1000-((2.4*size1)+(2.4*size2)); 
                            cant2000=dcant2000-((2.4*size1)+(2.4*size2)); 
                            cant3000=dcant3000-((2.4*size1)+(2.4*size2)); 
                            cant5000=dcant5000-((2.1*size1)+(2.1*size2)); 
                            cant10000=dcant10000-((2.1*size1)+(2.1*size2));
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
                            //alert(cantidad+" "+descuento+" "+iter);
                            var price=(precioxunidad*cantidad)-(((precioxunidad*cantidad)/100)*descuento);
                            //var price=precioxunidad*cantidad-precioxunidad*cantidad*descuento;
                            //document.getElementById('spancustomprice').innerText="$"+ price.toFixed();
                            document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                            document.getElementById('input_custom_price'+id).value=price.toFixed();
                            //descuento = descuento * 100;
                            //document.getElementById('spancustomsavings').innerText="Save " + descuento.toFixed()+"%";
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
                    document.getElementById('diverrorless'+id).style.visibility = "hidden";
                    document.getElementById('diverrorless'+id).style.display = "none";
                    document.getElementById('diverrormore'+id).style.visibility = "hidden";
                    document.getElementById('diverrormore'+id).style.display = "none";
                    document.getElementById('diverrordiv'+id).style.visibility = "visible";
                    document.getElementById('diverrordiv'+id).style.display = "block";
                }
            }
            if(num.value==0 || num.value=="")
            {
                document.getElementById('diverrorless'+id).style.visibility = "hidden";
                document.getElementById('diverrorless'+id).style.display = "none";
                document.getElementById('diverrormore'+id).style.visibility = "hidden";
                document.getElementById('diverrormore'+id).style.display = "none";
                document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                document.getElementById('diverrordiv'+id).style.display = "none";
                document.getElementById('custom_price'+id).innerText="$0";
                document.getElementById('input_custom_price'+id).value=0;
                document.getElementById('add_to_cart'+id).disabled=true;
                document.getElementById('add_to_cart'+id).className = "button primary";
            }
        }
        function custom_oval_stickers(id,w,h)
        {
            var cant60=.12,
                cant100=.39, 
                cant200=.60, 
                cant300=.68, 
                cant500=.78, 
                cant1000=.80, 
                cant2000=.87, 
                cant3000=.88, 
                cant5000=.89, 
                cant10000=.92;
            let dcant60=12,
                dcant100=51, 
                dcant200=72, 
                dcant300=80, 
                dcant500=88, 
                dcant1000=94, 
                dcant2000=95, 
                dcant3000=96, 
                dcant5000=97, 
                dcant10000=100;
            var scant100=cant100*100,
                scant200=cant200*100,
                scant300=cant300*100,
                scant500=cant500*100,
                scant1000=cant1000*100, 
                scant2000=cant2000*100,
                scant3000=cant3000*100,
                scant5000=cant5000*100,
                scant10000=cant10000*100;
            let price1=0.325,
                price2=0.292,
                price3=0.165,
                price4=0.215,
                price5=0.275;
            var num = document.getElementById('quantity'+id); 
            document.getElementById('quantity_input_'+id).value=num.value;
            if(num.value<10) //diverrormore
            {
                document.getElementById('diverrorless'+id).style.visibility = "visible";
                document.getElementById('diverrorless'+id).style.display = "block";
                document.getElementById('diverrormore'+id).style.visibility = "hidden";
                document.getElementById('diverrormore'+id).style.display = "none";
                document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                document.getElementById('diverrordiv'+id).style.display = "none";
            }
            if(num.value>10)
            {
                if(num.value%10==0)
                {
                    document.getElementById('diverrorless'+id).style.visibility = "hidden";
                    document.getElementById('diverrorless'+id).style.display = "none";
                    document.getElementById('diverrormore'+id).style.visibility = "hidden";
                    document.getElementById('diverrormore'+id).style.display = "none";
                    document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                    document.getElementById('diverrordiv'+id).style.display = "none";//contador
                    document.getElementById('add_to_cart'+id).disabled=false;
                    document.getElementById('add_to_cart'+id).className = "button secondary";
                    var cantidad = num.value;
                    if(cantidad>0)
                    {
                        var size1=w,size2=h;
                        //var precioxunidadW = .44+(size1*0.06); //.06
                        //var precioxunidadH = .44+(size2*0.06); //.06
                        if(size1==1)
                            {
                                var precioxunidadW = size1*price1; //.06
                            }
                            if(size2==1)
                            {
                                var precioxunidadH = size2*price1; //.06 54 48 12
                            }
                            if(size1>1)
                            {
                                var precioxunidadW = size1*price2; //.06
                            }
                            if(size2>1)
                            {
                                var precioxunidadH = size2*price2; //.06 54 48 12
                            }
                            if(size1>2)
                            {
                                var precioxunidadW = size1*price3; //.06
                            }
                            if(size2>2)
                            {
                                var precioxunidadH = size2*price3; //.06 54 48 12
                            }
                            if(size1>25)
                            {
                                var precioxunidadW = size1*price4; //.06
                            }
                            if(size2>15)
                            {
                                var precioxunidadH = size2*price4; //.06 54 48 12
                            }
                            if(size1>30)
                            {
                                var precioxunidadW = size1*price5; //.06
                            }
                            if(size2>20)
                            {
                                var precioxunidadH = size2*price5; //.06 54 48 12
                            }
                        var precioxunidad = precioxunidadW + precioxunidadH;
                        
                        if(cantidad < 60)
                        {
                            var price=precioxunidad*cantidad;
                            document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                            document.getElementById('input_custom_price'+id).value=price.toFixed();
                            return;
                        }
                        if(cantidad > 50)
                        {
                            //document.getElementById('quantity_custom').value = cantidad;
                            
                            var descuento=0,iter=0,desctotal=0,inicio=0;
                            var price=precioxunidad*50;
                            cant60=dcant60-((.59*size1)+(.59*size2));
                            cant100=dcant100-((1.5*size1)+(1.5*size2));
                            cant200=dcant200-((1.8*size1)+(1.8*size2)); 
                            cant300=dcant300-((1.8*size1)+(1.8*size2)); 
                            cant500=dcant500-((2.4*size1)+(2.4*size2)); 
                            cant1000=dcant1000-((2.4*size1)+(2.4*size2)); 
                            cant2000=dcant2000-((2.4*size1)+(2.4*size2)); 
                            cant3000=dcant3000-((2.4*size1)+(2.4*size2)); 
                            cant5000=dcant5000-((2.1*size1)+(2.1*size2)); 
                            cant10000=dcant10000-((2.1*size1)+(2.1*size2));
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
                            //alert(cantidad+" "+descuento+" "+iter);
                            var price=(precioxunidad*cantidad)-(((precioxunidad*cantidad)/100)*descuento);
                            //var price=precioxunidad*cantidad-precioxunidad*cantidad*descuento;
                            //document.getElementById('spancustomprice').innerText="$"+ price.toFixed();
                            document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                            document.getElementById('input_custom_price'+id).value=price.toFixed();
                            //descuento = descuento * 100;
                            //document.getElementById('spancustomsavings').innerText="Save " + descuento.toFixed()+"%";
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
                    document.getElementById('diverrorless'+id).style.visibility = "hidden";
                    document.getElementById('diverrorless'+id).style.display = "none";
                    document.getElementById('diverrormore'+id).style.visibility = "hidden";
                    document.getElementById('diverrormore'+id).style.display = "none";
                    document.getElementById('diverrordiv'+id).style.visibility = "visible";
                    document.getElementById('diverrordiv'+id).style.display = "block";
                }
            }
            if(num.value==0 || num.value=="")
            {
                document.getElementById('diverrorless'+id).style.visibility = "hidden";
                document.getElementById('diverrorless'+id).style.display = "none";
                document.getElementById('diverrormore'+id).style.visibility = "hidden";
                document.getElementById('diverrormore'+id).style.display = "none";
                document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                document.getElementById('diverrordiv'+id).style.display = "none";
                document.getElementById('custom_price'+id).innerText="$0";
                document.getElementById('input_custom_price'+id).value=0;
                document.getElementById('add_to_cart'+id).disabled=true;
                document.getElementById('add_to_cart'+id).className = "button primary";
            }
        }
        function custom_bumper_stickers(id,w,h)
        {
            var cant60=.12,
                cant100=.39, 
                cant200=.60, 
                cant300=.68, 
                cant500=.78, 
                cant1000=.80, 
                cant2000=.87, 
                cant3000=.88, 
                cant5000=.89, 
                cant10000=.92;
            let dcant60=12,
                dcant100=51, 
                dcant200=74, 
                dcant300=80, 
                dcant500=96, 
                dcant1000=98, 
                dcant2000=102, 
                dcant3000=104, 
                dcant5000=106, 
                dcant10000=108;
            var scant100=cant100*100,
                scant200=cant200*100,
                scant300=cant300*100,
                scant500=cant500*100,
                scant1000=cant1000*100, 
                scant2000=cant2000*100,
                scant3000=cant3000*100,
                scant5000=cant5000*100,
                scant10000=cant10000*100;
            let price1=0.325,
                price2=0.262,
                price3=0.145,
                price4=0.115,
                price5=0.165;
            var num = document.getElementById('quantity'+id); 
            document.getElementById('quantity_input_'+id).value=num.value;
            if(num.value<10) //diverrormore
            {
                document.getElementById('diverrorless'+id).style.visibility = "visible";
                document.getElementById('diverrorless'+id).style.display = "block";
                document.getElementById('diverrormore'+id).style.visibility = "hidden";
                document.getElementById('diverrormore'+id).style.display = "none";
                document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                document.getElementById('diverrordiv'+id).style.display = "none";
            }
            if(num.value>10)
            {
                if(num.value%10==0)
                {
                    document.getElementById('diverrorless'+id).style.visibility = "hidden";
                    document.getElementById('diverrorless'+id).style.display = "none";
                    document.getElementById('diverrormore'+id).style.visibility = "hidden";
                    document.getElementById('diverrormore'+id).style.display = "none";
                    document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                    document.getElementById('diverrordiv'+id).style.display = "none";//contador
                    document.getElementById('add_to_cart'+id).disabled=false;
                    document.getElementById('add_to_cart'+id).className = "button secondary";
                    var cantidad = num.value;
                    if(cantidad>0)
                    {
                        var size1=w,size2=h;
                        //var precioxunidadW = .42+(size1*0.06); //.06
                        //var precioxunidadH = .42+(size2*0.06); //.06
                        if(size1==1)
                            {
                                var precioxunidadW = size1*price1; //.06
                            }
                            if(size2==1)
                            {
                                var precioxunidadH = size2*price1; //.06 54 48 12
                            }
                            if(size1>1)
                            {
                                var precioxunidadW = size1*price2; //.06
                            }
                            if(size2>1)
                            {
                                var precioxunidadH = size2*price2; //.06 54 48 12
                            }
                            if(size1>2)
                            {
                                var precioxunidadW = size1*price3; //.06
                            }
                            if(size2>2)
                            {
                                var precioxunidadH = size2*price3; //.06 54 48 12
                            }
                            if(size1>25)
                            {
                                var precioxunidadW = size1*price4; //.06
                            }
                            if(size2>15)
                            {
                                var precioxunidadH = size2*price4; //.06 54 48 12
                            }
                            if(size1>30)
                            {
                                var precioxunidadW = size1*price5; //.06
                            }
                            if(size2>20)
                            {
                                var precioxunidadH = size2*price5; //.06 54 48 12
                            }
                        var precioxunidad = precioxunidadW + precioxunidadH;
                        
                        if(cantidad < 60)
                        {
                            var price=precioxunidad*cantidad;
                            document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                            document.getElementById('input_custom_price'+id).value=price.toFixed();
                            return;
                        }
                        if(cantidad > 50)
                        {
                            //document.getElementById('quantity_custom').value = cantidad;
                            
                            var descuento=0,iter=0,desctotal=0,inicio=0;
                            var price=precioxunidad*50;
                            cant60=dcant60-((.59*size1)+(.59*size2));
                            cant100=dcant100-((1.5*size1)+(1.5*size2));
                            cant200=dcant200-((1.8*size1)+(1.8*size2)); 
                            cant300=dcant300-((1.8*size1)+(1.8*size2)); 
                            cant500=dcant500-((2.4*size1)+(2.4*size2)); 
                            cant1000=dcant1000-((2.4*size1)+(2.4*size2)); 
                            cant2000=dcant2000-((2.4*size1)+(2.4*size2)); 
                            cant3000=dcant3000-((2.4*size1)+(2.4*size2)); 
                            cant5000=dcant5000-((2.1*size1)+(2.1*size2)); 
                            cant10000=dcant10000-((2.1*size1)+(2.1*size2));
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
                            //alert(cantidad+" "+descuento+" "+iter);
                            var price=(precioxunidad*cantidad)-(((precioxunidad*cantidad)/100)*descuento);
                            //var price=precioxunidad*cantidad-precioxunidad*cantidad*descuento;
                            //document.getElementById('spancustomprice').innerText="$"+ price.toFixed();
                            document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                            document.getElementById('input_custom_price'+id).value=price.toFixed();
                            //descuento = descuento * 100;
                            //document.getElementById('spancustomsavings').innerText="Save " + descuento.toFixed()+"%";
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
                    document.getElementById('diverrorless'+id).style.visibility = "hidden";
                    document.getElementById('diverrorless'+id).style.display = "none";
                    document.getElementById('diverrormore'+id).style.visibility = "hidden";
                    document.getElementById('diverrormore'+id).style.display = "none";
                    document.getElementById('diverrordiv'+id).style.visibility = "visible";
                    document.getElementById('diverrordiv'+id).style.display = "block";
                }
            }
            if(num.value==0 || num.value=="")
            {
                document.getElementById('diverrorless'+id).style.visibility = "hidden";
                document.getElementById('diverrorless'+id).style.display = "none";
                document.getElementById('diverrormore'+id).style.visibility = "hidden";
                document.getElementById('diverrormore'+id).style.display = "none";
                document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                document.getElementById('diverrordiv'+id).style.display = "none";
                document.getElementById('custom_price'+id).innerText="$0";
                document.getElementById('input_custom_price'+id).value=0;
                document.getElementById('add_to_cart'+id).disabled=true;
                document.getElementById('add_to_cart'+id).className = "button primary";
            }
        }
        function custom_kiss_cut_stickers(id,w,h)
        {
            var cant60=.12,
                cant100=.39, 
                cant200=.60, 
                cant300=.68, 
                cant500=.78, 
                cant1000=.80, 
                cant2000=.87, 
                cant3000=.88, 
                cant5000=.89, 
                cant10000=.92;
            let dcant60=12,
                dcant100=51, 
                dcant200=72, 
                dcant300=80, 
                dcant500=88, 
                dcant1000=94, 
                dcant2000=95, 
                dcant3000=96, 
                dcant5000=97, 
                dcant10000=98;
            var scant100=cant100*100,
                scant200=cant200*100,
                scant300=cant300*100,
                scant500=cant500*100,
                scant1000=cant1000*100, 
                scant2000=cant2000*100,
                scant3000=cant3000*100,
                scant5000=cant5000*100,
                scant10000=cant10000*100;
            let price1=0.325,
                price2=0.299,
                price3=0.165,
                price4=0.215,
                price5=0.275;
            var num = document.getElementById('quantity'+id); 
            document.getElementById('quantity_input_'+id).value=num.value;
            if(num.value<10) //diverrormore
            {
                document.getElementById('diverrorless'+id).style.visibility = "visible";
                document.getElementById('diverrorless'+id).style.display = "block";
                document.getElementById('diverrormore'+id).style.visibility = "hidden";
                document.getElementById('diverrormore'+id).style.display = "none";
                document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                document.getElementById('diverrordiv'+id).style.display = "none";
            }
            if(num.value>10)
            {
                if(num.value%10==0)
                {
                    document.getElementById('diverrorless'+id).style.visibility = "hidden";
                    document.getElementById('diverrorless'+id).style.display = "none";
                    document.getElementById('diverrormore'+id).style.visibility = "hidden";
                    document.getElementById('diverrormore'+id).style.display = "none";
                    document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                    document.getElementById('diverrordiv'+id).style.display = "none";//contador
                    document.getElementById('add_to_cart'+id).disabled=false;
                    document.getElementById('add_to_cart'+id).className = "button secondary";
                    var cantidad = num.value;
                    if(cantidad>0)
                    {
                        var size1=w,size2=h;
                        //var precioxunidadW = .42+(size1*0.06); //.06
                        //var precioxunidadH = .42+(size2*0.06); //.06
                        if(size1==1)
                            {
                                var precioxunidadW = size1*price1; //.06
                            }
                            if(size2==1)
                            {
                                var precioxunidadH = size2*price1; //.06 54 48 12
                            }
                            if(size1>1)
                            {
                                var precioxunidadW = size1*price2; //.06
                            }
                            if(size2>1)
                            {
                                var precioxunidadH = size2*price2; //.06 54 48 12
                            }
                            if(size1>2)
                            {
                                var precioxunidadW = size1*price3; //.06
                            }
                            if(size2>2)
                            {
                                var precioxunidadH = size2*price3; //.06 54 48 12
                            }
                            if(size1>25)
                            {
                                var precioxunidadW = size1*price4; //.06
                            }
                            if(size2>15)
                            {
                                var precioxunidadH = size2*price4; //.06 54 48 12
                            }
                            if(size1>30)
                            {
                                var precioxunidadW = size1*price5; //.06
                            }
                            if(size2>20)
                            {
                                var precioxunidadH = size2*price5; //.06 54 48 12
                            }
                        var precioxunidad = precioxunidadW + precioxunidadH;
                        
                        if(cantidad < 60)
                        {
                            var price=precioxunidad*cantidad;
                            document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                            document.getElementById('input_custom_price'+id).value=price.toFixed();
                            return;
                        }
                        if(cantidad > 50)
                        {
                            //document.getElementById('quantity_custom').value = cantidad;
                            
                            var descuento=0,iter=0,desctotal=0,inicio=0;
                            var price=precioxunidad*50;
                            cant60=dcant60-((.59*size1)+(.59*size2));
                            cant100=dcant100-((1.5*size1)+(1.5*size2));
                            cant200=dcant200-((1.8*size1)+(1.8*size2)); 
                            cant300=dcant300-((1.8*size1)+(1.8*size2)); 
                            cant500=dcant500-((2.4*size1)+(2.4*size2)); 
                            cant1000=dcant1000-((2.4*size1)+(2.4*size2)); 
                            cant2000=dcant2000-((2.4*size1)+(2.4*size2)); 
                            cant3000=dcant3000-((2.4*size1)+(2.4*size2)); 
                            cant5000=dcant5000-((2.1*size1)+(2.1*size2)); 
                            cant10000=dcant10000-((2.1*size1)+(2.1*size2));
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
                            //alert(cantidad+" "+descuento+" "+iter);
                            var price=(precioxunidad*cantidad)-(((precioxunidad*cantidad)/100)*descuento);
                            //var price=precioxunidad*cantidad-precioxunidad*cantidad*descuento;
                            //document.getElementById('spancustomprice').innerText="$"+ price.toFixed();
                            document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                            document.getElementById('input_custom_price'+id).value=price.toFixed();
                            //descuento = descuento * 100;
                            //document.getElementById('spancustomsavings').innerText="Save " + descuento.toFixed()+"%";
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
                    document.getElementById('diverrorless'+id).style.visibility = "hidden";
                    document.getElementById('diverrorless'+id).style.display = "none";
                    document.getElementById('diverrormore'+id).style.visibility = "hidden";
                    document.getElementById('diverrormore'+id).style.display = "none";
                    document.getElementById('diverrordiv'+id).style.visibility = "visible";
                    document.getElementById('diverrordiv'+id).style.display = "block";
                }
            }
            if(num.value==0 || num.value=="")
            {
                document.getElementById('diverrorless'+id).style.visibility = "hidden";
                document.getElementById('diverrorless'+id).style.display = "none";
                document.getElementById('diverrormore'+id).style.visibility = "hidden";
                document.getElementById('diverrormore'+id).style.display = "none";
                document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                document.getElementById('diverrordiv'+id).style.display = "none";
                document.getElementById('custom_price'+id).innerText="$0";
                document.getElementById('input_custom_price'+id).value=0;
                document.getElementById('add_to_cart'+id).disabled=true;
                document.getElementById('add_to_cart'+id).className = "button primary";
            }
        }
        function custom_rounded_corner_stickers(id,w,h)
        {
            var cant60=.12,
                cant100=.39, 
                cant200=.60, 
                cant300=.68, 
                cant500=.78, 
                cant1000=.80, 
                cant2000=.87, 
                cant3000=.88, 
                cant5000=.89, 
                cant10000=.92;
            let dcant60=12,
                dcant100=50, 
                dcant200=71, 
                dcant300=79, 
                dcant500=90, 
                dcant1000=96, 
                dcant2000=98, 
                dcant3000=99, 
                dcant5000=100, 
                dcant10000=102;
            var scant100=cant100*100,
                scant200=cant200*100,
                scant300=cant300*100,
                scant500=cant500*100,
                scant1000=cant1000*100, 
                scant2000=cant2000*100,
                scant3000=cant3000*100,
                scant5000=cant5000*100,
                scant10000=cant10000*100;
            let price1=0.325,
                price2=0.292,
                price3=0.213,
                price4=0.215,
                price5=0.275;
            var num = document.getElementById('quantity'+id); 
            document.getElementById('quantity_input_'+id).value=num.value;
            if(num.value<10) //diverrormore
            {
                document.getElementById('diverrorless'+id).style.visibility = "visible";
                document.getElementById('diverrorless'+id).style.display = "block";
                document.getElementById('diverrormore'+id).style.visibility = "hidden";
                document.getElementById('diverrormore'+id).style.display = "none";
                document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                document.getElementById('diverrordiv'+id).style.display = "none";
            }
            if(num.value>10)
            {
                if(num.value%10==0)
                {
                    document.getElementById('diverrorless'+id).style.visibility = "hidden";
                    document.getElementById('diverrorless'+id).style.display = "none";
                    document.getElementById('diverrormore'+id).style.visibility = "hidden";
                    document.getElementById('diverrormore'+id).style.display = "none";
                    document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                    document.getElementById('diverrordiv'+id).style.display = "none";//contador
                    document.getElementById('add_to_cart'+id).disabled=false;
                    document.getElementById('add_to_cart'+id).className = "button secondary";
                    var cantidad = num.value;
                    if(cantidad>0)
                    {
                        var size1=w,size2=h;
                        //var precioxunidadW = .42+(size1*0.06); //.06
                        //var precioxunidadH = .42+(size2*0.06); //.06
                        if(size1==1)
                            {
                                var precioxunidadW = size1*price1; //.06
                            }
                            if(size2==1)
                            {
                                var precioxunidadH = size2*price1; //.06 54 48 12
                            }
                            if(size1>1)
                            {
                                var precioxunidadW = size1*price2; //.06
                            }
                            if(size2>1)
                            {
                                var precioxunidadH = size2*price2; //.06 54 48 12
                            }
                            if(size1>2)
                            {
                                var precioxunidadW = size1*price3; //.06
                            }
                            if(size2>2)
                            {
                                var precioxunidadH = size2*price3; //.06 54 48 12
                            }
                            if(size1>25)
                            {
                                var precioxunidadW = size1*price4; //.06
                            }
                            if(size2>15)
                            {
                                var precioxunidadH = size2*price4; //.06 54 48 12
                            }
                            if(size1>30)
                            {
                                var precioxunidadW = size1*price5; //.06
                            }
                            if(size2>20)
                            {
                                var precioxunidadH = size2*price5; //.06 54 48 12
                            }
                        var precioxunidad = precioxunidadW + precioxunidadH;
                        
                        if(cantidad < 60)
                        {
                            var price=precioxunidad*cantidad;
                            document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                            document.getElementById('input_custom_price'+id).value=price.toFixed();
                            return;
                        }
                        if(cantidad > 50)
                        {
                            //document.getElementById('quantity_custom').value = cantidad;
                            
                            var descuento=0,iter=0,desctotal=0,inicio=0;
                            var price=precioxunidad*50;
                            cant60=dcant60-((.59*size1)+(.59*size2));
                            cant100=dcant100-((1.5*size1)+(1.5*size2));
                            cant200=dcant200-((1.8*size1)+(1.8*size2)); 
                            cant300=dcant300-((1.8*size1)+(1.8*size2)); 
                            cant500=dcant500-((2.4*size1)+(2.4*size2)); 
                            cant1000=dcant1000-((2.4*size1)+(2.4*size2)); 
                            cant2000=dcant2000-((2.4*size1)+(2.4*size2)); 
                            cant3000=dcant3000-((2.4*size1)+(2.4*size2)); 
                            cant5000=dcant5000-((2.1*size1)+(2.1*size2)); 
                            cant10000=dcant10000-((2.1*size1)+(2.1*size2));
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
                            //alert(cantidad+" "+descuento+" "+iter);
                            //var price=precioxunidad*cantidad-precioxunidad*cantidad*descuento;
                            var price=(precioxunidad*cantidad)-(((precioxunidad*cantidad)/100)*descuento);
                            //document.getElementById('spancustomprice').innerText="$"+ price.toFixed();
                            document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                            document.getElementById('input_custom_price'+id).value=price.toFixed();
                            //descuento = descuento * 100;
                            //document.getElementById('spancustomsavings').innerText="Save " + descuento.toFixed()+"%";
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
                    document.getElementById('diverrorless'+id).style.visibility = "hidden";
                    document.getElementById('diverrorless'+id).style.display = "none";
                    document.getElementById('diverrormore'+id).style.visibility = "hidden";
                    document.getElementById('diverrormore'+id).style.display = "none";
                    document.getElementById('diverrordiv'+id).style.visibility = "visible";
                    document.getElementById('diverrordiv'+id).style.display = "block";
                }
            }
            if(num.value==0 || num.value=="")
            {
                document.getElementById('diverrorless'+id).style.visibility = "hidden";
                document.getElementById('diverrorless'+id).style.display = "none";
                document.getElementById('diverrormore'+id).style.visibility = "hidden";
                document.getElementById('diverrormore'+id).style.display = "none";
                document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                document.getElementById('diverrordiv'+id).style.display = "none";
                document.getElementById('custom_price'+id).innerText="$0";
                document.getElementById('input_custom_price'+id).value=0;
                document.getElementById('add_to_cart'+id).disabled=true;
                document.getElementById('add_to_cart'+id).className = "button primary";
            }
        }
        function custom_stickers_sheets(id,w,h)
        {
            var cant60=.12,
                cant100=.39, 
                cant200=.60, 
                cant300=.68, 
                cant500=.78, 
                cant1000=.80, 
                cant2000=.87, 
                cant3000=.88, 
                cant5000=.89, 
                cant10000=.92;
            let dcant60=12,
                dcant100=45, 
                dcant200=69, 
                dcant300=77, 
                dcant500=85, 
                dcant1000=91, 
                dcant2000=92, 
                dcant3000=93, 
                dcant5000=94, 
                dcant10000=95;
            var scant100=cant100*100,
                scant200=cant200*100,
                scant300=cant300*100,
                scant500=cant500*100,
                scant1000=cant1000*100, 
                scant2000=cant2000*100,
                scant3000=cant3000*100,
                scant5000=cant5000*100,
                scant10000=cant10000*100;
            let price1=0.345,
                price2=0.362,
                price3=0.225,
                price4=0.295,
                price5=0.365;
            var num = document.getElementById('quantity'+id); 
            document.getElementById('quantity_input_'+id).value=num.value;
            if(num.value<10) //diverrormore
            {
                document.getElementById('diverrorless'+id).style.visibility = "visible";
                document.getElementById('diverrorless'+id).style.display = "block";
                document.getElementById('diverrormore'+id).style.visibility = "hidden";
                document.getElementById('diverrormore'+id).style.display = "none";
                document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                document.getElementById('diverrordiv'+id).style.display = "none";
            }
            if(num.value>10)
            {
                if(num.value%10==0)
                {
                    document.getElementById('diverrorless'+id).style.visibility = "hidden";
                    document.getElementById('diverrorless'+id).style.display = "none";
                    document.getElementById('diverrormore'+id).style.visibility = "hidden";
                    document.getElementById('diverrormore'+id).style.display = "none";
                    document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                    document.getElementById('diverrordiv'+id).style.display = "none";//contador
                    document.getElementById('add_to_cart'+id).disabled=false;
                    document.getElementById('add_to_cart'+id).className = "button secondary";
                    var cantidad = num.value;
                    if(cantidad>0)
                    {
                        var size1=w,size2=h;
                        //var precioxunidadW = .42+(size1*0.06); //.06
                        //var precioxunidadH = .42+(size2*0.06); //.06
                        if(size1==1)
                        {
                            var precioxunidadW = size1*price1; //.06
                        }
                        if(size2==1)
                        {
                            var precioxunidadH = size2*price1; //.06 54 48 12
                        }
                        if(size1>1)
                        {
                            var precioxunidadW = size1*price2; //.06
                        }
                        if(size2>1)
                        {
                            var precioxunidadH = size2*price2; //.06 54 48 12
                        }
                        if(size1>2)
                        {
                            var precioxunidadW = size1*price3; //.06
                        }
                        if(size2>2)
                        {
                            var precioxunidadH = size2*price3; //.06 54 48 12
                        }
                        if(size1>25)
                        {
                            var precioxunidadW = size1*price4; //.06
                        }
                        if(size2>15)
                        {
                            var precioxunidadH = size2*price4; //.06 54 48 12
                        }
                        if(size1>30)
                        {
                            var precioxunidadW = size1*price5; //.06
                        }
                        if(size2>20)
                        {
                            var precioxunidadH = size2*price5; //.06 54 48 12
                        }
                        var precioxunidad = precioxunidadW + precioxunidadH;
                        
                        if(cantidad < 60)
                        {
                            var price=precioxunidad*cantidad;
                            document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                            document.getElementById('input_custom_price'+id).value=price.toFixed();
                            return;
                        }
                        if(cantidad > 50)
                        {
                            //document.getElementById('quantity_custom').value = cantidad;
                            
                            var descuento=0,iter=0,desctotal=0,inicio=0;
                            var price=precioxunidad*50;
                            cant60=dcant60-((.59*size1)+(.59*size2));
                            cant100=dcant100-((1.5*size1)+(1.5*size2));
                            cant200=dcant200-((1.8*size1)+(1.8*size2)); 
                            cant300=dcant300-((1.8*size1)+(1.8*size2)); 
                            cant500=dcant500-((2.4*size1)+(2.4*size2)); 
                            cant1000=dcant1000-((2.4*size1)+(2.4*size2)); 
                            cant2000=dcant2000-((2.4*size1)+(2.4*size2)); 
                            cant3000=dcant3000-((2.4*size1)+(2.4*size2)); 
                            cant5000=dcant5000-((2.1*size1)+(2.1*size2)); 
                            cant10000=dcant10000-((2.1*size1)+(2.1*size2));
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
                            //alert(cantidad+" "+descuento+" "+iter);
                            //var price=precioxunidad*cantidad-precioxunidad*cantidad*descuento;
                            var price=(precioxunidad*cantidad)-(((precioxunidad*cantidad)/100)*descuento);
                            //document.getElementById('spancustomprice').innerText="$"+ price.toFixed();
                            document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                            document.getElementById('input_custom_price'+id).value=price.toFixed();
                            //descuento = descuento * 100;
                            //document.getElementById('spancustomsavings').innerText="Save " + descuento.toFixed()+"%";
                            if(cantidad>200000)
                            {
                                
                                var msgalertt = document.getElementById("warnning");
                                msgalertt.insertAdjacentHTML("beforeend", "<div id='diverrormore' class='tooltiperror error'><span class='arrow'></span><span class='text'>Can't be more than 200000</span></div>");
                            
                            }
                        }
                        /*
                        if(cantidad > 50)
                        {
                            if(cantidad==60)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.06;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==70)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.12;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==80)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.18;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==90)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.24;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==100)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.30;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==110)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.31;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==120)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.32;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==130)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.33;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==140)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.34;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==150)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.35;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==160)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.36;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==170)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.37;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==180)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.38;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==190)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.39;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==200)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.40;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==210)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.41;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==220)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.41;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==230)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.42;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==240)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.42;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==250)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.43;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==260)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.43;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==270)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.44;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==280)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.44;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==290)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.45;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad==300)
                            {
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*0.35;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                            }
                            if(cantidad>300 && cantidad<=500)
                            {
                                var descuento=.45;
                                var cuart=0;
                                for(let cont = 300; cont <= 500; cont++)
                                {
                                    if(cuart==40){
                                        descuento+=.01
                                        cuart=0;
                                    }
                                    if(cantidad==cont){
                                        cont=600;
                                    }
                                        cuart++;
                                }
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*descuento;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                                var impdesc=descuento*100;
                            }
                            if(cantidad>500 && cantidad<=1000)
                            {
                                var descuento=.50;
                                var cuart=0;
                                for(let cont = 500; cont <= 1000; cont++)
                                {
                                    if(cuart==100){
                                        descuento+=.01
                                        cuart=0;
                                    }
                                    if(cantidad==cont){
                                        cont=2000;
                                    }
                                        cuart++;
                                }
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*descuento;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                                var impdesc=descuento*100;
                            }
                            if(cantidad>1000 && cantidad<=2000)
                            {
                                var descuento=.55;
                                var cuart=0;
                                for(let cont = 1000; cont <= 2000; cont++)
                                {
                                    if(cuart==200){
                                        descuento+=.01
                                        cuart=0;
                                    }
                                    if(cantidad==cont){
                                        cont=3000;
                                    }
                                        cuart++;
                                }
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*descuento;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                                var impdesc=descuento*100;
                            }
                            if(cantidad>2000 && cantidad<=3000)
                            {
                                var descuento=.60;
                                var cuart=0;
                                for(let cont = 2000; cont <= 3000; cont++)
                                {
                                    if(cuart==500){
                                        descuento+=.01
                                        cuart=0;
                                    }
                                    if(cantidad==cont){
                                        cont=30000;
                                    }
                                        cuart++;
                                }
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*descuento;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                                var impdesc=descuento*100;
                            }
                            if(cantidad>3000 && cantidad<=5000)
                            {
                                var descuento=.62;
                                var cuart=0;
                                for(let cont = 3000; cont <= 5000; cont++)
                                {
                                    if(cuart==333){
                                        descuento+=.01
                                        cuart=0;
                                    }
                                    if(cantidad==cont){
                                        cont=30000;
                                    }
                                        cuart++;
                                }
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*descuento;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                                var impdesc=descuento*100;
                            }
                            if(cantidad>5000 && cantidad<=10000)
                            {
                                var descuento=.68;
                                var cuart=0;
                                for(let cont = 5000; cont <= 10000;cont++)
                                {
                                    if(cuart==2500){
                                        descuento+=.01
                                        cuart=0;
                                    }
                                    if(cantidad==cont){
                                        cont=30000;
                                    }
                                        cuart++;
                                        
                                }
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*descuento;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                                var impdesc=descuento*100;
                            }
                            if(cantidad>10000 && cantidad<=200000)
                            {
                                var descuento=.70;
                                var price=precioxunidad*cantidad-precioxunidad*cantidad*descuento;//.675
                                document.getElementById('custom_price'+id).innerText="$"+ price.toFixed();
                                document.getElementById('input_custom_price'+id).value=price.toFixed();
                                var impdesc=descuento*100;
                            }
                            if(cantidad>200000)
                            {
                                alert(cantidad);
                                document.getElementById('diverrorless'+id).style.visibility = "hidden";
                                document.getElementById('diverrorless'+id).style.display = "none";
                                document.getElementById('diverrormore'+id).style.visibility = "visible";
                                document.getElementById('diverrormore'+id).style.display = "block";
                                document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                                document.getElementById('diverrordiv'+id).style.display = "none";
                            }
                        }*/
                    } 
                }
                else
                {
                    document.getElementById('diverrorless'+id).style.visibility = "hidden";
                    document.getElementById('diverrorless'+id).style.display = "none";
                    document.getElementById('diverrormore'+id).style.visibility = "hidden";
                    document.getElementById('diverrormore'+id).style.display = "none";
                    document.getElementById('diverrordiv'+id).style.visibility = "visible";
                    document.getElementById('diverrordiv'+id).style.display = "block";
                }
            }
            if(num.value==0 || num.value=="")
            {
                document.getElementById('diverrorless'+id).style.visibility = "hidden";
                document.getElementById('diverrorless'+id).style.display = "none";
                document.getElementById('diverrormore'+id).style.visibility = "hidden";
                document.getElementById('diverrormore'+id).style.display = "none";
                document.getElementById('diverrordiv'+id).style.visibility = "hidden";
                document.getElementById('diverrordiv'+id).style.display = "none";
                document.getElementById('custom_price'+id).innerText="$0";
                document.getElementById('input_custom_price'+id).value=0;
                document.getElementById('add_to_cart'+id).disabled=true;
                document.getElementById('add_to_cart'+id).className = "button primary";
            }
        }
    </script>
</head>
<body>
<?php include "nav.php"; ?>
    <div id="subnav" class="subnav-tabs">
        <div class="subnav-menu-wrapper" style="--subnav-scroll-left-width:0px; --subnav-scroll-right-width:0px;">
            <div class="subnav-menu">
                <ul class="subnav-menu-tabs">
                    <a class="a-subnav-menu" href="account.php"><li class=" li-subnav ">Summary</li></a>
                    <a class="a-subnav-menu" href="orders.php">        <li class="li-subnav">Orders</li></a>
                    <a class="a-subnav-menu" href="reorder.php" style="color: #202020;" >       <li class="li-subnav active">Reorder</li></a>
                    <a class="a-subnav-menu" href="artworks.php">      <li class="li-subnav">Artworks</li></a> 
                    <a class="a-subnav-menu" href="notifications.php"> <li class="li-subnav">Notifications</li></a>
                </ul>
            </div>
        </div>
    </div>
    <main>
        <?php
        include 'php/conexion_be.php';
        $query_artwork =  "SELECT * FROM artworks WHERE id_user='$id_user'";
        $verificar_coment = mysqli_query($conexion, $query_artwork);
        if(mysqli_num_rows($verificar_coment)==0)
        {
        ?>
            <section style="padding-bottom: 80px;padding-top: 80px;">
                <div class="container wrapper"  style="height: 310px;text-align: center;">
                    <h1 style="font-size: 2.5rem;margin-bottom:0;">Fast & easy reorders</h1>
                    <label for="message" class="labelfiel font-light" style="width: 90%;">After your first order, you can easily reorder any of your prior items. Reorders ship 1 day faster than new orders since they don’t require proof approval</label>   
                </div>
            </section>  
        <?php
        }
        if(mysqli_num_rows($verificar_coment)>0)
        {
            ?>
            <section style="width: 100%;">
                    <div class="container wrapper">
                        <div class="font-light callout" style="font-size: 1rem;text-align: center;">
                            Changes cannot be made to reordered items since they skip the proofing process and go straight to production
                        </div>
                        <div style="display: inline-block;width: 100%;">
                            <div class="col-12 col-md-7 d-inline-block " style="padding-left: 0px;">
                                <h1>Reorder prior items</h1>
                            </div>
                        </div>
                    </div>
            <?php
            while($extraido= mysqli_fetch_array($verificar_coment))
            {
                //id 	id_user 	name_image 	width_inches 	height_inches 	dates 	tipe 	link 
                //id 	id_user 	name_image 	width_inches 	height_inches 	dates 	tipe 	link
                $id             = $extraido['id'];
                $id_user        = $extraido['id_user'];
                $name_image     = $extraido['name_image'];
                $width_inches   = $extraido['width_inches'];
                $height_inches  = $extraido['height_inches'];
                $dates          = $extraido['dates'];
                $tipe           = $extraido['tipe'];
                $link           = $extraido['link'];
                $id_order       = $extraido['id_order'];
                if($_SESSION['measurement']==1)
                {
                    $width_inches  = (round($extraido['width_inches']*25.4))." mm";
                    $height_inches = (round($extraido ['height_inches']*25.4))." mm";
                }
                else{
                    $width_inches  =  $extraido['width_inches']."\"";
                    $height_inches =  $extraido ['height_inches']."\"";
                }
            ?>      
                
                <div class="container wrapper px-0">
                    <div class="" id="item_<?php echo $id; ?>" style="display: flex;">
                        <div class="col-4 col-md-2 px-0">
                            <div class="thumbnail col-12 col-md-9">
                                <span class="image-zoom-target">
                                    <img style=" filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));" alt="<?php echo $tipe; ?>" src="<?php echo $link; ?>.png" width=150px>
                                </span>
                            </div>
                        </div>
                        <div class="col-8 col-md-8 reorder" style="padding-left: 40px;">
                            <div class="col-12 col-md-4">
                                <div class="name">
                                    <form  method="post">
                                        <div class="editing" id="editname<?php echo $id; ?>" style="visibility:hidden;display:none;">
                                            <div aria-live="assertive" class="inputWrapper " role="alert">
                                                <input class="productName" placeholder="Enter name" name="name" type="text" value="<?php echo $name_image; ?>">
                                                <input type="hidden" name="id" type="number" value="<?php echo $id; ?>">
                                            </div>
                                            <div>
                                                <button type="submit" class="button tiny blue edit saveEdit secondary" name="save" value="save">Save</button>
                                                <button class="button tiny grey cancelEdit primary" onclick="CloseEdit(<?php echo $id; ?>)">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                        if(isset($_POST['save']))
                                        {
                                            include 'php/conexion_be.php';
                                            $name = $_POST['name'];
                                            $id_order = $_POST['id'];
                                            //id 	id_user 	name_image 	width_inches 	height_inches 	dates 	tipe 	link
                                            mysqli_query($conexion,"UPDATE artworks SET name_image = '$name' WHERE id='$id_order'");
                                            mysqli_close($conexion);
                                            echo'
                                                <script>
                                                    window.location = "../reorder.php";
                                                </script>
                                                ';                               
                                            exit;
                                            
                                        }
                                    ?>
                                    <span class="name_custom"><?php echo $name_image; ?></span>
                                    <button type="button" class="link only-sm-up edit font-light" onclick="openEdit(<?php echo $id; ?>)">Edit</button>
                                </div>
                                <div class="font-light">Ordered in <a class="link font-light" href="https://acmestickers.com/account/order.php?order=<?php echo $id_order; ?>">AS<?php echo $id_order; ?></a></div>
                                <div class="product_name font-light"><?php echo $tipe; ?></div>
                                <div class="product_dimensions font-light"><?php echo $width_inches; ?> x <?php echo $height_inches; ?></div>
                            </div>
                            <div class="col-8 col-md-5">
                                <div aria-live="assertive" class="inputWrapper " role="alert">
                                    <div id='diverrorless<?php echo $id; ?>' class='tooltiperror' style="visibility:hidden;display:none;">
                                        <span class='arrow'></span>
                                        <span class='text'>Can't be less than 10</span>
                                    </div>
                                    <div id='diverrormore<?php echo $id; ?>' class='tooltiperror' style="visibility:hidden;display:none;">
                                        <span class='arrow'></span>
                                        <span class='text'>Can't be more than 200000</span>
                                    </div>
                                    <div id='diverrordiv<?php echo $id; ?>' class='tooltiperror' style="visibility:hidden;display:none;"><!--editing-->
                                        <span class='arrow'></span>
                                        <span class='text'>Must be a multiple of 10</span>
                                    </div>
                                    <?php
                                        if($tipe == "Die cut stickers") 
                                        {
                                            ?>
                                                <input class="quantity" name="quantity" pattern="[0-9]*" id="quantity<?php echo $id; ?>" placeholder="Enter quantity" type="number" onkeyup="custom_die_cut_stickers(<?php echo $id; ?>,<?php echo $extraido['width_inches']; ?>,<?php echo $extraido['height_inches']; ?>)">
                                            <?php
                                        }
                                        if($tipe == "Circle stickers") 
                                        {
                                            ?>
                                                <input class="quantity" name="quantity" pattern="[0-9]*" id="quantity<?php echo $id; ?>" placeholder="Enter quantity" type="number" onkeyup="custom_circle_stickers(<?php echo $id; ?>,<?php echo $extraido['width_inches']; ?>,<?php echo $extraido['height_inches']; ?>)">
                                            <?php
                                        }
                                        if($tipe == "Rectangle stickers") 
                                        {
                                            ?>
                                                <input class="quantity" name="quantity" pattern="[0-9]*" id="quantity<?php echo $id; ?>" placeholder="Enter quantity" type="number" onkeyup="custom_rectangle_stickers(<?php echo $id; ?>,<?php echo $extraido['width_inches']; ?>,<?php echo $extraido['height_inches']; ?>)">
                                            <?php
                                        }
                                        if($tipe == "Square stickers") 
                                        {
                                            ?>
                                                <input class="quantity" name="quantity" pattern="[0-9]*" id="quantity<?php echo $id; ?>" placeholder="Enter quantity" type="number" onkeyup="custom_square_stickers(<?php echo $id; ?>,<?php echo $extraido['width_inches']; ?>,<?php echo $extraido['height_inches']; ?>)">
                                            <?php
                                        }
                                        if($tipe == "Oval stickers") 
                                        {
                                            ?>
                                                <input class="quantity" name="quantity" pattern="[0-9]*" id="quantity<?php echo $id; ?>" placeholder="Enter quantity" type="number" onkeyup="custom_oval_stickers(<?php echo $id; ?>,<?php echo $extraido['width_inches']; ?>,<?php echo $extraido['height_inches']; ?>)">
                                            <?php
                                        }
                                        if($tipe == "Bumper stickers") 
                                        {
                                            ?>
                                                <input class="quantity" name="quantity" pattern="[0-9]*" id="quantity<?php echo $id; ?>" placeholder="Enter quantity" type="number" onkeyup="custom_bumper_stickers(<?php echo $id; ?>,<?php echo $extraido['width_inches']; ?>,<?php echo $extraido['height_inches']; ?>)">
                                            <?php
                                        }
                                        if($tipe == "Kiss cut stickers") 
                                        {
                                            ?>
                                                <input class="quantity" name="quantity" pattern="[0-9]*" id="quantity<?php echo $id; ?>" placeholder="Enter quantity" type="number" onkeyup="custom_kiss_cut_stickers(<?php echo $id; ?>,<?php echo $extraido['width_inches']; ?>,<?php echo $extraido['height_inches']; ?>)">
                                            <?php
                                        }
                                        if($tipe == "Rounded corner stickers") 
                                        {
                                            ?>
                                                <input class="quantity" name="quantity" pattern="[0-9]*" id="quantity<?php echo $id; ?>" placeholder="Enter quantity" type="number" onkeyup="custom_rounded_corner_stickers(<?php echo $id; ?>,<?php echo $extraido['width_inches']; ?>,<?php echo $extraido['height_inches']; ?>)">
                                            <?php
                                        }
                                        if($tipe == "Stickers sheets") 
                                        {
                                            ?>
                                                <input class="quantity" name="quantity" pattern="[0-9]*" id="quantity<?php echo $id; ?>" placeholder="Enter quantity" type="number" onkeyup="custom_stickers_sheets(<?php echo $id; ?>,<?php echo $extraido['width_inches']; ?>,<?php echo $extraido['height_inches']; ?>)">
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div id="custom_price<?php echo $id; ?>" class="col-4 col-md-2 font-light">$0</div>
                            <form  method="post" class="col-4 col-md-3">
                                <input style="height: 26px;visibility:hidden;display:none;" name="price" type="number" id="input_custom_price<?php echo $id; ?>">
                                <input style="height: 26px;visibility:hidden;display:none;" name="tipe" value="<?php echo $tipe; ?>">
                                <input style="height: 26px;visibility:hidden;display:none;" name="id" type="number" value="<?php echo $id; ?>">
                                <input style="height: 26px;visibility:hidden;display:none;" name="width_inches" value="<?php echo $extraido['width_inches']; ?>">
                                <input style="height: 26px;visibility:hidden;display:none;" name="height_inches" value="<?php echo $extraido['height_inches']; ?>">
                                <input style="height: 26px;visibility:hidden;display:none;" name="quantity" value="" id="quantity_input_<?php echo $id; ?>">
                                <input class="button primary" name="cart" type="submit" style="border-radius: 5px;" id="add_to_cart<?php echo $id; ?>" value="Add to cart" disabled>
                            </form>
                            <?php
                                        if(isset($_POST['cart']))
                                        {
                                            include 'php/conexion_be.php';
                                            $price          = $_POST['price'];
                                            $tipe           = $_POST['tipe'];
                                            $width_inches   = $_POST['width_inches'];
                                            $height_inches  = $_POST['height_inches'];
                                            $quantity       = $_POST['quantity'];
                                            $id             = $_POST['id'];
                                            //id 	id_user 	name_image 	width_inches 	height_inches 	dates 	tipe 	link
                                                                   //id 	id_user 	width_inches 	height_inches 	price 	tipe 	quantity 	id_images 	txt_details 	status 
                                            $query_cart = "INSERT INTO cart (id_user,  width_inches,    height_inches,   price ,  tipe  ,quantity   ,id_images , statusp) 
                                                                    VALUES('$id_user','$width_inches','$height_inches','$price','$tipe','$quantity','$id',       '2')";
                                            $cart= mysqli_query($conexion,$query_cart);
                                            mysqli_close($conexion);
                                            echo'
                                                <script>
                                                    window.location = "../cart.php";
                                                </script>
                                                ';                               
                                            exit;
                                            
                                        }
                                    ?>
                        </div>
                    </div>
                </div>
                
        <?php
            }
            ?>
            </section>
            <?php
        }
        ?>
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
<?php
}
else{
    echo'
    <script>
        window.location = "../login.php";
    </script>
    ';
}
?>