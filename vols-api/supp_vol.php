<?php
include('index.php');

if( !empty($_GET['id']) ){
	//Si le client a saisis un id
	$requete = $pdo->prepare("DELETE FROM `vols` WHERE `id` = :id");
	$requete->bindParam(':id', $_GET['id']);
	if( $requete->execute() ){
		$success = true;
		$msg = 'Le vol est supprimé';
	} else {
		$msg = "Une erreur s'est produite";
	}
} else {
	$msg = "Il manque des informations sur le vol";
}

reponse_json($success, $data, $msg);