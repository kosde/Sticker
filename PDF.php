<?php
session_start();
$id_order  = $_GET["order"];
require_once __DIR__ . '/vendor/autoload.php';
include 'php/conexion_be.php';
$date2 = date_create($date);
$year = date_format($date2,"Y");
$hoy = date("F j, Y");  
$result = mysqli_query($conexion,"SELECT * FROM orders WHERE id='$id_order'");
if(mysqli_num_rows($result)>0)
{
    $extraido = mysqli_fetch_array($result);
    $id            = $extraido['id'];
    $id_user       = $extraido ['id_user'];
    $width_inches  = $extraido['width_inches'];
    $height_inches = $extraido ['height_inches'];
    $price         = $extraido['price'];
    $tipe          = $extraido ['tipe'];
    $quantity      = $extraido['quantity'];
    $id_images     = $extraido ['id_images'];
    $txt_details   = $extraido['txt_details'];
    $date          = $extraido['dates'];
    $statusp       = $extraido['statusp'];
    $id_address    = $extraido['id_address'];
    $delivery_date = $extraido['delivery_date'];
    $shipping      = $extraido['shipping'];
    $id_billing    = $extraido['id_billing'];
    $taxes         = $extraido['taxes'];
    $shipping_price= $extraido['shipping_price'];
    $total         = $extraido['total'];
    if($_SESSION['measurement']==1)
    {
        $width_inches  = (round($extraido['width_inches']*25.4))." mm";
        $height_inches = (round($extraido ['height_inches']*25.4))." mm";
    }
    else{
        $width_inches  =  $extraido['width_inches']."\"";
        $height_inches =  $extraido ['height_inches']."\"";
    }
} 
$validar  = mysqli_query($conexion,"SELECT * FROM address_t  WHERE id='$id_address'");
if(mysqli_num_rows($validar)>0)
{
    $extraido2= mysqli_fetch_array($validar);
    $id_a              = $extraido2['id'];
    $id_user_a         = $extraido2['id_user'];
    $country_a         = $extraido2['country'];
    $full_name_a       = $extraido2['full_name'];
    $company_a         = $extraido2['company'];
    $street_address1_a = $extraido2['street_address1'];
    $street_address2_a = $extraido2['street_address2'];
    $city_a            = $extraido2['city'];
    $zip_code_a        = $extraido2['zip_code'];
    $statedir_a        = $extraido2['statedir'];
}
if($country_a=="US")
{
    $country_a="United States";
}
if($country_a=="MX")
{
    $country_a="Mexico";
}
$validar2  = mysqli_query($conexion,"SELECT * FROM billing_address  WHERE id='$id_billing'");
if(mysqli_num_rows($validar2)>0)
{
    $extraido3= mysqli_fetch_array($validar2);
    $id_b              = $extraido3['id'];
    $id_user_b         = $extraido3['id_user'];
    $country_b         = $extraido3['country'];
    $full_name_b       = $extraido3['full_name'];
    $company_b         = $extraido3['company'];
    $street_address1_b = $extraido3['street_address1'];
    $street_address2_b = $extraido3['street_address2'];
    $city_b            = $extraido3['city'];
    $zip_code_b        = $extraido3['zip_code'];
    $statedir_b        = $extraido3['statedir'];
}
if($country_b=="US")
{
    $country_b="United States";
}
if($country_b=="MX")
{
    $country_b="Mexico";
}

