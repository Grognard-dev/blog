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
         $requete = $this->db->prepareAndExecute('SELECT * FROM blog_articles WHERE id_article = :id_article',[':id_article' => $id_article]);
        $tableau = $requete->fetch();
        if($tableau === false){
            return null;
        }
        return $this->createArticles($tableau);
    }

    public function recupParNomArticles($nom_article)
    {
         $requete = $this->db->prepareAndExecute('SELECT * FROM blog_articles WHERE nom_article = :nom_article',[':nom_article' => $nom_article]);
        $tableau = $requete->fetch();
        if($tableau === false){
            return null;
        }
        return $this->createArticles($tableau);
    }

    public function updateArticle($articles)
    {
       $inscription = $this->db->prepareAndExecute("UPDATE blog_articles SET
            nom_article = :nom_article, 
            date_de_parution = :date_de_parution,
            photo_card = :photo_card,
            text_card = :text_card
            WHERE id_article = :ID",
            [':ID' => $articles->id_article,
                ':nom_article' => $articles->nom_article,
        ':date_de_parution' => $articles->date_de_parution,
        ':photo_card'=>$articles->photo_card,
        ':text_card'=>$articles->text_card] );
    }

    public function recupTousArticles()
    {
         $requete = $this->db->prepareAndExecute("SELECT * FROM blog_articles WHERE archive = :archive",['archive' => 0]);
        $tableau = $requete->fetchALL();
        if($tableau === false){
            return null;
        }
        $tab = [];
        foreach ($tableau as $articles)
        {
            $tab[$articles['id_article']]  = $this->createArticles($articles);
            
        }
         return $tab;
        
       
    }
    public function insertArticles($articles)
    {
       $inscription = $this->db->prepareAndExecute("INSERT INTO blog_articles (nom_article, date_de_parution, photo_card, text_card, archive, id_utilisateur) 
        VALUES (:nom_article, :date_de_parution, :photo_card, :text_card, :archive, :id_utilisateur)",
        [':nom_article' => $articles->nom_article,
        ':date_de_parution' => $articles->date_de_parution,
        ':photo_card' => $articles->photo_card,
        ':text_card'=>$articles->text_card,
        ':archive'=>$articles->archive,
        ':id_utilisateur'=>$articles->id_utilisateur,]) ;

        
    }

    public function insertPhoto($ID,$photo_card)
    {
         $requete = $this->db->prepareAndExecute("UPDATE blog_articles SET photo_card = :photo_card WHERE id_article = :ID ",[':ID' => $ID, ':photo_card' => $photo_card]);
    }

    protected function createArticles($tableau)
    {
         $articles = new Article();
        $articles->id_article = $tableau['id_article'];
        $articles->nom_article = $tableau['nom_article'];
        $articles->date_de_parution = $tableau['date_de_parution'];
        $articles->photo_card = $tableau['photo_card'];
        $articles->text_card = $tableau['text_card'];
         $articles->archive = $tableau['archive'];
        $articles->id_utilisateur = $tableau['id_utilisateur'];
        return $articles;
    }

      public function deleteArticle($ID)
    {
    $delete =$this->db->prepareAndExecute("DELETE FROM blog_articles WHERE id_article = :ID LIMIT 1",[':ID' => $ID]);
    }

    public function articleArchiver()
    {
          $requete = $this->db->prepareAndExecute("SELECT * FROM blog_articles WHERE archive = :archive",['archive' => 1]);
        $tableau = $requete->fetchALL();
        if($tableau === false){
            return null;
        }
        $tab = [];
        foreach ($tableau as $articles)
        {
            $tab[$articles['id_article']]  = $this->createArticles($articles);
            
        }
         return $tab;
    }

    public function archiverArticle($id_article)
    {
     
        $this->db->prepareAndExecute("UPDATE blog_articles SET archive = 1 WHERE id_article = :id_article ",[':id_article' => $id_article]);
      
     
    }

    public function desarchiverArticle($id_article)
    {
          $this->db->prepareAndExecute("UPDATE blog_articles SET archive = 0 WHERE id_article = :id_article ",[':id_article' => $id_article]);
    }
   
}