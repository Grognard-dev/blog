<?php 
require_once "boot.php";
class ArticlesTable
{
    protected $db; 
    
    
    
    public function __construct($db)
    {
        $this->db = $db;
       
    }
    
     public  function recupParId($id_article)
    {
         $requete = $this->db->prepareAndExecute('SELECT * FROM blog_articles WHERE id_articles = :id_articles',[':id_articles' => $id_article]);
        $tableau = $requete->fetch();
        if($tableau === false){
            return null;
        }
        return $this->createFilm($tableau);
    }

    public function recupParNomfilm($nom)
    {
         $requete = $this->db->prepareAndExecute('SELECT * FROM blog_articles WHERE nom = :nom',[':nom' => $nom]);
        $tableau = $requete->fetch();
        if($tableau === false){
            return null;
        }
        return $this->createFilm($tableau);
    }

    public function recuptousfilm()
    {
         $requete = $this->db->prepareAndExecute("SELECT * FROM blog_articles",[]);
        $tableau = $requete->fetchAll();
        if($tableau === false){
            return null;
        }
        $tab = [];
        foreach ($tableau as $articles)
        {
            $tab[$articles['id_articles']]  = $this->createFilm($articles);
            
        }
         return $tab;
        
       
    }
    public function insertArticles($articles)
    {
       $inscription = $this->db->prepareAndExecute("INSERT INTO blog_articles (nom, date_de_parution, photo_card, text_card, archive) 
        VALUES (:nom, :date_de_parution, :photo_card, :text_card, :archive)",
        [':nom' => $articles->nom,
        ':date_de_parution' => $articles->date_de_parution,
        ':photo_card' => $articles->photo_card,
        ':text_card'=>$articles->text_card,
        ':archive'=>$articles->archive,]) ;

        
    }

    protected function createFilm($tableau)
    {
         $articles = new Articles();
        $articles->id_articles = $tableau['id_articles'];
        $articles->nom = $tableau['nom'];
        $articles->date_de_parution = $tableau['date_de_parution'];
        $articles->photo_card = $tableau['photo_card'];
        $articles->text_card = $tableau['text_card'];
         $articles->archive = $tableau['archive'];
        return $articles;
    }
}