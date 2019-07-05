<?php

// specify the REST web service to interact with
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Max-Age:1728000");

$username = $_GET["username"];
$password = $_GET["password"];
$postdata = file_get_contents("php://input");

if ($postdata !="")
{
var_dump($postdata);
$request = json_decode($postdata);
var_dump($request);

 $civilite = trim($request->salutation);
 $prenom = trim($request->first_name);
 $telehone_bureau = trim($request->phone_work);
 $adresse_electronique = trim($request->Leads0emailAddress0);
 $fax = trim($request->phone_fax);
 $telehone_mobile = trim($request->phone_mobile);
 $siteweb = trim($request->website);
 $description = trim($request->description);
 $statut = trim($request->status);
 $description_statut = trim($request->status_description);
 $montant_affaire = trim($request->opportunity_amount);
 $reference_prospect = trim($request->codeprospect_c);
 $nom_famille = trim($request->last_name);
 $titre = trim($request->title);
 $service = trim($request->department);
 $nom_compte = trim($request->account_name);
 $origine_prospect = trim($request->lead_source);
 $description_origine = trim($request->lead_source_description);
 $fait_reference_a = trim($request->refered_by);

 



var_dump($GLOBALS);

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

        'user_name' => $username,

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
echo $result->id."<br />";

$session = $result->id;
$parameters = array(
  'session' => $session, //Session ID
  'module' => 'Leads',  //Module name
  'name_value_list' => array ( 
  		  array('name' => 'salutation', 'value' => $civilite),
          array('name' => 'first_name', 'value' => $prenom), 
          array('name' => 'phone_work', 'value' => $telehone_bureau),
          array('name' => 'phone_fax', 'value' => $fax),
          array('name' => 'phone_mobile', 'value' => $telehone_mobile),
          array('name' => 'website', 'value' => $siteweb),
          array('name' => 'description', 'value' => $description),
          array('name' => 'status', 'value' => $statut),
          array('name' => 'status_description', 'value' => $description_statut),
          array('name' => 'opportunity_amount', 'value' => $montant_affaire),
          array('name' => 'codeprospect_c', 'value' => $reference_prospect),
          array('name' => 'last_name', 'value' => $nom),
          array('name' => 'title', 'value' => $titre),
          array('name' => 'department', 'value' => $service),
          array('name' => 'account_name', 'value' => $nom_compte),
          array('name' => 'lead_source', 'value' => $origine_prospect),
          array('name' => 'lead_source_description', 'value' => $description_origine),
          array('name' => 'refered_by', 'value' => $fait_reference_a),

          
          
         
         
          

    
      ), 
  ); 
$json = json_encode($parameters); 
$postArgs = 'method=set_entry&input_type=JSON&response_type=JSON&rest_data=' . $json;

curl_setopt($curl, CURLOPT_POSTFIELDS, $postArgs);

// Make the REST call, returning the result 
$response = curl_exec($curl);

// Convert the result from JSON format to a PHP array 
$result = json_decode($response,true);

// Get the newly created record id
$recordId = $result['id'];

print "New Record Created with ID ".$recordId;
}