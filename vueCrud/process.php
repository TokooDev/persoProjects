<?php 
	session_start();
	$conn = new mysqli("localhost","root","","vuecrud");
	if ($conn->connect_error) {
		die("Connexion à la base de données échouée".$conn->connect_error);
	}
	$result= array('error'=>false);
	$action='';
	if (isset($_GET['action'])) {
		$action= $_GET['action'];
	}
	//affichage des données
	if ($action=='read') {
		$sql= $conn->query("SELECT * FROM users");
		$users= array();
		while ($row = $sql->fetch_assoc()) {
			array_push($users, $row);
		}
		$result['users']=$users;
	}
	//Ajout d'utilisateur
	if ($action=='create') {
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$sql= $conn->query("INSERT INTO users(name,email,phone) VALUES ('$name','$email','$phone') ");
		if ($sql) {
			$result['message']="Utilisateur ajouté avec succés";
		}else{
			$result['error']=true;
			$result['message']="Une erreur est survenue lors de l'ajout de l'utilisateur";
		}
	}

	// Modification d'utilisateur
	if ($action=='update') {
		$id=$_POST['id'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$sql= $conn->query("UPDATE  users SET name='$name', email='$email', phone='$phone' WHERE id='$id' ");
		if ($sql) {
			$result['message']="Utilisateur modifié avec succés";
		}else{
			$result['error']=true;
			$result['message']="Une erreur est survenue lors de la modification de l'utilisateur";
		}
	}

	//Suppression d'utilisateur
	if ($action=='delete') {
		$id=$_POST['id'];
		$sql= $conn->query("DELETE FROM users WHERE id='$id' ");
		if ($sql) {
			$result['message']="Utilisateur supprimé avec succés";
		}else{
			$result['error']=true;
			$result['message']="Une erreur est survenue lors de la suppression de l'utilisateur";
		}
	}
	$conn->close();
	echo json_encode($result);

 ?>