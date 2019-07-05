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
$curl2= curl_init($url);
$curl3= curl_init($url);
$curl4= curl_init($url);
$curl5= curl_init($url);
$curl6= curl_init($url);
$curl7= curl_init($url);
$curl8= curl_init($url);



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

$fields_array = array('id','first_name','last_name','email1','title');

$parameters = array(

    'session' => $session,                                 //Session ID
    'module_name' =>'Contacts',                       //Module name
    'module_id' =>'2b44efa9-6881-fdcc-5ae8-5d1c8b6f54a9',   //Where condition without "where" keyword
    'link_field_name'=>'cases',
    'related_module_query' => '',
    'related_fields' => array('id'), // 'select_fields' => $fields_array,    
    // 'link_name_to_fields_array' => array(array()),//optional           
 //For every related bean returned, specify link field names to field information.
 'related_module_link_name_to_fields_array' => array(),

//To exclude deleted records
'deleted'=> '0',

//order by
'order_by' => '',

//offset
'offset' => 0,

//limit
'limit' => 25,                                        //deleted
);
$parameters2 = array(

    'session' => $session,                                 //Session ID
    'module_name' =>'Contacts',                       //Module name
    'module_id' =>'2b44efa9-6881-fdcc-5ae8-5d1c8b6f54a9',   //Where condition without "where" keyword
    'link_field_name'=>'contacts_documents_1',
    'related_module_query' => '',
    'related_fields' => array('id'), // 'select_fields' => $fields_array,    
    // 'link_name_to_fields_array' => array(array()),//optional           
 //For every related bean returned, specify link field names to field information.
 'related_module_link_name_to_fields_array' => array(),

//To exclude deleted records
'deleted'=> '0',

//order by
'order_by' => '',

//offset
'offset' => 0,

//limit
'limit' => 25,                                        //deleted
);
 $parameters3 = array(

    'session' => $session,                                 //Session ID
    'module_name' =>'Contacts',                       //Module name
    'module_id' =>'2b44efa9-6881-fdcc-5ae8-5d1c8b6f54a9',   //Where condition without "where" keyword
    'link_field_name'=>'rl_role_connexion_contacts',
    'related_module_query' => '',
    'related_fields' => array('id'), // 'select_fields' => $fields_array,    
    // 'link_name_to_fields_array' => array(array()),//optional           
 //For every related bean returned, specify link field names to field information.
 'related_module_link_name_to_fields_array' => array(),

 //To exclude deleted records
 'deleted'=> '0',

 //order by
 'order_by' => '',

 //offset
 'offset' => 0,

 //limit
 'limit' => 25,                                        //deleted
 );
 $parameters4 = array(

    'session' => $session,                                 //Session ID
    'module_name' =>'Contacts',                       //Module name
    'module_id' =>'2b44efa9-6881-fdcc-5ae8-5d1c8b6f54a9',   //Where condition without "where" keyword
    'link_field_name'=>'bugs',
    'related_module_query' => '',
    'related_fields' => array('id'), // 'select_fields' => $fields_array,    
    // 'link_name_to_fields_array' => array(array()),//optional           
 //For every related bean returned, specify link field names to field information.
 'related_module_link_name_to_fields_array' => array(),

 //To exclude deleted records
 'deleted'=> '0',

 //order by
 'order_by' => '',

 //offset
 'offset' => 0,

 //limit
 'limit' => 25,                                        //deleted
 );

 $parameters5 = array(

    'session' => $session,                                 //Session ID
    'module_name' =>'Contacts',                       //Module name
    'module_id' =>'2b44efa9-6881-fdcc-5ae8-5d1c8b6f54a9',   //Where condition without "where" keyword
    'link_field_name'=>'project',
    'related_module_query' => '',
    'related_fields' => array('id'), // 'select_fields' => $fields_array,    
    // 'link_name_to_fields_array' => array(array()),//optional           
 //For every related bean returned, specify link field names to field information.
 'related_module_link_name_to_fields_array' => array(),

 //To exclude deleted records
 'deleted'=> '0',

 //order by
 'order_by' => '',

 //offset
 'offset' => 0,

 //limit
 'limit' => 25,                                        //deleted
 );

 $parameters6 = array(

    'session' => $session,                                 //Session ID
    'module_name' =>'Contacts',                       //Module name
    'module_id' =>'2b44efa9-6881-fdcc-5ae8-5d1c8b6f54a9',   //Where condition without "where" keyword
    'link_field_name'=>'leads',
    'related_module_query' => '',
    'related_fields' => array('id'), // 'select_fields' => $fields_array,    
    // 'link_name_to_fields_array' => array(array()),//optional           
 //For every related bean returned, specify link field names to field information.
 'related_module_link_name_to_fields_array' => array(),

 //To exclude deleted records
 'deleted'=> '0',

 //order by
 'order_by' => '',

 //offset
 'offset' => 0,

 //limit
 'limit' => 25,                                        //deleted
 );

 $parameters7 = array(

    'session' => $session,                                 //Session ID
    'module_name' =>'Contacts',                       //Module name
    'module_id' =>'2b44efa9-6881-fdcc-5ae8-5d1c8b6f54a9',   //Where condition without "where" keyword
    'link_field_name'=>'opportunities',
    'related_module_query' => '',
    'related_fields' => array('id'), // 'select_fields' => $fields_array,    
    // 'link_name_to_fields_array' => array(array()),//optional           
 //For every related bean returned, specify link field names to field information.
 'related_module_link_name_to_fields_array' => array(),

 //To exclude deleted records
 'deleted'=> '0',

 //order by
 'order_by' => '',

 //offset
 'offset' => 0,

 //limit
 'limit' => 25,                                        //deleted
 );

 $parameters8 = array(

    'session' => $session,                                 //Session ID
    'module_name' =>'Contacts',                       //Module name
    'module_id' =>'2b44efa9-6881-fdcc-5ae8-5d1c8b6f54a9',   //Where condition without "where" keyword
    'link_field_name'=>'contact_notes_parent',
    'related_module_query' => '',
    'related_fields' => array('name'), // 'select_fields' => $fields_array,    
    // 'link_name_to_fields_array' => array(array()),//optional           
 //For every related bean returned, specify link field names to field information.
 'related_module_link_name_to_fields_array' => array(),

 //To exclude deleted records
 'deleted'=> '0',

 //order by
 'order_by' => '',

 //offset
 'offset' => 0,

 //limit
 'limit' => 25,                                        //deleted
 );