//$total = $price + $shipping;
$mpdf = new \Mpdf\Mpdf();
$stylesheet = file_get_contents('PDF.css');
$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
if($tipe!="Sample")
{
    $mpdf->WriteHTML(
        '
                    
                            <table style="width:100%;font-family:\'gotham-medium\'">
                                <tr style="font-family:\'gotham-medium\'">
                                    <th>    <img src="/assets/IconoBN.png" width="80" height="70">  </th>
                                    <th>   <p style="color: #102542;">Acme<strong style="color: #cdd7d6;">Stickers</strong></p> </th>
                                    <th style="width:52%;"> </th>
                                    <th style="width:30%;font-family:\'gotham-light\';">Receipt '.$hoy.' <br>  Order AS'.$id_order.'</th>
                                </tr>
                            </table> 
                            <div style="padding-top:50px;"></div>
                            <div style="border-radius: 5px;border: 1px solid #cdd7d6;padding-top:30px;padding-bottom:30px;">
                                <table style="width:100%">
                                    <tr>
                                        <th style="text-align: left;padding-left:30px;">Billing address</th>
                                        <th style="text-align: left;padding-left:100px;">Shipping address</th>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;padding-left:30px;">'.$full_name_b.'</td>
                                        <td style="text-align: left;padding-left:100px;">'.$full_name_a.'</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;padding-left:30px;">'.$street_address1_b." ".$street_address2_b.'</td>
                                        <td style="text-align: left;padding-left:100px;">'.$street_address1_a." ".$street_address2_a.'</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;padding-left:30px;">'.$city_b.'</td>
                                        <td style="text-align: left;padding-left:100px;">'.$city_a.'</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;padding-left:30px;">'.$statedir_b." ".$zip_code_b.'</td>
                                        <td style="text-align: left;padding-left:100px;">'.$statedir_a." ".$zip_code_a.'</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;padding-left:30px;">'.$country_b.'</td>
                                        <td style="text-align: left;padding-left:100px;">'.$country_a.'</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;padding-left:30px;">'.$company_b.'</td>
                                        <td style="text-align: left;padding-left:100px;">'.$company_a.'</td>
                                    </tr>
                                </table> 
                            </div>
                            <div style="padding-top:30px;"></div>
                            <div style="border-radius: 5px;border: 1px solid #cdd7d6;padding-top:30px;padding-bottom:30px;">
                                <table style="width:100%">
                                    <tr>
                                        <th style="text-align: left;padding-left:30px;">Item</th>
                                        <th style="text-align: right;">Quantity</th>
                                        <th style="text-align: right;padding-right:30px;">Cost</th>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;padding-left:30px;">'.$width_inches." x ".$height_inches.' '.$tipe.'</td>
                                        <td style="text-align: right;">'.$quantity.'</td>
                                        <td style="text-align: right;padding-right:30px;">$'.$price.'</td>
                                    </tr>
                                </table> 
                            </div>
                            <div style="padding-top:50px;"></div>
                            <div style="text-align: right;">
                            <table style="width:100%">
                                    <tr>
                                        <th style="text-align: right;">Subtotal</th>
                                        <td style="text-align: right;">$'.$price.'</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: right;">Shipping</th>
                                        <td style="text-align: right;">$'.$shipping_price.'</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: right;">Sales tax</th>
                                        <td style="text-align: right;">$'.$taxes.'</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: right;">Order total</th>
                                        <td style="text-align: right;">$'.$total.'</td>
                                    </tr>
                                </table> 
                            </div>
        ');
}else{
    $mpdf->WriteHTML(
        '
                    
                            <table style="width:100%;font-family:\'gotham-medium\'">
                                <tr style="font-family:\'gotham-medium\'">
                                    <th>    <img src="/assets/IconoBN.png" width="80" height="70">  </th>
                                    <th>   <p style="color: #102542;">Acme<strong style="color: #cdd7d6;">Stickers</strong></p> </th>
                                    <th style="width:52%;"> </th>
                                    <th style="width:30%;font-family:\'gotham-light\';">Receipt '.$hoy.' <br>  Order AS'.$id_order.'</th>
                                </tr>
                            </table> 
                            <div style="padding-top:50px;"></div>
                            <div style="border-radius: 5px;border: 1px solid #cdd7d6;padding-top:30px;padding-bottom:30px;">
                                <table style="width:100%">
                                    <tr>
                                        <th style="text-align: left;padding-left:30px;">Billing address</th>
                                        <th style="text-align: left;padding-left:100px;">Shipping address</th>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;padding-left:30px;">'.$full_name_b.'</td>
                                        <td style="text-align: left;padding-left:100px;">'.$full_name_a.'</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;padding-left:30px;">'.$street_address1_b." ".$street_address2_b.'</td>
                                        <td style="text-align: left;padding-left:100px;">'.$street_address1_a." ".$street_address2_a.'</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;padding-left:30px;">'.$city_b.'</td>
                                        <td style="text-align: left;padding-left:100px;">'.$city_a.'</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;padding-left:30px;">'.$statedir_b." ".$zip_code_b.'</td>
                                        <td style="text-align: left;padding-left:100px;">'.$statedir_a." ".$zip_code_a.'</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;padding-left:30px;">'.$country_b.'</td>
                                        <td style="text-align: left;padding-left:100px;">'.$country_a.'</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;padding-left:30px;">'.$company_b.'</td>
                                        <td style="text-align: left;padding-left:100px;">'.$company_a.'</td>
                                    </tr>
                                </table> 
                            </div>
                            <div style="padding-top:30px;"></div>
                            <div style="border-radius: 5px;border: 1px solid #cdd7d6;padding-top:30px;padding-bottom:30px;">
                                <table style="width:100%">
                                    <tr>
                                        <th style="text-align: left;padding-left:30px;">Item</th>
                                        <th style="text-align: right;">Quantity</th>
                                        <th style="text-align: right;padding-right:30px;">Cost</th>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;padding-left:30px;">'.$tipe.'</td>
                                        <td style="text-align: right;">1</td>
                                        <td style="text-align: right;padding-right:30px;">$'.$price.'</td>
                                    </tr>
                                </table> 
                            </div>
                            <div style="padding-top:50px;"></div>
                            <div style="text-align: right;">
                            <table style="width:100%">
                                    <tr>
                                        <th style="text-align: right;">Subtotal</th>
                                        <td style="text-align: right;">$'.$price.'</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: right;">Shipping</th>
                                        <td style="text-align: right;">$'.$shipping.'</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: right;">Order total</th>
                                        <td style="text-align: right;">$'.$total.'</td>
                                    </tr>
                                </table> 
                            </div>
        ');
}
$mpdf->SetHTMLFooter('
<table width="100%">
    <tr>
        <td>Acme Stickers, LLC</td>
    </tr>
    <tr>
        <td width="50%">734 W. Jefferson Blvd Dallas, TX 75208</td>
        <td width="50%" style="text-align: right;">acmestickers.com</td>
    </tr>
</table>');
$mpdf->Output();
?>  