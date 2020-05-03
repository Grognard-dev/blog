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

    public function recupTousUtilisateur()
    {
         $requete = $this->db->prepareAndExecute("SELECT * FROM blog_utilisateur",[]);
        $tableau = $requete->fetchALL();
        if($tableau === false){
            return null;
        }
        $tab = [];
        foreach ($tableau as $Users)
        {
            $tab[$Users['id_utilisateur']]  = $this->createUserFromDbResult($Users);
            
        }
         return $tab;
    }
    
    public function deleteUser($ID)
    {
    $delete =$this->db->prepareAndExecute("DELETE FROM blog_utilisateur WHERE id_utilisateur = :ID LIMIT 1",[':ID' => $ID]);
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

    public function updateUser($user)
    {
       $inscription = $this->db->prepareAndExecute("UPDATE blog_utilisateur SET
            nom = :nom, 
            prenom = :prenom,
            pseudo = :pseudo,
            email = :email, 
            mdp = :mdp,
            id_grade = :id_grade
            WHERE id_utilisateur = :ID",
            [':ID' => $user->id_utilisateur,
                ':email' => $user->email,
        ':mdp' => password_hash($user->mdp, PASSWORD_DEFAULT ),
        ':prenom' => $user->prenom,
        ':nom'=>$user->nom,
        ':pseudo'=>$user->pseudo,
        ':id_grade'=>$user->id_grade] );
    }

    public function selectIdGrade($user)
    {
              $requete = $this->db->prepareAndExecute('SELECT * FROM blog_utilisateur WHERE id_grade = :id_grade',[':id_grade' => $user->id_grade]);
             $requete->fetchAll();
           
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