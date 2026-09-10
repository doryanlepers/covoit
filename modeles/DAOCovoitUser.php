<?php
include_once '../entity/CovoitUser.php';

function getUnCovoitUser($id){
	$pdo = PDO2::getInstance();

 $requete = $pdo->prepare("SELECT id, nom, prenom, tel, mail, mdp FROM CovoitUser WHERE id = :id"); // requete SQL
 $requete->bindValue(':id', $id, PDO::PARAM_INT);
 $requete->execute();

	 
	 //Après exécution de la requête, récupération d'un objet de la classe CovoitUser
 $requete->setFetchMode(PDO::FETCH_CLASS, 'CovoitUser');
 $unCovoitUser = $requete->fetch();
   
 $requete->closeCursor();
 return $unCovoitUser;
}

function getLesCovoitUser(){
	$pdo = PDO2::getInstance();
        $requete = $pdo->prepare("SELECT id, nom, prenom, tel, mail, mdp FROM CovoitUser");
         
        $requete->execute();
         $tab = $requete->fetchAll(PDO::FETCH_CLASS, "CovoitUser");
         $requete->closeCursor();
	 return $tab;
}


function addUnCovoitUser($unCovoitUser) {
    $pdo = PDO2::getInstance();
    $requete = $pdo->prepare(
        "INSERT INTO CovoitUser (nom, prenom, tel, mail, mdp)
         VALUES (:nom, :prenom, :tel, :mail, :mdp)"
    );
    $requete->bindValue(':nom',    $unCovoitUser->getNom(),    PDO::PARAM_STR); // :nom fait ref à VALUES, $unCovoitUser on affecte la valeur, PDO --> précise l'objet, mais pas obligatoire de souvenir
    $requete->bindValue(':prenom', $unCovoitUser->getPrenom(), PDO::PARAM_STR);
    $requete->bindValue(':tel',    $unCovoitUser->getTel(),    PDO::PARAM_STR);
    $requete->bindValue(':mail',   $unCovoitUser->getMail(),   PDO::PARAM_STR);
    $requete->bindValue(':mdp',    $unCovoitUser->getMdp(),    PDO::PARAM_STR);
    $ok = $requete->execute();
    $requete->closeCursor();
    return $ok;


}

function updateUnCovoitUser($unCovoitUser) {
    $pdo = PDO2::getInstance();
    $requete = $pdo->prepare(
        "UPDATE CovoitUser
         SET nom = :nom, prenom = :prenom, tel = :tel, mail = :mail, mdp = :mdp
         WHERE id = :id"
    );
    $requete->bindValue(':id',     $unCovoitUser->getId(),     PDO::PARAM_INT);
    $requete->bindValue(':nom',    $unCovoitUser->getNom(),    PDO::PARAM_STR);
    $requete->bindValue(':prenom', $unCovoitUser->getPrenom(), PDO::PARAM_STR);
    $requete->bindValue(':tel',    $unCovoitUser->getTel(),    PDO::PARAM_STR);
    $requete->bindValue(':mail',   $unCovoitUser->getMail(),   PDO::PARAM_STR);
    $requete->bindValue(':mdp',    $unCovoitUser->getMdp(),    PDO::PARAM_STR);
    $ok = $requete->execute();
    $requete->closeCursor();
    return $ok;
}

function deleteUnCovoitUser($id) {
    $pdo = PDO2::getInstance();
    $requete = $pdo->prepare("DELETE FROM CovoitUser WHERE id = :id");
    $requete->bindValue(':id', $id, PDO::PARAM_INT);
    $ok = $requete->execute();
    $requete->closeCursor();
    return $ok;
}



?>
