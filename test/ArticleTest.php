<?php
require_once '../modele/Article.php';

/**
 * Article test case.
 */
class ArticleTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     * @var Article
     */
    private $article;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        // TODO Auto-generated ArticleTest::setUp()

        $this->article = new Article("titre", "2005-10-09",1,"test de ArticleTest", "Victor");
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        // TODO Auto-generated ArticleTest::tearDown()
        $this->article = null;

        parent::tearDown();
    }
    public function testArticle(){
        $this->assertSame("Victor",$this->article->getNom());
        $this->assertSame("titre",$this->article->getTitre());
        
    }
   }

