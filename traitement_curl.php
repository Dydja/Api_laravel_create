<?php
if(isset($_POST['submit']))







































//init
$ch = curl_init();

//curl_setpot assigne des appelle de fonction
try {
    //adresse consomme
    $api_url = "http://127.0.0.1:8000/api/tickets"; //lien de votre api a consomée
    curl_setopt($ch, CURLOPT_URL,$api_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, array("nameparam"=>"valeurparam"));
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

    //curl_exec permte de recuperer la resource tele et appele via la requête
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo curl_error($ch);
        die();
    }

    //curl_getinfo liste les informations utiles retourne par curl
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    //CURLINFO_HTTP_CODE represente le code de retour HTTP(200,201,....)
    if($http_code == intval(200)){
        echo $response;
    }
    else{
        echo "Ressource introuvable : " . $http_code;
    }
} catch (\Throwable $th) {
    throw $th;
} finally {
    curl_close($ch);
}
