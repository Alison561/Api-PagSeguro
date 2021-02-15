<?php


$data = [
    'email'=>'santosalison561@gmail.com',  
    'token'=>'E4BD7FEBE1A84ACC981CBD763F000044',
    'paymentMode' => 'default', 
    'paymentMethod' => 'creditCard',  # ou BOLETO ou ONLINE_DEBIT
    'receiverEmail' => 'santosalison561@gmail.com',
    'currency' => 'BRL',
    // 'extraAmount' => '1.00',
    'itemId1' => '1',
    'itemDescription1' => 'Camiseta',  
    'itemAmount1' => '200.00',  
    'itemQuantity1' => 1,
    'notificationURL' => 'https://www.cursos.dankicode.com',
    'reference'=> uniqid(),
    
    //pegar dinamicamente
    'senderName'                => 'Bruce Wayne',
    'senderCPF'                 => '54793120652',
    'senderAreaCode'            => 83,
    'senderPhone'               => '999999999',
    'senderEmail'               => 'email@sandbox.pagseguro.com.br',
    
    'senderHash'                => $_POST["hash"],
    
    
    'shippingAddressStreet'     => 'Address',
    'shippingAddressNumber'     => '1234',
    'shippingAddressDistrict'   => 'Bairro',
    'shippingAddressPostalCode' => '58075000',
    'shippingAddressCity'       => 'Brasília',
    'shippingAddressState'      => 'DF',
    'shippingAddressCountry'    => 'BRA',
    
    'shippingType'              => 3,
    'shippingCost'              => '0.00',
    
    'creditCardToken'=>$_POST['cardtoken'],
    
    'installmentQuantity'       => '1', # Número de parcelas
    'installmentValue'          => '200.00', # Valor da parcela
    'noInterestInstallmentQuantity' => '4',

    'creditCardHolderName'      => 'BRUCE WAYNE',
    'creditCardHolderCPF'       => '54793120652',
    'creditCardHolderBirthDate' => '01/01/1990',
    'creditCardHolderAreaCode'  => 61,
    'creditCardHolderPhone'     => '999999999',

    'billingAddressStreet'     => 'Address',
    'billingAddressNumber'     => '1234',
    'billingAddressDistrict'   => 'Bairro',
    'billingAddressPostalCode' => '58075000',
    'billingAddressCity'       => 'Brasília',
    'billingAddressState'      => 'DF',
    'billingAddressCountry'    => 'BRA'
];


$query = http_build_query($data);
$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8'
));
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $query);

$retorno = curl_exec($curl);
$xml = json_encode(simplexml_load_string($retorno));

die($xml);