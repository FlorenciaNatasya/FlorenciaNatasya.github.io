<?php

$q = base64_encode("SB-Mid-server-4qyA_1VhziYrr7oG4uiUHWGt".":");

// $opts = [
//     "https" => [
//         "method" => "POST",
//         "header" => "Accept: application/json\r\n" .
//             "Content-Type: application/json\r\n".
//             "Authorization: Basic". $q."\r\n"
//     ]
// ];

// $context = stream_context_create($opts);

// $file = file_get_contents('https://api.sandbox.midtrans.com/v1/payment-links', false, $context);
$vars = [
    'transaction_details' => [
        'order_id' => '0002',
        'gross_amount' => '1000'
    ],
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://api.sandbox.midtrans.com/v1/payment-links");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($vars));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = [
    
    'Accept: application/json',
    'Content-Type: application/json',
    'Authorization: Basic ' . $q
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$server_output = curl_exec ($ch);

curl_close ($ch);

print_r(json_decode($server_output, true)['payment_url']);

?>

<pre>
    <?php
    // print_r($file);
    ?>
</pre>