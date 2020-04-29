<?php 
require_once "boot.php";

class UserTable
{
    protected $db; 
    
    
    
    public function __construct($db)
    {
        $this->db = $db;
       
    }
    
     public  function recupParId($ID)
    {
         $requete = $this->db->prepareAndExecute('SELECT * FROM blog_utilisateur WHERE id_utilisateur = :id_utilisateur',[':id_utilisateur' => $ID]);
        $tableau = $requete->fetch();
        if($tableau === false){
            return null;
        }
        return $this->createUserFromDbResult($tableau);
    }

    public function recupParPseudo($pseudo)
    {
         $requete = $this->db->prepareAndExecute('SELECT * FROM blog_utilisateur WHERE pseudo = :pseudo',[':pseudo' => $pseudo]);
        $tableau = $requete->fetch();
        if($tableau === false){
            return null;
        }
        return $this->createUserFromDbResult($tableau);
    }

    
     public function insertUser($user)
    {
       $inscription = $this->db->prepareAndExecute("INSERT INTO blog_utilisateur (email, mdp, prenom, nom, pseudo,token,actif,id_grade) 
        VALUES (:email, :mdp, :prenom, :nom, :pseudo,:token,:actif,:id_grade)",
        [':email' => $user->email,
        ':mdp' => password_hash($user->mdp, PASSWORD_DEFAULT ),
        ':prenom' => $user->prenom,
        ':nom'=>$user->nom,
        ':pseudo'=>$user->pseudo,
        ':token'=> $user->token,
        ':actif'=>0,
        ':id_grade'=>$user->id_grade]) ;
    }

     public function activationtoken($pseudo)
    {
     
        $this->db->prepareAndExecute("UPDATE blog_utilisateur SET actif = 1 WHERE pseudo = :pseudo ",[':pseudo' => $pseudo]);
      
     
    }

    protected function createUserFromDbResult($tableau)
    {
         $user = new User();
         //hydratation des valeurs //
        $user->id_utilisateur = $tableau['id_utilisateur'];
        $user->nom = $tableau['nom'];
        $user->prenom = $tableau['prenom'];
        $user->mdp = $tableau['mdp'];
        $user->pseudo = $tableau['pseudo'];
        $user->email = $tableau['email'];
        $user->actif = $tableau['actif'];
        $user->token = $tableau['token'];
        $user->id_grade = $tableau['id_grade'];
        return $user;
    }
}