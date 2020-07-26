<?php
include 'mp_data.php';
MercadoPago\SDK::setAccessToken($access_token);


$preference = new MercadoPago\Preference();

$preference->back_urls = array(
    "success" => "./detail.php",
    "failure" => "./detail.php",
    "pending" => "./detail.php"
);

$preference->auto_return = "approved";
$preference->external_reference = "ABC999999";
// $preference->notification_url = "notificaciones.php";
$preference->notification_url = "https://b96b262b908bfcdb7e3f5feb3c54d352.m.pipedream.net";
$preference->payment_methods = array(
    "excluded_payment_methods" => array(
        array("id" => "amex")
    ),
    "excluded_payment_types" => array(
        array("id" => "atm")
    ),
    "installments" => 6
);

$image_url = './' . trim($_POST['img'], '.');

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->id = 1234;
$item->title = $_POST['title'];
$item->description = "Dispositivo móvil de Tienda e-commerce";
$item->quantity = $_POST['unit'];
$item->unit_price = $_POST['price'];
$item->picture_url = $image_url;
$preference->items = array($item);

$payer = new MercadoPago\Payer();
$payer->name = "Lalo";
$payer->surname = "Landa";
$payer->email = "test_user_63274575@testuser.com";
$payer->phone = array(
    "area_code" => "11",
    "number" => "22223333"
);

$payer->identification = array(
    "type" => "DNI",
    "number" => "12345678"
);

$payer->address = array(
    "street_name" => "False",
    "street_number" => 123,
    "zip_code" => "1111"
);

$preference->payer = $payer;
$preference->save();