<?php 
require_once "boot.php";
class CommentaireTable
{
    protected $db; 
    
    
    
    public function __construct($db)
    {
        $this->db = $db;
       
    }

      public function ajoutCommentaire($commentaire)
    {
          $insert_commentaire = $this->db->prepareAndExecute("INSERT INTO blog_commentaire (id_article,texte,id_utilisateur,modere) VALUES (:id_article,:texte,:id_utilisateur,:modere)",[':texte'=>$commentaire->texte,':id_article' => $commentaire->id_article,':id_utilisateur'=>$commentaire->id_utilisateur,'modere'=> $commentaire->modere]);
    }

    public function recupTousCommentaire()
    {
         $requete = $this->db->prepareAndExecute("SELECT * FROM blog_commentaire",[]);
        $tableau = $requete->fetchALL();
        if($tableau === false){
            return null;
        }
        $tab = [];
        foreach ($tableau as $commentaire)
        {
            $tab[$commentaire['id_commentaire']]  = $this->createCommentaire($commentaire);
            
        }
         return $tab;
    }

      public function recupCommentairesArticle($ID)
    {
         $requete = $this->db->prepareAndExecute("SELECT * FROM blog_commentaire WHERE id_article = :ID",[':ID' => $ID]);
        $tableau = $requete->fetchALL();
        if($tableau === false){
            return null;
        }
        $tab = [];
        foreach ($tableau as $commentaire)
        {
            $tab[$commentaire['id_commentaire']]  = $this->createCommentaire($commentaire);
            
        }
         return $tab;
    }


    protected function createCommentaire($tableau)
    {
         $commentaire = new Commentaire();
        $commentaire->id_article = $tableau['id_article'];
        $commentaire->id_utilisateur = $tableau['id_utilisateur'];
        $commentaire->texte = $tableau['texte'];
        $commentaire->id_commentaire = $tableau['id_commentaire'];
        $commentaire->modere = $tableau['modere'];
        $commentaire->date = $tableau['date'];
        return $commentaire;
    }

      public function deleteCommentaire($ID)
    {
    $delete =$this->db->prepareAndExecute("DELETE FROM blog_commentaire WHERE id_commentaire = :ID LIMIT 1",[':ID' => $ID]);
    }
    

}