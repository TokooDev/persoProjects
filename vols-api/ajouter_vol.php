<?php
include('index.php');

if( !empty($_POST['ville_depart']) && !empty($_POST['ville_destination']) && !empty($_POST['date_depart']) && !empty($_POST['nb_heure_vol']) && !empty($_POST['prix']) ){
	//Si toutes les données sont saisie par le client
	$requete = $pdo->prepare("INSERT INTO `vols` (`id`, `ville_depart`, `ville_destination`, `date_depart`, `nb_heure_vol`, `prix`) VALUES (NULL, :ville_depart, :ville_destination, :date_depart, :nb_heure_vol, :prix);");
	$requete->bindParam(':ville_depart', $_POST['ville_depart']);
	$requete->bindParam(':ville_destination', $_POST['ville_destination']);
	$requete->bindParam(':date_depart', $_POST['date_depart']);
	$requete->bindParam(':nb_heure_vol', $_POST['nb_heure_vol']);
	$requete->bindParam(':prix', $_POST['prix']);

	if( $requete->execute() ){
		$success = true;
		$msg = 'Le vol a bien été ajouté';
	} else {
		$msg = "Une erreur s'est produite lors de l'ajout de votre vol";
	}
} else {
	$msg = "Il manque des informations sur le vol";
}

reponse_json($success, $data, $msg);