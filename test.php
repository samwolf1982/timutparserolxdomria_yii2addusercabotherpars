<?php

    ini_set('display_errors', 'on');
    error_reporting(E_ALL);
    set_time_limit(0);
    require "vendor/autoload.php";

    use GuzzleHttp\Client;
    use Psr\Http\Message\ResponseInterface;
    use GuzzleHttp\Exception\RequestException;
    use GuzzleHttp\Exception\ClientException;



// установка URL и других необходимых параметров
//curl_setopt($ch, CURLOPT_URL, "http://budovanova.com.ua/frontend/web/index.php?r=roomstoday/after_uploading&key=999");

// $username='Оля';
// $password='111111111';



//login form action url
$url="http://budovanova.com.ua/frontend/web/index.php?r=roomstoday/uploading&key=999";
$url="http://localhost3/frontend/web/index.php?r=roomstoday/uploading&key=999"; 
$url="http://localhost3/frontend/web/index.php?r=roomstoday/put";
// $url="http://localhost3/frontend/web/index.php"; 
$url="http://localhost3/frontend/web/index.php?r=api/put";
$url="http://localhost3/frontend/web/index.php?r=api/put&key=999";

$url="http://budovanova.com.ua/frontend/web/index.php?r=api/put";
$url="http://budovanova.com.ua/frontend/web/index.php?r=api/put&key=999";
//$url="http://localhost3/frontend/web/index.php?r=api/put";



use GuzzleHttp\Psr7\Request;

$client = new GuzzleHttp\Client();


// $client = new Client([
//     'headers' => [ 'Content-Type' => 'application/json' ]
// ]);
$client = new Client();
$id=[70506,70511,70510,70509];
$key=999;
$response = $client->get($url, [
    'json' => [ 'key'=>$key,'id'=> $id ]
]);
// $id=[4,5,6,78,90];
// $response = $client->put($url, [
//     'json'    =>[ 'id_list'=>$id]
// ]);



// Create a client with a base URI

// Send a request to https://foo.com/api/test

//$response = $client->send($request, ['timeout' => 300]);
//echo  json_decode($response->getBody(),true);

 print_r( json_decode($response->getBody(), true));

die();






die();
//$url="http://budovanova.com.ua/frontend/web/";

// $postinfo = "email=".$username."&password=".$password;
//$url='http://php.net/manual/ru/curl.examples-basic.php';
// $url = 'http://localhost:8080/stocks';

//send_post($url);
$header = array(
"Content-type: application/pdf",
"Cache-Control: no-cache",
"Pragma: no-cache"
);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_PUT, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

$fh_res = $query = '{ "@queryid" : 1234 }';


curl_setopt($ch, CURLOPT_INFILE, $fh_res);
// curl_setopt($ch, CURLOPT_INFILESIZE, filesize($file_path_str));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$curl_response_res = curl_exec ($ch);
// the answer is similar to {"ok":true,"id":"MYCODE","rev":"3-6e8cb7a70206c31a8f0dab27b3b25353"}



curl_close($ch);


die();


$headers = array(
    'Accept: application/json',
    'Content-Type: application/json',
);

$query = '{ "@queryid" : 1234 }';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
// curl_setopt($ch, CURLOPT_USERPWD, "user:password");

curl_setopt($ch, CURLOPT_PUT, 1);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);

// curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
 curl_setopt($ch, CURLOPT_INFILESIZE, strlen($query));

$output = curl_exec($ch);

echo $output;                            
                                                                                                                     
// $result = curl_exec($ch);
// $data = curl_exec($ch);
// curl_close($ch);
// echo $data;
       // $url = $this->base_uri."/api/v2/book/{$code_responce['code']}";
      // $url= $this->base_uri.$this->type_api['dinamic'];
       //--  /api/v2/search
   
die("");
    $ch = curl_init();
//create str


// $str=$pax; // end &
// foreach ($param as $key => $value) {
//         $str.="&{$key}={$value}";
// }
//  $url.='?'.$str;

    


    curl_setopt($ch, CURLOPT_URL, $url );

    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    curl_setopt($ch, CURLOPT_USERPWD, $username.":".$password); //Your credentials goes here

 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
   //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));


                     
//die(var_dump( $str,true));
   // curl_setopt($ch, CURLOPT_POSTFIELDS,
   //          $str);


    $data = curl_exec($ch);



  
    curl_close($ch);

    return json_decode( $data);





     function send_post($url)
    {
    $ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);
echo $data;	
    }
?>