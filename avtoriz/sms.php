<?
$login = '470541099@mail.ru';	
$key   = 'wOUZXN5ulnsP5XHuA7OMD1MgU2Qj';	
$sign  = 'SMS Aero';	
//$phone = '+7 (903) 123-45-67';   
//$text  = 'Текст SMS';
 
$phone = preg_replace('/[^0-9]/', '', $phone);
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_USERPWD, $login . ':' . $key);
curl_setopt($ch, CURLOPT_URL, 'https://gate.smsaero.ru/v2/sms/send?number=' . $phone . '&text=' . urlencode($text) . '&sign=' . $sign);
$res = curl_exec($ch);
curl_close($ch);
 
$array = json_decode($json, true);
//print_r($res);
?>