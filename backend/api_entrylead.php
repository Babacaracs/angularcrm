<?php

// specify the REST web service to interact with
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$username = $_GET["username"];
$password = $_GET["password"];
$id = $_GET["id"];

$url = 'http://192.168.20.6/devcrm/service/v4_1/rest.php';

// Open a curl session for making the call
$curl = curl_init($url);

// Tell curl to use HTTP POST

curl_setopt($curl, CURLOPT_POST, true);

// Tell curl not to return headers, but do return the response

curl_setopt($curl, CURLOPT_HEADER, false);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

 

// Set the POST arguments to pass to the Sugar server

$parameters = array(

    'user_auth' => array(

        'user_name' =>$username,

        'password' => md5($password),

        ),

    );

$json = json_encode($parameters);
$postArgs = array(
    'method' => 'login',
    'input_type' => 'JSON',
    'response_type' => 'JSON',
    'rest_data' => $json,
    );
curl_setopt($curl, CURLOPT_POSTFIELDS, $postArgs);
 
// Make the REST call, returning the result
$response = curl_exec($curl);
// Convert the result from JSON format to a PHP array
$result = json_decode($response);
if ( !is_object($result) ) {
    die("Error handling result.\n");
}
if ( !isset($result->id) ) {
    die("Error: {$result->name} - {$result->description}\n.");
}
// Echo out the session id
//echo $result->id."<br />";

$session = $result->id;
// Let us fetch detail of a Lead


$parameters = array(

    'session' => $session,                                 //Session ID
    'module_name' => 'Leads',                             //Module name
    'id' => $id,   //Where condition without "where" keyword
    'select_fields' => array(), //The list of fields to be returned in the results
    'link_name_to_fields_array' => array(),
    'order_by' => "",                 //$order_by
    'offset'  => 0,                                               //offset
    // 'select_fields' => $fields_array,                      //select_fields
    // 'link_name_to_fields_array' => array(array()),//optional
    'max_results' =>9999,                                        //max results                  
    'deleted' => 'false',                                        //deleted
);

$json = json_encode($parameters);

$postArgs = array(
    'method' => 'get_entry',
    'input_type' => 'JSON',
    'response_type' => 'JSON',
    'rest_data' => $json,
    );

curl_setopt($curl, CURLOPT_POSTFIELDS, $postArgs);

$response = curl_exec($curl);

// Convert the result from JSON format to a PHP array
echo($response);
die;