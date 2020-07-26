<?php
include 'mp_data.php';
MercadoPago\SDK::setAccessToken($access_token);

$payment_id = $_POST["payment_id"];

$cURLConnection = curl_init();
curl_setopt($cURLConnection, CURLOPT_URL, "https://api.mercadopago.com/v1/payments/$payment_id?access_token=$access_token");
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($cURLConnection);
curl_close($cURLConnection);

$jsonResponse = json_decode($response);

$order_id = $jsonResponse->order->id;
$payment_method_id = $jsonResponse->payment_method_id;
$transaction_amount = $jsonResponse->transaction_amount;

?>

<h2 style="color: green">El pago se realizó con éxito!<br>¡Gracias por su compra!</h2>
<br>
<p> Detalles del pago:<br>
ID de pago de MercadoPago: <?= $payment_id ?><br>
Número de órden del pedido: <?= $order_id ?><br>
payment_method_id: <?= $payment_method_id ?><br>
Monto pagado: <?= $transaction_amount ?><br>
</p>
<br>
<form>
    <button type="submit" class="mercadopago-button" formaction="./index.php">Volver a la tienda</button>                                                    
</form>

