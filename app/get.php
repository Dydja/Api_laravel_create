<?php
//init du curl
$ch = curl_init();
//lien de mon api qui vas consommée
$api_url = "http://127.0.0.1:8000/api/users";
//Une fois l'objet initialisé on lui assigne des options en fonctions de nos besoins grâce à la fonction curl_setopt().
$test = curl_setopt($ch, CURLOPT_URL, $api_url);

/*curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Cache-Control: no-cache",
    "content-type:application/json;charset=utf-8"
  ));*/

  curl_setopt($ch, CURLOPT_URL,$api_url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
//Pour récupérer la ressource appelée et téléchargée par la requête CURL on utilise la méthode curl_exec().
  $resp = curl_exec($ch);

  if($e = curl_error($ch)){
      echo $e;
  }else{
      $decoded = json_decode($resp);
      print_r($decoded);
  }

  curl_close($ch); //ferme la session


