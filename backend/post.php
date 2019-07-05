<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$url = "http://192.168.20.6/devcrm/service/v4_1/rest.php";
$username = "oumar.sow";
$password = "passer";
$postdata = file_get_contents("php://input");


if(isset($postdata) && !empty($postdata))
{
 $request = json_decode($postdata);
 $name = $request->data->name;
 $phone = $request->data->phoneoffice;
 $website = $request->data->website;
 $phone_fax = $request->data->phonefax;
 $email = 'test';
 $email0 = $request->data->Accounts0emailAddress0;
 $email1 = $request->data->Accounts0emailAddress1;
 $email2 = $request->data->Accounts0emailAddress2;
 $email3 = $request->data->Accounts0emailAddress3;
 $email4 = $request->data->Accounts0emailAddress4;
 $email5 = $request->data->Accounts0emailAddress5;
 $email6 = $request->data->Accounts0emailAddress6;
 $email7 = $request->data->Accounts0emailAddress7;
 $email8 = $request->data->Accounts0emailAddress8;
 $email9 = $request->data->Accounts0emailAddress9;
 $email10 = $request->data->Accounts0emailAddress9;
 $description = $request->data->description;
 $statutjuridique = $request->data->statutjuridique;
 $protocole = $request->data->protocole;
 $raison = $request->data->raison;
 $score = $request->data->score;
 $administration = $request->data->administration;
 $segmentmarche = $request->data->segmentmarche;
 $segmentvaleur = $request->data->segmentvaleur;
 $region = $request->data->region;
 $nature = $request->data->nature;
 $agence = $request->data->agence;
 $association = $request->data->association;
 $jour = $request->data->jour;
 $heure = $request->data->heure;
 $communication = $request->data->communication;
 $prospect = $request->data->prospect;
 $temps = $request->data->date;
 $radio = $request->data->radio;
 $radio1 = $request->data->radio1;



 function call($method, $parameters, $url)
 {
  ob_start();
  $curl_request = curl_init();
  curl_setopt($curl_request, CURLOPT_URL, $url);
  curl_setopt($curl_request, CURLOPT_POST, 1);
  curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
  curl_setopt($curl_request, CURLOPT_HEADER, 1);
  curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION, 0);

  $jsonEncodedData = json_encode($parameters);

  $post = array(
      "method" => $method,
      "input_type" => "JSON",
      "response_type" => "JSON",
      "rest_data" => $jsonEncodedData
  );

  curl_setopt($curl_request, CURLOPT_POSTFIELDS, $post);
  $result = curl_exec($curl_request);
  curl_close($curl_request);

  $result = explode("\r\n\r\n", $result, 2);
  $response = json_decode($result[1]);
  ob_end_flush();

  return $response;
 }



 $login_parameters = array(
     "user_auth" => array(
         "user_name" => $username,
         "password" => md5($password),
         "version" => "1"
     ),
     "application_name" => "RestTest",
     "name_value_list" => array(),
 );

 $login_result = call("login", $login_parameters, $url);

 $session_id = $login_result->id;
 $set_entry_parameters = array(
     "session" => $session_id,
     "module_name" => "Accounts",

  //Record attributes
     "name_value_list" => array(
      //to update a record, you will nee to pass in a record id as commented below
      //array("name" => "id", "value" => "9b170af9-3080-e22b-fbc1-4fea74def88f"),
         array("name" => "name", "value" => $name),
         array("name" => "phone_office", "value" => $phone),
         array("name" => "website", "value" => $website),
         array("name" => "phone_fax", "value" => $phone_fax),
         array("name" => "prenom1", "value" => $email),
         array("name" => "description", "value" => $description),
         array("name" => "statut_juridique_c", "value" => $statutjuridique),
         array("name" => "protocole_accord_c", "value" => $protocole),
         array("name" => "raison__social_c", "value" => $raison),
         array("name" => "scoring_client_c", "value" => $score),
         array("name" => "administration_publique_c", "value" => $administration),
         array("name" => "segment_marche_c", "value" => $segmentmarche),
         array("name" => "segment_valeur_c", "value" => $segmentvaleur),
         array("name" => "region_commercial_c", "value" => $region),
         array("name" => "nature_compte_c", "value" => $nature),
         array("name" => "agence_de_creation_c", "value" => $agence),
         array("name" => "association_c", "value" => $association),
         array("name" => "jour_c", "value" => $jour),
         array("name" => "heure_privi_c", "value" => $heure),
         array("name" => "com_priv_c", "value" => $communication),
         array("name" => "prospect_origine_c", "value" => $prospect),
         array("name" => "date_de_la_derniere_campagne_c", "value" => $temps),
         array("name" => "documents_marketing_c", "value" => $radio),
         array("name" => "documents_marketing_c", "value" => $radio1),
         array("name" => "email1", "value" => $email0),
         array("name" => "email2", "value" => $email1),
         array("name" => "email3", "value" => $email2),
         array("name" => "email4", "value" => $email3),
         array("name" => "email5", "value" => $email4),
         array("name" => "email6", "value" => $email5),
         array("name" => "email7", "value" => $email6),
         array("name" => "email8", "value" => $email7),
         array("name" => "email9", "value" => $email8),
         array("name" => "email10", "value" => $email9),
         array("name" => "email11", "value" => $email10),



     ),
 );

 $set_entry_result = call("set_entry", $set_entry_parameters, $url);

 echo "<pre>";
 print_r($set_entry_result);
 echo json_encode($name);
 echo "</pre>";
}
?>
