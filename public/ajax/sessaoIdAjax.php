<?php

$url = "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions?email=santosalison561@gmail.com&token=E4BD7FEBE1A84ACC981CBD763F000044";

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POST, 1);

$curl = curl_exec($curl);

$curl = json_encode(simplexml_load_string($curl));

die($curl);