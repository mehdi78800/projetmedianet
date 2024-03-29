<?php
require_once ("../controller/Daoguest.php");
require("../modele/User.php");
require("../modele/Article.php");
/**
 * Daoguest test case.
 */
class DaoguestTest extends PHPUnit_Framework_TestCase
{
    
    /**
     *
     * @var Daoguest
     */
    //on définit 3 variables pour les objets correspondants 
    private $user;
    private $article;
    private $dao;
    
    /**
     * Permet d'initialiser les elements que l'on veut tester
     * on cree une connexion a la bdd ainsi qu'un user et un article
     */
    protected function setUp()
    {
        parent::setUp();
        
        // TODO Auto-generated DaoguestTest::setUp()
        $this->dao=Daoguest::getPdoGsb();
        $this->dao->initdb();
        $this->user = new User("victor","hugo","1987-10-10","victor","123456","victor@gmail.com");
        $this->user->setId(1);
        $this->article = new Article(1,"les souris","2005-10-20","14","les souris sont vertes",1);
    }
    
    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        // TODO Auto-generated DaoguestTest::tearDown()
        $this->user=null;
        $this->article=null;
        
        parent::tearDown();
    }
    
    /**
     * Constructs the test case.
     */
    public function __construct()
    {
        // TODO Auto-generated constructor
    }
    public function testajouterUser(){
        //on insere le user dans la bdd
        //on veut tester la méthode ajouteruser, on ajoute 2 users
        $this->dao->ajouterUser($this->user);
        $this->dao->ajouterUser($this->user);
        
        //on recupere les users de la bdd car on veut tester la méthode getLesUtilisateurs()
        $liste=$this->dao->getLesUtilisateur();
//         $user1=new User($liste[1],$liste[2],$liste[3],$liste[4],$liste[5],$liste[6]);
//         $user1->setId($liste[1]);
//         $egal=$user1->equals($this->user);
        $this->assertSame(2, count($liste));
//         $this->assertSame(true, $egal);
    }
    
    
}

