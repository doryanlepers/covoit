<?php
include_once '../global/config.php';
include_once '../modeles/DAOCovoitUser.php';
include_once '../libs/pdo2.php';  

echo "-- Test getLesCovoitUser -- <br><br>";
$tab = getLesCovoitUser();
var_dump($tab);
echo "<br><br>";

echo "-- Test getUnCovoitUser -- <br><br>";
$user = getUnCovoitUser(1);
var_dump($user);
echo "<br><br>";


echo "-- Test addUnCovoitUser et deleteUnCovoitUser -- <br><br>";
$newUser = new CovoitUser();
$newUser->setNom('Martin');
$newUser->setPrenom('Lucas');
$newUser->setTel('0622334455');
$newUser->setMail('lucas.martin@mail.fr');
$newUser->setMdp(password_hash('motdepasse', PASSWORD_DEFAULT));
$ok = addUnCovoitUser($newUser);
var_dump($ok);
$tous = getLesCovoitUser();
$dernier = end($tous);
$idASupprimer = $dernier->getId();
$okDelete = deleteUnCovoitUser($idASupprimer);
echo "Suppression id=$idASupprimer : ";
var_dump($okDelete); // je le supprime sinon il se met en boucle dans la BDD et test la fonction delete en meme temps
echo "<br><br>";

echo "-- Test updateUnCovoitUser -- <br><br>";
$user = getUnCovoitUser(1);
$user->setTel('0699999999');
$ok = updateUnCovoitUser($user);
var_dump($ok);
echo "<br><br>";

?>