$json = json_encode($parameters);
$json2 = json_encode($parameters2);
$json3 = json_encode($parameters3);
$json4 = json_encode($parameters4);
$json5 = json_encode($parameters5);
$json6 = json_encode($parameters6);
$json7 = json_encode($parameters7);
$json8 = json_encode($parameters8);


$postArgs = array(
    'method' => 'get_relationships',
    'input_type' => 'JSON',
    'response_type' => 'JSON',
    'rest_data' => $json
);

    $postArgs2 = array(
        'method' => 'get_relationships',
        'input_type' => 'JSON',
        'response_type' => 'JSON',
        'rest_data' => $json2
     );

     $postArgs3 = array(
        'method' => 'get_relationships',
        'input_type' => 'JSON',
        'response_type' => 'JSON',
        'rest_data' => $json3
     );
     $postArgs4 = array(
        'method' => 'get_relationships',
        'input_type' => 'JSON',
        'response_type' => 'JSON',
        'rest_data' => $json4
     );
     $postArgs5 = array(
        'method' => 'get_relationships',
        'input_type' => 'JSON',
        'response_type' => 'JSON',
        'rest_data' => $json5
     );
     $postArgs6 = array(
        'method' => 'get_relationships',
        'input_type' => 'JSON',
        'response_type' => 'JSON',
        'rest_data' => $json6
     );
     $postArgs7 = array(
        'method' => 'get_relationships',
        'input_type' => 'JSON',
        'response_type' => 'JSON',
        'rest_data' => $json7
     );
     $postArgs8 = array(
        'method' => 'get_relationships',
        'input_type' => 'JSON',
        'response_type' => 'JSON',
        'rest_data' => $json8
     );


curl_setopt($curl, CURLOPT_POSTFIELDS,$postArgs);
curl_setopt($curl2, CURLOPT_POSTFIELDS,$postArgs2);
curl_setopt($curl3, CURLOPT_POSTFIELDS,$postArgs3);
curl_setopt($curl4, CURLOPT_POSTFIELDS,$postArgs4);
curl_setopt($curl5, CURLOPT_POSTFIELDS,$postArgs5);
curl_setopt($curl6, CURLOPT_POSTFIELDS,$postArgs6);
curl_setopt($curl7, CURLOPT_POSTFIELDS,$postArgs7);
curl_setopt($curl8, CURLOPT_POSTFIELDS,$postArgs8);
 
curl_exec($curl2);
curl_exec($curl3);
curl_exec($curl4);
curl_exec($curl5);
curl_exec($curl6);
curl_exec($curl7);
curl_exec($curl8);

$response = curl_exec($curl);


// Convert the result from JSON format to a PHP array
echo $response;
die;