<?php
?>
<!DOCTYPE html>
<html>
<head>
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>association medianet</title>
	<link rel="stylesheet" href="/projetMedianet/view/style.css">
</head>
<body>
<?php

require("modele/User.php");
require("modele/Article.php");
require("controller/Dao.php");

$action = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$existe = 1;
    
if ($action == "/projetMedianet/index.php/create") {
    $nom=$_GET["nom"];
    $prenom=$_GET["prenom"];
    $datenaiss=$_GET["datenaiss"];
    $login=$_GET["login"];
    $password=$_GET["password"];
    $email=$_GET["email"];
    
    $utilisateur = new User($nom, $prenom, $datenaiss, $login, $password, $email);
    //recuperer connexion à la bdd
    $dao = Dao::getPdoGsb();
    //insérer un utilsisateur
    $dao -> ajouterUser($utilisateur);
    echo "<h4>Utilisateur créé</h4>";
    include ('view/login.php');
}

if ($action == "/projetMedianet/index.php/addArticle") {
    $titre=$_GET["titre"];
    $texte=$_GET["article"];
    $date="now()";
    $id_user=1;
    $nom="moi";
    $article = new Article($titre,$date,$id_user,$texte, $nom);    
    //recuperer connexion à la bdd
    //insérer un utilsisateur
    $dao = Dao::getPdoGsb();
    $dao -> ajouterArticle($article);
    echo "<h4>Article ajouté</h4>";
    $article = $dao -> getListArticle();
    include ('view/accueil.php');
}

if ($action == "/projetMedianet/index.php/login") {
    $dao=Dao::getPdoGsb();
    $login=$_GET["login"];
    $password=$_GET["password"];
    $user = $dao -> getInfosUser($login, $password);
    
    if ($user!=null){
        $article = $dao -> getListArticle();
         include ('view/accueil.php');
    }    
    else{
        $existe = 0;
        include ('view/login.php');
    }
  }

if ($action == "/projetMedianet/index.php") {
    include ('view/login.php');
}

if ($action == "/projetMedianet/index.php/enregistrer") {
    include ('view/enregistrement.php');
}


if ($action == "/projetMedianet/index.php/". 1) {
    $dao = Dao::getPdoGsb();
    $article = $dao -> getArticle(1);
    include ('view/accueil.php');
    
}

// $dao=Dao::getPdoGsb();
// $liste=$dao -> getLesUtilisateur();
// foreach ($liste as $user1){
//     echo "Nom: ".$user1->getNom()."<br> Prenom: ".$user1->getPrenom()."<br><br>";
// }

// $utilisateur->setId(1);
// echo "<table border='1'><tr>";
// echo "<td>Prenom: ".$utilisateur->getprenom()."</td>";
// echo "</tr><tr>";
// echo "<td>Nom: ".$utilisateur->getNom()."</td>";
// echo "</tr><tr>";
// echo "<td>DOB: ".$utilisateur->getDatenaissance()."</td>";
// echo "</tr><tr>";
// echo "<td>Login: ".$utilisateur->getLogin()."</td>";
// echo "</tr><tr>";
// echo "<td>MDP: ".$utilisateur->getPassword()."</td>";
// echo "</tr><tr>";
// echo "<td>Mail: ".$utilisateur->getEmail()."</td>";
// echo "</tr></table>";
?>
</body>
</html>

