<?php
include_once('functions/connect.php');

$phoneNumber = $_POST['from'];
$phone = $_REQUEST['from'];



$curl = curl_init();
$url = "https://a2p-api.megalabs.ru/sms/v1/sms";
$login = "CNT_ddmtlrs";
$password = "g27T9pug";

$from = $_REQUEST['from'];
$text = $_REQUEST['message'];

//$post_string = json_encode(array('from'=>'daidorussia', 'to'=>79101052000, 'message'=>'test'));
$post_string = array(
  'from' => "$phone"
);

curl_setopt($curld, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_string);
curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
curl_setopt($curl, CURLOPT_USERPWD, $login. ":" . $password);
curl_setopt($curl, CURLOPT_FAILONERROR, 1);
curl_setopt($curl, CURLOPT_TIMEOUT, 15);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($curl); 
var_dump ($result);
curl_close($curl);

// $str = '{
//   "from":"fff",
//   "to": "79101052000",
//   "message":"test",
//   "callback_url": "http://www.itest/sms_callback"
// }';
//$data = (array) json_decode(stripslashes($_POST["jsonData"]));
//$response = 'Получено параметров '.count($data).'\n';
//foreach ($data as $key=>$value) {
//    $response .= 'Параметр: '.$key.'; Значение: '.$value.'\n';
//}

//$cart = json_decode( $str, TRUE ); //Декодируем их в json
//$phone=$cart['from'];
//$message=$cart['message'];
var_dump($phoneNumber);
var_dump ($phone);
var_dump ($text);
//echo("Your phone number is: ".$phone);
//foreach ($cart->channels as $channel) {
    //echo $channel->from;
//}

$sql = mysqli_query($conn, "INSERT INTO test (code, phoneNumber, phone) VALUES ('$text', '$from', '$phone')");

//$query = array();
//$i = 0;
//foreach($arr as $table => $data){
//    $query[$i] = "INSERT INTO `".`fake`."` SET ";
//    $tmp = array();
//    foreach($data as $field => $val){
//        $tmp[] = "`".$field."` = '".$val."'";
//    }
//    $query[$i] .= implode(', ', $tmp);
//    $i++;
//}

?>
