<?php

	ini_set('display_errors',1);

	ini_set('display_startup_erros',1);

	error_reporting(E_ALL);

	require_once "lib/mercadopago.php";

	//$mp = new MP("Set your access token long live");
	$mp = new MP("TEST-965092596337269-040110-05d4434e7ee6455441e5a0a40cc719b1__LB_LD__-210013454");

	$mp->sandbox_mode(TRUE);

	$payment_preference = array(
		"token"=> $_REQUEST['token'],
		"installments"=> (int)$_REQUEST['installmentsOption'],
		"transaction_amount"=> 50,
		"external_reference"=> "order code 1234xxxx",
		"binary_mode" => true,
		"description"=> "Teste payments v1",
		"payment_method_id"=> $_REQUEST['paymentMethodId'],
		"statement_descriptor" => "*MEUTESTE",
		"binary_mode" => true ,
		
		"payer"=> array(
			"email"=> "test_user_338093@testuser.com"
		),
		"additional_info"=>  array(
			"items"=> array(array(
				
					"id"=> "1234",
					"title"=> "Aqui coloca os itens do carrinho",
					"description"=> "Produto Teste novo",
					"picture_url"=> "https=>//google.com.br/images?image.jpg",
					"category_id"=> "others",
					"quantity"=> 1,
					"unit_price"=> 50
				)
			),
			"payer"=>  array(
				"first_name"=> "João",
				"last_name"=> "Silva",
				"registration_date"=> "2014-06-28T16:53:03.176-04:00",
				"phone"=>  array(
					"area_code"=> "5511",
					"number"=> "3222-1000"
				),
				"address"=>  array(
					"zip_code"=> "05303-090",
					"street_name"=> "Av. Queiroz Filho",
					"street_number"=> "213"
				)
			),
			"shipments"=>  array(
				"receiver_address"=>  array(
					"zip_code"=> "05303-090",
					"street_name"=> "Av. Queiroz Filho",
					"street_number"=> "213",
					"floor"=> "0",
					"apartment"=> "0"
				)
			)
		)
	  );

	  
	$response_payment = $mp->post("/v1/payments/", $payment_preference);

echo "<pre>";
print_r($response_payment);
echo "</pre>";


?>

