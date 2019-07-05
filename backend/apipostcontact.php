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
 $civilite = trim($request->civilite);
 $prenom = trim($request->prenom);
 $telehone_bureau = trim($request->telehone_bureau);
 $fonction = trim($request->fonction);
 $adresse_electronique = trim($request->adresse_electronique);
 $fax = trim($request->fax);
 $sous_segment_marche = trim($request->sous_segment_marche);
 $authorite_emetrice = trim($request->authorite_emetrice);
 $date_delivrance = trim($request->date_delivrance);
 $scoring_client = trim($request->scoring_client);
 $sensibilite = trim($request->sensibilite);
 $nom_societe = trim($request->nom_societe);
 $telephone_profesionnel = trim($request->telephone_profesionnel);
 $nom_conjoint = trim($request->nom_conjoint);
 $date_naissance = trim($request->date_naissance);
 $origine_prospect = trim($request->origine_prospect);
 $document_marketing = trim($request->document_marketing);
 $mode_communication = trim($request->mode_communication);
 $jour_privilegie = trim($request->jour_privilegie);
 $courrier_electronique = trim($request->courrier_electronique);
 $nom = trim($request->nom);
 $telehone_mobile = trim($request->telehone_mobile);
 $service = trim($request->service);
 $nom_compte = trim($request->nom_compte);
 $segment_marche = trim($request->segment_marche);
 $segment_valeur = trim($request->segment_valeur);
 $segment_sociaux_professionnel = trim($request->segment_sociaux_professionnel);
 $numero_cin = trim($request->numero_cin);
 $date_expiration = trim($request->date_expiration);
 $canal_creation = trim($request->canal_creation);
 $agence_creation = trim($request->agence_creation);
 $etat_civil = trim($request->etat_civil);
 $heure_privilegie = trim($request->heure_privilegie);



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
  'module' => 'Contacts',  //Module name
  'name_value_list' => array ( 
          array('name' => 'first_name', 'value' => $prenom), 
          array('name' => 'last_name', 'value' => $nom),
          array('name' => 'salutation', 'value' => $civilite),
          array('name' => 'title', 'value' => $fonction),
          array('name' => 'phone_work', 'value' => $telehone_bureau),
          array('name' => 'phone_mobile', 'value' => $telehone_mobile),
          array('name' => 'lead_source', 'value' => $origine_prospect),
          array('name' => 'department', 'value' => $service),
          array('name' => 'email1', 'value' => $adresse_electronique),
          array('name' => 'email2', 'value' => ""),

    
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