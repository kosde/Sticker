<?php
    session_start();
    $_SESSION['billing']=1;
    $datezone=date_default_timezone_get();
    $country_id     = $_GET["country_id"];
    $name           = $_GET["name"];
    $company        = $_GET["company"];
    $locality       = $_GET["locality"];
    $state          = $_GET["state"];
    $stateUS        = $_GET["stateUS"];
    $address1       = $_GET["address1"];
    $address2       = $_GET["address2"];
    $zipcode        = $_GET["zipcode"];
    $email          = $_GET["email"];
    $delivery_date  = $_GET["deliverytime"];
    $id_dir_id      = $_GET["ID"];
    if(isset($_GET["billing_address"]))
    {
        $country_id_billing     = $country_id;
        $name_billing           = $name;
        $company_billing        = $company;
        $locality_billing       = $locality;
        if($state!=null)
            $state_billing          = $state;
        else
            $state_billing        = $stateUS;
        $address1_billing       = $address1;
        $address2_billing       = $address2;
        $zipcode_billing        = $zipcode;
        $email_billing          = $email;
    }else{
            $country_id_billing     = $_GET["country_id_billing"];
            $name_billing           = $_GET["name_billing"];
            $company_billing        = $_GET["company_billing"];
            $locality_billing       = $_GET["locality_billing"];
            $state_billing          = $_GET["state_billing"];
            $address1_billing       = $_GET["address1_billing"];
            $address2_billing       = $_GET["address2_billing"];
            $zipcode_billing        = $_GET["zipcode_billing"];
            $email_billing          = $_GET["email_billing"];
            }
    include '../php/conexion_be.php';
    
    $id_user = $_SESSION['id']; 
    if($state!=null)
    $query_address = "INSERT INTO billing_address (  id_user,   country,      full_name,  company,   street_address1 ,street_address2, city,	   zip_code,  statedir)
                                    VALUES    ('$id_user','$country_id','$name',    '$company','$address1',     '$address2',     '$locality','$zipcode', '$state')";
    if($stateUS!=null)
    $query_address = "INSERT INTO billing_address (  id_user,   country,      full_name,  company,   street_address1 ,street_address2, city,	   zip_code,  statedir)
                                    VALUES    ('$id_user','$country_id','$name',    '$company','$address1',     '$address2',     '$locality','$zipcode', '$stateUS')";
    $address_result = mysqli_query($conexion,$query_address);
    mysqli_close($conexion); //$delivery_date  = $_GET["deliverytime"];
    echo'
    <script>
        window.location = "../account.php";
    </script>
    ';
?>