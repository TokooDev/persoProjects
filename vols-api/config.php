<?php
$hote = 'localhost';
$bdd = 'vols-api';
$user = 'root';
$mdp ='';

try {
	//On test la connexion à la base de donnée
    $pdo = new PDO('mysql:host='.$hote.';dbname='.$bdd, $user, $mdp);

} catch(Exception $e) {
	//Si la connexion n'est pas établie, on stop le chargement de la page.
	reponse_json($success, $data, 'Echec de la connexion à la base de données');
    exit();

}