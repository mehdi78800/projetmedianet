<?php
class Dao{
    private static $serveur='mysql:host=localhost';
    private static $bdd='dbname=association';
    //Pour la sécurité ne pas utiliser le super utilisateur 
    private static $user='greta' ;
    private static $mdp='123' ;
    private static $monPdo;
    private static $monPdoGsb=null;
    
    //Pour utiliser le pattern singleton on defini le constructeur comme private, ainsi on ne l'utilise pas dans une autre classe.
    private function __construct(){
        Dao::$monPdo = new PDO(Dao::$serveur.';'.Dao::$bdd, Dao::$user, Dao::$mdp);
    }
    
    //Nous permet de mettre en place un Design pattern singleton
    public static function getPdoGsb(){
        //On verifie que la connection n'a pas été ouverte une 1ere fois
        if(Dao::$monPdoGsb==null){
            Dao::$monPdoGsb= new Dao();
        }
        return Dao::$monPdoGsb;
    }
    
//     public function ajouterUser(User $user){
//         $nom=$user->getNom();
//         $prenom=$user->getPrenom();
//         $datenaissance=$user->getDatenaissance();
//         $login=$user->getLogin();
//         $password=$user->getPassword();
//         $email=$user->getEmail();
//         //NOTION DE SECURITE
//         //Les variables envoyé par l'utilisateur peuvent être des instructions interprétées par la requête pour récupérer ou supprimer des données, pour éviter cela, on utilise les requêtes preparées avec paramètre.
//         $req = "insert into user(nom,prenom,datenaissance,login,password,email) values
// ('$nom','$prenom','$datenaissance','$login','$password','$email')";
//         Dao::$monPdo -> exec($req);
//     }
    
    
    public function ajouterUser(User $user){
        $nom=$user->getNom();
        $prenom=$user->getPrenom();
        $datenaissance=$user->getDatenaissance();
        $login=$user->getLogin();
        $password=$user->getPassword();
        $email=$user->getEmail();
        //NOTION DE SECURITE
        //On crée une requête avec des paramètres pour éviter les injections SQL.
        $req = "insert into user(nom,prenom,datenaissance,login,password,email) values
(:nom, :prenom, :datenaissance, :login, :password, :email)";
        try{
            //On crée la requête preparée $stmt
            $stmt = Dao::$monPdo->prepare($req);
            //on Lit les paramètre de la requête avec les variables provenant du formulaire
            $stmt -> bindParam(':nom', $nom);
            $stmt -> bindParam(':prenom', $prenom);
            $stmt -> bindParam(':datenaissance', $datenaissance);
            $stmt -> bindParam(':login', $login);
            $stmt -> bindParam(':password', $password);
            $stmt -> bindParam(':email', $email);
            //on execute la requete
            $stmt->execute();            
        }
        catch(Exception $e){
            //en cas d'erreur:
            echo " Erreur ! ".$e->getMessage();
        }
    }
    
    
    public function ajouterArticle(Article $article){
//         $id_user=$article->getId_user();
//         $titre=$article->getTitre();
//         $texte=$article->getTexte();
        $titre=$article->getTitre();
        $texte=$article->getTexte();
        $date=$article->getDate();
        $id_user=$article->getId_user();
        $req = "insert into article(titre,date,id_user,article) values
('$titre',$date,$id_user,'$texte')";
        Dao::$monPdo -> exec($req);
    }
    
    public function getInfosUser($login, $mdp){
        $user=null;
        $req = "select id,nom,prenom,datenaissance,login,password,email from user where user.login='$login' and user.password='$mdp'";
        
        $rs = Dao::$monPdo->query($req);
        $laLigne = $rs->fetch();
        if ($laLigne != null) {
            $id=$laLigne['id'];
            $nom= $laLigne['nom'];
            $prenom= $laLigne['prenom'];
            $datenaissance= $laLigne['datenaissance'];
            $login= $laLigne['login'];
            $password= $laLigne['password'];
            $email= $laLigne['email'];
            $user=new User($nom,$prenom,$datenaissance,$login,$password,$email);
            $user->setId($id);
        }
        return $user;
    }
    
    public function getLesUtilisateur(){
        $liste=array();
        $req = "select id,nom,prenom,datenaissance,login,password,email from user";
        $res = Dao::$monPdo->query($req);
        $laLigne = $res->fetch();
        while($laLigne != null) {
            $id=$laLigne['id'];
            $nom= $laLigne['nom'];
            $prenom= $laLigne['prenom'];
            $datenaissance= $laLigne['datenaissance'];
            $login= $laLigne['login'];
            $password= $laLigne['password'];
            $email= $laLigne['email'];
            
            $user=new User($nom,$prenom,$datenaissance,$login,$password,$email);
            $user->setId($id);
            $liste[]=$user;
            $laLigne = $res->fetch();
        }
        return $liste;
    }
    
    public function getListArticle(){
        $liste=array();
        $req = "select u.id, u.nom as nomUser, a.id as idArticle, titre, date, id_user, article from article a, user u where u.id=id_user ORDER BY date";
        $res = Dao::$monPdo->query($req);
        $laLigne = $res->fetch();
        while($laLigne != null) {
            $id=$laLigne['idArticle'];
            $titre= $laLigne['titre'];
            $date= $laLigne['date'];
            $id_user= $laLigne['id_user'];
            $texte= $laLigne['article'];
            $nom= $laLigne['nomUser'];
            
            $article=new Article($titre,$date,$id_user,$texte, $nom);
            $article->setId($id);
            $liste[]=$article;
            $laLigne = $res->fetch();
        }
        return $liste;
    }
    
    public function getArticle($idArticle){
        $liste=array();
        $req = "select u.id, u.nom as nomUser, a.id as idArticle, titre, date, id_user, article from article a, user u where u.id=id_user and a.id=".$idArticle." ORDER BY date";
        $res = Dao::$monPdo->query($req);
        $laLigne = $res->fetch();
        while($laLigne != null) {
            $id=$laLigne['idArticle'];
            $titre= $laLigne['titre'];
            $date= $laLigne['date'];
            $id_user= $laLigne['id_user'];
            $texte= $laLigne['article'];
            $nom= $laLigne['nomUser'];
            
            $article=new Article($titre,$date,$id_user,$texte, $nom);
            $article->setId($id);
            $liste[]=$article;
            $laLigne = $res->fetch();
        }
        return $liste;
    }
}













