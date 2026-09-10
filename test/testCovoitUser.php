<?php

include_once '../global/config.php';
include_once '../'.CHEMIN_LIB.'pdo2.php';
include_once '../'.CHEMIN_ENTITY.'CovoitUser.php';

echo "Fonction 1 <br>";
$user1 = new CovoitUser();
var_dump($user1);
echo "<br><br>";

echo "Fonction 2 <br>";
$user2 = new CovoitUser(1, 'Dupont', 'Marie', '0611223344', 'marie.dupont@mail.fr', password_hash('rezrezrez', PASSWORD_DEFAULT));
var_dump($user2);
echo "<br><br>";

echo "Fonction 3 <br>";
echo $user2->getId();
echo "<br><br>";

echo "Fonction 4 <br>";
echo $user2->getNom();
echo "<br><br>";

echo "Fonction 5 <br>";
echo $user2->getPrenom();
echo "<br><br>";

echo "Fonction 6 <br>";
echo $user2->getTel();
echo "<br><br>";

echo "Fonction 7 <br>";
echo $user2->getMail();
echo "<br><br>";

echo "Fonction 8 <br>";
echo $user2->getMdp();
echo "<br><br>";

echo "-- Fonction 9  --<br>";
$user1->setId(2);
echo $user1->getId();
echo "<br><br>";

echo "Fonction 10 <br>";
$user1->setNom('Martin');
echo $user1->getNom();
echo "<br><br>";

echo "Fonction 11 <br>";
$user1->setPrenom('Lucas');
echo $user1->getPrenom();
echo "<br><br>";

echo "Fonction 12 <br>";
$user1->setTel('0622334455');
echo $user1->getTel();
echo "<br><br>";

echo "Fonction 13 <br>";
$user1->setMail('doryanlepers@gmail.fr');
echo $user1->getMail();
echo "<br><br>";

echo "Fonction 14<br>";
$user1->setMdp(password_hash('aaaaa', PASSWORD_DEFAULT));
echo $user1->getMdp();
echo "<br><br>";

echo "Fonction 15 <br>";
$user3 = (new CovoitUser())->setNom('Lepers')->setPrenom('Doryan');
echo $user3->getNom().' '.$user3->getPrenom();
echo "<br><br>";

 
?>
