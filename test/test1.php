<?php

require("modele/Article.php");
require("controller/Dao.php");
    //     $titre=$_GET["titre"];
    //     $texte=$_GET["article"];
    $titre="allo";
    $texte="he";
    $date=2019-01-01;
    $id_user=1;
    $nom="moi";
    $article = new Article($titre,$date,$id_user,$texte, $nom);
    //recuperer connexion à la bdd
    //insérer un utilsisateur
    $dao = Dao::getPdoGsb();
    $dao -> ajouterArticle($article);
    echo $article->getDate();
    //     include ('view/accueil.php');
