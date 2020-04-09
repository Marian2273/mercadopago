<?php 
include_once('vendor/autoload.php');
MercadoPago\SDK::setClientId("8802353176178375");
MercadoPago\SDK::setClientSecret("Dd9MJwzUBuLZ2Wzej8V7gkkJkit2gFMH");

$email="constance_gaylord@yahoo.com";

$preference = new MercadoPago\Preference();
  
# Building an item

$item = new MercadoPago\Item();
$item->id = "00001";
$item->title = "item"; 
$item->quantity = 1;
$item->unit_price = 100;

$preference->items = array($item);

//Datos del Usuario 

$payer = new MercadoPago\Payer();
$payer->email = $email;
# Return the HTML code for button
$preference->back_urls = array(
                "success" => "http://localhost:8888/Gordi/mercadopago/success.php",
                "failure" => "http://localhost:8888/Gordi/mercadopago/failure.php",
                "pending" => "http://localhost:8888/Gordi/mercadopago/pending.php"
            );
$preference->auto_return = "approved";
$preference->payer = $payer;

$preference->save(); # Save the preference and send the HTTP Request to create
echo "<a href='$preference->sandbox_init_point' > Reservar Turno  </a>";

?>


